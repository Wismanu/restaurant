<?php
require_once "modelos/accesos_MO.php";
class accesos_CO
{
    function __construct(){}

    function iniciarSesion($usuario,$clave)
    {
        $conexion=new conexion('sel');
        
        $accesos_MO=new accesos_MO($conexion);
        
        $arreglo=$accesos_MO->iniciarSesion($usuario,$clave);

        if($arreglo)
        {
            $objeto_accesos=$arreglo[0];
            $usua_id=$objeto_accesos->id_acceso;
            $_SESSION['usua_id']=$usua_id;

        }

        header('Location: index.php');
    }

    function salir()
    {
        session_destroy();
    }
}
?>