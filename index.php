<?php
    require './Core/Database.php';
    require './Models/BaseModel.php';
    require './Controllers/BaseController.php';
    // require './Views/frontend/index.php';

    $controllerName = ucfirst((strtolower(!empty($_REQUEST['controller'])) ? ($_REQUEST['controller']):'Home') .'Controller');
    $actionName = ($_REQUEST['action']) ?? 'show';
    // die ($controllerName);
    require "./Controllers/{$controllerName}.php";
    # Khởi tạo class
    $controllerObject = new $controllerName;

    $controllerObject -> $actionName();