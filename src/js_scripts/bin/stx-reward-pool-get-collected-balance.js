#!/usr/bin/env node
require('dotenv').config({path: '/app/common/.env'});
require('dotenv').config({path: '/app/common/.env.local', override: true});
const {callReadOnlyFunction, uintCV} = require("@stacks/transactions");
const {StacksTestnet} = require("@stacks/network");
const cycle = process.argv.slice(2, 3).join('');

async function main() {
    const network = new StacksTestnet({url: process.env.CHAIN_PROVIDER_URL});

    const callArgs = {
        contractAddress: process.env.DEPLOYER_CONTRACT_ADDRESS,
        contractName: 'creature-racer-reward-pool-v' + process.env.CONTRACT_VERSION,
        functionName: 'get-collected-balance',
        functionArgs: [uintCV(cycle)],
        network,
        senderAddress: process.env.OPERATOR_CONTRACT_ADDRESS,
    };

    return await callReadOnlyFunction(callArgs);
}

main().then(function (result) {
    console.log(Number(result.value.value));
});
