<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1.0">
    <title>Book Management System</title>
</head>
<body>
    <form action="./loginAuthenticate.php" method="post">
        <div class="login">
            <h3>Book management system</h3>
            <div class="input-div">
                <label for="userid">ID</label>
                <input type="text" name="userid">
            </div>

            <div class="input-div">
                <label for="userid">Password</label>
                <input type="password" name="userpass">
            </div>

            <input type="submit" value="Login">
        </div>
    </form>

    <?php include __DIR__."/scripts.php"?>
</body>
</html>