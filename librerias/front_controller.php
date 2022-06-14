<?php
class front_controller
{
    function __construct($ruta)
    {
        if(empty($ruta))
        {
            $carpeta='vistas';
            $clase='menu_VI';
            $metodo='verMenu';
        }
        else
        {
            $arreglo_ruta=explode('/',$ruta);
            $clase=$arreglo_ruta[0];
            $metodo=$arreglo_ruta[1];

            $sufijo=substr($clase,-2);
            if($sufijo=='CO')
            {
                $carpeta="controladores";
            }
            else if($sufijo=='VI')
            {
                $carpeta="vistas";
            }
        }

        $archivo=$clase.".php";

        require_once "$carpeta/$archivo";
        $objeto=new $clase();
        $objeto->$metodo();
    }
}
?>