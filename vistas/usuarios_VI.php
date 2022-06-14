<?php
class usuarios_VI
{
    function __construct(){}

    function agregar()
    {
        require_once "modelos/usuarios_MO.php";
        $conexion=new conexion('sel');
        $usuarios_MO=new usuarios_MO($conexion);

        $arreglo_usuarios=$usuarios_MO->seleccionar();
        ?>
        <div class="card">
        <div class="card-header">
            Agregar Usuarios
        </div>
        <div class="card-body">
            <form id="formulario_agregar_usuarios">
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
                
               
                
                <button type="button" onclick="agregarUsuarios();" class="btn btn-primary float-right">Agregar</button>
            </form>
        </div>
        </div>
        <div class="card">
        <div class="card-header">
            Listar Usuarios
        </div>
        <div class="card-body">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th style="text-align: center;" scope="col">Acci&oacute;n</th>
                </tr>
            </thead>
            <tbody id="lista_usuarios">
                <?php
                foreach($arreglo_usuarios as $objeto_usuarios)
                {
                    $usua_id=$objeto_usuarios->usua_id;
                    $usua_nombre=$objeto_usuarios->usua_nombre;
                    $usua_correo=$objeto_usuarios->usua_correo;
                    ?>
                    <tr>
                        <td id="usua_nombre_td_<?php echo $usua_id;?>"><?php echo ucwords(strtolower($usua_nombre));?></td>
                        <td id="usua_correo_td_<?php echo $usua_id;?>"><?php echo ucwords(strtolower($usua_correo));?></td>
                        <td style="text-align: center;">
                            <input type="hidden" id="usua_nombre_<?php echo $usua_id;?>" value="<?php echo ucwords(strtolower($usua_nombre));?>">
                            <input type="hidden" id="usua_correo_<?php echo $usua_id;?>" value="<?php echo ucwords(strtolower($usua_correo));?>">
                            <i style="cursor: pointer;" class="fas fa-pen-alt" data-toggle="modal" data-target="#ventana_modal" onclick="verActualizarUsuarios(<?php echo $usua_id;?>);"></i>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
            </table>
        </div>
        </div>
        <script>


        function verActualizarUsuarios(usua_id)
        {
            let usua_nombre=document.querySelector('#usua_nombre_'+usua_id).value;
            let usua_correo=document.querySelector('#usua_correo_'+usua_id).value;
            let formulario=`
            <div class="card">
                <div class="card-header">
                    Actualizar Usuarios
                </div>
                <div class="card-body">
                    <form id="formulario_actualizar_usuarios">
                        <div class="form-group">
                            <label for="usua_nombre">Nombre </label>
                            <input type="text" class="form-control" id="usua_nombre" name="usua_nombre" value="${usua_nombre}">    
                            <label for="usua_correo">Correo </label>
                            <input type="text" class="form-control" id="usua_correo" name="usua_correo" value="${usua_correo}">      
                        </div>
                        <input type="hidden" id="usua_id" name="usua_id" value="${usua_id}">
                        <button type="button" onclick="actualizarUsuarios(${usua_id});" class="btn btn-primary float-right">Actualizar</button>
                    </form>
                </div>
            </div>`;
            document.querySelector('#ventana_modal_contenido').innerHTML=formulario;
        }
        function actualizarUsuarios(usua_id)
        {
            let cadena = new FormData(document.querySelector('#formulario_actualizar_usuarios'))
            fetch('usuarios_CO/actualizarUsuarios', {
            method: 'POST',
            body: cadena
            })
            .then(res => res.json())
            .then(res=> 
            {
                let usua_nombre=document.querySelector('#formulario_actualizar_usuarios #usua_nombre').value;
                let usua_correo=document.querySelector('#formulario_actualizar_usuarios #usua_correo').value;
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
        function agregarUsuarios()
        {
            let cadena = new FormData(document.querySelector('#formulario_agregar_usuarios'))
            fetch('usuarios_CO/agregar', {
            method: 'POST',
            body: cadena
            })
            .then(res => res.json())
            .then(res=> 
            {
                if(res.estado=='EXITO')
                {
                    let usua_id=res.usua_id;
                    let usua_nombre=document.querySelector('#formulario_agregar_usuarios #usua_nombre').value;
                    let usua_correo=document.querySelector('#formulario_agregar_usuarios #usua_correo').value;
                    let fila= `
                    <tr>
                        <td id="usua_nombre_td_${usua_id}">${usua_nombre}</td>
                        <td id="usua_nombre_td_${usua_id}">${usua_correo}</td>
                        <td style="text-align: center;">
                            <input type="hidden" id="usua_nombre_${usua_id}" value="${usua_nombre}">
                            <input type="hidden" id="usua_correo_${usua_id}" value="${usua_correo}">
                            <i style="cursor: pointer;" class="fas fa-pen-alt" data-toggle="modal" data-target="#ventana_modal" onclick="verActualizarUsuarios('${usua_id}');"></i>
                        </td>
                    </tr>
                    `;    
                    document.querySelector('#lista_usuarios').insertAdjacentHTML('afterbegin',fila)
                    document.querySelector('#formulario_agregar_usuarios').reset();
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