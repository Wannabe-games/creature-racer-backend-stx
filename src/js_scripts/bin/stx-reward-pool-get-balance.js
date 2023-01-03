#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {StacksTestnet} = require("@stacks/network");
const {callReadOnlyFunction} = require("@stacks/transactions");
const {cvToJSON} = require("@stacks/transactions/dist/clarity/clarityValue");

async function main() {
    const network = new StacksTestnet({url: process.env.CHAIN_PROVIDER_URL});

    const callArgs = {
        contractAddress: process.env.DEPLOYER_CONTRACT_ADDRESS,
        contractName: 'creature-racer-reward-pool-v' + process.env.CONTRACT_VERSION,
        functionName: 'get-balance',
        functionArgs: [],
        network,
        senderAddress: process.env.OPERATOR_CONTRACT_ADDRESS,
    };

    return await callReadOnlyFunction(callArgs);
}

main().then(function (response) {
    let result = cvToJSON(response);
    console.log(result.success ? result.value.value : '0');
});
