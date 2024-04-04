<?php
class Modelo {
     
    public $nombre;
    public $apellido;
    public $id_Cliente;
    public $direccion;
    public $telefono;
    public $correo;
    private $conexion;
    

    public function __construct(){     
        $this->nombre="none";
        $this->apellido="none";
        $this->id_Cliente="none";
        $this->dirrecion="none";
        $this->telefono="none";
        $this->correo="none";
    
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

        $registrar = "insert into cliente(Id_Cliente,Nombre,Apellido,Direccion,Telefono,Correo) values ('".$this->id_Cliente."','".$this->nombre."','".$this->apellido."','".$this->direccion."','".$this->telefono."','".$this->correo."')";
         

        $this->EstableceConexion();
        mysqli_query($this->conexion,$registrar);
        mysqli_close($this->conexion);
    }

    public function consultar(){
         $consulta = "select Id_Cliente,Nombre,Apellido,Direccion,Telefono,Correo from cliente";
        $this->EstableceConexion();
        $resultado = mysqli_query($this->conexion,$consulta);
        mysqli_close($this->conexion);
        return $resultado;
    }
     public function eliminar($id_Cliente){
        $elimina = "delete from cliente where Id_Cliente =".$id_Cliente;    
        $this->EstableceConexion();
        $resultado = mysqli_query($this->conexion,$elimina);
        mysqli_close($this->conexion);
        return $resultado;
    }

    
     public function actualizar($id_Cliente) {
         if (!isset($this->nombre) || !isset($this->apellido) ||!isset($this->id_Cliente)|| !isset($this->direccion)|| !isset($this->telefono)|| !isset($this->correo)) {
            return false;
        } 

         $actualizar = "UPDATE cliente SET Id_Cliente='" . $this->id_Cliente. "', Nombre ='" . $this->nombre . "',Apellido ='" . $this->apellido . "',Direccion='" .$this->direccion.  "', Telefono='".$this->telefono."', Correo='".$this->correo."' WHERE Id_Cliente=" .$id_Cliente;

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