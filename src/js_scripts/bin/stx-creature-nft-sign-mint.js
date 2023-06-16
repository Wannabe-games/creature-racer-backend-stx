#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {signMessageHashRsv, createStacksPrivateKey} = require("@stacks/transactions");
const sha256 = require("sha256");
const inputArgs = process.argv.slice(2);

function uint128toBytes(v) {
    let rv = [];

    for (let n = 0; n < 16; n++) {
        rv[n] = Number(BigInt(v) & BigInt(0xff));
        v = BigInt(v) >> BigInt(8);
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

function toUint128Array(s) {
    return [
        makeWord(s, 0), makeWord(s, 16),
        makeWord(s, 32), makeWord(s, 48),
        makeWord(s, 64), makeWord(s, 80),
        makeWord(s, 96), makeWord(s, 112),
        makeWord(s, 128), makeWord(s, 144),
        makeWord(s, 160), makeWord(s, 176),
        makeWord(s, 192), makeWord(s, 208),
        makeWord(s, 224), makeWord(s, 240)
    ];
}

function makeWord(s, i) {
    return BigInt((ordAt(s, i)) << 120n) |
        BigInt((ordAt(s, i + 1)) << 112n) |
        BigInt((ordAt(s, i + 2)) << 104n) |
        BigInt((ordAt(s, i + 3)) << 96n) |
        BigInt((ordAt(s, i + 4)) << 88n) |
        BigInt((ordAt(s, i + 5)) << 80n) |
        BigInt((ordAt(s, i + 6)) << 72n) |
        BigInt((ordAt(s, i + 7)) << 64n) |
        BigInt((ordAt(s, i + 8)) << 56n) |
        BigInt((ordAt(s, i + 9)) << 48n) |
        BigInt((ordAt(s, i + 10)) << 40n) |
        BigInt((ordAt(s, i + 11)) << 32n) |
        BigInt((ordAt(s, i + 12)) << 24n) |
        BigInt((ordAt(s, i + 13)) << 16n) |
        BigInt((ordAt(s, i + 14)) << 8n) |
        BigInt(ordAt(s, i + 15));
}

function ordAt(s, i) {
    if (i < s.length) {
        return BigInt(s.charCodeAt(i));
    } else {
        return BigInt(0n);
    }
}

function sign(buffer) {
    return signMessageHashRsv({messageHash: sha256(buffer), privateKey: createStacksPrivateKey(process.env.OPERATOR_CONTRACT_PRIVATE_KEY)});
}

/* Sign minted creature arguments */
async function mintCreature(nftId, typeId, part1, part2, part3, part4, part5, expiryTimestamp, price, uri, userPubKey) {
    let payload = parseHexString(userPubKey)
        .concat(uint128toBytes(nftId))
        .concat(uint128toBytes(typeId))
        .concat(uint128toBytes(part1))
        .concat(uint128toBytes(part2))
        .concat(uint128toBytes(part3))
        .concat(uint128toBytes(part4))
        .concat(uint128toBytes(part5))
        .concat(uint128toBytes(expiryTimestamp))
        .concat(uint128toBytes(price));

    if (process.env.CONTRACT_VERSION > 4) {
        const uriAsUintArray = toUint128Array(uri);
        for (let i = 0; i < uriAsUintArray.length; i++) {
            payload = payload.concat(uint128toBytes(uriAsUintArray[i]));
        }
    }

    return sign(payload).data;
}

async function main() {
    return await mintCreature.apply(null, inputArgs.slice(0, 11));
}

main().then(function (txt) {
    console.log(txt);
});
