<head>
    <meta charset="utf-8" />
    <style>
        .baja{
            background-color: #FFE1E1;
        }
    </style>
</head>

<div class="border mt-1 ms-5 pt-2 p-3 text-center w-75">

    <!-- TITULO E INPUT DE FILTRO -->
    <div class="d-flex flex-row justify-content-around">
        <h1 class="page-header d-inline"> Clientes ( <span id='cantidadFilas'></span> ) </h1>

        <form action="?c=Cliente&a=Filtrar" method="post" enctype="multipart/form-data" class="align-items-center d-flex flex-row justify-content-between">
            <input type="text" name="Termino" id="" autocomplete="off" placeholder="Buscar . . ." class="form-control w-100 text-capitalize" value="<?php echo isset($alm->termino)? $this->alm->termino :  ""; ?>">
            <button class="border btn btn-primary w-50 ms-3">Buscar</button>
            <a href="?c=Cliente" class="border btn btn-secondary ms-3 w-50 ">Ver Todos</a>
        </form>
    </div>

    <!-- BOTON NUEVO CLIENTE -->
    <a href="?c=Cliente&a=Crud" id="btnAgregar" class="btn btn-success">Nuevo Cliente</a>  <br><br><br>

    <!-- TABLA DE INFORMACION -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width:200px;">Apellido y Nombre</th>
                <th style="width:120px;">Sexo</th>
                <th style="width:120px;">Telefono</th>
                <th style="width:120px;">Direccion</th>
                
                <th style="width:60px;"></th>
                <th style="width:60px;"></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach(isset($this->alm->filtrar)? ($this->model->Filtrar($this->alm->termino)) : ($this->model->Listar()) as $r): ?>
                <tr>         
                    <!-- APELLIDO Y NOMBRE -->
                    <td> <a href="?c=Trabajo&a=Filtrar&t=<?php echo $r->apellido . ' ' . $r->nombre;?>" class="text-capitalize"> <?php echo $r->apellido . " " . $r->nombre; ?> </a> </td>

                    <!-- SEXO -->
                    <td><?php echo $r->sexo == 'm' ? 'Masculino' : 'Femenino'; ?></td>

                    <!-- TELEFONO -->
                    <td><?php echo $r->telefono; ?></td>

                    <!-- DIRECCION -->
                    <td class="text-capitalize"><?php echo $r->direccion; ?></td>
                    
                    <!-- BOTON EDITAR -->
                    <td> <a href="?c=Cliente&a=Crud&id=<?php echo $r->id; ?>" id="btnEditar" class="btn btn-warning">Editar</a> </td>
                    
                    <!-- BOTON ELIMINAR -->
                    <td> <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Cliente&a=Eliminar&id=<?php echo $r->id; ?>" id="btnEliminar" class="btn btn-danger text-black">Eliminar</a> </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 

    <!-- CARTEL DE NO REGISTROS -->
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

        // OCULTANDO O MOSTRANDO TABLA Y CARTEL DE NO REGISTRO
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