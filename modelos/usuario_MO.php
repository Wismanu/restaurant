<?php
class usuario_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar($id_usuario='')
    {
        if($id_usuario)
        {
            $sql="SELECT * FROM usuarios WHERE id_usuario='$id_usuario'";
        }
        else
        {
            $sql="SELECT * FROM usuarios";
        }
        
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
    function seleccionarDocumento($usua_documento)
    {
        $sql="SELECT * FROM usuarios WHERE usua_documento='$usua_documento'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
    function seleccionarCorreo($usua_correo)
    {
        $sql="SELECT * FROM usuarios WHERE usua_correo='$usua_correo'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
    function seleccionarUsername($usua_username)
    {
        $sql="SELECT * FROM usuarios WHERE usua_username='$usua_username'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
    function agregar($usua_nombre,$usua_correo,$usua_username,$usua_documento)
    {
        $sql="INSERT INTO usuarios (usua_nombre,usua_correo,usua_username,usua_documento) 
        VALUES ('$usua_nombre','$usua_correo','$usua_username','$usua_documento')";
        $this->conexion->consultar($sql);
    }
    function actualizarUsuarios($id_usuario,$usua_nombre,$usua_correo)
    {
        $sql="UPDATE usuarios SET usua_nombre='$usua_nombre', usua_correo='$usua_correo' WHERE id_usuario='$id_usuario'";
        $this->conexion->consultar($sql);
    }
}
?>