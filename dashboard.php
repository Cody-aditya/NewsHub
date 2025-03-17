<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "social";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT first_name, last_name, dob, country, contact, username FROM datax WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }
        .container {
            width: 344px;
            background-color: #fff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .title {
            color: #000;
            font-size: 18px;
            margin-bottom: 24px;
            font-weight: normal;
        }
        .user-details {
            width: 100%;
            text-align: left;
        }
        .user-details div {
            margin-bottom: 16px;
            font-size: 17px;
            color: #333;
        }
        .session-status {
            margin-top: 24px;
            font-size: 16px;
            color: #333;
        }
        .active-status {
            color: green;
            font-weight: bold;
        }
        .logout-button {
            margin-top: 16px;
            padding: 12px 24px;
            background-color: #d9534f;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .logout-button:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="title">User Details</div>
            <div class="user-details">
                <div><strong>First Name:</strong> <?php echo htmlspecialchars($row['first_name']); ?></div>
                <div><strong>Last Name:</strong> <?php echo htmlspecialchars($row['last_name']); ?></div>
                <div><strong>Date of Birth:</strong> <?php echo htmlspecialchars($row['dob']); ?></div>
                <div><strong>Country:</strong> <?php echo htmlspecialchars($row['country']); ?></div>
                <div><strong>Contact:</strong> <?php echo htmlspecialchars($row['contact']); ?></div>
                <div><strong>Username:</strong> <?php echo htmlspecialchars($row['username']); ?></div>
            </div>
            <div class="session-status">
                Session: <span class="active-status">ACTIVE</span>
            </div>
            <form action="logout.php" method="post">
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
