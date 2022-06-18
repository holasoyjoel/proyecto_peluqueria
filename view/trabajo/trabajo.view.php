<?php
    // IMPORTO LOS MODELOS
    require_once "model/cliente.model.php";
    require_once "model/peluquero.model.php";
    
?>

<!-- HTML -->

<div class="border mt-1 ms-5 p-3 pt-2 text-center w-75">

    <!-- TITULO E INPUT FILTRO -->
    <div class="d-flex flex-row justify-content-around">
        <h1 class="d-inline page-header">Trabajos (<span id='cantidadFilas'></span>)</h1>
        
        <form action="?c=Trabajo&a=Filtrar" class="d-flex flex-row align-items-center justify-content-between" enctype="multipart/form-data" method="post">
            <input autocomplete="off" class="form-control text-capitalize w-100" name="Termino" id="" placeholder="Buscar . . ." type="text" value="<?php echo isset($alm->termino)? $alm->termino :  ""; ?>">
            <button class="border btn btn-primary ms-3 w-50">Buscar</button>
            <a class="border btn btn-secondary ms-3 w-50 " href="?c=Trabajo">Ver Todos</a>
        </form>
    </div>
    
    <!-- BOTON NUEVO TRABAJO -->
    <a class="btn btn-success" href="?c=Trabajo&a=Crud" id="btnAgregar">Nuevo Trabajo</a> <br><br><br>
    
    <!-- TABLA INFORMACION -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width:120px;">Cliente</th>
                <th style="width:120px;">Peluquero</th>
                <th style="width:120px;">Titulo</th>
                <th style="width:120px;">Fecha Realizado</th>
                <th style="width:60px;"></th>
                <th style="width:60px;"></th>
                <th style="width:60px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach(isset($alm->filtrar)? ($this->model->Filtrar($alm->termino)) : ($this->model->Listar()) as $r): ?>
                <tr>
                    <!-- APELLIDO Y NOMBRE CLIENTE -->
                    <td class="text-capitalize">
                        <?php 
                        $cliente = new Cliente();
                        $cliente = $cliente->Obtener($r->idCliente);
                        echo $cliente->apellido . " " . $cliente->nombre;   
                        ?>
                </td>

                <!-- APELLIDO Y NOMBRE PELUQUERO -->
                <td class="text-capitalize">
                    <?php 
                        $peluquero = new Peluquero();
                        $peluquero = $peluquero->Obtener($r->idPeluquero);
                        echo $peluquero->apellido . " " . $peluquero->nombre;   
                        ?>
                </td>

                <!-- TITULO TRABAJO -->
                <td class="text-capitalize"><?php echo $r->titulo; ?></td>

                <!-- FECHA TRABAJO -->
                <td><?php echo $r->fechaTrabajo; ?></td>

                <!-- BOTON VER TRABAJO -->
                <td> <a class="btn btn-success" href="?c=Trabajo&a=Detalle&id=<?php echo $r->id?>" id="btnEditar">Ver</a> </td>

                <!-- BOTON EDITAR TRABAJO -->
                <td> <a class="btn btn-warning" href="?c=Trabajo&a=Crud&id=<?php echo $r->id;?>" id="btnEditar">Editar</a> </td>

                <!-- BOTON ELIMINAR -->
                <td> <a class="btn btn-danger text-black" href="?c=Trabajo&a=Eliminar&id=<?php echo $r->id; ?>" id="btnEliminar" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');">Eliminar</a> </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    <!-- CARTEL DE NO REGISTROS -->
    </table> 
    <div class="alert alert-warning" id="alerta">
        NO HAY NINGUN REGISTRO
    </div>
</div>

<!-- JAVASCRIPT Y JQUERY -->
<script>
    $(document).ready(()=>{

        let cantidadFilas = $('tr');
        let cartelAlerta = $('#alerta');
        let tabla = $('table');

        // CANTIDAD DE REGISTROS
        $('#cantidadFilas').text(cantidadFilas.length - 1);

        // OCULTANDO Y MOSTRANDO CARTEL DE NO REGISTROS      
        if(cantidadFilas.length - 1 == 0){
            tabla.addClass('d-none');
            cartelAlerta.removeClass('d-none');
        }
        else{
            tabla.removeClass('d-none');
            cartelAlerta.addClass('d-none');
        }

        // UBICANDO BOTON DE AGREGAR CLIENTE
        $('#btnAgregar').css('position','absolute').css('left','90%').css('top','90%');
    })
</script>