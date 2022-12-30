#!/usr/bin/env node
require('dotenv').config({path: '/app/common/.env'});
require('dotenv').config({path: '/app/common/.env.local', override: true});
const {callReadOnlyFunction} = require("@stacks/transactions");
const {StacksTestnet} = require("@stacks/network");

async function main() {
    const network = new StacksTestnet({url: process.env.CHAIN_PROVIDER_URL});

    const callArgs = {
        contractAddress: process.env.DEPLOYER_CONTRACT_ADDRESS,
        contractName: 'creature-staking-pool-v' + process.env.CONTRACT_VERSION,
        functionName: 'get-current-cycle',
        functionArgs: [],
        network,
        senderAddress: process.env.OPERATOR_CONTRACT_ADDRESS,
    };

    return await callReadOnlyFunction(callArgs);
}

main().then(function (result) {
    console.log(Number(result.value.value));
});
