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
                    <li><a href="/index_librarian.php" class="selected">Librarian</a></li>
                    <li><a href="/logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <div class="content">
            <div id="librarian">
                <h1>Librarian</h1>
                <div class="createLibrarian">
                    <h3>Create new librarian</h3>
                    <form action="/bookmanagement.com/createLibrarian.php" 
                        method="post" id="createLibrarianForm">

                        <div class="input-div">
                            <label for="newLibName">New librarian name</label>
                            <input type="text" name="newLibName">
                        </div>

                        <div class="input-div">
                            <label for="newLibPass">Password</label>
                            <input 
                                type="password" 
                                name="newLibPass" 
                                id="newLibPass1">
                        </div>

                        <div class="input-div">
                            <label for="newLibPass2">Re-enter password</label>
                            <input 
                                type="password" 
                                name="newLibPass2" 
                                id="newLibPass2">
                        </div>

                        <input type="submit" value="Create">
                    </form>
                </div>
            
            </div>
        </div>
    </div>
    <?php include __DIR__."/scripts.php"?>

</body>
</html>

