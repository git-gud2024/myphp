<?php
include_once("connection.php");
$_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
header('Location: subjects.php');
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("INSERT INTO tblsubjects (SubjectID, Subjectname, Teacher)VALUES (null,:subjectname,:teachername)");
    $stmt->bindParam(':subjectname', $_POST["subjectname"]);
    $stmt->bindParam(':teachername', $_POST["teachername"]);
    $stmt->execute();
    $conn=null;
?>
