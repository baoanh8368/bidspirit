<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$id  = $_GET["id"];

$sql = "SELECT products.productId, merchantId, productname,products.description, productImage1, productImage2, productImage3,categoryname,basePrice, startDate, endDate
        from products
        inner join category on products.categoryId = category.categoryId
        WHERE products.productId = '" . $id . "'";
$result = $mysqli->query($sql);

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $json1[] = $row;
}
$data['productDetail'] = $json1;


echo json_encode($data);

?>