<?php
// Database configuration for Docker
$host = "db";  // Use the service name defined in docker-compose.yml
$username = "umer"; // MySQL username
$password = "admin123"; // MySQL password
$database = "test_db"; // Database name

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// SQL query to fetch data from 'test' table
$sql = "SELECT id, name FROM test";
$result = $conn->query($sql);

// Check if the query returned any results
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
    }
} else {
    echo "No results found";
}

// Close connection
$conn->close();
