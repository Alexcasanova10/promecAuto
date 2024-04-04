package ProMecAuto;
 
public class detalle_Serv extends Cliente{
    private String Descripcion;
    private double monto;

    public String getDescripcion() {
        return Descripcion;
    }

    public void setDescripcion(String Descripcion) {
        this.Descripcion = Descripcion;
    }

    public double getMonto() {
        return monto;
    }

    public void setMonto(double monto) {
        this.monto = monto;
    }
    
    public boolean setMonto(String monto) {
        try {
            this.monto = Double.valueOf(monto);
            return true;
        }catch(Exception e){
            return false;
        }
    }
     
}
