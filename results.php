<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search Results</title>
</head>

<body>
    <h1>Book Search Results</h1>
    <?php
    // TODO 1: Create short variable names.
    require_once('connect.php');

    $searchTerm = $_POST['searchterm'];
    $searchType = $_POST['searchtype'];

    // TODO 2: Check and filter data coming from the user.
    if ($searchTerm == null || $searchType == null)
        die("All fields must not be empty");

    // TODO 3: Setup a connection to the appropriate database.
    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die($conn->connect_error);

    // TODO 4: Query the database.    
    $query = "SELECT isbn, author, title, price FROM catalogs WHERE $searchType = '$searchTerm' ";
    $results = $conn->query($query);

    if ($results->num_rows < 1) die($conn->error);

    foreach ($results as $result) {
    ?>

        <table border="0">
            <tr>
                <!-- An input type of text box, named "isbn" with maxlength "13" and size "13". -->
                <td>ISBN</td>
                <td><?php echo htmlentities($result['isbn']) ?></td>
            </tr>
            <tr>
                <!-- An input type of text box, named "author" with maxlength "30" and size "30". -->
                <td>Author</td>
                <td><?php echo htmlentities($result['author']) ?></td>
            </tr>
            <tr>
                <!-- An input type of text box, named "title" with maxlength "60" and size "30". -->
                <td>Title</td>
                <td><?php echo htmlentities($result['title']) ?></td>
            </tr>
            <tr>
                <!-- An input type of text box, named "price" with maxlength "7" and size "7". -->
                <td>Price RM</td>
                <td><?php echo htmlentities($result['price']) ?></td>
            </tr>

        </table>

    <?php
    }

    ?>
</body>

</html>