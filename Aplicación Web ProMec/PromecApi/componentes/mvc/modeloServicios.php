<?php
class Modelo {
    public $descripcion;
    public $costo;
    public $id_OrdServ;
    public $fecha;
    public $estatus;
    public $placas;
    private $conexion;
    

    public function __construct(){     
        $this->descripcion="none";
        $this->costo="none";
        $this->id_OrdServ="none";
        $this->fecha="none";
        $this->estatus="none";
        $this->placas="none";
    
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

        $registrar = "insert into servicios(Descripcion,Monto,Id_OrdServ,Fecha,Estatus,Placas) values ('".$this->descripcion."','".$this->costo."','".$this->id_OrdServ."','".$fecha_para_mysql."','".$this->estatus."','".$this->placas."')";
         

        $this->EstableceConexion();
        mysqli_query($this->conexion,$registrar);
        mysqli_close($this->conexion);
    }

    public function consultar(){
         $consulta = "select Id_OrdServ,descripcion,monto, Fecha, Estatus, Placas from servicios";
        $this->EstableceConexion();
        $resultado = mysqli_query($this->conexion,$consulta);
        mysqli_close($this->conexion);
        return $resultado;
    }

    public function eliminar($id_OrdServ){
        $elimina = "delete from servicios where Id_OrdServ=".$id_OrdServ;    
        $this->EstableceConexion();
        $resultado = mysqli_query($this->conexion,$elimina);
        mysqli_close($this->conexion);
        return $resultado;
    }

    
    public function actualizar($id_OrdServ) {
         if (!isset($this->descripcion) || !isset($this->costo) || !isset($this->id_OrdServ)|| !isset($this->fecha)|| !isset($this->estatus)|| !isset($this->placas)) {
            return false;
        }

        $fecha_del_formulario = $this->fecha;
        $fecha_para_mysql = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_del_formulario)));

         $actualizar = "UPDATE servicios SET Descripcion='" . $this->descripcion . "', monto='" . $this->costo . "', id_OrdServ='" . $this->id_OrdServ . "',fecha='" .$fecha_para_mysql . "', Estatus='".$this->estatus."', placas='".$this->placas."' WHERE id_OrdServ=" . $id_OrdServ;


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






