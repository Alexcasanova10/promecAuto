 
package ProMecAuto;
import java.text.SimpleDateFormat;
import java.util.Date;


public class detalle_Factura {
    private double monto;
    private String descripcion;
    private String fecha;
    
    Date fechaHoy = new Date ();
    SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");
    String formatoFecha = sdf.format(fechaHoy);
    
    detalle_Factura(){
        monto = 0.0;
        descripcion = "";
        fecha = "";
    }

    public double getMonto() {
        return monto;
    }

    public void setMonto(double monto) {
        this.monto = monto;
    }
    
    public boolean setMonto (String monto) {
        try {
            this.monto = Double.valueOf(monto);
            return true;
        }catch(Exception e){
            System.out.println("Favor de ingresar un numero");
            return false;
        }
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha() {
        //this.fecha = fecha;
        System.out.println(formatoFecha);
    }

    public Date getFechaHoy() {
        return fechaHoy;
    }

    
}
