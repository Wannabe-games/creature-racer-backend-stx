#!/usr/bin/env node
require('dotenv').config({path: __dirname + '/../../common/.env'});
require('dotenv').config({path: __dirname + '/../../common/.env.local', override: true});
const {fetch} = require("cross-fetch");
const transactionHash = process.argv.slice(2, 3).join('');

const main = async () => {
    const url = (process.env.CHAIN_PROVIDER_URL || 'https://stacks-node-api.stacks.co') + `/extended/v1/tx/${transactionHash}`;

    try {
        const response = await fetch(url);

        if (!response.ok) {
            throw new Error(`Error fetching transaction ${transactionHash}: ${response.statusText}`);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching transaction data:', error);
        throw error;
    }
};

main().then(function (result) {
    console.log(result.tx_status);
});
