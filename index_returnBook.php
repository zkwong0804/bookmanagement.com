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
    <!-- Authenticate user -->
    <?php
        include __DIR__."/authenticate.php";
        authenticate();
    ?>
    <div class="container">
        <header>
            <nav>
                <ul>
                    <li><a href="/index_borrowBook.php">Borrow book</a></li>
                    <li><a href="/index_returnBook.php" class="selected">Return book</a></li>
                    <li><a href="/index_extension.php">Lending extension</a></li>
                    <li><a href="/index_penalties.php">Penalties</a></li>
                    <li><a href="/index_book.php">Add book</a></li>
                    <li><a href="/index_member.php">Member</a></li>
                    <li><a href="/index_librarian.php">Librarian</a></li>
                    <li><a href="/logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <div class="content">
            <div class="returnBook">
                <h3>Return book</h3>
                <form action="/bookmanagement.com/returnBook.php" 
                    id="returnBookForm" method="post">
                    <div class="input-div">
                        <label for="returnID">Return ID</label>
                        <input type="text" name="returnID" id="rb-returnID">
                    </div>

                    <input type="submit" value="Return book">
                </form>
            </div>
        </div>
    </div>
    <?php include __DIR__."/scripts.php"?>

</body>
</html>