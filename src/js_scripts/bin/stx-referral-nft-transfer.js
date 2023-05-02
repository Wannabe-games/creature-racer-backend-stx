#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {StacksMainnet, StacksTestnet} = require("@stacks/network");
const {makeContractCall, broadcastTransaction, standardPrincipalCV, PostConditionMode, AnchorMode, stringUtf8CV, callReadOnlyFunction, uintCV} = require("@stacks/transactions");
const refCode = process.argv.slice(2, 3).join('');
const wallet = process.argv.slice(3, 4).join('');

async function main() {
    const network = process.env.CHAIN_PROVIDER_URL ? new StacksTestnet({url: process.env.CHAIN_PROVIDER_URL}) : new StacksMainnet();

    const tokenId = await callReadOnlyFunction({
        contractAddress: process.env.DEPLOYER_CONTRACT_ADDRESS,
        contractName: 'creature-racer-referral-nft-v' + process.env.CONTRACT_VERSION,
        functionName: 'get-token-id',
        functionArgs: [stringUtf8CV(refCode)],
        network,
        senderAddress: process.env.OPERATOR_CONTRACT_ADDRESS,
    });

    const callArgs = {
        contractAddress: process.env.DEPLOYER_CONTRACT_ADDRESS,
        contractName: 'creature-racer-referral-nft-v' + process.env.CONTRACT_VERSION,
        functionName: 'transfer',
        fee: process.env.GAS_PRICE,
        functionArgs: [uintCV(parseInt(tokenId.value.value)), standardPrincipalCV(process.env.OPERATOR_CONTRACT_ADDRESS), standardPrincipalCV(wallet)],
        senderKey: process.env.OPERATOR_CONTRACT_PRIVATE_KEY,
        validateWithAbi: true,
        network,
        anchorMode: AnchorMode.Any,
        postConditionMode: PostConditionMode.Allow,
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
