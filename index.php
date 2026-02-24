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
        <h2>Transaction Form</h2>
        <form action="process.php" method="POST">

            <label for="">Item Name</label>
            <input type="text" name="item" placeholder="Item">

            <label for="">Price</label>
            <input type="number" name="price" placeholder="Price">

            <label for="">Quantity</label>
            <input type="number" name="qty" placeholder="Quantity"> <br>

            <button type="submit">Submit transaction</button>
        </form>
    </div>
</body>
</html>