<?php
class accesos_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function iniciarSesion($usuario,$clave)
    {
        
        $sql="SELECT id_acceso FROM accesos WHERE usuario_acceso='$usuario' AND clave_acceso='$clave'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
    function buscarDocumento($id)
    {
        $sql="SELECT id_usuario FROM accesos WHERE id_acceso='$id'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
}
?>