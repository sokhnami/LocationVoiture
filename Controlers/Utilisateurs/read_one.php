<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
include_once '../../config/database.php';
include_once '../../Models/Voiture.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare voiture object
$voiture = new Voiture($db);
  
// set ID property of record to read
$immatriculation = isset($_GET['immatriculation']) ? $_GET['immatriculation'] : die();
$voiture->setImmatriculation($immatriculation);
// read the details of voiture to be edited
$voiture->readOne();
if($voiture->getImmatriculation()!=null){
    // create array
    //var_dump($voiture);

    $voiture_arr = array(
        "immatriculation" =>  $voiture->getImmatriculation(),
        "type" => $voiture->getType(),
        "libelle" => $voiture->getLibelle(),
        "quantite" => $voiture->getQuantite(),
        "gerantId" => $voiture->getGerant(),
        "dateCreation" => $voiture->getDateCreation()
  
    );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($voiture_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user voiture does not exist
    echo json_encode(array("message" => "voiture does not exist."));
}
