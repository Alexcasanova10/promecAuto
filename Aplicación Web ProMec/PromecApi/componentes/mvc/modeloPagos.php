<?php
class Modelo {
    public $id_transac;
    public $fecha;
    public $fecha_de_Corte;
    public $monto;
    public $tipo;
    private $conexion;
    

    public function __construct(){     
        $this->id_transac="none";
        $this->fecha="none";
        $this->fecha_de_Corte="none";
        $this->monto="none";
        $this->tipo="none";
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

        $registrar = "insert into pagos (id_Transac,Fecha,Monto,Tipo) values ('".$this->id_transac."','".$fecha_para_mysql."','".$this->monto."','".$this->tipo."')";
         
        $this->EstableceConexion();
        mysqli_query($this->conexion,$registrar);
        mysqli_close($this->conexion);
    }

    public function consultar(){ 
        $consulta = "select id_Transac, Fecha, Monto, tipo FROM pagos";
        $this->EstableceConexion();
        $resultado = mysqli_query($this->conexion,$consulta);
        mysqli_close($this->conexion);
        return $resultado;
    }

    public function eliminar($id_transac){
        $elimina = "delete from  pagos where id_Transac=".$id_transac;    
        $this->EstableceConexion();
        $resultado = mysqli_query($this->conexion,$elimina);
        mysqli_close($this->conexion);
        return $resultado;
    } 

    

    public function actualizar($id_transac) {
         if (!isset($this->id_transac) || !isset($this->fecha) || !isset($this->tipo)|| !isset($this->monto)) {
            return false;
        }

        $fecha_del_formulario = $this->fecha;
        $fecha_para_mysql = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_del_formulario)));

         
        $actualizar = "UPDATE pagos SET id_Transac='" . $this->id_transac . "', Fecha='" . $fecha_para_mysql . "', Monto='" . $this->monto . "',Tipo='" .$this->tipo."'WHERE id_Transac=" .$id_transac;


         $this->EstableceConexion();

         if (mysqli_query($this->conexion, $actualizar)) {
             mysqli_close($this->conexion);
            return true;
        } else {
             echo "Error al actualizar el registro: " . mysqli_error($this->conexion);
            mysqli_close($this->conexion);
            return false;
        }
    }

}
?>


