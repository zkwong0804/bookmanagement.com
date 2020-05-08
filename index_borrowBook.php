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
                    <li><a href="/index_borrowBook.php" class="selected">Borrow book</a></li>
                    <li><a href="/index_returnBook.php">Return book</a></li>
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
            <div class="borrowBook">
                <h3>Borrow book</h3>
                <form action="/bookmanagement.com/borrowBook.php" 
                    id="borrowBookForm" method="post">
                    <div class="input-div">
                        <label for="bookID">Book ID</label>
                        <input type="text" name="bookID" id="bookID">
                    </div>

                    <div class="input-div">
                        <label for="memID">Member ID</label>
                        <input type="text" name="memID" id="bb-memID">
                    </div>

                    <div class="input-div">
                        <label for="memPass">Member password</label>
                        <input type="password" name="memPass" id="bb-memPass">
                    </div>

                    <input type="submit" value="Borrow book">
                </form>
            </div>
        </div>
    </div>


    <?php include __DIR__."/scripts.php"?>

</body>
</html>

