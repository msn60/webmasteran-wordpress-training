<?php
if(isset($_POST['submit'])){
    $color=$_POST['colors'];
//    echo ;
    switch ($color){
//        case 'default':
//            header("Location:default.html");
//            exit();
//
//            break;
        case 'red':
            header("Location:pages/red.html");
//            exit();

            break;
        case 'green':
            header("Location:pages/green.html");
//            exit();

            break;
        case 'blue' :
            header("Location:pages/blue.html");
//            exit();

            break;
        case 'yellow'  :
            header("Location:pages/yellow.html");
//            exit();

            break;

    }

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div id="outside">

<form id="form" method="post">
    <div id="header"></div>

    <!--    <div id="select-box">-->
        <label for="select" id="label-select" >Please choose a color:</label>
    <select id="select" name="colors">
        <option>select</option>
<!--        <option>default</option>-->
        <option>red</option>
        <option>green</option>
        <option>blue</option>
        <option>yellow</option>
    </select>
<!--    </div>-->
    <br>
    <button type="submit" id="submit" name="submit">Submit</button>
    <div id="footer"></div>

</form>
</div>

</body>
</html>

