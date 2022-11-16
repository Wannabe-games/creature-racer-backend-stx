#!/usr/bin/env node

// Load variable from command input
const env = process.argv.slice(2,3).join('');
const url = process.argv.slice(3,4).join('');
const daiAddress = process.argv.slice(4,5).join('');
const user = process.argv.slice(5,6).join('');

const ethers = require('ethers');
const fs = require('fs');

var daiAbi = JSON.parse(fs.readFileSync('/app/js_scripts/jsons/reward_pool_abi_'+env+'.json', 'utf8'));

const provider = new ethers.providers.JsonRpcProvider(url);

// The Contract object
const daiContract = new ethers.Contract(daiAddress, daiAbi, provider);

// Result on output
withdrawalCount = daiContract.getWithdrawalCount(user);

withdrawalCount.then((value) => {
    console.log(value.toString());
});
