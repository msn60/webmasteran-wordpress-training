<!DOCTYPE html>
<html dir="rtl">
<head>
    <style>
        * {
            box-sizing: border-box;
        }


        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        input[type=submit]{
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;

        }
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            heg
        }
    </style>
</head>
<body>

<h2>لطفا رنگ مورد نظر خود را انتخاب کنید:</h2>

<div class="container">
    <form action="/condition/color_post.php" method="post">
        <select name="color">
            <option value="red">قرمز</option>
            <option value="blue">آبی</option>
            <option value="green">سبز</option>

        </select>
        <br><br>
        <input type="submit"  value="ارسال">
    </form>
</div>
</body>
</html>
