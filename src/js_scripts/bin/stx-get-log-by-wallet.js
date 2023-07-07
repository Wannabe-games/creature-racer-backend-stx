#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {Configuration, AccountsApi} = require("@stacks/blockchain-api-client");
const {HIRO_MAINNET_DEFAULT} = require("@stacks/network");
const {fetch} = require("cross-fetch");
const cfg = new Configuration({fetchApi: fetch, basePath: (process.env.CHAIN_PROVIDER_URL || HIRO_MAINNET_DEFAULT)});
const wallet = process.argv.slice(2, 3).join('') || process.env.OPERATOR_CONTRACT_ADDRESS;
const offset = parseInt(process.argv.slice(3, 4).join('') || 0);
const limit = parseInt(process.argv.slice(4, 5).join('') || 50);

async function main() {
    const transactionsApi = new AccountsApi(cfg);

    return await transactionsApi.getAccountTransactionsWithTransfers(
        {
            principal: wallet,
            offset: offset,
            limit: limit,
            unanchored: true
        }
    );
}

main().then(function (response) {
    console.log(JSON.stringify(response));
}).catch((e) => {
    console.log([]);
});
