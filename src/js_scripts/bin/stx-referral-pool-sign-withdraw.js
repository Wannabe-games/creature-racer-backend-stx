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

function sign(buffer, key) {
    return signMessageHashRsv({messageHash: sha256(buffer), privateKey: createStacksPrivateKey(key)});
}

/* Sign withdraw arguments */
async function signWithdraw(amount, withdrawId) {
    const payload = uint128toBytes(amount)
        .concat(uint128toBytes(withdrawId));

    return sign(payload, process.env.OPERATOR_CONTRACT_PRIVATE_KEY).data;
}

async function main() {
    return await signWithdraw.apply(null, inputArgs.slice(0, 2));
}

main().then(function (txt) {
    console.log(txt);
});
