<?php
$result='';
$has_uploaded=0;
$final_upload_path='';

function check_ext($filename){
    $ext = pathinfo( $filename, PATHINFO_EXTENSION );
    if($ext=='csv'){
        return true;
    }
    else{
        return false;
    }
}
if(isset($_POST['submit'])){
//    var_dump($_FILES);
//   echo $_FILES['upload-file']['tmp_name'];
//    echo file_get_contents($_FILES['upload-file']['tmp_name']);
//    echo $_POST['upload-file'];
    $upload_path='uploads/';
   $file_name= $_FILES['upload-file']['name'];
   $file_temp_name=$_FILES['upload-file']['tmp_name'];
    $can_continue=check_ext($file_name);
    if($can_continue==true){
        $target_file = $upload_path . basename( $file_name );
        if(file_exists(($target_file))){
            $result='This file has uploaded before!';
        }
        else{
            move_uploaded_file( $file_temp_name, $upload_path . $file_name );
            $has_uploaded=1;
            $result='Your file uploaded  successfully!';
            $final_upload_path=$upload_path . $file_name;

        }
    }
    else{
        $result='You can only upload csv file!';
    }

}
$array_of_products=[];
//$count=0;
if($has_uploaded==1){
    $handle = fopen($final_upload_path, "r");
    if($handle){
        while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){
            $array_of_products[]=$data;
//            var_dump($data) ;
//            $count++;
        }
    }
    fclose($handle);
//    $has_uploaded=0;

}
//var_dump($array_of_products);
//echo $count;
//if (isset($_FILES) && !empty($_FILES)) {
//    var_dump($_FILES);
//}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Upload csv file</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/5.css">

</head>
<html>

<body>
<?php include 'sidebar.php'; ?>

<h1>Upload csv file</h1>

<div class="my-form-box">

<form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ) ?>" method="post" enctype="multipart/form-data">
  <div class="form-group my-inside-form">
    <label for="for-upload-file" style="padding-right: 10px;">Upload csv file:</label>
    <input type="file"  id="upload-file" name="upload-file">
      <button name="submit" id="submit" type="submit">Submit</button>

  </div>
</form>
</div>
<div id="result"><?php echo $result?></div>
<div id="show_product" >
    <?php if($has_uploaded==1): ?>
    <table>
        <tr>
            <th>

            </th>
            <th>
                Name
            </th>
            <th>
                Category
            </th>
            <th>
                Stock
            </th>
            <th>
                Price
            </th>
            <th>
                Seller's Name
            </th>
        </tr>
            <?php
            $count_row=0;
            foreach ($array_of_products as $array):
                ?>
        <tr>
            <?php             $count_row++;?>

            <td><?php echo $count_row?></td>

            <?php
        foreach ($array as $key=>$value):
            ?>
            <td><?php echo $value?></td>
            <?php endforeach;?>

                </tr>
        <?php endforeach;?>


    </table>
    <?php $has_uploaded=0;?>
<?php endif;?>
</div>
</body>
</html>