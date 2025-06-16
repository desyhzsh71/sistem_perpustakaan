<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", "sans-serif";
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(book.png) no-repeat;
            background-size: cover;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 100px;
            background: #fbcab3;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 99;
        }

        .logo {
            font-size: 2em;
            color: #333;
            user-select: none;
        }

        .navigation a {
            position: relative;
            font-size: 1.1em;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            margin-left: 40px;
        }

        .navigation .btnLogin-popup {
            width: 150px;
            height: 150px;
            background: transparent;
            border: 2px solid #333;
            outline: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.1em;
            color: #333;
            font-weight: 500;
            margin-left: 40px;
            transition: .5s;
        }

        .navigation .btnLogin-popup:hover {
            background: #333;
            color: aliceblue;
        }

    </style>
    <header>
        <h2 class="logo">iPerpus</h2>
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">Category</a>
            <a href="#">Data</a>
            <a href="book.php">Book</a>
            <a href="login.php" button class="btnLogin-popup">Logout</button></a>
        </nav>
    </header>
</body>

</html>