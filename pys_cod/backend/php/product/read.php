<?php
//headers requeridos
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
//conexão com a database 
// include database e arquivos object 
include_once '../config/database.php';
include_once '../objects/product.php';
  
//instanciar banco de dados e objeto de product
$database = new Database();
$db = $database->getConnection();
  
//instanciar objeto
$product = new Product($db);
  

//consultar products
$stmt = $product->read();
$num = $stmt->rowCount();
  
//checa se achou mais de 0 registros
if($num>0){
  
    // variedade de produtos (products)
    $products_arr=array();
    $products_arr["records"]=array();
  
    //recuperar o conteúdo da tabela
    // fetch() é mais rápido que fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extrair linha
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $product_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,
            "category_name" => $category_name
        );
  
        array_push($products_arr["records"], $product_item);
    }
  
    //definir código de resposta - 200 OK
    http_response_code(200);
  
    //mostrar os dados dos produtos em formato json
    echo json_encode($products_arr);
}
  
else{
  
    //define código de resposta - 404 Not found
    http_response_code(404);
  
    //diz para o usuário que não foi achado products 
    echo json_encode(
        array("message" => "No products found.")
    );
}