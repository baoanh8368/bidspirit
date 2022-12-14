<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$id  = $_GET["id"];

$post = file_get_contents('php://input');
$post = json_decode($post);

$productname = $post->productname;
$description = $post->description;
$basePrice = $post->basePrice;
$status = $post->status;
$updateDate = date("Y-m-d H:i:s");

$sql = ("UPDATE products SET productname = ?, description = ?, basePrice = ?, status = ?, updateDate = ? where productId = ?");
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssiisi", $productname, $description, $basePrice, $status, $updateDate, $id);

if($productname!=null && $description!=null && $basePrice!=null && $status!=null) {
	$stmt->execute();
}

$sql = "SELECT productId,productname, category.categoryname, products.baseprice, products.status, products.createDate, products.updateDate from products 
        inner join category on products.categoryId = category.categoryId;";

$result = $mysqli->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);

?>