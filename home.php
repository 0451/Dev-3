<?php
session_start();

if(isset($_POST['register_btn'])){
    $db = new SQLite3('mydb.s3db');

//drop the table if already exists
   // $db->exec('DROP TABLE IF EXISTS users');
//Create a basic table
   // $db->exec('CREATE TABLE users(username varchar(255), email varchar (255), password varchar(255))');
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
//insert rows
    $password2=$_POST['password2'];
    if($password==$password2){
        //$password=md5($password);
       if($db->exec('INSERT INTO users(username, email, password) VALUES($username, $email,$password)')){

           echo "user has been created";
       }

        $_SESSION['message']="you are now logged in";
        $_SESSION['username']=$username;
        header("location:register.php");

    }else{
        $_SESSION['message']="the two passwords do not match";
    }
}
?>



<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="header">
    <h1>Registration Page</h1>
</div>
<form method="post" action="">
    <table>
        <tr>
            <td>username:</td>
            <td><input type="text" name="username" class="textInput"></td>
        </tr>
        <tr>
            <td>email:</td>
            <td><input type="email" name="email" class="textInput"></td>
        </tr>
        <tr>
            <td>password:</td>
            <td><input type="password" name="password" class="textInput"></td>
        </tr>
        <tr>
            <td>password 2:</td>
            <td><input type="password" name="password2" class="textInput"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="register_btn" value="register"></td>
        </tr>
    </table>
</form>
</body>
</html>
