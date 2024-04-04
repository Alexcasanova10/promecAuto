 
package ProMecAuto;
 
public class Refaccion extends Producto {
    private String id_Refac;
    
    Refaccion(){
        id_Refac = "";
    }
    
    
    public String getId_Refac() {
        return id_Refac;
    }
        //Sobrecarga de Método
    public void setId_Refac(String id_Refac) {
        this.id_Refac = id_Refac;
         
    }
    
}
