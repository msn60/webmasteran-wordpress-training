<?php
$result='';
$result_number=0;
$flag=0;
function deleteDir($dirPath)
{
//    $dirPath = getcwd() . '/directory/' . $dirPath;
    if (!is_dir($dirPath)) {
//        throw new InvalidArgumentException("$dirPath must be a directory");
        global $result;
        global $result_number;
        $result = 'There is no directory with this path';
        $result_number = 1;
        global $flag;
        $flag = 1;
        return;

    }
    if (is_file($dirPath)) {

        // If it is file then remove by
        // using unlink function
        return unlink($dirPath);
    } // If it is a directory.
    elseif (is_dir($dirPath)) {

        // Get the list of the files in this
        // directory
        $scan = glob(rtrim($dirPath, '/') . '/*');

        // Loop through the list of files
        foreach ($scan as $index => $path) {

            // Call recursive function
            deleteDir($path);
        }

        // Remove the directory itself
        global $flag;
        $flag = 20;
        return rmdir($dirPath);

    }
}
//deleteDir('directory');
if(isset($_POST['submit'])){
    if(isset($_POST['path']) && !empty($_POST['path']) && ($_POST['path'].trim(' ')!=" ")){
        $path_directory=$_POST['path'];
        deleteDir($path_directory);

    }
}
if($flag==20){
    $result='Directory deleted completely!';
    $result_number=0;
}

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Get path from user and delete directory</title>
    <!--    <link rel="stylesheet" href="bulma-0.7.5/css/bulma.min.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/1.css">

</head>
<html>

<body>
<?php include 'sidebar.php'; ?>
<h1>Delete Directory</h1>
<div class="my-form-box">
    <form style="padding: 5%;" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ) ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="text-box">Please enter path to delete directory</label>
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

