#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {signMessageHashRsv, createStacksPrivateKey, getPublicKey, publicKeyToString} = require("@stacks/transactions");
const sha256 = require("sha256");
const refCode = process.argv.slice(2, 3).join('');
const uri = process.argv.slice(3, 4).join('');

function parseHexString(str) {
    const result = [];
    let i = 0;
    while (i < str.length) {
        result.push(parseInt(str.substring(i, i + 2), 16));
        i += 2;
    }

    return new Uint8Array(result);
}

function concatUint8Arrays(a, b) {
    const result = new Uint8Array(a.length + b.length);
    result.set(a);
    result.set(b, a.length);
    return result;
}

function uint32toBytes(v) {
    const rv = [];

    for (let n = 0; n < 4; n++) {
        rv[3 - n] = v & 0xff;
        v = v >> 8;
    }
    return rv;
}

function sign(refCode, uri) {
    const argBuff = Uint8Array.from(refCode.split('').map((x) => x.charCodeAt()));
    const argLengthBytes = uint32toBytes(argBuff.length);

    let buff = concatUint8Arrays(parseHexString(getOperatorPublicKey()), new Uint8Array([0xe]));
    buff = concatUint8Arrays(buff, new Uint8Array(argLengthBytes));
    buff = concatUint8Arrays(buff, argBuff);

    const msghash = sha256(Buffer.from(buff));
    const opsig = signMessageHashRsv({
        messageHash: msghash,
        privateKey: createStacksPrivateKey(process.env.OPERATOR_CONTRACT_PRIVATE_KEY),
    });

    return opsig.data;
}

function getOperatorPublicKey() {
    return publicKeyToString(getPublicKey(createStacksPrivateKey(process.env.OPERATOR_CONTRACT_PRIVATE_KEY)));
}

async function main() {
    return sign(refCode, uri);
}

main().then(function (result) {
    console.log(result);
});
