<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Entry Results</title>
</head>

<body>
    <h1>Book Entry Results</h1>
    <?php

    require_once('connect.php');

    // TODO 1: Create short variable names.
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $title = $_POST['title'];
    $price = $_POST['price'];

    // TODO 2: Check and filter data coming from the user.    
    if ($isbn == null || $author == null || $title == null || $price == null)
        die("All fields must not be empty");

    // TODO 3: Setup a connection to the appropriate database.
    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die($conn->connect_error);

    // TODO 4: Query the database.    
    $query = "INSERT INTO catalogs (isbn, author, title, price) VALUES ('$isbn', '$author', '$title', '$price')";
    $result = $conn->query($query);

    // TODO 5: Display the feedback back to user.
    if (!$result) die("Fatal error, data is not inserted.");
    echo "Added successfully";

    ?>
</body>

</html>