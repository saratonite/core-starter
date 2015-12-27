<?php
session_start();
error_reporting(E_ALL);

define("ROOT_DIR",__DIR__."/../");
require_once(ROOT_DIR."vendor/autoload.php");
require_once(ROOT_DIR."database/Connection.php");
require_once(ROOT_DIR."core/config.php");
require_once(ROOT_DIR."core/Response.php");
require_once(ROOT_DIR."core/io.php");
require_once(ROOT_DIR."core/Validator.php");
require_once(ROOT_DIR."core/Flash.php");
require_once(ROOT_DIR."core/Middleware.php");
require_once(ROOT_DIR."core/Upload.php");
require_once(ROOT_DIR."core/Paginator.php");
require_once(ROOT_DIR."core/Helpers.php");

// 
$app['middleware'] = new Middleware();

// Loading Models
require_once(ROOT_DIR."models/Model.php");


$con = new Connection($config['DB_HOST'],$config['DB_USER'],$config['DB_PASS'],$config['DB_NAME']);

Model::boot($con->getConnction());

$flash = new Flash();
$flash->start();






// Setup Twig Template Engine
$loader = new Twig_Loader_Filesystem(ROOT_DIR.'templates');
$template = new Twig_Environment($loader, array());
$template->addGlobal('config',$config);



