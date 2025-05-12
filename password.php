<?php 
session_start();
if (isset($_POST['password'])) {
    if ($_POST['password'] == "Hull@dek!2025") {
        $_SESSION['authenticated'] = true;
        header("Location: table.php");
        exit();
    } else {
        $error = "Incorrect password! Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login</title>
    <style>
        /* Import Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg,rgb(105, 146, 128),rgb(19, 40, 19));
            overflow: hidden;
        }

        .container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
            color: white;
        }

        h2 {
            margin-bottom: 20px;
            font-weight: 600;
        }

        .input-box {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transition: 0.3s;
        }

        input[type="password"]::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        input[type="password"]:focus {
            background: rgba(255, 255, 255, 0.3);
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            background:rgb(31, 145, 94);
            color: #333;
            transition: all 0.3s ease;
        }

        button:hover {
            background:rgb(78, 117, 94);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(255, 255, 0, 0.5);
        }

        .error {
            color: #FF4C4C;
            font-size: 14px;
            margin-top: 10px;
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>🔒 Secure Login</h2>
    <form method="POST">
        <div class="input-box">
            <input type="password" name="password" placeholder="Enter Password" required>
        </div>
        <button type="submit">Unlock</button>
    </form>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
</div>

</body>
</html>
