<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Check if username or password is empty
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        exit;
    }

    // Database connection details
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "social";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query to check username
    $stmt = $conn->prepare("SELECT * FROM datax WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['username'] = $username;
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['country'] = $row['country'];
            $_SESSION['contact'] = $row['contact'];

            // Redirect to index.html
            header("Location: index.html");
            exit;
        } else {
            // Incorrect password
            echo "Incorrect password.";
        }
    } else {
        // Username does not exist
        echo "Username does not exist.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to login page if accessed without POST request
    header("Location: login.html");
    exit;
}
?>
