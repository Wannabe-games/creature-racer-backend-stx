#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {cvToJSON} = require("@stacks/transactions/dist/clarity/clarityValue");
const {callReadOnlyFunction} = require("@stacks/transactions");
const {StacksMainnet, StacksTestnet} = require("@stacks/network");

async function main() {
    const network = process.env.CHAIN_PROVIDER_URL ? new StacksTestnet({url: process.env.CHAIN_PROVIDER_URL}) : new StacksMainnet();

    const callArgs = {
        contractAddress: process.env.DEPLOYER_CONTRACT_ADDRESS,
        contractName: 'creature-racer-reward-pool-v' + process.env.CONTRACT_VERSION,
        functionName: 'get-current-cycle',
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
