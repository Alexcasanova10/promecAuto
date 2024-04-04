<?php
class Modelo {
    public $nombre;
    public $apellido;
    public $producto;
    public $descripcion;
    public $cantidad;
    public $Id_Factura;
    public $fecha;
    public $monto;
    public $correo;
    public $estatus;
    private $conexion;
    

    public function __construct(){     
        $this->nombre="none";
        $this->apellido="none";
        $this->producto="none";
        $this->descripcion="none";
        $this->cantidad="none";
        $this->Id_Factura="none";
        $this->fecha="none";
        $this->monto="none";
        $this->correo="none";
        $this->estatus="none";    
    }


    private function EstableceConexion(){
        $this->conexion = mysqli_connect('127.0.0.1','usuario','12345678');
        
        if(!$this->conexion){
            echo "La conexion no se ha podido establecer.<br>";
        } else{           
            mysqli_select_db($this->conexion,"promec_auto");
        }
    }
 
    public function registrar(){
        $fecha_del_formulario = $this->fecha;
        $fecha_para_mysql = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_del_formulario)));
 
        $registrar = "insert into facturacion(nombre,apellido,producto,descripcion,cantidad,Id_Factura,fecha,monto,correo,Estatus) values ('".$this->nombre."','".$this->apellido."','".$this->producto."','".$this->descripcion."','".$this->cantidad."','".$this->Id_Factura."','".$fecha_para_mysql."','".$this->monto."','".$this->correo."','".$this->estatus."')";
         

        $this->EstableceConexion();
        mysqli_query($this->conexion,$registrar);
        mysqli_close($this->conexion);
    }
  
}
?>
