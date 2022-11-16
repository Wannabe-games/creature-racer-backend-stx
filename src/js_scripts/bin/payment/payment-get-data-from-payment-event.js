#!/usr/bin/env node
async function getLog() {
    // Load variable from command input
    const env = process.argv.slice(2,3).join('');
    const url = process.argv.slice(3,4).join('');
    const daiAddress = process.argv.slice(4,5).join('');
    const block = parseInt(process.argv.slice(5,6).join(''));

    const ethers = require('ethers');
    const fs = require('fs');

    let daiAbi = JSON.parse(fs.readFileSync('/app/js_scripts/jsons/payment_abi_'+env+'.json', 'utf8'));

    const provider = new ethers.providers.JsonRpcProvider(url);

    // The Contract object
    const daiContract = new ethers.Contract(daiAddress, daiAbi, provider);

    const filter = daiContract.filters.Payment();
    let blockNumber = await provider.getBlockNumber();
    blockNumber = { blockNumber }.blockNumber
    let lastBlock = block + 2000;

    if (lastBlock > blockNumber) {
        lastBlock = blockNumber;
    }

    // console.log(block);
    // console.log(lastBlock);

    const paymentLogs = await daiContract.queryFilter(filter, block, lastBlock);

    console.log('[')
    paymentLogs.forEach(function(log)
    {
        const parsedLogs = daiContract.interface.parseLog(log);
        console.log(JSON.stringify({ parsedLogs }));
        console.log(',')
    });
    console.log(']')

    // const parsedLogs = daiContract.interface.parseLog(paymentLogs[0]);

}
// Result on output
getLog();

