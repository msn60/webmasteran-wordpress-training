<?php
////if(isset($_POST['submit'])){
//$style_files_array = [
//    'red'   => 'red.css',
//    'blue'  => 'blue.css',
//    'green' => 'green.css',
//    'yellow' => 'yellow.css'
//];
//
//$is_query_param_set = false;
//
//if ( isset( $_GET['color'] ) && ! empty( $_GET['color'] ) && array_key_exists( $_GET['color'], $style_files_array ) ) {
//    $is_query_param_set = true;
//    $style_file = '';
//    switch ( $_GET['color'] ) {
//        case  'red':
//            $style_file = $style_files_array['red'];
//            break;
//        case 'blue':
//            $style_file = $style_files_array['blue'];
//            break;
//        case 'green':
//            $style_file = $style_files_array['green'];
//            break;
//    }
//    //var_dump($style_file);
//}
//?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
<div id="outside">

    <form id="form" method="get" action="page.php">
        <div id="header"></div>

        <!--    <div id="select-box">-->
        <label for="select" id="label-select" >Please choose a color:</label>
        <select id="select" name="colors">
            <option>default</option>
            <!--        <option>default</option>-->
            <option><a href="page.php">red</a></option>
            <option>green</option>
            <option>blue</option>
            <option>yellow</option>
        </select>
        <!--    </div>-->
        <br>
        <button type="submit" id="submit" name="submit" value="submit">Submit</button>
        <div id="footer"></div>

    </form>
</div>
