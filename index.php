<?php
session_start();

?>
<!DOCTYPE html>
<html>
    
  <head>
    <title>D&D Character Helper</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body> 
  <?php
    if(isset( $_SESSION["completed_character"])){
      echo "I see you have created your character. You can just use it down below.";
      unset($_SESSION["completed_character"]);
      }
      if(isset( $_SESSION["deleted_character"])){
        echo "I see you have deleted your character";
        unset($_SESSION["deleted_character"]);
        }
  ?>
    <h1><p>D&D Character Helper</p></h1>

    <hr>

    <h2><p>Well, can you just fill up a form please? We will proceed It.</p></h2>

    <form action="warehouse.php" method="post">
      <input type="text" name="name" required placeholder = "Name">
      <?php 
        
        if(isset ($_SESSION["err_name"])) {
          echo  $_SESSION["err_name"]; 
          unset($_SESSION["err_name"]);
        }
      ?>
      <br>
      <input type="int" name="str" required placeholder = "Strength" pattern="[+|-][0-5]">
      <br>
      <input type="int" name="dex" required placeholder = "Dexterity" pattern="[+|-][0-5]">
      <br>
      <input type="int" name="con" required placeholder = "Constitution" pattern="[+|-][0-5]">
      <br>
      <input type="int" name="int" required placeholder = "Intelligence" pattern="[+|-][0-5]">
      <br>
      <input type="int" name="wis" required placeholder = "Wisdom" pattern="[+|-][0-5]">
      <br>
      <input type="int" name="cha" required placeholder = "Charisma" pattern="[+|-][0-5]">
      <br>
      <input type="submit" name="checkbox" value ="Click it when you finish">
      <br>
    </form>
    
    <br><br><br>

    <form action="created_characters.php" method="post">
    <input type="text" name="name" required placeholder = "Name of Existing Character">
    <input type="submit" name="checkbox" value ="Click it when you finish">
    </form>
    <table>

      <tr>

        <td> info/name </td>
        <td><?php  if(isset($_SESSION["name"])){
          echo $_SESSION["name"];
          unset($_SESSION["name"]);
        }
        ?>
        </td>
  
    </tr>

    <tr>

      <td>Strength</td>
      <td>
        <?php  
        if(isset($_SESSION["str"])){
          echo $_SESSION["str"];
          unset($_SESSION["str"]);
        }
        ?>
      </td>

    </tr>

    <tr>

      <td>Dexterity</td>
      <td>
        <?php  
        if(isset($_SESSION["dex"])){
          echo $_SESSION["dex"];
          unset($_SESSION["dex"]);
        }
        ?>
        </td>

    </tr>

    <tr>

      <td>Constitution</td>
      <td><?php  
        if(isset($_SESSION["con"])){
          echo $_SESSION["con"];
          unset($_SESSION["con"]);
        }
        ?></td>

    </tr>

    <tr>

      <td> Wisdom</td>
      <td><?php  
        if(isset($_SESSION["wis"])){
          echo $_SESSION["wis"];
          unset($_SESSION["wis"]);
        }
        ?></td>

    </tr>

    <tr>

      <td>Inteligence</td>
      <td><?php  
        if(isset($_SESSION["int"])){
          echo $_SESSION["int"];
          unset($_SESSION["int"]);
        }
        ?></td>

    </tr>

    <tr>

      <td>Charisma</td>
      <td><?php  
        if(isset($_SESSION["cha"])){
          echo $_SESSION["cha"];
          unset($_SESSION["cha"]);
        }
        ?></td>

    </tr>

  </table>
  <p> Wanna delete character? Write down it's name. <p>
  <form action="delete_hero.php" method="post">
    <input type="text" name="delete" required placeholder = "Name">
    <?php 
        
        if(isset ($_SESSION["err_name"])) {
          echo  $_SESSION["err_name"]; 
          unset($_SESSION["err_name"]);
        }
      ?>
      <input type="submit" name="checkbox" onsubmit="confirm ('Do you really want to delete this character? You can\'t undo this');" value ="Delete">
      </form>
  <p> Do you want random character? Just click down below. </p>
  <form action="randomizer.php" method="post">
      <input type="text" name="name" required placeholder = "Name">
      <?php 
        
        if(isset ($_SESSION["err_name"])) {
          echo  $_SESSION["err_name"]; 
          unset($_SESSION["err_name"]);
        }
      ?>
      <br><br>
      <input type="submit" name="checkbox" value ="Generate">
  </form>

    </body>
</html>