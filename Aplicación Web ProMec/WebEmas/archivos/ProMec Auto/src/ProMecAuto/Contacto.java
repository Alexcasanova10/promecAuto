 
package ProMecAuto;
public class Contacto {
    private String Email;
    private String Telefono;
     
    public String getEmail() {
        return Email;
    }
    
    public boolean setEmail(String Email) {
        if(Email.contains("@") && Email.contains(".") && !Email.contains(" ")){
            this.Email = Email.toLowerCase();
            return true;
        }
        else {
            System.out.println("Correo debe incluir @ y .");
            return false;
        }
    }

    
    public String getTelefono() {
        return Telefono;
    }

    public boolean setTelefono(String Telefono){
        if(Telefono.length() <= 15) {
            this.Telefono = Telefono;
            return true;
        }else {
            return false;
        }
    }    
    
     
}
