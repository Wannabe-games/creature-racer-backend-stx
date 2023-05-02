#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {StacksMainnet, StacksTestnet} = require("@stacks/network");
const {generateWallet} = require('@stacks/wallet-sdk');
const {makeContractCall, broadcastTransaction, standardPrincipalCV, createStacksPrivateKey, privateKeyToString, someCV} = require("@stacks/transactions");
const deployerSecretKey = process.argv.slice(2, 3).join('');

async function main() {
    if (!deployerSecretKey) {
        console.log("Enter deployer secret mnemonic key!");
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

    return await broadcastTransaction(tx, network);
}

main().then(function (result) {
    if (result.error) {
        throw new Error(`Error execution transaction 0x${result.txid}: ${result.reason}`);
    }
    console.log(`0x${result.txid}`);
});
