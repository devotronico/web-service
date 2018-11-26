<?php
//test
/*
http://localhost:3000/api/get/users
http://localhost:3000/api/get/user/1
http://localhost:3000/api/post/user
http://localhost:3000/api/update/user/1
http://localhost:3000/api/delete/user/1

{    
"name": "Bro", 
"gender": "M",   
"email": "bro@mail.it",    
"birth": "2005-01-27",    
"country": "Italy"
}
// 
*/

// php -S localhost:3000 -t webservice/public



chdir(dirname(__DIR__)); 


$listOfRoutes = [
    'GET'=>[
        "" => "app\controller\ListController@home",
        "/" => "app\controller\ListController@home",
        "home" => "app\controller\ListController@home",
        "#page/:id" => "app\controller\ListController@page",
        "home" => "app\controller\ListController@home",
        "load" => "app\controller\ListController@load",
        "reset" => "app\controller\ListController@reset",
        "about" => "app\controller\Controller@about",
        "contact" => "app\controller\Controller@contact",
        "#function/:id/:id" => "_somma",
        "api/get/users" => "api\service\GetService@getAll",
        "#api/get/user/:id" => "api\service\GetService@getSingle",
        "#api/get/users/:start/:num" => "api\service\GetService@getPage",
    ],
    'POST'=>[
        '#ajax/:id' => 'app\controller\Controller@ajax',
        "api/post/user" => "api\service\PostService@postSingle",
    ],
    'PUT'=>[
        "#api/update/user/:id" => "api\service\UpdateService@updateSingle",
    ],
    'DELETE'=>[
        "#api/delete/user/:id" => "api\service\DeleteService@deleteSingle",
    ]
];



// CLASSI INTERNE
require_once 'core/Router.php';   
require_once 'config/db.php';   
require_once 'config/Database.php';   
require_once 'app/models/Data.php';    
require_once 'app/controller/Controller.php';   
require_once 'app/controller/ListController.php';   
// CLASSI API REST
require_once 'api/service/Service.php';   
require_once 'api/service/GetService.php';   
require_once 'api/service/PostService.php';   
require_once 'api/service/UpdateService.php';   
require_once 'api/service/DeleteService.php';   
require_once 'api/models/Get.php';   
require_once 'api/models/Post.php';   
require_once 'api/models/Update.php';   
require_once 'api/models/Delete.php';   
// CLASSI API SOAP SERVER
require_once 'api_soap/soap_server/service/Service.php';   
require_once 'api_soap/soap_server/service/GetService.php';   
require_once 'api_soap/soap_server/service/PostService.php';   
require_once 'api_soap/soap_server/service/UpdateService.php';   
require_once 'api_soap/soap_server/service/DeleteService.php';   
require_once 'api_soap/soap_server/models/Get.php';   
require_once 'api_soap/soap_server/models/Post.php';   
require_once 'api_soap/soap_server/models/Update.php';   
require_once 'api_soap/soap_server/models/Delete.php';   
//require_once 'api/models/JsonManager.php'; 
// ALTRO  
require_once 'helpers/functions.php';   


$router = new Router();

$router->loadRoutes($listOfRoutes);

$controller = $router->dispatch(); 
?>




