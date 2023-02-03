<?php 
session_start();
include('connection.php');

$username = mysqli_real_escape_string($conn, trim($_POST['username']));
$email = mysqli_real_escape_string($conn, trim($_POST['email']));
$password = mysqli_real_escape_string($conn, trim(md5($_POST['password'])));

$sql = "select count(*) as total from users where email = '$email' or username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if($row['total'] >= 1){
    $_SESSION['already_user'] = true;
    header('Location: cadastro.html');
    exit;
}else{

$sql = "INSERT INTO users (username, email, password, date) VALUES ('$username','$email', '$password', NOW())";

if($conn->query($sql) === TRUE){
    $_SESSION['not_authenticated'] = true;

}
$conn ->close();

header('Location: index.html');
exit;
}
?>