#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {StacksMainnet, StacksTestnet} = require("@stacks/network");
const {generateWallet} = require('@stacks/wallet-sdk');
const {makeContractCall, broadcastTransaction, standardPrincipalCV, createStacksPrivateKey, privateKeyToString, someCV} = require("@stacks/transactions");
const deployerSecretKey = process.argv.slice(2, 3).join('') || 'sell invite acquire kitten bamboo drastic jelly vivid peace spawn twice guilt pave pen trash pretty park cube fragile unaware remain midnight betray rebuild';

async function main() {
    if (!deployerSecretKey) {
        console.log("enter deployer secret key");
        return '';
    }

    const network = process.env.CHAIN_PROVIDER_URL ? new StacksTestnet({url: process.env.CHAIN_PROVIDER_URL}) : new StacksMainnet();
    const wallet = await generateWallet({secretKey: deployerSecretKey, password: ''});

    const callArgs = {
        contractAddress: process.env.DEPLOYER_CONTRACT_ADDRESS,
        contractName: 'creature-racer-admin-v' + process.env.CONTRACT_VERSION,
        functionName: 'set-operator',
        fee: process.env.GAS_PRICE,
        functionArgs: [someCV(standardPrincipalCV(process.env.OPERATOR_CONTRACT_ADDRESS))],
        senderKey: privateKeyToString(createStacksPrivateKey(wallet.accounts[0].stxPrivateKey)),
        validateWithAbi: true,
        network,
    };

    const tx = await makeContractCall(callArgs);
    const result = await broadcastTransaction(tx, network);

    return result.txid;
}

main().then(function (txid) {
    console.log('0x' + txid);
});
