#!/usr/bin/env node
require('dotenv').config({path: '../common/.env'})
const {
    makeContractCall,
    broadcastTransaction,
    standardPrincipalCV,
    uintCV,
    bufferCV,
    pubKeyfromPrivKey,
    privateKeyToString,
    TransactionVersion,
    signMessageHashRsv,
    createStacksPrivateKey,
    FungibleConditionCode,
    makeContractSTXPostCondition,
    makeStandardSTXPostCondition,
    AnchorMode
} = require("@stacks/transactions");
const {StacksTestnet} = require("@stacks/network");
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
    let result = [];
    let i = 0;
    while (i < str.length) {
        result.push(parseInt(str.substring(i, i + 2), 16));
        i += 2;
    }

    return result;
}

function sign(buffer, key) {
    const hash = sha256(buffer);
    return signMessageHashRsv({
        messageHash: hash, privateKey: createStacksPrivateKey(key)
    });
}

/* Mint a creature and pay for it */
async function mintCreature(nftId, typeId, part1, part2, part3, part4, part5, expiryTimestamp, price, userWallet, userPubKey) {
    const network = new StacksTestnet({url: process.env.CHAIN_PROVIDER_URL});

    // Sign minted creature arguments
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

    const operatorSignature = sign(payload, process.env.PRIVATE_WALLET_KEY);

    const postConditions = [
        makeStandardSTXPostCondition(userWallet, FungibleConditionCode.LessEqual, 50000n),
        makeContractSTXPostCondition(process.env.CREATURE_NFT_CONTRACT_ADDRESS, 'creature-racer-payment', FungibleConditionCode.LessEqual, 50000n)
    ];

    const callArgs = {
        contractAddress: process.env.CREATURE_NFT_CONTRACT_ADDRESS,
        contractName: 'creature-racer-nft',
        functionName: 'mint',
        fee: process.env.MINT_PRICE,
        functionArgs: [
            uintCV(nftId),                                                  // nft-id
            bufferCV(new Uint8Array([typeId])),                             // type-id
            bufferCV(new Uint8Array([part1, part2, part3, part4, part5])),  // parts
            uintCV(expiryTimestamp),
            uintCV(price),
            bufferCV(new Uint8Array(parseHexString(operatorSignature.data))),
            bufferCV(new Uint8Array(parseHexString(userPubKey)))
        ],
        senderKey: process.env.PRIVATE_WALLET_KEY,
        validateWithAbi: true,
        network,
        postConditions,
        anchorMode: AnchorMode.Any
    };
    const tx = await makeContractCall(callArgs);
    const result = await broadcastTransaction(tx, network);

    return result.txid;
}

async function main() {
    return await mintCreature.apply(null, inputArgs.slice(0, 11));
}

main().then(function (txid) {
    console.log('0x' + txid);
});

// test:
// bin/stx-sign-mint-message.js 314159 7 1 1 1 1 1 1673445045 30000 ST3NBRSFKX28FQ2ZJ1MAKX58HKHSDGNV5N7R21XCP 029fb154a570a1645af3dd43c3c668a979b59d21a46dd717fd799b13be3b2a0dc7
