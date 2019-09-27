<?php
$result = '';
if (isset($_POST['file_path']) && !empty($_POST['file_path'])) {
    $path = $_POST['file_path'];
    if(file_exists($path)){
        unlink($path);
        $result = "فایل با موفقیت حذف شد";
    }else{
        $result = 'فایل موجود نیست!';
    }
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
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

<div class="container">

    <form class="form-signin" method="post" action="#">
        <label for="inputPath" class="sr-only">آدرس فایل</label>
        <input type="text" id="inputPath" name="file_path" class="form-control" placeholder="مسیر فایل را وارد کنید"equired autofocus>
        <button name="deletion_btn" class="btn btn-success btn-block" type="submit">حدف</button>
    </form>

    <p><?php echo $result; ?></p>

</body>
</html>