<?php
    
    if (isset($_POST['date']) && $_POST['time'] && !empty($_POST['time']) && $_POST['date']) {
        $now_date = strtotime("now");
        /*    $now_date = time();*/
        /*var_dump($now_date);*/
        /*echo '<hr>';
        var_dump($_POST['date']);
        echo '<hr>';*/
        @$str_date = $_POST['date'] . " " . $_POST['time'] . ":00 Asia/Tehran";
        /* echo $str_date;
         echo '<hr>';
         var_dump($str_date);*/
        $strToTime_tehran = strtotime($str_date);
        /*echo '<hr>';
        echo $strToTime_tehran;
        echo '<hr>';
        var_dump($strToTime_tehran);*/
        if ($now_date > $strToTime_tehran) {
            $compare_date = $now_date - $strToTime_tehran;
            $state = 'قبل';
        } else {
            $compare_date = $strToTime_tehran - $now_date;
            $state = 'بعد';
        }
        $second = $compare_date % 60;
        $compare_date = intdiv($compare_date, 60);;
        $min = $compare_date % 60;
        $compare_date = intdiv($compare_date, 60);;
        $hour = $compare_date % 24;
        $compare_date = intdiv($compare_date, 24);;
        $day = $compare_date % 30;
        $compare_date = intdiv($compare_date, 30);;
        $month = $compare_date % 12;
        $compare_date = intdiv($compare_date, 12);;
        $year = $compare_date;

        $ans = $year . ' سال و ' . $month . ' ماه و ' . $day . ' روز و ' . $hour . ' ساعت و ' . $min . ' دقیقه و ' . $second . ' ثانیه ' . $state;
    }

?>


<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.js">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<div class="container" style="max-width: 300px;">
    <form action="#" method="post">
        <div class="form-group">
            <label for="date">تاریخ:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="hour">
            <label for="time">ساعت:</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <button type="submit" class="btn btn-primary form-control">ارسال</button>
    </form>

</div>
<br><br><br>
<hr>
<div>
    <p style="text-align: center"><?php echo @$ans?></p>
</div>


</body>
</html>


<!--"Y  سال و  m ماه و d روز H ساعت و i دقیقه پیش"-->