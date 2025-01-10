<html>
<head>
    <title>Book Information System</title>
</head>
<body>
    <h1>Book Information System</h1>
    <form action="" method="post">
        <label for="accession_number">Accession Number:</label><br>
        <input type="number" id="accession_number" name="accession_number" required><br><br>
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <label for="authors">Authors:</label><br>
        <input type="text" id="authors" name="authors" required><br><br>
        <label for="edition">Edition:</label><br>
        <input type="text" id="edition" name="edition" required><br><br>
        <label for="publisher">Publisher:</label><br>
        <input type="text" id="publisher" name="publisher" required><br><br>
        <input type="submit" name="store" value="Store Book Information"><br><br>
    </form>
    <hr>
    <form action="" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <input type="submit" name="search" value="Search Book">
    </form>
</body>
</html>


<?php
// Configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS book_info (
    accession_number INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    authors VARCHAR(255) NOT NULL,
    edition VARCHAR(50) NOT NULL,
    publisher VARCHAR(100) NOT NULL
)";
$conn->query($sql);

// Handle form submission{
    if (isset($_POST['store'])) {
        // Store book information
        $accession_number = $_POST['accession_number'];
        $title = $_POST['title'];
        $authors = $_POST['authors'];
        $edition = $_POST['edition'];
        $publisher = $_POST['publisher'];

        $sql = "INSERT INTO book_info (accession_number, title, authors, edition, publisher) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issss", $accession_number, $title, $authors, $edition, $publisher);
        if ($stmt->execute()) {
            echo "<script>alert('Book information stored successfully!');</script>";
        } else {
            echo "<script>alert('Error storing book information!');</script>";
        }
    } elseif (isset($_POST['search'])) {
        // Search for book
        $title = $_POST['title'];

        $sql = "SELECT * FROM book_info WHERE title LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $title);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h2>Search Results:</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Accession Number</th><th>Title</th><th>Authors</th><th>Edition</th><th>Publisher</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['accession_number'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['authors'] . "</td>";
                echo "<td>" . $row['edition'] . "</td>";
                echo "<td>" . $row['publisher'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No results found!";
        }
    }

?>