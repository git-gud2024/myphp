<?php
include_once("connection.php");

header('Location: users.php');
switch($_POST["role"]){
  case "Pupil":
    $role=0;
    break;
  case "Teacher":
    $role=1;
    break;
  case "Admin":
    $role=2;
    break;
    }
    $hashed_password = password_hash($_POST["passwd"], PASSWORD_DEFAULT);
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("INSERT INTO tblusers (UserID,Gender,Surname,Forename,Password,House,Year ,Role)VALUES (null,:gender,:surname,:forename,:password,:house,:year,:role)");
    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':house', $_POST["house"]);
    $stmt->bindParam(':year', $_POST["year"]);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':gender', $_POST["gender"]);
    $stmt->bindParam(':role', $role);
    $stmt->execute();
    $conn=null;
    
echo $_POST["forename"]."<br>";
echo $_POST["surname"]."<br>";
echo $_POST["passwd"]."<br>";
echo $_POST["house"]."<br>";
echo $_POST["year"]."<br>";
echo $_POST["gender"]."<br>";
echo $_POST["role"]."<br>";
?>
