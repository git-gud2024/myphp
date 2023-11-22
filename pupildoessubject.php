<!DOCTYPE html>
<html>
<head>
    
    <title>Page title</title>
    
</head>
<body>

<form action="addtoclass.php" method = "POST">
<select name = "student">
<?php
include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM tblusers WHERE Role = 0 ORDER BY Surname ASC");
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    echo('<option value='.$row["UserID"].'>'.$row["Surname"].', '.$row["Forename"].'</option>');
}
?>
</select>
<select name = "subject">

<?php
include_once('connection.php');
$stmt = $conn->prepare("SELECT * FROM tblsubjects ORDER BY Subjectname ASC");
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    echo('<option value='.$row["SubjectID"].'>'.$row["Subjectname"].', '.$row["Teacher"].'</option>');
}
?>
</select>
<input type="submit" value="ADD">
</form>
</body>
</html>
