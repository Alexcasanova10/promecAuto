package ProMecAuto;
public class Persona extends Contacto {
    private String Nombre;
    private String Apellido;

    public String getNombre() {
        return Nombre;
    }
    public String getApellido() {
        return Apellido;
    }
    public void setNombre(String Nombre) {
        this.Nombre = Nombre;
    }
    public void setApellido(String Apellido) {
        this.Apellido = Apellido;
    }
}
