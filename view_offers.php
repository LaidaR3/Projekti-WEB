
<?php
session_start();


$conn = new mysqli("localhost", "root", "", "monvellidb");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM offers";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $offers = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $offers = [];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head><style>
<style>
    .offers-container {
        display: flex;
    flex-direction:row;
    background-color: white;
    justify-content: space-between;
    background-size: 100%;
    margin-bottom: 20px;
    }

    .offer {
        border: 1px solid #ccc;
        padding: 20px;
        margin: 20px;
        text-align: center;
        
        width: 600px;
    }

    .offer h3 {
        margin-bottom: 5px;
    }

    .offer p {
        margin: 0;
    }

    .offer-details {
        display: flex;
        justify-content: space-around;
    }
</style>

        </style>
</head>
<body>
    <header>
      
    </header>

    <main>
        <h2>Available Offers</h2>
        <div class="offers-container">
    <?php foreach ($offers as $offer): ?>
        <div class="offer">
            <h3><?php echo $offer['name']; ?></h3>
            <div class="offer-details">
                <p><?php echo $offer['description']; ?></p>
                <p>Price: $<?php echo $offer['price']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    </main>

    <footer>

    </footer>
</body>
</html>
