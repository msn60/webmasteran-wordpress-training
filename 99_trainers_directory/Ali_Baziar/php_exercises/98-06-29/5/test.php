<?php
$excel_hname= "name";
$excel_hcategory = "category";
$excel_hamount = "amount";
$excel_hprice = "price";
$excel_hseller = "seller";
/*var_dump($_POST);
echo "<br>";
var_dump($_GET);*/
if (isset($_POST['name']) && isset($_POST['category']) && isset($_POST['amount']) && isset($_POST['price']) && isset($_POST['seller']) && !empty($_POST['name']) && !empty($_POST['category']) && !empty($_POST['amount']) && !empty($_POST['price']) && !empty($_POST['seller'])){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];
    $seller = $_POST['seller'];


    $CSVfp = fopen("my_test.csv" , "a+");
    $data = fgetcsv($CSVfp, 50, ",");
    if ($data[0] == $excel_hname && $data[1] == $excel_hcategory && $data[2] == $excel_hamount && $data[3] == $excel_hprice && $data[4] == $excel_hseller){
        $csvData = $name . "," . $category . "," . $amount . "," . $price . "," . $seller . "\n";
        fwrite($CSVfp,$csvData);
    }else{
        $csvData = $excel_hname . "," . $excel_hcategory . "," . $excel_hamount . "," . $excel_hprice . "," . $excel_hseller . "\n";
        fwrite($CSVfp,$csvData);
        $csvData = $name . "," . $category . "," . $amount . "," . $price . "," . $seller . "\n";
        fwrite($CSVfp,$csvData);
    }
    fclose($CSVfp);

}







?>


<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.js">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<body>

    <div class="container">
        <form action="#" method="post">
            <div class="form-group">
                <label for="name">نام کالا:(فقط حروف انگلیسی و فارسی)</label>
                <input type="text" class="form-control" id="name" name="name" pattern="[A-Za-zآ-ی ]{1,50}" required>
            </div>
            <div class="form-group">
                <label for="category">دسته بندی:(فقط حروف انگلیسی و فارسی)</label>
                <input type="text" class="form-control" id="category" name="category" pattern="[A-Za-zآ-ی ]{1,50}" required>
            </div>
            <div class="form-group">
                <label for="amount">تعداد در انبار:</label>
                <input type="number" class="form-control" id="amount" name="amount" required>
            </div>
            <div class="form-group">
                <label for="price">قیمت:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="seller">فروشنده:(فقط حروف انگلیسی و فارسی)</label>
                <input type="text" class="form-control" id="seller" name="seller" pattern="[A-Za-zآ-ی ]{1,50}" required>
            </div>
            <button type="submit" class="btn btn-primary form-control">ارسال</button>
        </form>
    </div>

</body>
</html>