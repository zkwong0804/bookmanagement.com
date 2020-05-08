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
            <div class="createBook">
                <h3>Add book</h3>
                <form action="/bookmanagement.com/addBook.php" 
                    id="addBookForm" method="post">
                    <div class="input-div">
                        <label for="bookTitle">Book title</label>
                        <input type="text" name="bookTitle" id="bookTitle">
                    </div>
                    <div class="input-div">
                        <label for="bookAuthor">Book author</label>
                        <input type="text" name="bookAuthor" id="bookAuthor">
                    </div>

                    <div class="input-div">
                        <label for="bookGenre">Book genre</label>
                        <input type="text" name="bookGenre" id="bookGenre">
                    </div>

                    <div class="input-div">
                        <label for="bookTotal">Total</label>
                        <input type="text" name="bookTotal" id="bookTotal" pattern="-?[0-9]*(\.[0-9]+)?">
                    </div>

                    <input type="submit" value="Add book">
                </form>
            </div>
        </div>
    </div>
    <?php include __DIR__."/scripts.php"?>

</body>
</html>