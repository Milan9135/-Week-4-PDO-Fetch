<?php

$host = "localhost:3307";
$username = "root";
$password = "";
$database = "winkel1";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    PDO::FETCH_ASSOC;
    //    echo "";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


// "Hoe je alles selecteert in een query zonder variabele"

$producten = $pdo->query("SELECT * FROM producten")->fetchAll();

//

// "Hoe je een single row selecteert met placeholders"

$sql = ("SELECT * FROM producten WHERE product_code = ?");
$producten = $pdo->prepare($sql);
$producten->execute([1]);

//

// "Hoe je een single row selecteert met named parameters"

$sql = ("SELECT * FROM producten WHERE product_code = :row");
$producten = $pdo->prepare($sql);
$producten->execute(["row" => "1"]);

//

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkel</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="box">
        <h1>Producten</h1>
        <table>
            <tr>
                <th>Product_code</th>
                <th>Product_naam</th>
                <th>Prijs_per_stuk</th>
                <th>Omschrijving</th>
            </tr>
            <?php foreach ($producten as $row) { ?>
                <tr>
                    <td><?php echo ($row['product_code']); ?></td>
                    <td><?php echo ($row['product_naam']); ?></td>
                    <td><?php echo ($row['prijs_per_stuk']); ?></td>
                    <td><?php echo ($row['omschrijving']); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>

<style>
    
</style>