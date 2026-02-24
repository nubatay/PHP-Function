<?php
function computeSubtotal($price, $qty) {
    return $price * $qty;
}

function computeDiscount($subtotal) {
    if ($subtotal > 1000) {
        return $subtotal * 0.10;
    }
}

function computeTax($subtotal, $discount) {
    $taxAmount = $subtotal - $discount;
    return $taxAmount * 0.12;
}

function computeFinalAmount($subtotal, $discount, $tax) {
    return ($subtotal - $discount) + $tax;
}

function formatCurrency($amount) {
    return "₱" . number_format(round($amount, 2), 2);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $item = trim($_POST['item']);
    $price = $_POST['price'];
    $qty = $_POST['qty'];

        if (empty($item) || empty($price) || empty($qty)) {
        $error = "All fields are required!";
    } else if ($price < 0 || $qty < 0) {
        $error = "Price must be greater than 0";
    } else {
        $subtotal = computeSubtotal($price, $qty);
        $discount = computeDiscount($subtotal);
        $tax = computeTax($subtotal, $discount);
        $finalAmount = computeFinalAmount($subtotal, $discount, $tax);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Transaction Summary</h2>

    <p><strong>Item:</strong> <?php echo strtoupper($item) . " (" . strlen($item) . " characters)"; ?> </p>
    <p><strong>Price:</strong> <?php echo formatCurrency($price); ?> </p>
    <p><strong>Quantity:</strong> <?php echo formatCurrency($qty); ?> </p>
    <p><strong>Subtotal:</strong> <?php echo formatCurrency($subtotal); ?> </p>
    <p><strong>Discount:</strong> <?php echo formatCurrency($discount); ?> </p>
    <p><strong>Tax (12% VAT):</strong> <?php echo formatCurrency($tax); ?> </p>
    
    <form action="index.php" method="GET">
        <button type="submit">Add Another Transaction</button>
    </form>
</div>
</body>
</html>