 
package ProMecAuto;
 
public class factura extends detalle_Factura {
    private String Id_Fac;

     factura(){
         Id_Fac = "";
     }
    public String getId_Fac() {
        return Id_Fac;
    }

    public void setId_Fac(String Id_Fac) {
        this.Id_Fac = Id_Fac;
    }
    
    
}
