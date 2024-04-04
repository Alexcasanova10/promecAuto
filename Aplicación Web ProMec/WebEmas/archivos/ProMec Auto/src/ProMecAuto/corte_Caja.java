 
package ProMecAuto;
import java.text.SimpleDateFormat;
import java.util.Date;

public class corte_Caja {
    Date fechaHoy = new Date ();
    SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");
    String formatoFecha = sdf.format(fechaHoy);
    
    private String fecha;
    private double Monto_Total;
    private double ingresos;
    private double egresos;

    corte_Caja(){
        fecha = "";
        Monto_Total = 0.0;
        ingresos = 0.0;
        egresos = 0.0;
   }
    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        //this.fecha = fecha;
        System.out.println(formatoFecha);        
    }

    public double getMonto_Total() {
        return Monto_Total;
    }

    public void setMonto_Total(double Monto_Total) {
        this.Monto_Total = Monto_Total;
        Monto_Total = ingresos - egresos;
    }

    public double getIngresos() {
        return ingresos;
    }

    public void setIngresos(double ingresos) {
        this.ingresos = ingresos;
    }
    
    public boolean setIngresos (String ingresos) {
        try {
            this.ingresos = Double.valueOf(ingresos);
            return true;
        }catch(Exception e){
            System.out.println("Favor de ingresar un numero");
            return false;
        }
    }

    public double getEgresos() {
        return egresos;
    }

    public void setEgresos(double egresos) {
        this.egresos = egresos;
    }
    
    public boolean setEgresos (String egresos) {
        try {
            this.egresos = Double.valueOf(egresos);
            return true;
        }catch(Exception e){
            System.out.println("Favor de ingresar un numero");
            return false;
        }
    }
    
    public boolean validar_Monto(){
        do {
            if (Monto_Total == ingresos + egresos) {
                System.out.println("Monto total correctamente validado");
                return true;
            }else {
                System.out.println("Existe discrepancia en el monto total, favor de validar nuevamente");
                return false;
            }
        } while (Monto_Total != ingresos + egresos);
    }
}
