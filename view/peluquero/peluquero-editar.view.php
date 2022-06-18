<div class="container mt-2 ms-5 text-center">

    <!-- TITULO -->
    <div class="bg-light mb-3 shadow-sm">
        <h1 class="d-inline">Peluquero - </h1>
        <h1 class="d-inline page-header"> <?php echo $alm->id != null ? $alm->apellido . " " .  $alm->nombre : 'Nuevo Peluquero'; ?> </h1>
    </div>

    <!-- RUTA SEGUIMIENTO -->
    <ol class="breadcrumb">
        <li> <a class="text-decoration-none" href="?c=Peluquero" >Peluqueros</a> / </li>
        <li class="active ms-1"><?php echo $alm->id != null ? $alm->nombre . ' ' . $alm->apellido : 'Nuevo Peluquero'; ?></li>
    </ol>
    
    <!-- FORMULARIO -->
    <div class="border mx-auto p-5 rounded shadow w-75 <?php echo !isset($alm->id)? 'border-success' : 'border-warning' ;?>">
        <form action="?c=Peluquero&a=Guardar" class="d-flex flex-column" enctype="multipart/form-data" id="formulario"  method="post">
            <input name="id" type="hidden" value="<?php echo $alm->id; ?>" />
            
            <!-- APELLIDO -->
            <div class="d-flex form-group justify-content-around mb-3">
                <label for="Apellido">Apellido</label>
                <input autofocus autocomplete="off" class="d-inline-block form-control shadow-sm text-capitalize w-75" id="txtApellido" maxlength="50" minlength="3" name="Apellido" placeholder="Ingrese su apellido" type="text" value="<?php echo $alm->apellido; ?>" />
            </div>
            
            <!-- NOMBRE -->
            <div class="d-flex form-group justify-content-around mb-3">
                <label for="Nombre">Nombre</label>
                <input autocomplete="off" class="d-inline-block form-control shadow-sm text-capitalize w-75" id="txtNombre" maxlength="50" minlength="3" name="Nombre" placeholder="Ingrese su nombre" type="text" value="<?php echo $alm->nombre; ?>" />
            </div>
            
            <!-- SEXO -->
            <div class="d-flex form-group justify-content-around mb-3">
                <label for="Sexo">Sexo</label>
                <select name="Sexo" class="d-inline-block form-control ms-4 shadow-sm w-75">
                    <option <?php echo $alm->sexo == 'm' ? 'selected' : ''; ?> value="m">Masculino</option>
                    <option <?php echo $alm->sexo == 'f' ? 'selected' : ''; ?> value="f">Femenino</option>
                </select>
            </div>
            
            <!-- TELEFONO -->
            <div class="d-flex form-group justify-content-around mb-3">
                <label for="Telefono">Telefono</label>
                <input autocomplete="off" class="d-inline-block form-control shadow-sm text-capitalize w-75" id="txtTelefono" maxlength="50" minlength="3" name="Telefono" placeholder="Ingrese su numero telefonico" type="text" value="<?php echo $alm->telefono; ?>" />
            </div>
            
            <!-- DIRECCION -->
            <div class="d-flex form-group justify-content-around mb-3">
                <label for="Direccion">Direccion</label>
                <input autocomplete="off" class="d-inline-block form-control shadow-sm text-capitalize w-75" id="txtDireccion" maxlength="100" minlength="3" name="Direccion" placeholder="Ingrese su direccion" type="text" value="<?php echo $alm->direccion; ?>" />
            </div>
            
            <hr />
            
            <!-- BOTON GUARDAR Y CANCELAR -->
            <div>
                <button class="btn btn-success mx-5">Guardar</button>
                <a class="btn btn-danger mx-5" href="?c=Peluquero">Cancelar</a>
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
    window.onload = ()=>{

        // SUBMIT FORMULARIO
        $('#formulario').submit((event)=>{
            if(validarCampos() == true){
                return this.validate();
            }
            else{
                event.preventDefault();
            }
        });

        // VALIDAR CAMPOS
        function validarCampos(){
            let camposValidos = false

            let txtApellido = $('#txtApellido')[0];
            let txtNombre = $('#txtNombre')[0];
            let txtTelefono = $('#txtTelefono')[0];
            let txtDireccion = $('#txtDireccion')[0];
            let spCamposObligatorios = $('#spCamposObligatorios');
            let cartelError = $('#divInfoError');


            if(txtApellido.value.trim().length > 0){
                $('#txtApellido').removeClass('border-danger');
                
                if(txtNombre.value.trim().length > 0){
                    $('#txtNombre').removeClass('border-danger');

                    if(txtTelefono.value.trim().length > 0){
                        $('#txtTelefono').removeClass('border-danger');

                        if(txtDireccion.value.trim().length > 0){
                            $('#txtDireccion').removeClass('border-danger');

                            camposValidos = true;

                        } else{ 
                            $('#txtDireccion').addClass('border-danger').focus(); 
                            spCamposObligatorios.text('Direccion');
                        }

                    } else{ 
                        $('#txtTelefono').addClass('border-danger').focus(); 
                        spCamposObligatorios.text('Telefono');                    
                    }

                } else{ 
                    $('#txtNombre').addClass('border-danger').focus(); 
                    spCamposObligatorios.text('Nombre');
                }

            } else{ 
                $('#txtApellido').addClass('border-danger').focus(); 
                spCamposObligatorios.text('Apellido');
            }
            
            // MOSTRAR CARTEL DE INCOMPLETO DURANTE 3 SEGUNDOS
            if(camposValidos == false){
                cartelError.removeClass('invisible');
                setTimeout(()=>{ cartelError.addClass('invisible'); } , 3000);
            }
            
            return camposValidos;
        }
    }
</script>