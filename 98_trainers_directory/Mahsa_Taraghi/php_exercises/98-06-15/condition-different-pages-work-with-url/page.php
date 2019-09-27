<?php
$style_files_array = [
    'red'   => 'red.css',
    'blue'  => 'blue.css',
    'green' => 'green.css',
    'yellow' => 'yellow.css'
];
$is_query_param_set = false;
if ( isset( $_GET['colors'] ) && ! empty( $_GET['colors'] ) && array_key_exists( $_GET['colors'], $style_files_array ) ) {
$is_query_param_set = true;
$style_file = '';
switch ( $_GET['colors'] ) {
    case  'red':
        $style_file = $style_files_array['red'];
        break;
    case 'blue':
        $style_file = $style_files_array['blue'];
        break;
    case 'green':
        $style_file = $style_files_array['green'];
        break;
    case 'yellow':
        $style_file = $style_files_array['yellow'];
        break;
}}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/common.css">
    <link rel="stylesheet" href="style/<?php echo $is_query_param_set? $style_file : 'defaultstyle.css'; ?>">
    <title>Document</title>
</head>
<body>
<div id="message">
    <p>You have logged into <b style="color: <?php echo $is_query_param_set ? $_GET['colors']:"gray";?>"><?php echo $_GET['colors']?></b> page. </p>
</div>
<button id="back" onclick=" window.open('index.php','_self'); ">back</button>

</body>
</html>