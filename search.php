<?php

$timeProducts = [
    [
        'id' => 1,
        'image' => 'images/sunset.webp',
        'name' => 'Sunset || صن ست',
        'price' => 258,
        'description' => " دافئ وثقيل ، يترك انطباعاً مميزاً ، لمناسباتك الرسمية",
        'vol' => "50 مل",
    ],
    [
        'id' => 2,
        'image' => 'images/sunrise.webp',
        'name' => 'Sunrise || صن رايز',
        'price' => 258,
        'description' => "تركيبة فاكهيه باردة انثوية لطيفة",
        'vol' => "50 مل",
    ],
    [
        'id' => 3,
        'image' => 'images/night1.webp',
        'name' => 'Night || نايت',
        'price' => 258,
        'description' => "لأنك دوماً تبحث عن الاختلاف الفريد والمميز بين الاف العطور",
        'vol' => "50 مل",
    ],
    [
        'id' => 4,
        'image' => "images/evening.webp",
        'name' => 'Evening || ايفنينق',
        'price' => 258,
        'description' => "نوتات عطرية قوية وفريدة ، فاخر وملفت",
        'vol' => " 50 مل",
    ],
    [
        'id' => 5,
        'image' => 'images/morning.webp',
        'name' => 'Morning || مورنينق',
        'price' => 258,
        'description' => "مزيج ناعم وبارد للأيام الصيفية ، رائحة مفعمه بالنظافة",
        'vol' => "50 مل",
    ],
    [
        'id' => 6,
        'image' => 'images/minute.webp',
        'name' => 'Minute || مينيت',
        'price' => 199.01,
        'description' => "معطر الشعر اللطيف ، يمنح شعرك رائحة جذابة تدوم لعدة ساعات للرجال والنساء معاً",
        'vol' => "40 مل",
    ],
];


$search = $_POST['search'] ?? '';
$results = [];

if (!empty($search)) {
    foreach ($timeProducts as $product) {
        if (stripos($product['name'], $search) !== false) {
            $results[] = $product;
        }
    }
}



?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>Search result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Cairo", sans-serif;
            background-color: #f8f9fa;
            padding-top: 100px;
            text-align: center;
            direction: rtl;
        }

        .card {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 15px auto;
            width: 300px;
            background-color: rgb(240, 232, 220);
        }

        .card img {
            padding: 10px;
            border-radius: 20px 20px 20px 20px;
        }

        .ryal {
            width: 40px;
            height: auto;
            vertical-align: middle;
            margin-right: -10px;
        }

        .btn-outline-secondary {
            background-color: rgb(89, 44, 4);
            color: white;
            border-radius: 15px;
            width: 150px;
            height: 40px;
            font-size: 18px;
            margin-left: 10px;
        }

        .card-price {
            font-size: 20px;
            color: #333;
            margin: 7px;
            padding-right: 15px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 12px rgba(238, 155, 30, 0.3);
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Search Result</h3>

        <div class="row justify-content-center">
            <?php if (empty($results)): ?>
                <p>The product is not found</p>
            <?php else: ?>
                <?php foreach ($results as $p): ?>
                    <div class="card">
                        <img src="<?= $p['image'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $p['name'] ?></h5>
                            <p class="card-text"><?= $p['description'] ?></p>
                            <p class="card-vol"></strong><?= $p['vol'] ?></p>
                            <p class="card-price"><strong><?= $p['price'] ?> <img class="ryal"
                                        src="images/Saudi_Riyal_Symbol-1-3.png" alt="ريال"> </strong>
                            </p>
                            <button class="btn btn-outline-secondary">Add to cart</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <a href="index.html" class="btn btn-dark my-3">العودة للصفحة الرئيسية</a>
    </div>


</body>

</html>