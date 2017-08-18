<?php 

include 'web.php';
/*
require '../vendor/autoload.php';
//$app = new \Slim\App;
//use Medoo\Medoo;

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host']   = "http://srd.cclloyd.com";
$config['db']['user']   = "root";
$config['db']['pass']   = "these7enpillar";
$config['db']['dbname'] = "websrd";

$db = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);
$link = mysqli_connect('localhost', 'srduser', 'these7enpillar', 'websrd');


$app = new \Slim\App(["settings" => $config]);


//====================
// API ROUTES
//====================


// HOMEPAGE

$app->get('/', function ($request, $response, $args) {
	echo "Test";
    //include 'web.php';
});

$app->get('/hello/{name}', function ($request, $response, $args) {
    // Show book identified by $args['id']
    $name = $args['name'];
    return json_encode($name);
    //echo "<html><body><div>$name</div></body></html>";
    //$response->getBody()->write("Hello, $name");
});


$app->group('/api', function () use ($app) {
    // Version group
    $app->group('/v1', function () use ($app) {
    	$app->group('/sheets', function () use ($app) {
	    	$app->get('/sheets/{id}', 'getSheet');
	    	$app->get('/sheetsblocks/{id}', 'getSheetBlocks');
	    	$app->get('/name/{id}', 'getName');
	    	$app->any('/name/{id}/{name}', 'putName');
	    	//$app->any('/save/{id}/', 'saveSheet');
	    });
	    $app->any('/command', 'doCommand');
	});
});
*/


//====================
// API FUNCTIONS
//====================
/*
function db_array($query) {
	$link = mysqli_connect('localhost', 'srduser', 'these7enpillar', 'websrd');
	if (!$link) {
		die ("Error: Unable to connect to MySQL." . PHP_EOL);
	}
	$result = $link->query($query);
	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
	return $data;
}

function db_single($query) {
	$link = mysqli_connect('localhost', 'srduser', 'these7enpillar', 'websrd');
	if (!$link) {
		die ("Error: Unable to connect to MySQL." . PHP_EOL);
	}
	$result = $link->query($query);
	$data = mysqli_fetch_assoc($result);
	return $data;
}

function saveSheet($request, $response, $args) {
	$id = $args['id'];
	//$query = "SELECT * from sheets WHERE id='$id'";
	$query = "UPDATE sheets SET book_name = ?, book_isbn = ?, book_category = ? WHERE book_id = $get_id";
	$data = db_single($query);
	$response = $response->withJson($data, 201);
	return $response;
}


function doCommand($request, $response, $args) {
	$link = new mysqli('localhost', 'srduser', 'these7enpillar');
	if (!$link) die ("Error: Unable to connect to MySQL." . PHP_EOL);
	
	//$id = $args['id'];
	$query = "ALTER TABLE `sheets`
	ADD `TestDamage` json 
	AFTER `Will`";
	$data = $link->query($query);
	//$result = $link->query($query);
	//$response = $response->withBody("<div>$data</div>", 201);
	$response = $response->withJson($data, 201);
	return $response;
}


function getSheet($request, $response, $args) {
	//$link = new mysqli('localhost', 'srduser', 'these7enpillar');
	$id = $args['id'];
	$query = "SELECT * from sheets WHERE id='$id'";
	$data = db_single($query);
	//$result = $link->query($query);
	$query = "SELECT * from sheets_blocks WHERE id='$id'";
	$data->textblocks = db_single($query);
	$response = $response->withJson($data, 201);
	//$response = $response->withJson($data, 201);
	return $response;
}

function getSheetBlocks($request, $response, $args) {
	//$link = new mysqli('localhost', 'srduser', 'these7enpillar');
	$id = $args['id'];
	$query = "SELECT * from sheets_blocks WHERE id='$id'";
	$data = db_single($query);
	//$result = $link->query($query);
	//$query = "SELECT * from sheets_blocks WHERE id='$id'";
	//$data->textblocks = db_single($query);
	$response = $response->withJson($data, 201);
	//$response = $response->withJson($data, 201);
	return $response;
}


function getName($request, $response, $args) {
	$id = $args['id'];
	$name = $args['name'];
	
	$query = "SELECT name from sheets WHERE id='$id'";
	
	$data = db_single($query);
	//echo "<html><body>";
	//echo var_dump($data);
	//echo json_encode($data);
	//echo "</body></html>";
	$response = $response->withJson($data, 201);
	return $response;
}


function putName($request, $response, $args) {
	$name = "Test Name";
	$id = $args['id'];
	$name = $args['name'];
	
	echo "ID: $id<br>";
	echo "New Name: $name";
}


$app->get('/sheets/{id}', function ($request, $response, $args) {
    // Show book identified by $args['id']
    $id = $args['id'];
    $sheet['id'] = $id;
    
    return json_encode($sheet);
    //echo "<html><body><div>$name</div></body></html>";
    //$response->getBody()->write("Hello, $name");
});

$app->put('/sheets/{id}/name/{name}', function ($request, $response, $args) {
    // Show book identified by $args['id']
    $id = $args['id'];
    $name = $args['name'];
    
    $sheet['id'] = $id;
    $sheet['name'] = $name;
    
    //echo "<html><body><div>$name</div></body></html>";
    //$response->getBody()->write("Hello, $name");
    //$query = "INSERT INTO `sheets` (`name`) VALUES ('$sheet['name']')";
    $query = "UPDATE sheets SET name = $name WHERE id = $id";
 	//$query = "UPDATE library SET book_name = ?, book_isbn = ?, book_category = ? WHERE book_id = $get_id";
    try {
        $stmt = getConnection()->query($query);
        $wines = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
 
        return json_encode($wines);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
});

//$app->run();
*/
?>





