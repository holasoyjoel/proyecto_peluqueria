<?php
    
    // IMPORTACION MODELO
    require_once "model/cliente.model.php";
    require_once "model/peluquero.model.php";
    require_once "model/trabajo.model.php";

    // INSTANCIANDO Y OBTENIENDO TRABAJO
    $trabajo = new Trabajo();
    $trabajo = $trabajo->Obtener($_REQUEST['id']);
    
    // INSTANCIANDO Y OBTENIENDO CLIENTE
    $cliente = new Cliente();
    $cliente = $cliente->Obtener($trabajo->idCliente);

    // INSTANCIANDO Y OBTENIENDO PELUQUERO
    $peluquero = new Peluquero();
    $peluquero = $peluquero->Obtener($trabajo->idPeluquero);

?>


<div class="text-center container mt-2 ms-5">

    <!-- TITULO Y SUBTITULO-->
    <div class="bg-light mb-3 pb-2 shadow-sm">
        <h1 class="d-inline">Trabajo  - Detalle</h1>
        <br><br>
        <p class= "d-inline page-header text-capitalize text-secondary"><?php echo $cliente->apellido . " " . $cliente->nombre . " - ( " . $alm->titulo . " )."  ;?> </p>
    </div>

    <hr>

   <!-- FORMULARIO -->
   <div class="border mx-auto pb-5 pt-3 px-5 rounded shadow w-75">
        <form action="?c=Trabajo&a=Guardar" class="d-flex flex-column" enctype="multipart/form-data" id="formulario" method="post" >

            <input name="id" type="hidden" value="<?php echo $alm->id; ?>" />
            
            <!-- PRIMERA FILA -->
            <div class="row">
                <!-- BOTON VOLVER -->
                <div class="col text-start"> <a href="http://localhost/proyecto_final/index.php?c=Trabajo" class="text-decoration-none">Volver</a> </div>

                <!-- FECHA TRABAJO -->
                <div class="col"> <p class="text-end text-secondary mb-5 "><?php echo $trabajo->fechaTrabajo?></p> </div>
            </div>


            <!-- SEGUNDA FILA -->
            <div class="border-bottom my-3 pb-3 row">
                <!-- NOMBRE CLIENTE -->
                <div class="col"> <p class="bg-light w-25 d-inline ">Cliente</p> </div>
                <div class="col"> <p class="d-inline text-capitalize"><?php echo $cliente->apellido . " " . $cliente->nombre;?></p> </div>
            </div>

            <!-- NOMBRE PELUQUERO -->
            <div class="border-bottom my-3 pb-3 row">
                <div class="col"> <p class="bg-light w-25 d-inline ">Peluquero</p> </div>
                <div class="col"> <p class="d-inline text-capitalize"><?php echo $peluquero->apellido . " " . $peluquero->nombre;?></p> </div>
            </div>

            <!-- TITULO TRABAJO -->
            <div class="border-bottom my-3 pb-3 row">
                <div class="col"> <p class="bg-light w-25 d-inline ">Titulo</p> </div>
                <div class="col"> <p class="d-inline text-capitalize"><?php echo $trabajo->titulo ;?></p> </div>
            </div>
          
            <!-- DESCRIPCION TRABAJO -->
            <div class="border-bottom my-3 pb-3 row">
                <div class="col"> <p class="bg-light w-25 d-inline ">Descripcion</p> </div>
                <div class="col"> <p class="d-inline-block text-capitalize" style="text-align: justify;"><?php echo $trabajo->descripcion ;?></p> </div>
            </div>

            <!-- BOTON EDITAR -->
            <a class="btn btn-warning" href="?c=Trabajo&a=Crud&id=<?php echo $trabajo->id;?>" id="btnEditar">Editar</a>
        </form>
    </div>
</div>

<!-- JAVASCRIPT Y JQUERY -->
<script>
    $(document).ready(()=>{
        let txtFechaRealizado = $('#txtFechaRealizado')[0];
        let fecha = new Date();

        txtFechaRealizado.value = fecha.getDate() + "/" +  (fecha.getMonth()+1) + "/" + fecha.getFullYear();
    })
</script>
    
