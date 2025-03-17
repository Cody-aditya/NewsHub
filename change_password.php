<?php
// Handle form submission and redirect to confirmation page
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and process the form (for future implementation)
    // For now, simply redirect to confirmation page
    header("Location: password_updated.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('newspaper2.png') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .container {
            width: 100%;
            max-width: 400px;
            background-color: rgba(33, 33, 33, 0.9); /* Opaque dark grey color */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1), 0 0 10px 5px rgb(81, 81, 81); /* Added black shadow */
            text-align: center;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"],
        input[type="password"] {
            padding: 12px;
            margin: 8px ;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: calc(100% - 24px);
            box-sizing: border-box;
            color: #333;
        }
        input::placeholder {
            color: #333; /* Dark grey color for placeholder text */
        }
        input[type="submit"] {
            padding: 12px;
            margin-top: 16px;
            background-color: #cc022a;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #165db5;
        }
        .logo {
            max-width: 120px; /* Ensure the logo doesn't exceed the width of its container */
            height: 110px; /* Maintain aspect ratio */
            margin-bottom: 7px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="NEWS-2.png" alt="News Logo" class="logo">
        <div class="title">Change Password</div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="old_password" name="old_password" placeholder="Old Password" required>
            <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
