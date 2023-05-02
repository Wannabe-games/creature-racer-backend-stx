#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {InfoApi, TransactionsApi, Configuration} = require("@stacks/blockchain-api-client");
const {HIRO_MAINNET_DEFAULT} = require("@stacks/network");
const {fetch} = require("cross-fetch");
const cfg = new Configuration({fetchApi: fetch, basePath: (process.env.CHAIN_PROVIDER_URL || HIRO_MAINNET_DEFAULT)});
const startBlock = parseInt(process.argv.slice(2, 3).join('') || 1);
const maxBlocksToRead = parseInt(process.argv.slice(3, 4).join('') || 2000);

async function main() {
    const infoApi = new InfoApi(cfg);
    const transactionsApi = new TransactionsApi(cfg);
    const state = await infoApi.getCoreApiInfo();

    let endBlock = state.burn_block_height;
    if (endBlock > startBlock + maxBlocksToRead - 1) {
        endBlock = startBlock + maxBlocksToRead - 1;
    }

    let results = [];

    for (let h = startBlock; h <= endBlock; h++) {
        const txs = await transactionsApi.getTransactionsByBlockHeight({height: h});
        for (let i = 0; i < txs.total; i++) {
            results.push(txs.results[i]);
        }
    }

    return results;
}

main().then(function (response) {
    console.log(JSON.stringify(response));
}).catch((e) => {
    console.log([]);
});
