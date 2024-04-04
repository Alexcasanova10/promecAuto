<?php
class Modelo {
    public $modelo;
    public $marca;
    public $propietario;
    public $kilometraje;
    public $placas;
    public $id_Auto;
    public $id_Cliente;
    public $numero_Serie;
    private $conexion;

    

    public function __construct(){     
        $this->modelo="none";
        $this->marca="none";
        $this->propietario="none";
        $this->kilometraje="none";
        $this->placas="none";
        $this->id_Auto="none";
        $this->id_Cliente="none";
        $this->numero_Serie="none";
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

        $registrar = "insert into auto(Id_Auto,Id_Cliente,Numero_Serie,Placas,Marca,Modelo,Propietario,Kilometros) values ('".$this->id_Auto."','".$this->id_Cliente."','".$this->numero_Serie."','".$this->placas."','".$this->marca."','".$this->modelo."','".$this->propietario."','".$this->kilometraje."')";
         

        $this->EstableceConexion();
        mysqli_query($this->conexion,$registrar);
        mysqli_close($this->conexion);
    }

    public function consultar(){

        $consulta = "select Id_Auto,Id_Cliente,Numero_Serie,Placas,Marca,Modelo,Propietario,Kilometros from auto";
        $this->EstableceConexion();
        $resultado = mysqli_query($this->conexion,$consulta);
        mysqli_close($this->conexion);
        return $resultado;
    }

    public function eliminar($id_Auto){
        $elimina = "delete from auto where Id_Auto =".$id_Auto;    
        $this->EstableceConexion();
        $resultado = mysqli_query($this->conexion,$elimina);
        mysqli_close($this->conexion);
        return $resultado;
    }

    

    public function actualizar($id_Auto) {
         if (!isset($this->id_Auto) || !isset($this->id_Cliente) || !isset($this->numero_Serie)|| !isset($this->placas)|| !isset($this->marca)|| !isset($this->modelo)|| !isset($this->propietario)|| !isset($this->kilometraje)) {
            return false;
        } 
 
        $actualizar = "UPDATE auto SET Id_Auto='" . $this->id_Auto . "', Id_Cliente='" . $this->id_Cliente . "', Numero_Serie='" . $this->numero_Serie . "', Placas='" .$this->placas . "', Marca='".$this->marca."',Modelo='".$this->modelo."',Propietario='".$this->propietario."',Kilometros='".$this->kilometraje."' WHERE Id_Auto=" . $id_Auto;


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

