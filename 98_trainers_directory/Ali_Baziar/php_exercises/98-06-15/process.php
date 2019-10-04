<?php
    $my_background = null;
    $My_list =[
        'blue' => 'blue.css',
        'gray' => 'gray.css',
        'green' => 'green.css'
    ];
    if (!empty($_GET["back_color"])){
        switch ($_GET["back_color"]){
            case 'blue':
                $my_background = $My_list['blue'];
                break;
            case 'gray':
                $my_background = $My_list['gray'];
                break;
            case 'green':
                $my_background = $My_list['green'];
                break;
            default:
                $my_background = null;
        }
    }


   /* var_dump($_GET["back_color"]);*/



?>


<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello Gholam!</title>
    <link rel="stylesheet" href=<?php
    if(!is_null($my_background)){
        echo $my_background;
    }
    else{
        echo $my_background;
    }
    ?>>
</head>
<body>
    <h1 style="text-align: center;">سلام غلام مهربون!</h1>
</body>
</html>
<link rel="stylesheet" href="">