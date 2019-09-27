<?php
   /* var_dump($_POST);
    print "<br>";
    print date("m/d/y G.i:s<br>", time());
    print "<br>";
    print date("j of F, \a\\t g.i a", time());*/

    if ( isset($_POST["name"]) && isset($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["email"])){
        $userData = [
            'name' => $_POST["name"] ,
            'email' => $_POST['email'] ,
            'date' => date("m/d/y G.i:s<br>", time()) ,
            'age' => $_POST['age'] ,
            'job' => $_POST['currentPos'] ,
            'counsel_freecodecamp' => $_POST['radio-buttons'] ,
            'most_like' => $_POST['mostLike'] ,
            'prefer' => $_POST['prefer'] ,
            'comment' => $_POST['comment']
        ];
        $fp = fopen("data.txt" , "a+");
        foreach ($userData as $key => $value){
            $result = $key . ": " . $value . "\n";
            fwrite($fp , $result);
        }
        fwrite($fp , "*******************************************************");
        fclose($fp);
        $result = "عملیات با موفقیت انجام شد";
    }
    else{
       $result = "عملیات انجام نشد! لطفا دوباره تلاش کنید";
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
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; font-size: 2em; "><?php echo $result?></h2>
        <form action="form.html">
            <button type="submit" class="btn-primary btn-lg btn-block" >بازگشت</button>
        </form>
    </div>
</body>
</html>