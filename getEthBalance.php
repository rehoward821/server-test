<?php
$rpcUrl = "https://mainnet.infura.io/v3/YOUR_PROJECT_ID";
$address = "0x742d35Cc6634C0532925a3b844Bc454e4438f44e";

$data = [
    "jsonrpc" => "2.0",
    "method" => "eth_getBalance",
    "params" => [$address, "latest"],
    "id" => 1
];

$ch = curl_init($rpcUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
$balanceWei = hexdec($result['result']);
$balanceEth = $balanceWei / 1e18;

echo "ETH Balance: $balanceEth\n";
