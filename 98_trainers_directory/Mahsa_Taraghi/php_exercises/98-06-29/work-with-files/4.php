<?php
$message='';
$error=0;
if(isset($_POST['submit'])){
    if(isset($_POST['name']) && !empty($_POST['name'])&&isset($_POST['category']) && !empty($_POST['category'])&&
        isset($_POST['price']) && !empty($_POST['price'])&&isset($_POST['stock']) && !empty($_POST['stock'])&&
        isset($_POST['name']) && !empty($_POST['name'])){
            if(is_numeric($_POST['price']) && $_POST['price']>0 && is_numeric($_POST['stock']) && $_POST['stock']>0 ){
                $csv_file = fopen(getcwd()."/Files-to-save-data/product.csv","a+") or die('Cannot open file:  '.getcwd()."/Files-to-save-data/product.csv");
//                fwrite($csv_file,$_POST);
//                var_dump($_POST);
                $length_array=count($_POST);
                $index=0;

                foreach ($_POST as $key=>$value){
                    $index++;
                    if($key!='submit'){
                        fwrite($csv_file,$value);
                        if($index<=$length_array-2){
                            fwrite($csv_file,',');
                        }
                    }
                }
                fwrite($csv_file,PHP_EOL);
//                fputcsv($csv_file,'\n');
                fclose($csv_file);
                $message='Your data saved successfully!';
                $error=0;
            }
            else{
                $message='Price and stock should be a number more than 0 !';
                $error=1;
            }

    }
    else{
        $message='You should fill all fields!';
        $error=1;
    }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Get path from user and make directory</title>
    <!--    <link rel="stylesheet" href="bulma-0.7.5/css/bulma.min.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/4.css">

</head>
<html>

<body>
<?php include 'sidebar.php'; ?>
<h3>Product information</h3>
<div id="message" style="margin:3px;text-align:center;color: <?php echo ($error==0)?'green':'red'?>">
    <?php echo $message?>
</div>
<div class="my-form-box">
    <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ) ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="name">Name of product</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="category">Category</label>
                <input type="text" name="category" class="form-control" id="category" placeholder="Enter category">
                <!--                <select id="category" class="form-control">-->
<!--                    <option disabled selected value>Choose</option>-->
<!--                    <option>Phone</option>-->
<!--                    <option>Laptop</option>-->
<!--                    <option>Tablet</option>-->
<!--                    <option>Accessories</option>-->
<!--                </select>-->

            </div>

        </div>
        <br>
        <br>
        <div class="form-row">

                <div class="form-group col-md-4 col-sm-12">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter product stock">
                </div>
            <div class="form-group col-md-4 col-sm-12">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Enter product price">
            </div>
            <div class="form-group col-md-4 col-sm-12">
            <label for="seller-name">Name of seller</label>
                <input type="text" class="form-control" name="seller-name" id="seller-name" placeholder="Enter seller name">
            </div>

        </div>
        <div class="button-submit" >
            <button type="submit" class="btn btn-primary" id="submit-button" name="submit">Submit</button>
        </div>

    </form>
</div>

</body>
</html>

