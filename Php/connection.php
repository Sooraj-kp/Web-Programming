<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected";
    }

    $sql = "DROP TABLE IF EXISTS Mygst";
    $conn->query($sql);

    $sql = "CREATE TABLE Mygst (
        id INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table Mygst created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $ins = "INSERT INTO Mygst (firstname, lastname, email) VALUES ('ansar', 'kp', 'akp2@gmail.com')";
    $ins1 = "INSERT INTO Mygst (firstname, lastname, email) VALUES ('ramesh', 'pp', 'rhp2@gmail.com')";
    $ins2 = "INSERT INTO Mygst (firstname, lastname, email) VALUES ('manu', 'u u', 'mau2@gmail.com')"; 
    $ins3 = "INSERT INTO Mygst (firstname, lastname, email) VALUES ('arav', 'n u', 'anp2@gmail.com')"; 


    $conn -> query($ins1);
    $conn -> query($ins2);
    $conn -> query($ins3);
   

    if ($conn->query($ins) === TRUE) {
        echo "Values inserted successfully";
    } else {
        echo "Error inserting values: " . $conn->error;
    }

    $conn->close();
?>
