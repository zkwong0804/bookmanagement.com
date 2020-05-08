<?php
include __DIR__."/objects/Librarian.php";
$server = "localhost";
$username = "adminzhenkai";
$password = "1234QWer##";
$db = "bookmanagement";
$conn = null;

class Db {

    function getConnection() {
        GLOBAL $server, $username, $password, $db, $conn;
        $conn = new mysqli($server, $username, $password, "bookmanagement");
        if ($conn->connect_error) {
            die("Failed to connect database");
            echo "fail to connect database";
        }
    }

    function checkConnection() {
        GLOBAL $conn;
        $exist = false;
        if (!isset($conn)) {
            $this->getConnection();
        }
    }

    function close() {
        GLOBAL $conn;
        $this->checkConnection();
        $conn->close();
    }

    function userExist($userid, $password) {
        GLOBAL $conn;
        $this->checkConnection();
        $exist = false;
        $q = "SELECT * FROM Person WHERE id='"
            .$userid."' AND password='".$password."';";
        $result = $conn->query($q);
        if($result->num_rows > 0) {
            $exist = true;
        }

        return $exist;
    }

    function getUser($id) {
        GLOBAL $conn;
        $this->checkConnection();
        $user = null;
        $q = "SELECT p.*, l.* FROM Person p "
        ."INNER JOIN Librarian l "
        ."ON p.id = l.pID WHERE p.id='".$id."';";
        $result = $conn->query($q);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $user = new Librarian(
                    $row["id"], $row["name"], 
                    $row["password"], $row["startYear"], 
                    $row["exist"]
                );
            }
        }

        return $user;
    }

    function insertLibrarian($name, $pass) {
        GLOBAL $conn;
        $this->checkConnection();
        $q = "CALL InsertLibrarian('".$name."','".$pass."');";
        $result = $conn->query($q);
        if ($result==1) return true;
        return false;
    }

    function insertMember($name, $pass) {
        GLOBAL $conn;
        $this->checkConnection();
        $q = "CALL InsertMember('".$name."','".$pass."');";
        $result = $conn->query($q);
        if ($result==1) return true;
        return false;
    }

    function checkMemberExistence($id) {
        GLOBAL $conn;
        $exist = false;
        $this->checkConnection();
        $q = "SELECT pID FROM Member WHERE pID='".$id."';";
        $result = $conn->query($q);
        if ($result->num_rows == 1) {
            $exist = true;
        } else {
            $exist = false;
        }

        $this->close();
        return $exist;
    }

    function checkMemberExistence_pass($id, $pass) {
        GLOBAL $conn;
        $exist = false;
        $this->checkConnection();
        $q = "SELECT id FROM Person WHERE id='".$id."' AND password='".$pass."';";
        $result = $conn->query($q);
        if ($result->num_rows == 1) {
            $exist = true;
        } else {
            $exist = false;
        }

        $this->close();
        return $exist;
    }

    function renewMembership($id) {
        GLOBAL $conn;
        $this->checkConnection();
        $success = false;
        $q = "UPDATE Member ".
        "SET membershipExpire=ADDDATE(CURDATE(), INTERVAL 1 YEAR)".
        "WHERE pID='".$id."';";
        $result = $conn->query($q);
        if ($result == 1) return true;
        else return false;
    }

    function insertBook($title, $author, $genre, $total) {
        GLOBAL $conn;
        $this->checkConnection();
        $success = false;
        $q = "CALL InsertBook('".$title."','".$author."','".$genre."');";
        for ($i=0; $i<$total; $i++) {
            if ($conn->query($q) == 1) {
                $success = true;
            }
        }

        $this->close();

        return $success;
    }

    function borrowBook($bookID, $memID) {
        GLOBAL $conn;
        $this->checkConnection();
        $success  = false;
        $q = "INSERT INTO BorrowedBooks VALUES(UUID(), '"
            .$bookID."', '".$memID
            ."', CURDATE(), "
            ."ADDDATE(CURDATE(), INTERVAL 1 MONTH), false);";

        if ($conn->query($q) == 1) {
            $success = true;
        }

        return $success;
    }

    function returnBook($returnID) {
        GLOBAL $conn;
        $this->checkConnection();
        $success = false;
        $q = "UPDATE BorrowedBooks SET isReturn=true WHERE id='".
        $returnID."';";
        if ($conn->query($q) == 1) {
            $success = true;
        }

        $this->close();
        return $success;
    }

    function extendExpire($returnID) {
        GLOBAL $conn;
        $this->checkConnection();
        $success = false;
        $q = "UPDATE BorrowedBooks SET ".
        "expireDate=ADDDATE(expireDate, INTERVAL 3 WEEK) ".
        "WHERE id='".$returnID."';";
        if ($conn->query($q) == 1) {
            $success = true;
        }

        $this->close();
        return $success;
    }

    function checkReturnExistence($id) {
        GLOBAL $conn;
        $exist = false;
        $this->checkConnection();
        $q = "SELECT id FROM BorrowedBooks WHERE id='".$id.
        "' AND isReturn=false;";
        $result = $conn->query($q);
        if ($result->num_rows == 1) {
            $exist = true;
        } else {
            $exist = false;
        }

        $this->close();
        return $exist;
    }

    function getPenalties($memID) {
        GLOBAL $conn;
        $this->checkConnection();
        $q = "SELECT p.id AS 'pID', ".
        "p.reason AS 'reason', p.fees AS 'fees', ".
        "bo.title AS 'book' FROM Penalties p ".
        "INNER JOIN BorrowedBooks bb ON p.record=bb.id ".
        "INNER JOIN Book bo ON bb.book=bo.id ".
        "WHERE bb.borrower='".$memID."' AND p.isPaid=false;";
        $penalties = [];
        $result = $conn->query($q);
        while($row = $result->fetch_assoc()) {
            array_push($penalties, array(
                "id" => $row["pID"],
                "fees" => $row["fees"],
                "reason" => $row["reason"],
                "book" => $row["book"]
            ));
        }
        $this->close();
        return $penalties;
    }

    function payPenalties($penalties) {
        GLOBAL $conn;
        $success = true;
        $this->checkConnection();
        foreach ($penalties as $e) {
            $q = "UPDATE Penalties SET isPaid=true WHERE id='".$e."';";
            if($conn->query($q) != 1) {
                $success = false;
                break;
            }
        }

        return $success;
    }
}
?>