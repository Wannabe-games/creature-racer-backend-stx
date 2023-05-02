#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {generateSecretKey, generateWallet} = require('@stacks/wallet-sdk');
const {createStacksPrivateKey, privateKeyToString, getPublicKey, publicKeyToString, publicKeyToAddress, AddressVersion} = require('@stacks/transactions');

async function makeRandomAccount() {
    const secretKey = generateSecretKey();
    const wallet = await generateWallet({secretKey, password: ''});

    console.log("mnemonic: ", secretKey);
    console.log("");

    outputAccount(wallet.accounts[0]);
}

function outputAccount(account) {
    const privateKey = createStacksPrivateKey(account.stxPrivateKey);
    const publicKey = getPublicKey(privateKey);
    const address = publicKeyToAddress(process.env.CHAIN_PROVIDER_URL ? AddressVersion.TestnetSingleSig : AddressVersion.MainnetSingleSig, publicKey);

    console.log("OPERATOR_CONTRACT_ADDRESS=" + address);
    console.log("OPERATOR_CONTRACT_PRIVATE_KEY=" + privateKeyToString(privateKey));
    console.log("OPERATOR_CONTRACT_PUBLIC_KEY=" + publicKeyToString(publicKey));
}

makeRandomAccount().then(() => {
    console.log("");
});
