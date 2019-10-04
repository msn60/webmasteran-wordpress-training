<?php
date_default_timezone_set( 'Asia/Tehran' );
//$time_at_first_page_loaded=getdate();
//echo 'Date and Time when page loaded was:'.'<br>';
//echo $time_at_first_page_loaded['year'].'/'.$time_at_first_page_loaded['mon'].'/'.$time_at_first_page_loaded['mday'].'<br>'.
//    $time_at_first_page_loaded['hours'].':'.$time_at_first_page_loaded['minutes'].':'.$time_at_first_page_loaded['seconds'];
//var_dump(getdate());
$result_sentence='';
$diff='';
$issubmitted=0;
//include_once 'inc/jdf.php';
if(isset($_POST['submit'])){
    if(isset($_POST['hour'])&&!empty($_POST['hour'])&&is_numeric($_POST['hour'])&&
        isset($_POST['minute'])&&!empty($_POST['minute'])&&is_numeric($_POST['minute'])&&
        isset($_POST['second'])&&!empty($_POST['second'])&&is_numeric($_POST['second'])&&
        isset($_POST['year'])&&!empty($_POST['year'])&&is_numeric($_POST['year'])&&
        isset($_POST['month'])&&!empty($_POST['month'])&&is_numeric($_POST['month'])&&
        isset($_POST['day'])&&!empty($_POST['day'])&&is_numeric($_POST['day'])){
        $hour=$_POST['hour'];
        $minute=$_POST['minute'];
        $second=$_POST['second'];
        $year=$_POST['year'];
        $month=$_POST['month'];
        $day=$_POST['day'];
//        $gregorian_date=jalali_to_gregorian( $_POST['year'], $_POST['month'], $_POST['day'] ) ;
        $time1=strtotime("$year-$month-$day $hour:$minute:$second Asia/Tehran");
        $time2=mktime();
        $diff=$time2-$time1;
        $result_sentence= $diff;;
        $issubmitted=1;
        echo ('<br>'.'difference between now and entered time is:'.$diff.' seconds!');
        switch ($diff){
            case($diff<0):
                $result_sentence='we have not reached to that time yet!!!';
                break;
            case ($diff<=60 && 0<=$diff):
                $result_sentence='Less than a minute!';
                break;
            case ($diff<=60*5):
                $result_sentence='Less than 5 minutes!';
                break;
            case ($diff<=60*60):
                $result_sentence='Less than an hour!';
                break;
            case ($diff<=24*60*60):
                $result_sentence='Less than a day!';
                break;
            case ($diff<=24*60*60*7):
                $result_sentence='Less than a week!';
                break;
            default:
                $result_sentence='More than a week!';

        }
    }
        else{
            $result_sentence='you have to fill all fields and all fields should be numbers!';
        }
}

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Time</title>
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="style.css">

</head>
<html>

<body>
<div id="date-time"><?php
    date_default_timezone_set( 'Asia/Tehran' );
    $time_at_first_page_loaded=getdate();
    echo 'Date and Time when page loaded was:'.'<br>';
    echo $time_at_first_page_loaded['year'].'/'.$time_at_first_page_loaded['mon'].'/'.$time_at_first_page_loaded['mday'].'<br>'.
        $time_at_first_page_loaded['hours'].':'.$time_at_first_page_loaded['minutes'].':'.$time_at_first_page_loaded['seconds'];
    if($issubmitted==1){
        echo ('<br>'.'difference between now and entered time is:'.$diff.' seconds!');
                $issubmitted=0;
    }

    ?></div>
<form id="form" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ) ?>" method="post" enctype="multipart/form-data">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Enter Date:</span>
        </div>
        <input type="text" name="year" aria-label="year" class="form-control" placeholder="Enter year like 2019...">
        <input type="text" aria-label="month" name="month" class="form-control" placeholder="Enter month like 10...">
        <input type="text" aria-label="day" name="day" class="form-control" placeholder="Enter day like 3...">
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Enter time:</span>
        </div>
        <input type="text" name="hour" aria-label="hour" class="form-control" placeholder="Enter hour like 21...">
        <input type="text" aria-label="minute" name="minute" class="form-control" placeholder="Enter minute like 15...">
        <input type="text" aria-label="second" name="second" class="form-control" placeholder="Enter second like 20...">
    </div>
    <div id="result"><?php echo $result_sentence?></div>
    <div id="button-area">
        <button id="submit" type="submit" name="submit">Submit</button>
    </div>
</form>
<p id="notice">Notice:When you press the submit button, the distance between the time you have entered in fields  and the time you have pressed the button will be calculated and will display to you.</p>
<script src="bootstrap/bootstrap.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
</body>
</html>



