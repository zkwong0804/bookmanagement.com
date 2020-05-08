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
                    <li><a href="/index_penalties.php" class="selected">Penalties</a></li>
                    <li><a href="/index_book.php">Add book</a></li>
                    <li><a href="/index_member.php">Member</a></li>
                    <li><a href="/index_librarian.php">Librarian</a></li>
                    <li><a href="/logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <div class="content">
            <div class="payPenalty">
                <h3>Pay penalty</h3>
                <form action="/bookmanagement.com/payPenalty.php" 
                    id="payPanaltyForm" method="post">
                    <input type="hidden" name="penaltyID" id="penaltyID">
                    <div class="input-div">
                        <label for="memberID">Member ID</label>
                        <input type="text" name="memberID" id="pp-memID">
                    </div>

                    <input type="submit" value="Pay">
                    <div id="penaltiesList"></div>
                </form>
            </div>
        </div>

            
    </div>

    <?php include __DIR__."/scripts.php"?>

</body>
</html>