<!DOCTYPE html>
<html>
<head>
    
    <title>Page title</title>
    
</head>
<body>
<?php
session_start(); 
if (!isset($_SESSION['name']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
?>

<form action="addsubjects.php" method = "POST">
  Subject name:<input type="text" name="subjectname"><br>
  Teacher name:<input type="text" name="teachername"><br>
  <br>
  <input type="submit" value="Add Subject">
</form>
<?php
include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM Tblsubjects");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
}
?>
</body>
</html>
