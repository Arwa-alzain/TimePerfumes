<?php

include 'db.php';

if($_POST['username'] && $_POST['password']){
 
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' ";
    $result = $conn->query($sql);

    if($result->num_rows>0){
        $user = $result->fetch_assoc();
    }
     
    if(password_verify($password,$user["password"])){
        echo 'Login Successfuly: ' . $username;
    } else{
        echo 'Login Failed';
    }
    
}



include 'db.php';

if($_POST['username'] && $_POST['password']){
 
    $username = $_POST['username'];
    $password = $_POST['password'];

    //$cleanuser = htmlspecialchars($username);
 

    try{

        $sql = "SELECT * FROM users WHERE username = ? ";
        $stmt = $conn->prepare($sql);
        $stmt -> bind_param('s' , $username);
        $stmt -> execute();
        $result = $stmt->get_result();
    
        if($result->num_rows>0){
            $user = $result->fetch_assoc();
        }
         
        if(password_verify($password,$user["password"])){
            $_SESSION['username'] = $user['username'];
            $_SESSION['login_success'] = "تم تسجيل الدخول بنجاح!"; // الإشعار

            // إعادة التوجيه للصفحة الرئيسية
            header("Location: index.html");
            exit();
        } else{
            echo 'Login Failed';
        }

    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }


    $conn->close();
}