<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$sqlTA = "SELECT COUNT(auctionId) as totaltauction FROM auction;";
$sqlRA = "SELECT COUNT(productId) as runningtuction FROM products
            WHERE status = 0 or status = 1;";
$sqlWM = "SELECT COUNT(DISTINCT userId) as winnerauction FROM orderauction;";

$resultTA = $mysqli->query($sqlTA);
$resultRA = $mysqli->query($sqlRA);
$resultWM = $mysqli->query($sqlWM);

while($row = $resultTA->fetch_assoc()) {
    $json[] = $row;
}
while($row = $resultRA->fetch_assoc()) {
    $json[] = $row;
}
while($row = $resultWM->fetch_assoc()) {
    $json[] = $row;
}
$data['strategy'] = $json;
echo json_encode($data);


?>