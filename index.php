<!DOCTYPE html>
<html>
<head>
    <title>Rose Shop</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(to bottom, #c91e1e, #e35959);
            animation: gradientAnimation 10s ease infinite;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        h1 {
            color: #fff;
            margin-bottom: 20px;
        }

        form {
            width: 300px;
            text-align: center;
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 10px;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #fff;
        }

        select {
            height: 100px;
        }

        input[type="text"],
        select {
            padding: 5px;
            font-size: 16px;
        }

        .submit-button {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 10px;
        }

        input[type="submit"] {
            background-color: #fff;
            color: #c91e1e;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #e35959;
        }

        ul {
            margin-top: 10px;
        }

        li {
            margin-bottom: 5px;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Welcome to Rose Shop</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $selectedRoses = $_POST['roses'];

        // Process the form submission, save order details to database, send email, etc.

        echo "<p>Thank you, $name! Your order for the following roses has been received:</p>";
        echo "<ul>";
        foreach ($selectedRoses as $rose) {
            echo "<li>$rose</li>";
        }
        echo "</ul>";
    }
    ?>

    <form method="POST" action="">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="roses">Select Roses:</label>
        <select id="roses" name="roses[]" multiple size="3" required>
            <option value="red">Red Roses</option>
            <option value="pink">Pink Roses</option>
            <option value="white">White Roses</option>
        </select>

        <div class="submit-button">
            <input type="submit" value="Buy Roses">
        </div>
    </form>
</body>
</html>


