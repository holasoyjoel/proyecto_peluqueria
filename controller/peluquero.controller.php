<?php

// importo el modelo
require_once 'model/peluquero.model.php';


// clase
class PeluqueroController{
    
    private $model;

    // constructor
    public function __CONSTRUCT(){
        $this->model = new Peluquero();
    }
    
    // index
    public function Index(){
        require_once 'view/menu.view.php';
        require_once 'view/peluquero/peluquero.view.php';
    }

    // metodo crud
    public function Crud(){
        $alm = new Peluquero();        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/menu.view.php';
        require_once 'view/peluquero/peluquero-editar.view.php';
    }
    
    // metodo guardar
    public function Guardar(){
        $alm = new Peluquero();
        $alm->id        = strtolower($_REQUEST['id']);
        $alm->nombre    = strtolower($_REQUEST['Nombre']);
        $alm->apellido  = strtolower($_REQUEST['Apellido']);
        $alm->sexo      = strtolower($_REQUEST['Sexo']);
        $alm->telefono  = strtolower($_REQUEST['Telefono']);
        $alm->direccion = strtolower($_REQUEST['Direccion']);
        
        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        header('Location: index.php?c=Peluquero');
    }
    
    // metodo eliminar
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php?c=Peluquero');
    }
}