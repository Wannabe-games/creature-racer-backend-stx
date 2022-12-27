#!/usr/bin/env node
const {makeContractCall, broadcastTransaction, standardPrincipalCV, someCV, makeRandomPrivKey, privateKeyToString, getPublicKey, publicKeyToAddress, AddressVersion} = require("@stacks/transactions");
const {StacksTestnet} = require("@stacks/network");

const deployerAddress = '';
const deployerKey = '';

const privKey = makeRandomPrivKey();
const pubKey = getPublicKey(privKey);
const operatorAddress = publicKeyToAddress(AddressVersion.TestnetSingleSig, pubKey);

async function main() {
    const network = new StacksTestnet();

    const callArgs = {
        contractAddress: deployerAddress,
        contractName: 'creature-racer-admin-v1',
        functionName: 'set-operator',
        fee: 500,
        functionArgs: [someCV(standardPrincipalCV(operatorAddress))],
        senderKey: deployerKey,
        validateWithAbi: true,
        network,
    };

    const tx = await makeContractCall(callArgs);
    const result = await broadcastTransaction(tx, network);

    return result.txid;
}

main().then(function (txid) {
    console.log("OPERATOR_CONTRACT_ADDRESS: ", operatorAddress);
    console.log("OPERATOR_CONTRACT_PRIVATE_KEY: ", privateKeyToString(privKey));
    console.log('Submitted transaction: ', '0x' + txid);
});
