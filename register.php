<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $dob = trim($_POST["dob"]);
    $country = trim($_POST["country"]);
    $contact = trim($_POST["contact"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Check if any fields are empty
    if (empty($firstName) || empty($lastName) || empty($dob) || empty($country) || empty($contact) || empty($username) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Example: list of existing usernames (replace this with a DB check)
    $existingUsernames = ['john_doe', 'jane_smith'];
    if (in_array($username, $existingUsernames)) {
        echo "Username already exists. Please choose another one.";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Database connection details
    $servername = "localhost";
    $username_db = "root";  // Change this as needed
    $password_db = "";      // Change this as needed
    $dbname = "social";     // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO datax (first_name, last_name, dob, country, contact, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $firstName, $lastName, $dob, $country, $contact, $username, $hashedPassword);

    // Execute the query and handle the result
    if ($stmt->execute()) {
        // Registration successful, show success message
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Registration Status</title>
            <style>
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    background-color: #f0f2f5;
                    font-family: Arial, sans-serif;
                    margin: 0;
                }
                .container {
                    text-align: center;
                }
                .message {
                    font-size: 24px;
                    font-weight: bold;
                    color: green;
                }
            </style>
            <script>
                // Redirect to login.php after 3 seconds
                setTimeout(function() {
                    window.location.href = 'login.php';
                }, 3000);
            </script>
        </head>
        <body>
            <div class='container'>
                <div class='message'>Sign Up Successful!</div>
            </div>
        </body>
        </html>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to registration page if accessed without POST request
    header("Location: register.html");
    exit;
}
?>
