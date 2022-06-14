<?php
class conexion
{
    private $enlace;
    private $resultado;

    function __construct($opcion)
    {
        $ip_maquina=IP_MAQUINA;
        $base_de_datos=BASE_DE_DATOS;
        $puerto=PUERTO;
        if($opcion=='sel')
        {
            $usuario=SEL_C;
            $clave=CLAVE_SEL_C;
        }
        else if($opcion=='all')
        {
            $usuario=SEL_C;
            $clave=CLAVE_SEL_C;
        }
        
        try
        {
          //  $this->enlace = new PDO("mysql:host=$ip_maquina;dbname=$base_de_datos", $usuario, $clave);
            $this->enlace = new PDO("pgsql:host=$ip_maquina;port=$puerto;dbname=$base_de_datos", $usuario, $clave);
            return $this->enlace;
        }
        catch (PDOException $e)
        {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            exit();
        }
    }

    function consultar($sql)
    {
        $this->resultado = $this->enlace->query($sql) or $this->errorConsulta($sql);
    }

    function extraerRegistro()
    {
        return $this->resultado->fetchAll(PDO::FETCH_OBJ);
    }

    function lastInsertId()
    {
        return $this->enlace->lastInsertId();
    }

    function errorConsulta($sql)
    {
        $arreglo_respuesta = [
            "estado"=>"ERROR",
            "mensaje"=>"Consulta mal estructurada $sql"
        ];

        exit(json_encode($arreglo_respuesta));
    }
}
?>