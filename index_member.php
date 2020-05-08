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
                    <li><a href="/index_member.php" class="selected">Member</a></li>
                    <li><a href="/index_librarian.php">Librarian</a></li>
                    <li><a href="/logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <div class="content">
            <div id="member">
                <h1>Member</h1>
                <div class="createMember">
                    <h1>Create new member</h1>
                    <form action="/bookmanagement.com/createMember.php" 
                        method="post" id="createMemberForm">
                        
                        <div class="input-div">
                            <label for="newMemName">New member name</label>
                            <input type="text" name="newMemName">
                        </div>
                        
                        <div class="input-div">
                            <label for="newMemPass">Password</label>
                            <input 
                                type="password" 
                                name="newMemPass" 
                                id="newMemPass1">
                        </div>
                        
                        <div class="input-div">
                            <label for="newMemPass2">Re-enter password</label>
                            <input 
                                type="password" 
                                name="newMemPass2" 
                                id="newMemPass2">
                        </div>

                        <input 
                            type="submit" 
                            value="Create">
                    </form>
                </div>

                <div class="renewMember">
                    <h1>Renew member</h1>
                    <form action="/bookmanagement.com/renewMember.php" 
                        method="post" id="renewMemberForm">
                        <h3>Renewal payment: RM 60</h3>
                        <div class="input-div">
                            <label for="memID">Member ID</label>
                            <input type="text" name="memID" id="rm-memID">
                        </div>
                        <input type="submit" value="Renew">
                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php include __DIR__."/scripts.php"?>

</body>
</html>