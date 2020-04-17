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

    function getUser($userid, $password) {
        GLOBAL $conn;
        if (!isset($conn)) {
            $this->getConnection();
        }
        $q = "SELECT * FROM Person WHERE id='"
            .$userid."' AND password='".$password."';";
        $result = $conn->query($q);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $q = "SELECT p.*, l.* FROM Person p "
                ."INNER JOIN Librarian l "
                ."ON p.id = l.pID WHERE p.id='".$row["id"]
                ."' AND p.password='".$row["password"]."'";
                $result2 = $conn->query($q);
                while($row = $result->fetch_assoc()) {
                    $login_user = new Librarian(
                        $row["id"], $row["name"], 
                        $row["password"], $row["startYear"], 
                        $row["exist"]
                    );
                    echo $login_user->getName();
                }
            }
        } else {
            echo $q;
            include __DIR__."/login.php";
        }
    }

    function close() {
        echo "close db connection";
    }
}
?>