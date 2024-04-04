package ProMecAuto; 
public class usuario {
   private String NuUsuario;
   private String Clave;
   usuario(){
       NuUsuario = "";
       Clave = "";
   }   
    public String getNuUsuario() {
        return NuUsuario;
    }
    public boolean setNuUsuario(String NuUsuario) {
        NuUsuario = NuUsuario.replace(" ", "");
        NuUsuario = NuUsuario.replace("á","a");
        NuUsuario = NuUsuario.replace("é","e");
        NuUsuario = NuUsuario.replace("í","i");
        NuUsuario = NuUsuario.replace("ó","o");
        NuUsuario = NuUsuario.replace("ú","u");
        if(NuUsuario.length() <= 10) {
            this.NuUsuario = NuUsuario.toLowerCase();
            return true;
        }else {
            return false;
        }
    }
    public String getClave() {
        return Clave;
    }
    public boolean setClave(String Clave) {
        if(Clave.length() <= 10) {
            this.Clave = Clave;
            return true;
        }else {
            return false;
        }
    }
    public boolean Validacion(String NuUsuario, String Clave){
         if(this.NuUsuario.compareTo(NuUsuario) == 0 && this.Clave.compareTo(Clave) == 0){
            return true;
        }else {
             System.out.println("Información incorrecta");
            return false;
        }    
    }
}
  