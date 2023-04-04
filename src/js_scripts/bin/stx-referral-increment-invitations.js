#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {StacksTestnet} = require("@stacks/network");
const {stringUtf8CV, standardPrincipalCV, makeContractCall, broadcastTransaction} = require("@stacks/transactions");
const wallet = process.argv.slice(2, 3).join('');
const refCode = process.argv.slice(3, 4).join('');

async function main() {
    const network = new StacksTestnet({url: process.env.CHAIN_PROVIDER_URL});

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
    console.log('submitted transaction:', '0x' + result.txid);
});
