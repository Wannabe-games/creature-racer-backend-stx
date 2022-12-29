#!/usr/bin/env node
require('dotenv').config({path: '/app/common/.env'});
require('dotenv').config({path: '/app/common/.env.local', override: true});
const {callReadOnlyFunction, standardPrincipalCV} = require("@stacks/transactions");
const {StacksTestnet} = require("@stacks/network");
const wallet = process.argv.slice(2, 3).join('');

async function main() {
    const network = new StacksTestnet({url: process.env.CHAIN_PROVIDER_URL});

    const callArgs = {
        contractAddress: process.env.DEPLOYER_CONTRACT_ADDRESS,
        contractName: 'creature-racer-staking-v' + process.env.CONTRACT_VERSION,
        functionName: 'get-user-share',
        functionArgs: [standardPrincipalCV(wallet)],
        network,
        senderAddress: process.env.OPERATOR_CONTRACT_ADDRESS,
    };

    return await callReadOnlyFunction(callArgs);
}

main().then(function (result) {
    console.log(Number(result.value.value));
});
