<?php
//headers requeridos
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
//include database e arquivos object 
include_once '../config/database.php';
include_once '../objects/product.php';
  
//conexão com a database 
$database = new Database();
$db = $database->getConnection();
  
//prepara o objeto product
$product = new Product($db);
  
//define propriedade ID do registro para ler
$product->id = isset($_GET['id']) ? $_GET['id'] : die();
  
// read the details of product to be edited
$product->readOne();
  
if($product->name!=null){
    // create array
    $product_arr = array(
        "id" =>  $product->id,
        "name" => $product->name,
        "description" => $product->description,
        "price" => $product->price,
        "category_id" => $product->category_id,
        "category_name" => $product->category_name
  
    );
  
    //define um código de resposta  - 200 OK
    http_response_code(200);
  
    //transforma pra json format
    echo json_encode($product_arr);
}
  
else{
    //define código de resposta - 404 Not found
    http_response_code(404);
  
    // diz para o usuário que o product não existe
    echo json_encode(array("message" => "Product does not exist."));
}
?>