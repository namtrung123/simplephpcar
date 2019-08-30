<?php

session_start();
require_once('database.php');
$database= new Database();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <h2>giỏ hàng</h2>
    <p>chi tiết giỏ hàng:</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>giá tiền</th>
            <th>số lượng</th>
            <th>thành tiền</th>
            <th>xóa khỏi giỏ hàng</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>camera</td>
            <td></td>
            <td>100000</td>
            <td>2</td>
            <td>200000</td>
            <td><a href="#">xóa</a></td>
        </tr>

        </tbody>
    </table>
    <div>Tổng hóa đơn thanh toán <strong>200000</strong></div>
</div>
<div class="container" style="margin-top:50px; ">
    <div class="row">
        <?php
        $sql="SELECT * FROM products";
        $products= $database->runQuery($sql);
        ?>
        <?php if ( !empty($products)) : ?>
            <?php foreach ($products as $product) :

                ?>
                <div class="col-sm-6">
                    <form name="product <?php echo $product['id'] ?> " action="process.php" method="post">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"  style="height: 315px; width: 100%; display: block;" src="image/<?php echo $product['product_image'] ?> " data-holder-rendered="true">
                            <div class="card-body">
                                <p class="card-text" style="font-weight:bold ">product <?php echo $product['product_name'] ?> </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-inline">
                                        <input type="text" class="form-control" name="quantity" value="1">
                                        <input type="hidden" name="action" value="add">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id'] ?> ">
                                        <label style="margin-left: 10px">
                                            <input type="submit" name="submit" class="btn btn-sm btn-outline-secondary" value="thêm vào giỏ hàng"/>

                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
        <?php endforeach ;  ?>
        <?php endif; ?>


    </div>

</div>
</body>
</html>
