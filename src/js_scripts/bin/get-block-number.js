#!/usr/bin/env node

// Load variable from command input
const url = process.argv.slice(2,3).join('');

const ethers = require('ethers');

const provider = new ethers.providers.JsonRpcProvider(url);

let block = provider.getBlockNumber();

block.then((value) => {
    console.log(value.toString());
});
