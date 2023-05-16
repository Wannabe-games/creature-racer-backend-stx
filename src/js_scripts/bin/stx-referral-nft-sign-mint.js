#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {signMessageHashRsv, createStacksPrivateKey, getPublicKey, publicKeyToString} = require("@stacks/transactions");
const {asciiToBytes} = require("@stacks/common");
const sha256 = require("sha256");

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

function sign(refCode, uri, publicKey) {
    let message = parseHexString(publicKey);

    if (uri.length > 0) {
        const uriBuff = asciiToBytes(uri);
        message = concatUint8Arrays(message, new Uint8Array([0xD]));
        message = concatUint8Arrays(message, uint32toBytes(uriBuff.length));
        message = concatUint8Arrays(message, uriBuff);
    }

    if (refCode.length > 0) {
        const refCodeBuff = Uint8Array.from(refCode.split("").map(x => x.charCodeAt()));
        message = concatUint8Arrays(message, new Uint8Array([0xE]));
        message = concatUint8Arrays(message, uint32toBytes(refCodeBuff.length));
        message = concatUint8Arrays(message, refCodeBuff);
    }

    return signMessageHashRsv({
        messageHash: sha256(message),
        privateKey: createStacksPrivateKey(process.env.OPERATOR_CONTRACT_PRIVATE_KEY),
    });
}

async function main() {
    const refCode = process.argv.slice(2, 3).join('');

    if (!refCode) {
        console.log("Enter ref code!");
        return '';
    }

    const uri = process.argv.slice(3, 4).join('');
    const publicKey = process.argv.slice(4, 5).join('') || publicKeyToString(getPublicKey(createStacksPrivateKey(process.env.OPERATOR_CONTRACT_PRIVATE_KEY)));

    return sign(refCode, uri, publicKey).data;
}

main().then(function (result) {
    console.log(result);
});
