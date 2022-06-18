<?php

require_once 'model/cliente.model.php';

class ClienteController{
    
    private $model;
    private $alm;

    public function __CONSTRUCT(){
        $this->model = Cliente::getInstancia();
    }
    
    public function Index(){
        require_once 'view/menu.view.php';
        require_once 'view/cliente/clientes.view.php';
    }

    public function Crud(){
        // $alm = Cliente::getInstancia();        
        $this->alm = Cliente::getInstancia();        
        if(isset($_REQUEST['id'])){
            // $alm = $this->model->Obtener($_REQUEST['id']);
            $this->alm = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/menu.view.php';
        require_once 'view/cliente/cliente-editar.view.php';
    }
    


    public function Guardar(){
        $this->alm = Cliente::getInstancia();
        $this->alm->id = $_REQUEST['id'];
        $this->alm->apellido = strtolower($_REQUEST['Apellido']);
        $this->alm->nombre = strtolower($_REQUEST['Nombre']);
        $this->alm->sexo = strtolower($_REQUEST['Sexo']);
        $this->alm->telefono = strtolower($_REQUEST['Telefono']);
        $this->alm->direccion = strtolower($_REQUEST['Direccion']);
      
        if ($this->alm->id > 0){

            $this->model->Actualizar($this->alm);
        } 
        else{
            $cantidadEncontrado = $this->model->ObtenerPorApellidoNombre($this->alm->apellido , $this->alm->nombre);
            print_r(empty($cantidadEncontrado)); // si existe cliente no devuelve nada
            if(empty($cantidadEncontrado) == 1){
                $this->model->Registrar($this->alm);
                header('Location: index.php?c=Cliente');
            }
            else{
                echo("<script>let confirmacion = confirm('Ya hay un registro con ese apellido y nombre')</script>");
                header( "Refresh:1; index.php?c=Cliente", true, 303);
            }
        }
    }
   
    public function Filtrar(){
        $this->alm = Cliente::getInstancia();
        $this->alm->termino = strtolower($_REQUEST['Termino']);
        $this->alm->filtrar = true;
        $this->model->Filtrar($this->alm->termino);
        require_once 'view/menu.view.php';
        require_once 'view/cliente/clientes.view.php';
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php?c=Cliente');
    }
   
}