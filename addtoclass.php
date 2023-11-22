<?php
include_once("connection.php");
$_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
header('Location: pupildoessubject.php');
//print_r($_POST);
$stmt = $conn->prepare("INSERT INTO tblpupilstudies (SubjectID,Userid,Classposition,Classgrade,Exammark,Comment)VALUES (:SubjectID,:UserID,null,null,null,null)");
    $stmt->bindParam(':SubjectID', $_POST["subject"]);
    $stmt->bindParam(':UserID', $_POST["student"]);
    $stmt->execute();
    $conn=null;

?>
