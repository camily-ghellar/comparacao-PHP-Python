<?php
//headers requeridos
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
//pegar conexão com a database 
include_once '../config/database.php';
  
//instanciar objeto product 
include_once '../objects/product.php';
  
$database = new Database();
$db = $database->getConnection();
  
$product = new Product($db);
  
//obter dados postados
$data = json_decode(file_get_contents("php://input"));
  
//ter certeza que os dados não estão vazios
if(
    !empty($data->name) &&
    !empty($data->price) &&
    !empty($data->description) &&
    !empty($data->category_id)
){
  
    //definir valores das propriedades de product
    $product->name = $data->name;
    $product->price = $data->price;
    $product->description = $data->description;
    $product->category_id = $data->category_id;
    $product->created = date('Y-m-d H:i:s');
  
    //criar o product
    if($product->create()){
  
        //definir código de resposta - 201 created
        http_response_code(201);
  
        //dizer ao usuário
        echo json_encode(array("message" => "Product was created."));
    }
  
    //se não está hábil a criar o product, dizer ao usuário
    else{
  
        //definir código de resposta - 503 service unavailable
        http_response_code(503);
  
        //dizer ao usuário
        echo json_encode(array("message" => "Unable to create product."));
    }
}
  
//dizer ao usuário que os dados estão incompletos
else{
  
    //definir código de resposta - 400 bad request
    http_response_code(400);
  
    // dizer ao usuário
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>