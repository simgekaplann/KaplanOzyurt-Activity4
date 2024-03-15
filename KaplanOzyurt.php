<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Java Jam Coffee House</title>
    <meta name="description" content="CENG 311 Inclass Activity 4" />
</head>
<body>

<?php

$exchangeRates = array(
    "USDCAD" => 1.25,
    "USDEUR" => 0.85,
    "CADUSD" => 0.80,
    "CADEUR" => 0.68,
    "EURUSD" => 1.18,
    "EURCAD" => 1.47
);

$fromValue = "";
$amount = "";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["from_value"]) && isset($_GET["from_currency"]) && isset($_GET["to_currency"])) {
    $fromValue = $_GET["from_value"];
    $fromCurrency = $_GET["from_currency"];
    $toCurrency = $_GET["to_currency"];

    $conversionRateKey = $fromCurrency . $toCurrency;
    if (array_key_exists($conversionRateKey, $exchangeRates)) {
        $conversionRate = $exchangeRates[$conversionRateKey];
        $amount = $fromValue * $conversionRate;
    } 
}
?>

<form action="KaplanOzyurt.php" method="GET">
    <table>
        <tr>
            <td>From:</td>
            <td><input type="text" name="from_value" value="<?php echo $fromValue; ?>"/></td>
            <td>Currency:</td>
            <td>
                <select name="from_currency">
                    <option value="USD">US Dollar</option>
                    <option value="CAD">Canadian Dollar</option>
                    <option value="EUR">Euro</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>To:</td>
            <td><input type="text" name="to_value" value="<?php echo $amount; ?>"/></td>
            <td>Currency:</td>
            <td>
                <select name="to_currency">
                    <option value="USD">US Dollar</option>
                    <option value="CAD">Canadian Dollar</option>
                    <option value="EUR">Euro</option>
                </select>
            </td>
			<tr>
            <td colspan="4" style="text-align:right;"><input type="submit" value="Convert"/></td>
        </tr>
    </table>
</form>

</body>
</html>