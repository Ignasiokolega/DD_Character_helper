<?php
include_once "connect.php";

$connection = @new mysqli($host , $db_user , $db_password , $db_name);

if ($connection->connect_errno !== 0)
{
echo "Error " . $connection->connect_errno;
} else {

    $character = $_POST["delete"];
    $find_delete = "DELETE FROM data WHERE name = '$character'";


    if($result1 = @$connection->query($find_delete)){

            $_SESSION["deleted_character"] = 1;
            header("Location: index.php");
        }
    }


$connection->close();





















?>
