<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//API in php to get products from database

include 'db.php';


try{
    $sql = 'SELECT * FROM products';
    $result = $conn->query($sql);

    $products = [];

    if($result && $result->num_rows>0);

    while($row = $result->fetch_assoc()){
        $products[]=$row;
    }

    //بدال ماتكون كذا 
    //[Sunset || صن ست, 258, " دافئ وثقيل ، يترك انطباعاً مميزاً ، لمناسباتك الرسمية", "50 مل", images/sunset.webp]
    //راح تكون كذا من الكود حق ال while
    //[name: Sunset || صن ست, price: 258, description: " دافئ وثقيل ، يترك انطباعاً مميزاً ، لمناسباتك الرسمية", volume: "50 مل", image: images/sunset.webp]

    echo json_encode($products); //تم التحويل الى json 



} catch(Exception $e){
    http_response_code(500);
    echo json_encode(['error' => 'Internal Server Error']);
}

$conn->close();