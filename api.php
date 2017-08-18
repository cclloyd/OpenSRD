<?php 
	
	
	


//$sheetid = $_GET['sheetid'];
//$url = 'https://www.myth-weavers.com/api/v1/sheets/sheets/' . $sheetid;

//$sheetJSON = file_get_contents($url);
//$sheet = json_decode($sheetJSON);
//  https://www.myth-weavers.com/api/v1/sheets/sheets/1178421
//$sheets = ['1178421','1266961','1178753','1230249', '1227746'];

//var_dump($sheetJSON);
//echo json_encode($sheet);

//echo "Testapi.php";

/*
require 'vendor/autoload.php';
$app = new \Slim\Slim();
 
$app->get('/', function() use($app) {
    $app->response->setStatus(200);
    echo "Welcome to Slim 3.0 based API";
}); 




$app->run();

*/
/*
require_once 'vendor/limonade.php';


function configure() {
  option('base_uri', '/');
  # option('base_uri', '/my_app'); # '/' or same as the RewriteBase in your .htaccess
}




dispatch('/', 'listAPIDirectory');


dispatch('/sheets/:id', 'getSheetJSON');
function getSheetJSON() {
	$id = params('id');
  	return 'Hello $id!';
}


function listAPIDirectory() {
	return "API Directory:";
}

echo "Test api.php";

run();
*/
require 'vendor/autoload.php';

$app = new \Slim\App;
$app->get('/sheets/{id}', function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
    $response->getBody()->write("Hello, $id");

    return $response;
});
$app->run();


?>