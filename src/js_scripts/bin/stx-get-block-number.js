#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {InfoApi, Configuration} = require("@stacks/blockchain-api-client");
const {HIRO_MAINNET_DEFAULT} = require("@stacks/network");
const {fetch} = require("cross-fetch");
const cfg = new Configuration({fetchApi: fetch, basePath: (process.env.CHAIN_PROVIDER_URL || HIRO_MAINNET_DEFAULT)});

async function main() {
    const infoApi = new InfoApi(cfg);

    return await infoApi.getCoreApiInfo();
}

main().then(function (response) {
    console.log(response.stable_burn_block_height);
});
