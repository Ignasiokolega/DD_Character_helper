<?php
session_start();
require_once "connect.php";

$connection = @new mysqli($host , $db_user , $db_password , $db_name);

if ($connection->connect_errno !== 0)
{
echo "Error " . $connection->connect_errno;
} else {
$name = $_POST["name"];
$find_name = "SELECT * FROM data WHERE name = '$name'";
if($result = @$connection->query($find_name)){
    $exist_hero = $result->num_rows;

    if($exist_hero) {
      $info = $result->fetch_assoc();
  $_SESSION['name'] = $info['name'];      
  $_SESSION['str'] = $info['str'];
  $_SESSION['dex'] = $info['dex'];
  $_SESSION['con'] = $info['con'];
  $_SESSION['int'] = $info['int'];
  $_SESSION['wis'] = $info['wis'];
  $_SESSION['cha'] = $info['cha'];
  header("Location: index.php");
}
}
}
$connection->close();
?>
