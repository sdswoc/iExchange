<?php

require 'connect.php';

$sql = "SELECT * FROM UserId";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Enrollment: " . $row["userEnrollment"]. "<br>Name: " . $row["userName"]. "<br>Id: " . $row["userId"]. "<br>Password: " . $row["userPassword"]. "<br>Description: " . $row["userDescription"]. "<br>";
    }
}
$connection->close();
?>
