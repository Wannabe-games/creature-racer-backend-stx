#!/usr/bin/env node
require('dotenv').config({path: '/app/common/.env'});
require('dotenv').config({path: '/app/common/.env.local', override: true});
const {makeContractCall, broadcastTransaction} = require("@stacks/transactions");
const {StacksTestnet} = require("@stacks/network");

async function main() {
    const network = new StacksTestnet({url: process.env.CHAIN_PROVIDER_URL});

    const callArgs = {
        contractAddress: process.env.DEPLOYER_CONTRACT_ADDRESS,
        contractName: 'creature-racer-reward-pool-v1',
        functionName: 'open-new-cycle',
        fee: 500,
        functionArgs: [],
        senderKey: process.env.OPERATOR_CONTRACT_PRIVATE_KEY,
        validateWithAbi: true,
        network,
    };

    const tx = await makeContractCall(callArgs);
    const result = await broadcastTransaction(tx, network);

    return result.txid;
}

main().then(function (txid) {
    console.log('submitted transaction:', '0x' + txid);
});
