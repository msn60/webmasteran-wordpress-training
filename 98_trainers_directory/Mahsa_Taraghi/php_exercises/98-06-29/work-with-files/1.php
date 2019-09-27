<?php

$result='';
$result_number=0;
if(isset($_POST['submit'])){

    if(isset($_POST['path']) && (!empty($_POST['path']))){
        $path=$_POST['path'];
        $path_to_make=getcwd().'/directory/'.$path;
        if(!file_exists($path_to_make)){
            if(mkdir($path_to_make , 0777, true)){
                $result='You have done it successfully!';
                $result_number=0;
            }
            else{
                $result='Failed to creat directory!';
                $result_number=1;
            }
        }
        else{
            $result='Failed!This path exist!';
            $result_number=1;
        }

    }
    else{
       $result='You should fill path field!' ;
       $result_number=1;
    }
}

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Get path from user and make directory</title>
<!--    <link rel="stylesheet" href="bulma-0.7.5/css/bulma.min.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/1.css">

</head>
<html>

<body>
<?php include 'sidebar.php'; ?>
<h1>Create Directory</h1>
<div class="my-form-box">
<form style="padding: 5%;" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ) ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="text-box">Please enter path to create directory</label>
        <input type="text" class="form-control" id="text-box" name="path"  placeholder="Enter path" >
    </div>
    <div id="result" style="color: <?php if($result_number==1){echo 'red';} else{echo 'green';}?>"><?php echo $result ?></div>

    <br>
    <br>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>
