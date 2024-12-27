<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!!";
}

// Create table if it doesn't exist
$table_creation_sql = "CREATE TABLE IF NOT EXISTS People (
    id INT(6) PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    age INT NOT NULL
)";
if ($conn->query($table_creation_sql) === TRUE) {
    echo "Table People created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if there are any records
$sql = "SELECT COUNT(*) AS total_count FROM People";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['total_count'] == 0) {
    // Insert sample data
    $insert_sql = "INSERT INTO People (id, firstname, lastname, age) VALUES
    (101, 'Jyothish ', 'mohan', 23),
    (102, 'sooraj', 'K', 21),
    (105, 'Abdul', 'Janeeb', 22)";

    if ($conn->query($insert_sql) === TRUE) {
        echo "New records created successfully!!<br>";    
    } else {
        echo "Error inserting records: " . $conn->error . "<br>";   
    }
}

// Retrieve data from table and display it in a neat HTML table format
$sql = "SELECT * FROM People";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start the table
    echo "<html><head><title>Data Table</title></head><body>";
    echo "<h1>People Details</h1>";
    echo "<table border='1' style='border-collapse: collapse;'>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Age</th></tr>";

    // Loop through the results and output them as table rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";        
        echo "<td>" . $row["lastname"] . "</td>";        
        echo "<td>" . $row["age"] . "</td>";     
        echo "</tr>";
    }

    // End the table
    echo "</table>";
    echo "</body></html>";
} else {
    echo "0 results<br>";
}

$conn->close();
?>
