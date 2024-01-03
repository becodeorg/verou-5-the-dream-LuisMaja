<?php
$exchangeRates = array(
    "EUR" => array(
        "JPY" => 156.08,
        "KRW" => 1431.19,
    ),
    "JPY" => array(
        "EUR" => 0.0064,
        "KRW" => 9.17,
    ),
    "KRW" => array(
        "EUR" => 0.00070,
        "JPY" => 0.11,
    ),
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
    $currencyInput = isset($_POST['currencyInput']) ? strtoupper($_POST['currencyInput']) : '';
    $currencyOutput = isset($_POST['currencyOutput']) ? strtoupper($_POST['currencyOutput']) : '';

    if (isset($exchangeRates[$currencyInput][$currencyOutput])) {
        $exchangeRate = $exchangeRates[$currencyInput][$currencyOutput];
        $convertedAmount = $amount * $exchangeRate;

        // Display the result
        echo "Converted Amount: $convertedAmount $currencyOutput";
    } else {
        echo "Invalid currency pair.";
    }
}
?>

<form method="post" action="./index.php">
    Amount: <input type="text" name="amount" required><br>
    <select name="currencyInput" id="currencyInput">
        <option value="EUR">EUR</option>
        <option value="JPY">JPY</option>
        <option value="KRW">KRW</option>
    </select>
    <select name="currencyOutput" id="currencyOutput">
        <option value="EUR">EUR</option>
        <option value="JPY">JPY</option>
        <option value="KRW">KRW</option>
    </select>
    <input type="submit" value="Convert">
</form>
