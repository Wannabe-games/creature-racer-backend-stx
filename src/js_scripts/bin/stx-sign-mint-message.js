#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {signMessageHashRsv, createStacksPrivateKey} = require("@stacks/transactions");
const sha256 = require("sha256");
const inputArgs = process.argv.slice(2);

function uint128toBytes(v) {
    let rv = [];

    for (let n = 0; n < 16; n++) {
        rv[n] = v & 0xff;
        v = v >> 8;
    }
    return rv;
}

function parseHexString(str) {
    let i = 0, result = [];

    while (i < str.length) {
        result.push(parseInt(str.substring(i, i + 2), 16));
        i += 2;
    }

    return result;
}

function sign(buffer, key) {
    return signMessageHashRsv({messageHash: sha256(buffer), privateKey: createStacksPrivateKey(key)});
}

/* Sign minted creature arguments */
async function mintCreature(nftId, typeId, part1, part2, part3, part4, part5, expiryTimestamp, price, userWallet, userPubKey) {
    const payload = parseHexString(userPubKey)
        .concat(uint128toBytes(nftId))
        .concat(uint128toBytes(typeId))
        .concat(uint128toBytes(part1))
        .concat(uint128toBytes(part2))
        .concat(uint128toBytes(part3))
        .concat(uint128toBytes(part4))
        .concat(uint128toBytes(part5))
        .concat(uint128toBytes(expiryTimestamp))
        .concat(uint128toBytes(price));

    return sign(payload, process.env.OPERATOR_CONTRACT_PRIVATE_KEY).data;
}

async function main() {
    return await mintCreature.apply(null, inputArgs.slice(0, 11));
}

main().then(function (txt) {
    console.log(txt);
});
