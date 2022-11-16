#!/usr/bin/env node
const privateKey = process.argv.slice(2,3).join('');
const params = process.argv.slice(3);
const ethers = require('ethers');

// Create a wallet to sign the hash with
let wallet = new ethers.Wallet(privateKey);

// console.log('address: '+wallet.address);

const keccak256Hash = ethers.utils.solidityKeccak256(
    ["address", "uint256", "uint256", "uint256"],
    params,
);
// console.log('keccak256Hash: '+keccak256Hash);

const arraifyHash = ethers.utils.arrayify(keccak256Hash);

const signature = wallet.signMessage(arraifyHash);

// console.log({signature});

signature.then((value) => {
    console.log(value);
});