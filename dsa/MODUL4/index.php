<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Operasi Stack</title>
    <style>
        body {
            background-color: #f1f3f6;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            width: 420px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .form-row label {
            font-weight: 600;
            margin-right: 10px;
            width: 100px;
        }

        .form-row input[type="text"] {
            flex: 1;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .button-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-top: 15px;
        }

        .button-row form {
            display: inline;
        }

        .button-row button {
            padding: 10px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .button-row button:hover {
            background-color: #0056b3;
        }

        .push-button {
            margin-top: 10px;
            display: flex;
            justify-content: center;
        }

        .push-button button {
            padding: 10px 24px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Operasi Stack</h2>

    <form action="send.php" method="post">
        <div class="form-row">
            <label for="data">Enter Data:</label>
            <input type="text" name="data" id="data" required>
        </div>

        <div class="push-button">
            <button type="submit" name="push">Push</button>
        </div>
    </form>

    <div class="button-row">
        <form action="send.php" method="post">
            <button type="submit" name="pop">Pop</button>
        </form>
        <form action="send.php" method="post">
            <button type="submit" name="clear">Clear</button>
        </form>
        <form action="send.php" method="post">
            <button type="submit" name="show">Cetak</button>
        </form>
        <form action="send.php" method="post">
            <button type="submit" name="peak">Peak</button>
        </form>
        <form action="send.php" method="post">
            <input type="number" name="search" required>
            <button type="submit" name="swap">Swap</button>
        </form>
    </div>
</div>

</body>
</html>
