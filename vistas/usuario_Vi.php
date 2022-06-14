<?php
class usuario_VI
{
    function __construct(){}

    function agregar()
    {
        require_once "modelos/usuario_MO.php";
        $conexion=new conexion('sel');
        $usuario_MO=new usuario_MO($conexion);

        $arreglo_usuario=$usuario_MO->seleccionar();
        ?>
    
        <div class="card-body">
            <form id="formulario_agregar_usuario">
            <div class="form-group">
                    <label for="usua_nombre">Nombre </label>
                    <input type="text" class="form-control" id="usua_nombre" name="usua_nombre">
                </div>
                <div class="form-group">
                    <label for="usua_correo">Correo</label>
                    <input type="email" class="form-control" id="usua_correo" name="usua_correo">
                </div>
                <div class="form-group">
                    <label for="usua_username">Nombre de Usuario </label>
                    <input type="text" class="form-control" id="usua_username" name="usua_username">
                </div>
                <div class="form-group">
                    <label for="usua_documento">N&uacute;mero de documento</label>
                    <input type="number" class="form-control" id="usua_documento" name="usua_documento">
                </div>
                
               
                
                <button type="button" onclick="agregarUsuario();" class="btn btn-primary float-right">Agregar</button>
            </form>
        </div>
        
        <script>


        function verActualizarUsuario(usua_id)
        {
            let usua_nombre=document.querySelector('#usua_nombre_'+usua_id).value;
            let usua_correo=document.querySelector('#usua_correo_'+usua_id).value;
            let formulario=`
            <div class="card">
                <div class="card-header">
                    Actualizar Usuario
                </div>
                <div class="card-body">
                    <form id="formulario_actualizar_usuario">
                        <div class="form-group">
                            <label for="usua_nombre">Nombre </label>
                            <input type="text" class="form-control" id="usua_nombre" name="usua_nombre" value="${usua_nombre}">    
                            <label for="usua_correo">Correo </label>
                            <input type="text" class="form-control" id="usua_correo" name="usua_correo" value="${usua_correo}">      
                        </div>
                        <input type="hidden" id="usua_id" name="usua_id" value="${usua_id}">
                        <button type="button" onclick="actualizarUsuario(${usua_id});" class="btn btn-primary float-right">Actualizar</button>
                    </form>
                </div>
            </div>`;
            document.querySelector('#ventana_modal_contenido').innerHTML=formulario;
        }
        function actualizarUsuario(usua_id)
        {
            let cadena = new FormData(document.querySelector('#formulario_actualizar_usuario'))
            fetch('usuario_CO/actualizarUsuario', {
            method: 'POST',
            body: cadena
            })
            .then(res => res.json())
            .then(res=> 
            {
                let usua_nombre=document.querySelector('#formulario_actualizar_usuario #usua_nombre').value;
                let usua_correo=document.querySelector('#formulario_actualizar_usuario #usua_correo').value;
                if(res.estado=='EXITO')
                {
                    document.querySelector('#usua_nombre_td_'+usua_id).innerHTML=usua_nombre;
                    document.querySelector('#usua_correo_td_'+usua_id).innerHTML=usua_correo;
                    document.querySelector('#usua_nombre_'+usua_id).value=usua_nombre;
                    
                    document.querySelector('#usua_correo_'+usua_id).value=usua_correo;
                    toastr.success(res.mensaje);
                }
                else if(res.estado=='ERROR')
                {
                    toastr.error(res.mensaje);
                }
                
            });
        }  
        function agregarUsuario()
        {
            let cadena = new FormData(document.querySelector('#formulario_agregar_usuario'))
            fetch('usuario_CO/agregar', {
            method: 'POST',
            body: cadena
            })
            .then(res => res.json())
            .then(res=> 
            {
                if(res.estado=='EXITO')
                {
                    let usua_id=res.usua_id;
                    let usua_nombre=document.querySelector('#formulario_agregar_usuario #usua_nombre').value;
                    let usua_correo=document.querySelector('#formulario_agregar_usuario #usua_correo').value;
                    let fila= `
                    <tr>
                        <td id="usua_nombre_td_${usua_id}">${usua_nombre}</td>
                        <td id="usua_nombre_td_${usua_id}">${usua_correo}</td>
                        <td style="text-align: center;">
                            <input type="hidden" id="usua_nombre_${usua_id}" value="${usua_nombre}">
                            <input type="hidden" id="usua_correo_${usua_id}" value="${usua_correo}">
                            <i style="cursor: pointer;" class="fas fa-pen-alt" data-toggle="modal" data-target="#ventana_modal" onclick="verActualizarUsuario('${usua_id}');"></i>
                        </td>
                    </tr>
                    `;    
                    document.querySelector('#lista_usuario').insertAdjacentHTML('afterbegin',fila)
                    document.querySelector('#formulario_agregar_usuario').reset();
                    toastr.success(res.mensaje);
                }
                else if(res.estado=='ERROR')
                {
                    toastr.error(res.mensaje);
                }
                
            });
        }
        </script>
        <?php
    }
}
?>