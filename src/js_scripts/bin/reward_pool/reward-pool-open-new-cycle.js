#!/usr/bin/env node
async function setNewCycle() {
// Load variable from command input
    const env = process.argv.slice(2,3).join('');
    const url = process.argv.slice(3,4).join('');
    const privateKey = process.argv.slice(4,5).join('');
    const daiAddress = process.argv.slice(5,6).join('');

    const ethers = require('ethers');
    const fs = require('fs');

    var daiAbi = JSON.parse(fs.readFileSync('/app/js_scripts/jsons/reward_pool_abi_'+env+'.json', 'utf8'));

    const provider = new ethers.providers.JsonRpcProvider(url);

   // The Contract object
    const daiContract = new ethers.Contract(daiAddress, daiAbi, provider);

    // A Signer from a private key
    let wallet = new ethers.Wallet(privateKey, provider);

    // Create a new instance of the Contract with a Signer, which allows
    // update methods
    let contractWithSigner = daiContract.connect(wallet);

    let gasPrice = provider.getGasPrice();
    gasPrice = (await gasPrice).toNumber();

    try {
        // Result on output
        // const newCycle = await contractWithSigner.openNewCycle({'gasLimit': 200000000});
        const newCycle = await contractWithSigner.openNewCycle({'gasPrice': gasPrice});

        const tx = await newCycle.wait();

        // console.log(tx);
    } catch (error) {
        // console.log(error.toString())

        return 1;
    }

    return 0;
}

// Result on output
const openNewCycle = setNewCycle();
openNewCycle.then((value) => {
    console.log(value);
});
