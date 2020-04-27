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

    <h1>Book management system</h1>

    <header>
        <nav>
            <ul>
                <li><a href="">Borrow book</a></li>
                <li><a href="">Lending extension</a></li>
                <li><a href="">Penalties</a></li>
                <li><a href="">Book</a></li>
                <li><a href="">Member</a></li>
                <li><a href="#Librarian">Librarian</a></li>
                <li><a href="/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class=".content">
        <div id="member">
            <h1>Member</h1>
            <div class="createMember">
                <h1>Create new member</h1>
                <form action="/createMember.php" 
                    method="post" id="createMemberForm">
                    
                    <label for="newMemName">New member name</label>
                    <input type="text" name="newMemName">
                    <label for="newMemPass">Password</label>
                    <input 
                        type="password" 
                        name="newMemPass" 
                        id="newMemPass1">

                    <label for="newMemPass2">Re-enter password</label>
                    <input 
                        type="password" 
                        name="newMemPass2" 
                        id="newMemPass2">

                    <input type="submit" value="Create">
                </form>
            </div>

            <div class="renewMember">
                <h1>Renew member</h1>
                <form action="/renewMember.php" 
                    method="post" id="renewMemberForm">
                    <h3>Renewal payment: RM 60</h3>
                    <label for="memID">Member ID</label>
                    <input type="text" name="memID" id="rm-memID">
                    <input type="submit" value="Renew">
                </form>
            </div>

        </div>

        <div id="librarian">
            <h1>Librarian</h1>
            <div class="createLibrarian">
                <h3>Create new librarian</h3>
                <form action="/createLibrarian.php" 
                    method="post" id="createLibrarianForm">

                    <label for="newLibName">New librarian name</label>
                    <input type="text" name="newLibName">
                    <label for="newLibPass">Password</label>
                    <input 
                        type="password" 
                        name="newLibPass" 
                        id="newLibPass1">

                    <label for="newLibPass2">Re-enter password</label>
                    <input 
                        type="password" 
                        name="newLibPass2" 
                        id="newLibPass2">

                    <input type="submit" value="Create">
                </form>
            </div>
        </div>
    </div>

    <div id="book">
        <h1>Book</h1>
        <div class="createBook">
            <h3>Add book</h3>
            <form action="/addBook.php" 
                id="addBookForm" method="post">
                <label for="bookTitle">Book title</label>
                <input type="text" name="bookTitle" id="bookTitle">
                <label for="bookAuthor">Book author</label>
                <input type="text" name="bookAuthor" id="bookAuthor">
                <label for="bookGenre">Book genre</label>
                <input type="text" name="bookGenre" id="bookGenre">
                <label for="bookTotal">Total</label>
                <input type="number" name="bookTotal" id="bookTotal">

                <input type="submit" value="Add book">
            </form>
        </div>
        
        <div class="borrowBook">
            <h3>Borrow book</h3>
            <form action="/borrowBook.php" 
                id="borrowBookForm" method="post">
                <label for="bookID">Book ID</label>
                <input type="text" name="bookID" id="bookID">
                <label for="memID">Member ID</label>
                <input type="text" name="memID" id="bb-memID">
                <label for="memPass">Member password</label>
                <input type="password" name="memPass" id="bb-memPass">

                <input type="submit" value="Borrow book">
            </form>
        </div>
        
        <div class="returnBook">
            <h3>Return book</h3>
            <form action="/returnBook.php" 
                id="returnBookForm" method="post">
                <label for="returnID">Return ID</label>
                <input type="text" name="returnID" id="rb-returnID">

                <input type="submit" value="Return book">
            </form>
        </div>
        
        <div class="extendExpire">
            <h3>Extend expire</h3>
            <form action="/extendExpire.php" 
                id="extendExpireForm" method="post">
                <label for="returnID">Return ID</label>
                <input type="text" name="returnID" id="ex-returnID">

                <input type="submit" value="Extend">
            </form>
        </div>
        
        <div class="payPenalty">
            <h3>Pay penalty</h3>
            <form action="/payPanalty.php" 
                id="payPanaltyForm" method="post">
                <input type="hidden" name="penaltyID" id="penaltyID">
                <label for="memberID">Member ID</label>
                <input type="text" name="memberID" id="pp-memID">

                <input type="submit" value="Pay">
                <div id="penaltiesList"></div>
            </form>
        </div>
    </div>

    <link rel="stylesheet" href="/styles/index.css">
    <script src="/scripts/formCheck.js"></script>

</body>
</html>