<?php
require_once "modelos/usuario_MO.php";

class usuario_CO
{
    function __construct(){}

    function agregar()
    {
        $conexion=new conexion('all');
        
        $usuario_MO=new usuario_MO($conexion);

        /*Saber si los campos están vacíos y manejo de carácteres*/
        $usua_nombre=strtoupper(htmlentities($_POST['usua_nombre'],ENT_QUOTES));
        $usua_correo=strtoupper(htmlentities($_POST['usua_correo'],ENT_QUOTES));
        $usua_username=strtoupper(htmlentities($_POST['usua_username'],ENT_QUOTES));
        $usua_documento=strtoupper(htmlentities($_POST['usua_documento'],ENT_QUOTES));
        $arreglo_datos = ['nombre'=>$usua_nombre,'correo'=>$usua_correo,'nombre de usuario'=>$usua_username, 'documento'=>$usua_documento];
        foreach($arreglo_datos as $indices=>$objeto_datos)
        {
            if(empty($objeto_datos))
            {
                $arreglo_respuesta = [
                    "estado"=>"ERROR",
                    "mensaje"=>"Se debe llenar el campo $indices"
                ];
                exit(json_encode($arreglo_respuesta));
            }
        } 
        /*Fin saber si los campos están vacíos y manejo de carácteres*/

        /*Saber si se supera número de carácteres*/
        $size_usua_nombre=strlen($usua_nombre);
        $size_usua_correo=strlen($usua_correo);
        $size_usua_username=strlen($usua_username);
        $size_usua_documento=strlen($usua_documento);
        $arreglo_size_datos=['nombres'=>$size_usua_nombre,'correo'=>$size_usua_correo,'nombre de usuario'=>$size_usua_username,'documento'=>$size_usua_documento];
        foreach($arreglo_size_datos as $indices_size_datos=>$objetos_size_datos)
        {
            // if($objetos_size_datos>45 || ($indices_size_datos=='documento' && $objetos_size_datos>15))
            if($objetos_size_datos>45)
            {
                $arreglo_respuesta = [
                    "estado"=>"ERROR",
                    "mensaje"=>"Se excedi&oacute; la cantidad de car&aacute;cteres en el campo de $indices_size_datos"
                ];
        
                exit(json_encode($arreglo_respuesta));
            }
        }
        /*Fin saber se supera número de carácteres*/

        /*Saber si está duplicado el documento*/
        $arreglo_usuario=$usuario_MO->seleccionarDocumento($usua_documento);
        if($arreglo_usuario)
        {
            $arreglo_respuesta = [
                "estado"=>"ERROR",
                "mensaje"=>"El documento $usua_documento est&aacute; duplicado"
            ];
            exit(json_encode($arreglo_respuesta));
        }
        /*Fin saber si está duplicado el documento*/


         /*Saber si está duplicado el correo*/
         $arreglo_usuario=$usuario_MO->seleccionarCorreo($usua_correo);
         if($arreglo_usuario)
         {
             $arreglo_respuesta = [
                 "estado"=>"ERROR",
                 "mensaje"=>"El Correo $usua_correo est&aacute; duplicado"
             ];
             exit(json_encode($arreglo_respuesta));
         }
         /*Fin saber si está duplicado el correo*/


         /*Saber si está duplicado el Nombre de usuario*/
         $arreglo_usuario=$usuario_MO->seleccionarUsername($usua_username);
         if($arreglo_usuario)
         {
             $arreglo_respuesta = [
                 "estado"=>"ERROR",
                 "mensaje"=>"El Nombre de usuario $usua_username est&aacute; duplicado"
             ];
             exit(json_encode($arreglo_respuesta));
         }
         /*Fin saber si está duplicado el Nombre de usuario*/
        

        $usuario_MO->agregar($usua_nombre,$usua_correo,$usua_username,$usua_documento);

        $usua_id=$conexion->lastInsertId();

        $arreglo_respuesta = [
            "estado"=>"EXITO",
            "mensaje"=>"Registro Agregado",
            "usua_id"=>$usua_id
        ];

        echo json_encode($arreglo_respuesta);
    }

    function actualizarUsuario()
    {
        $conexion=new conexion('all');
        
        $usuario_MO=new usuario_MO($conexion);

        /*Saber si el dato estu_id es numérico*/
        $usua_id=$_POST['usua_id'];
        if(!is_numeric($usua_id))
        {
            $arreglo_respuesta = [
                "estado"=>"ERROR",
                "mensaje"=>"El identificador no es un n&uacute;mero entero"
            ];
    
            exit(json_encode($arreglo_respuesta));
        }
        /*Fin saber si el dato estu_id es numérico*/

        /*Saber si los campos están vacíos y manejo de carácteres*/

        $usua_nombre=strtoupper(htmlentities($_POST['usua_nombre'],ENT_QUOTES));
        $usua_correo=strtoupper(htmlentities($_POST['usua_correo'],ENT_QUOTES));
        $arreglo_datos = ['nombre'=>$usua_nombre,'correo'=>$usua_correo];
        foreach($arreglo_datos as $indices=>$objeto_datos)
        {
            if(empty($objeto_datos))
            {
                $arreglo_respuesta = [
                    "estado"=>"ERROR",
                    "mensaje"=>"Se debe llenar el campo $indices"
                ];
                exit(json_encode($arreglo_respuesta));
            }
        } 
        /*Fin saber si los campos están vacíos y manejo de carácteres*/

        /*Saber si se supera número de carácteres*/
        $size_usua_nombre=strlen($usua_nombre);
        $size_usua_correo=strlen($usua_correo);
        $arreglo_size_datos=['nombres'=>$size_usua_nombre,'correo'=>$size_usua_correo];
        foreach($arreglo_size_datos as $indices_size_datos=>$objetos_size_datos)
        {
            // if($objetos_size_datos>45 || ($indices_size_datos=='documento' && $objetos_size_datos>15))
            if($objetos_size_datos>45)
            {
                $arreglo_respuesta = [
                    "estado"=>"ERROR",
                    "mensaje"=>"Se excedi&oacute; la cantidad de car&aacute;cteres en el campo de $indices_size_datos"
                ];
        
                exit(json_encode($arreglo_respuesta));
            }
        }
        /*Fin saber se supera número de carácteres*/

         /*Saber si está duplicado el correo*/
         $arreglo_usuario=$usuario_MO->seleccionarCorreo($usua_correo);
         foreach($arreglo_usuario as $indices=>$objeto_datos)
        {
         if($objeto_datos==$usua_correo && $objeto_datos!=$usua_nombre)
         {
             $arreglo_respuesta = [
                 "estado"=>"ERROR",
                 "mensaje"=>"El Correo $usua_correo lo est&aacute; usando actualmente"
             ];
             exit(json_encode($arreglo_respuesta));
         }
         /*Fin saber si está duplicado el correo*/
        }

        $usuario_MO->actualizarUsuario($usua_id,$usua_nombre,$usua_correo);

        $arreglo_respuesta = [
            "estado"=>"EXITO",
            "mensaje"=>"Registro Actualizado"
        ];

        echo json_encode($arreglo_respuesta);
    }
}
?>