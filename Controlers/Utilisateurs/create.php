<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../../config/database.php';
include_once '../../Models/Voiture.php';
  
$database = new Database();
$db = $database->getConnection();
  
$voiture = new Voiture($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
  
// make sure data is not empty
if(
    !empty($data->immatriculation) &&
    !empty($data->type) &&
    !empty($data->libelle) &&
    !empty($data->quantite) &&
    !empty($data->gerantId)
){
    // set product property values 
    $voiture->setImmatriculation($data->immatriculation);
    $voiture->setType($data->type);
    $voiture->setLibelle($data->libelle);
    $voiture->setQuantite($data->quantite);
    $voiture->setGerant($data->gerantId);
    $voiture->setDateCreation(date("m/d/Y h:i:s a", time()));
    var_dump($voiture);
   // create the product
    if($voiture->create()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Product was created."));
    }
  
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create product."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>