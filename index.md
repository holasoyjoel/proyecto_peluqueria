# Archivo **index.php**

## Archivo principal tenemos importaciones y configuración para manejar los controladores.


---
### Importaciones 
```
    require_once "model/db/database.model.php";
    require_once "controller/menu.controller.php";
```

---
### Si no llega ningun controlador por la url ( *Request* ) se hace una instancia del controlador ``MenuController( )`` y luego se llama a ese controlador en su metodo ``Index``.
```
    if(!isset($_REQUEST["c"]))
    {
        $controller = new MenuController();
        call_user_func(array($controller , "index"));
    }
```

---

### En caso que llegue un controlador por url ( *Request* ) este se pasa a minusculas y se guarda en ``$controller``, se verifica si también llega una acción, en caso verdadero este se guarda en ``$accion``, en caso que no se llegue ``$accion`` sera vacio.

### Se importa el controlador llamando a su ruta e indicando cual controlador debe llamarse de acuerdo a lo que tengamos en ``$controller``.

### Luego de haber importado el controlador ahora haremos una instancia de ese controlador y por ultimo llamamos a ese controlador junto a su acción 
```
    else{
        $controller = strtolower($_REQUEST["c"]);
        $accion = isset($_REQUEST['a'])? $_REQUEST['a'] : "Index";

        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . "Controller";
        $controller = new $controller;

        call_user_func(array($controller , $accion));
    }
```

---

-- ``script completo`` --
```
<?php

    require_once "model/db/database.model.php";
    require_once "controller/menu.controller.php";

    if(!isset($_REQUEST["c"]))
    {
        $controller = new MenuController();
        call_user_func(array($controller , "index"));
    }
    else{
        $controller = strtolower($_REQUEST["c"]);
        $accion = isset($_REQUEST['a'])? $_REQUEST['a'] : "Index";

        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . "Controller";
        $controller = new $controller;

        call_user_func(array($controller , $accion));
    }

?>
```