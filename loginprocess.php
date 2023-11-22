<?php
include_once ("connection.php");
session_start();
print_r($_POST);
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tblusers WHERE surname =:username ;" );
$stmt->bindParam(':username', $_POST['Username']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    print_r($row);
    $hashed= $row['Password'];
  
    $attempt= $_POST['Pword'];
if(password_verify($attempt,$hashed)){
    $_SESSION['name']=$row["Surname"];
    if (!isset($_SESSION['backURL'])){
        $backURL= "login.php"; //Sets a default destination if no BackURL set (parent dir)
    }else{
        $backURL=$_SESSION['backURL'];
    }
    unset($_SESSION['backURL']);
    header('Location: ' . $backURL);
}else{
    echo("fail");
   # header('Location: login.php');
}

}
$conn=null;
/* if(password_verify($attempt,$hashed)){
    $_SESSION['name']=$row["Surname"];
    if (!isset($_SESSION['backURL'])){
        $backURL= "/"; //Sets a default destination if no BackURL set (parent dir)
    }else{
        $backURL=$_SESSION['backURL'];
    }
    unset($_SESSION['backURL']);
    header('Location: ' . $backURL);
}else{
    header('Location: login.php');
} */

?>
