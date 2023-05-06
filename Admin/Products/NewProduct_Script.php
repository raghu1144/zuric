<?php
include '../connection.php';
include 'image_upload.php';
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_quantity = $_POST['product_quantity'];
$status = $_POST['status'];
$product_price = $_POST['product_price'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$currency = $_POST['currency'];
$sku = $_POST['sku'];
$tag = $_POST['tag'];
$stock = $_POST['stock'];
$height = $_POST['height'];
$density = $_POST['density'];
$dtex = $_POST['dtex'];
$guage = $_POST['guage'];
$standard = $_POST['standard'];
$quantity = $_POST['quantity'];
$shock_observation = $_POST['shock_observation'];
$elasticity = $_POST['elasticity'];
$query = "INSERT INTO product(product_id, product_name, product_quantity, status, product_price, facebook, instagram, currency, sku, tag, product_image, stock, height, density, dtex, guage, standard, quantity, shock_observation, elasticity)
VALUES('$product_id', '$product_name', '$product_quantity', '$status', '$product_price', '$facebook', '$instagram', '$currency', '$sku', '$tag', '$imgContent', '$stock', '$height', '$density', $dtex, $guage, '$standard', '$quantity', '$shock_observation', '$elasticity')";
$result = $con->query($query);
if($con->error){
echo $con->error;

}else{
    
    header("location: Product_List.php");
    // echo "data inserted successfully!";
}
?>
