<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the value from the form
    $name = $_POST['name'];

    // Database configuration
    $servername = "db";  // The name of the database service in your Docker container setup
    $username = "umer";  // Database username
    $password = "admin123";  // Database password
    $dbname = "test_db";  // Database name

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query to insert data into the table
    $sql = "INSERT INTO test (name) VALUES ('$name')";

    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        $message = "New record created successfully";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        /* Container for the form */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Input fields */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        /* Submit button styling */
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Message styling */
        .message {
            margin-top: 20px;
            font-size: 16px;
            color: #4CAF50;
        }

        .error {
            color: #f44336;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Insert Data into Test Table</h1>

        <!-- Form for submitting data -->
        <form action="form.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <input type="submit" value="Insert Data">
        </form>

        <!-- Display success or error message -->
        <?php if (isset($message)) : ?>
            <div class="message">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
