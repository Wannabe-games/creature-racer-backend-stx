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

function sign(buffer) {
    return signMessageHashRsv({messageHash: sha256(buffer), privateKey: createStacksPrivateKey(process.env.OPERATOR_CONTRACT_PRIVATE_KEY)});
}

/* Sign withdraw arguments */
async function signWithdraw(userPublicKey, amount, withdrawId, cycle) {
    const payload = parseHexString(userPublicKey)
        .concat(uint128toBytes(amount))
        .concat(uint128toBytes(withdrawId))
        .concat(uint128toBytes(cycle));

    return sign(payload).data;
}

async function main() {
    return await signWithdraw.apply(null, inputArgs.slice(0, 4));
}

main().then(function (txt) {
    console.log(txt);
});
