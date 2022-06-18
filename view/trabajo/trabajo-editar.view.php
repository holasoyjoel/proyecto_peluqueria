<?php
    // IMPORTANDO MODELOS
    require_once "model/cliente.model.php";
    require_once "model/peluquero.model.php";

    // INSTANCIANDO MODELOS
    $cliente = new Cliente();
    $peluquero = new Peluquero();

    echo "<script>let fechaTrabajo = '';</script>";
    echo "<script>let nombreCliente = '';</script>";
    echo "<script>let nombrePeluquero = '';</script>";

    // SI HAY UN ID OBTENGO EL APELLIDO Y NOMBRE DE CLIENTE Y DEL PELUQUERO 
    if(isset($alm->id)){
        $nombreCliente = $cliente->Obtener($alm->idCliente);
        echo "<script>nombreCliente = '$nombreCliente->apellido $nombreCliente->nombre'.toLocaleLowerCase()</script>";
    
        $nombrePeluquero = $peluquero->Obtener($alm->idPeluquero);
        echo "<script> nombrePeluquero = '$nombrePeluquero->apellido $nombrePeluquero->nombre'.toLocaleLowerCase()</script>";

        echo "<script>fechaTrabajo = '$alm->fechaTrabajo';</script>";
    }
?>

<!-- HTML -->
<div class="container mt-2 ms-5 text-center">

    <!-- TITULO -->
    <div class="bg-light mb-3 shadow-sm">
        <h1 class="d-inline">Trabajo - </h1>
        <h1 class="d-inline page-header text-capitalize"> <?php echo isset($alm->id)? $nombreCliente->apellido . " " . $nombreCliente->nombre : "Nuevo Trabajo"; ?></h1>
        
    </div>

    <!-- RUTA DE SEGUIMIENTO -->
    <ol class="breadcrumb">
        <li><a class="text-decoration-none" href="?c=Trabajo">Trabajos</a> / </li>
        <li class="active text-capitalize" id="rutaTrabajo"><?php echo isset($alm->id)? $nombreCliente->apellido . " " . $nombreCliente->nombre : "Nuevo Trabajo"; ?></li>
    </ol>
   
    <hr>
   
    <!-- FORMULARIO -->
   <div class="border mx-auto p-5 pb-2 rounded shadow w-75 <?php echo !isset($alm->id)? 'border-success' : 'border-warning' ;?>">
        <form action="?c=Trabajo&a=Guardar" class="d-flex flex-column" enctype="multipart/form-data" id="formulario" method="post">

            <!-- ID -->
            <input name="id" type="hidden" value="<?php echo $alm->id; ?>" />
            
            <!-- SELECT CLIENTE -->
            <div class="d-flex form-group justify-content-around mb-3">
                <label class="mt-2 text-decoration-underline" for="idCliente">Cliente</label>
                <select autofocus class="form-select ms-3 text-capitalize w-50" id='selectCliente' name="idCliente">
                    <?php foreach($cliente->Listar() as $c): ?>
                        <?php
                            echo '<option class="optionCliente" value="'.$c->id.'">'.$c->apellido . ' ' . $c->nombre .'</option>';
                        ?>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <!-- SELECT PELUQUERO -->
            <div class="d-flex form-group justify-content-around mb-3">
                <label class="mt-2 text-decoration-underline" for="idPeluquero">Peluquero</label>
                <select class="form-select text-capitalize w-50" id='selectPeluquero' name="idPeluquero">
                    <?php foreach($peluquero->Listar() as $p): ?>
                        <?php
                            echo '<option class="optionPeluquero" value="'.$p->id.'">'.$p->apellido . ' ' . $p->nombre .'</option>';
                        ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- TITULO TRABAJO -->
            <div class="d-flex form-group justify-content-around mb-3">
                <label class="mt-2 text-decoration-underline" for="Titulo">Título</label>
                <input autocomplete="off" class="form-control ms-4 text-capitalize w-50" id="txtTitulo" maxlength="50" minlength="3" name="Titulo" type="text" value="<?php echo $alm->titulo; ?>">
            </div>

            <!-- DESCRIPCION -->
            <div class="d-flex form-group justify-content-around mb-3">
                <label class="mt-2 text-decoration-underline" for="Descripcion">Desc.Trabajo</label>
                <textarea autocomplete="off" class="form-control me-2 w-50" cols="20" id="txtDescripcion" maxlength="500" minlength="3" name="Descripcion" rows="5" style="resize: none;"><?php echo $alm->descripcion; ?></textarea>
            </div>

            <!-- FECHA TRABAJO -->
            <div class="d-flex form-group justify-content-around mb-3">
                <label class="mt-2 text-decoration-underline" for="FechaTrabajo">Fecha Trabajo</label>
                <input class="form-control me-3 w-50" id="txtFechaTrabajo" name="FechaTrabajo" readonly type="text" value="">
            </div>

            <hr>

            <!-- BOTONES GUARDAR Y CANCELAR -->
            <div class="mt-0 py-1">
                <button class="btn btn-success mx-5">Guardar</button>
                <a class="btn btn-danger mx-5" href="?c=Trabajo">Cancelar</a>
            </div> 
        </form>
    </div>

    <!-- CARTEL DE ERROR INCOMPLETO -->
    <div class="alert alert-danger invisible" id="divInfoError">
        Debes completar todos los campos
        <span id="spCamposObligatorios"></span>
    </div>

</div>


<!-- JAVASCRIPT Y JQUERY -->
<script>
    $(document).ready(()=>{
        let fechaSistema = new Date();
        let opcionesCliente = $('.optionCliente');
        let opcionesPeluquero = $('.optionPeluquero');        

          // SUBMIT FORMULARIO
          $('#formulario').submit((event)=>{
            if(validarCampos() == true){
                return this.validate();
            }
            else{
                event.preventDefault();
            }
        });

        // SELECCIONAR EL CLIENTE 
        opcionesCliente.each((i ,cliente) =>{
            if(nombreCliente == cliente.text.toLowerCase()){ cliente.selected = true; }
        })

        // SELECCIONAR EL PELUQUERO
        opcionesPeluquero.each((i,peluquero) =>{
            if(nombrePeluquero == peluquero.text.toLowerCase()){ peluquero.selected = true; }
        })     

        // ESTABLECIENDO FECHA TRABAJO
        if(fechaTrabajo == ""){
            $('#txtFechaTrabajo')[0].value = fechaSistema.getDate() + "/" + (fechaSistema.getMonth() + 1) + "/" + fechaSistema.getFullYear();
        }
        else{
            $('#txtFechaTrabajo')[0].value = fechaTrabajo;
        }

        // VALIDAR CAMPOS
        function validarCampos(){
            let camposValidos = false
            
            let cartelError = $('#divInfoError');
            let txtTitulo = $('#txtTitulo')[0];
            let txtDescripcion = $('#txtDescripcion')[0];
            let spCamposObligatorios = $('#spCamposObligatorios');


            if(txtTitulo.value.trim().length > 0){
                $('#txtTitulo').removeClass('border-danger');
                
                if(txtDescripcion.value.trim().length > 0){
                    $('#txtDescripcion').removeClass('border-danger');

                            camposValidos = true;

                } else{ 
                    $('#txtDescripcion').addClass('border-danger').focus(); 
                    spCamposObligatorios.text('Descripcion');
                }

            } else{ 
                $('#txtTitulo').addClass('border-danger').focus(); 
                spCamposObligatorios.text('Titulo');
            }
            
            // MOSTRAR CARTEL DE INCOMPLETO DURANTE 3 SEGUNDOS
            if(camposValidos == false){
                cartelError.removeClass('invisible');
                setTimeout(()=>{ cartelError.addClass('invisible'); } , 3000);
            }
            
            return camposValidos;
        }

    })
</script>
    
