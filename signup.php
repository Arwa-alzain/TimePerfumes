<?php

// include 'db.php';

// if(assert($_POST["username"], $_POST["email"], $_POST["password"])) {

//     $username = $_POST["username"];
//     $email = $_POST["email"];
//     $password = $_POST["password"];

//     $hashPassword = password_hash($password, PASSWORD_DEFAULT);
//     $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

//     if($conn->query($sql)){
//         $_SESSION['username'] = $user['username'];
//         // إعادة التوجيه للصفحة الرئيسية
//         header("Location: index.html");
//         exit();    
//     } else {
//         echo 'Error: ' . $conn->error;
//     }

   
// } else {
//     echo "Signup failed";
// } 


include 'db.php';

if(isset($_POST["username"], $_POST["email"], $_POST["password"])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashPassword);

    if($stmt->execute()){
        $_SESSION['username'] = $username;
        $_SESSION['login_success'] = "تم تسجيل الدخول بنجاح!";
        header("Location: index.html"); // صفحة رئيسية php
        exit();    
    } else {
        echo 'Error: ' . $conn->error;
    }

} else {
    echo "Signup failed";
}
?>