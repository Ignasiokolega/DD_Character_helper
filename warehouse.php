<?php
session_start();
include_once "connect.php";

$connection = @new mysqli($host , $db_user , $db_password , $db_name);

if ($connection->connect_errno !== 0)
{
echo "Error " . $connection->connect_errno;
} else {

$name = $_POST["name"];
$find_name = "SELECT * FROM data WHERE name = '$name'";


    if($result1 = @$connection->query($find_name)){

        //existing heroes

        $exist_hero = $result1->num_rows;

        if($exist_hero > 0) {
            $_SESSION["err_name"] = "<span style='color: red'>That's name is already taken.</span>";
            header("Location: index.php");
        }

        $str = $_POST["str"];
        $dex = $_POST["dex"];
        $con = $_POST["con"];
        $int = $_POST["int"];
        $wis = $_POST["wis"];
        $cha = $_POST["cha"];

        $creating_hero = "INSERT INTO data VALUES (NULL,'$name','$str','$dex','$con','$int','$wis','$cha')";
        if($result2 = @$connection->query($creating_hero)){
            $_SESSION["completed_character"] = 1;
            header("Location: index.php");
        }
    }
}
$connection->close();
?>
