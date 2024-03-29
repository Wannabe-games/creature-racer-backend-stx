#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {StacksMainnet, StacksTestnet} = require("@stacks/network");
const {stringUtf8CV, makeContractCall, broadcastTransaction, standardPrincipalCV} = require("@stacks/transactions");
const refCode = process.argv.slice(2, 3).join('');
const wallet = process.argv.slice(3, 4).join('');

async function main() {
    const network = process.env.CHAIN_PROVIDER_URL ? new StacksTestnet({url: process.env.CHAIN_PROVIDER_URL}) : new StacksMainnet();

    const callArgs = {
        contractAddress: process.env.DEPLOYER_CONTRACT_ADDRESS,
        contractName: 'creature-racer-referral-nft-v' + process.env.CONTRACT_VERSION,
        functionName: 'increment-invitations',
        fee: process.env.GAS_PRICE,
        functionArgs: [stringUtf8CV(refCode), standardPrincipalCV(wallet)],
        senderKey: process.env.OPERATOR_CONTRACT_PRIVATE_KEY,
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
