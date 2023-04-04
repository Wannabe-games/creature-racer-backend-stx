#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {makeContractCall, broadcastTransaction} = require("@stacks/transactions");
const {StacksTestnet} = require("@stacks/network");

async function main() {
    const network = new StacksTestnet({url: process.env.CHAIN_PROVIDER_URL});

    const callArgs = {
        contractAddress: process.env.DEPLOYER_CONTRACT_ADDRESS,
        contractName: 'creature-racer-reward-pool-v' + process.env.CONTRACT_VERSION,
        functionName: 'open-new-cycle',
        fee: process.env.GAS_PRICE,
        functionArgs: [],
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
