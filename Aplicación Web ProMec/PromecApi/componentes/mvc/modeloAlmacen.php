<?php
class Modelo {
    public $nombre;
    public $cantidad;
    public $id_Prod;
    public $costo;
    private $conexion;

    

    public function __construct(){     
        $this->nombre="none";
        $this->cantidad="none";
        $this->id_Prod="none";
        $this->costo="none";    
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

        $registrar = "insert into productos (nombre,cantidad,id_Prod,Monto) values ('".$this->nombre."','".$this->cantidad."','".$this->id_Prod."','".$this->costo."')";
         

        $this->EstableceConexion();
        mysqli_query($this->conexion,$registrar);
        mysqli_close($this->conexion);
    }

    public function consultar(){
        $consulta = "select nombre,cantidad,id_Prod,Monto from productos ";
        $this->EstableceConexion();
        $resultado = mysqli_query($this->conexion,$consulta);
        mysqli_close($this->conexion);
        return $resultado;
    }

    public function eliminar($id_Prod){
        $elimina = "delete from productos where  id_Prod =".$id_Prod;    
        $this->EstableceConexion();
        $resultado = mysqli_query($this->conexion,$elimina);
        mysqli_close($this->conexion);
        return $resultado;
    }

    public function actualizar($id_Prod) {

        if (!isset($this->nombre) || !isset($this->cantidad) || !isset($this->id_Prod)|| !isset($this->costo)) {
            return false;
        }  
        $actualizar = "UPDATE  productos SET nombre='" . $this->nombre . "', cantidad='" . $this->cantidad. "', id_Prod='" . $this->id_Prod . "',Monto ='".$this->costo."' WHERE id_Prod =" . $id_Prod;


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

