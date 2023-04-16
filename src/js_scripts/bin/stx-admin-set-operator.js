#!/usr/bin/env node
const {makeContractCall, broadcastTransaction, standardPrincipalCV, createStacksPrivateKey, privateKeyToString, someCV} = require("@stacks/transactions");
const {generateWallet} = require('@stacks/wallet-sdk');
const {StacksTestnet} = require("@stacks/network");
const process = require('process');

const deployerAddress = '';
const deployerSecretKey = '';

async function main() {
    if (process.argv.length < 3) {
        console.log("usage: node set-operator.js address");
        return;
    }
    const operatorAddress = someCV(standardPrincipalCV(process.argv[2]));

    const network = new StacksTestnet();
    const wallet = await generateWallet({secretKey: deployerSecretKey, password: ''});
    const deployerKey = privateKeyToString(createStacksPrivateKey(wallet.accounts[0].stxPrivateKey));

    const callArgs = {
        contractAddress: deployerAddress,
        contractName: 'creature-racer-admin-v2',
        functionName: 'set-operator',
        fee: process.env.GAS_PRICE,
        functionArgs: [operatorAddress],
        senderKey: deployerKey,
        validateWithAbi: true,
        network,
    };

    const tx = await makeContractCall(callArgs);
    const result = await broadcastTransaction(tx, network);

    return result.txid;
}

main().then(function (txid) {
    console.log('submitted transaction: ', '0x' + txid);
});
