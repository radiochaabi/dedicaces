<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include "./datab.php";
$database = new Database;
$db =  $database->connect();


/*-----------------------------------------------------------------------------------*/

$method = $_SERVER["REQUEST_METHOD"];

/*---------------- GET -------------------------*/

if($method == 'GET' ) {


$stmt = $db->prepare("SELECT *, DATE_FORMAT(deadline, '%d %M %Y %H:%m') as deadline FROM dedicaces ORDER BY id DESC");

$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

 echo json_encode($results);

/*---------------- POST -------------------------*/
 
} else if($method == 'POST') {

    $content = file_get_contents('php://input');
    $requestpayload = json_decode($content);
    $nom = $requestpayload->nom;
    $pour = $requestpayload->pour;
    $description = $requestpayload->description;
    
    $stmt = $db->prepare("INSERT INTO dedicaces (nom,pour,description) values('$nom', '$pour', '$description')");

    $stmt->execute(); 
    
    $response = array("msg"=>"Dédicace insérée avec succès","Dédicace"=> $requestpayload);
    echo json_encode($response);
    
    

/*---------------- PUT -------------------------*/

}else if ( $method == 'PUT' ) {
   $content = file_get_contents('php://input');
    $requestpayload = json_decode($content);
    $id = $requestpayload->id;
    $nom = $requestpayload->nom;
    $pour = $requestpayload->pour;
    $description = $requestpayload->description;

 $stmt = $db->prepare("UPDATE dedicaces SET nom='".$nom."', pour='".$pour."',  description='".$description."', deadline=Now() WHERE id=".$id);
 $stmt->execute();
 if($stmt){
    echo json_encode(["success"=>true,"message"=>"Dédicace Modifier avec succès"]);
 }else{
    echo json_encode(["success"=>false,"message"=>"Problème de serveur"]);
 }



/*---------------- PATCH -------------------------*/    

} else if ( $method == 'PATCH' ) {

 
 /* I don't really know how to tell the difference with PUT */
 
    $content = file_get_contents('php://input');
    $requestpayload = json_decode($content);
    $id = $requestpayload->id;
    $nom = $requestpayload->nom;
    $pour = $requestpayload->pour;
    $description = $requestpayload->description;

 $stmt = $db->prepare("UPDATE dedicaces SET nom='".$nom."', pour='".$pour."',  description='".$description."', deadline=Now() WHERE id=".$id);
 $stmt->execute();
 if($stmt){
    echo json_encode(["success"=>true,"message"=>"Dédicace Modifier avec succès"]);
 }else{
    echo json_encode(["success"=>false,"message"=>"Problème de serveur"]);
 }

/*---------------- DELETE -------------------------*/    

} else {

 $content = file_get_contents('php://input');
    $requestpayload = json_decode($content);
    $id = $requestpayload->id;
    
 $stmt = $db->prepare("DELETE FROM dedicaces WHERE id=".$id);
 $stmt->execute();
 if($stmt){
   echo json_encode(["success"=>true,"message"=>"Dédicace Supprimer avec succès"]);
 }else{
    echo json_encode(["success"=>false,"message"=>"Problème de serveur"]);
 }
/*    fin   */

}