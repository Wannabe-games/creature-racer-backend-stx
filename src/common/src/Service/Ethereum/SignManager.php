<?php
declare(strict_types=1);

namespace App\Common\Service\Ethereum;

use kornrunner\Keccak;
use kornrunner\Secp256k1;
use Elliptic\EC;
use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Web3\Contracts\Ethabi;
use Web3\Contracts\Types\Address;
use Web3\Contracts\Types\Boolean;
use Web3\Contracts\Types\Bytes;
use Web3\Contracts\Types\Str;
use Web3\Contracts\Types\Integer;
use Web3\Contracts\Types\DynamicBytes;
use Web3\Contracts\Types\Uinteger;
use Web3\Eth;

class SignManager
{
    /**
     * @param ContainerInterface $container
     *
     * @throws Exception
     */
    public function __construct(protected ContainerInterface $container)
    {
        if (
            !class_exists('kornrunner\Keccak') ||
            !class_exists('Elliptic\EC') ||
            !class_exists('Web3\Contracts\Ethabi')
        ) {
            throw new Exception('There is no definition one of class \'kornrunner\Keccak\', \'Elliptic\EC\', \'Web3\Contracts\Ethabi\'');
        }
    }

    /**
     * @param string $message
     * @param bool   $verbose
     *
     * @return string
     */
    public function signMintMessage(string $message, bool $verbose = false): string
    {
        $privateKey = $this->container->getParameter('private_wallet_key');

        exec('sign-mint-message '.$privateKey.' '.$message, $result);

        if ($verbose) {
            var_dump('message: '.$message);
            var_dump('privateKey: '.$privateKey);
            var_dump('result: '.$result[0]);
        }

        return $result[0];
    }

    /**
     * Sign the challenge. Takes two parameters -- the challenge (usually a normal, text-based string),
     * and the private key (private key must be in hex format, without the staring `0x`).
     * Returns the message signature in hex-encoded string.
     *
     * Example call:
     * SignChallenge("u3Z5LUDVp31tMtKtwCGr1FCs3kw", "a0f0e1232dae3ce8a0bf968c452602663975005537e37e79d28c23af52b3114e")
     *
     * Returns:
     * "0x2a2785be5d38ba773765df2232d749b01c4ebc97721f9d033a696b7f893ba45d20bccf4341ae6b01a8f697e22e1e4b4697e02e04352363bee1eeaa9494e096cb"
     */
    public function signChallenge($challenge, $privateKey, $verbose = False): string
    {
        if ($verbose) {
            dump("SignChallenge(challenge): $challenge \r\n");
        }
        $hash = Keccak::hash($challenge, 256);
        $hash = hex2bin($hash);

        return  $this->signHash($hash, $privateKey, $verbose);
    }

    /**
     * @param $pubKey
     *
     * @return string
     *
     * @throws Exception
     */
    private function pubKeyToAddress($pubKey)
    {
        return "0x" . substr(Keccak::hash(substr(hex2bin($pubKey->encode("hex")), 1), 256), 24);
    }

    /**
     * @param string $message
     * @param string $signature
     * @param string $address
     *
     * @return bool
     *
     * @throws Exception
     */
    public function verifySignature(string $message, string $signature, string $address): bool
    {
        $msgLen = strlen($message);
        $hash   = Keccak::hash("\x19Ethereum Signed Message:\n{$msgLen}{$message}", 256);
        $sign   =  [
            "r" => substr($signature, 2, 64),
            "s" => substr($signature, 66, 64)
        ];
        $recId  = ord(hex2bin(substr($signature, 130, 2))) - 27;
        if ($recId != ($recId & 1))
            return false;

        $ec = new EC('secp256k1');
        $pubKey = $ec->recoverPubKey($hash, $sign, $recId);

        return $address == $this->pubKeyToAddress($pubKey);
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public function stringToBinary(string $string): string
    {
        $characters = str_split($string);

        $binary = [];
        foreach ($characters as $character) {
            $data = unpack('H*', $character);
            $binary[] = base_convert($data[1], 16, 2);
        }

        return implode(' ', $binary);
    }

    /**
     * @param string $binary
     *
     * @return string|null
     */
    public function binaryToString(string $binary): ?string
    {
        $binaries = explode(' ', $binary);

        $string = null;
        foreach ($binaries as $binary) {
            $string .= pack('H*', dechex(bindec($binary)));
        }

        return $string;
    }
}
