<?php
class usuarios_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function seleccionar($documento_usuario='')
    {
        if($documento_usuario)
        {
            $sql="SELECT * FROM usuarios WHERE documento_usuario='$documento_usuario'";
           
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
        $sql="SELECT * FROM usuarios WHERE documento_usuario='$usua_documento'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
    function seleccionarCorreo($usua_correo)
    {
        $sql="SELECT * FROM usuarios WHERE cli_correo='$usua_correo'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }                                                                                                                                                       
    function seleccionarUsername($usua_username)
    {
        $sql="SELECT * FROM usuarios WHERE cli_nombre1='$usua_username'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
    function agregar($usua_nombre,$usua_correo,$usua_username,$usua_documento)
    {
        $sql="INSERT INTO usuarios (usua_nombre,usua_correo,usua_username,usua_documento) 
        VALUES ('$usua_nombre','$usua_correo','$usua_username','$usua_documento')";
        $this->conexion->consultar($sql);
    }
    function actualizarUsuarios($usua_id,$usua_nombre,$usua_correo)
    {
        $sql="UPDATE usuarios SET usua_nombre='$usua_nombre', usua_correo='$usua_correo' WHERE usua_id='$usua_id'";
        $this->conexion->consultar($sql);
    }
}
?>