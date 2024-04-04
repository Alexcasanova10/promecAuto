 
package ProMecAuto;
public class Cliente extends Persona {
    private String Id;
    private String Placa;
    private String ModeloCoche;
 
    public String getId() {
        return Id;
    }

    public void setId(String Id) {
        this.Id = Id;
    }
    public String getPlaca() {
        return Placa;
    }

    public void setPlaca(String Placa) {
        this.Placa = Placa;
    }
    
    public String getModeloCoche() {
        return ModeloCoche;
    }
    public void setModeloCoche(String ModeloCoche) {
        this.ModeloCoche = ModeloCoche;
    }
}
