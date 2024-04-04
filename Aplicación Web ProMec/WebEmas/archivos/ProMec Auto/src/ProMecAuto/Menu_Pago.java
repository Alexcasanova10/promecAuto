package ProMecAuto;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Scanner;

public class Menu_Pago {
    factura fac01 = new factura();
    corte_Caja corte01 = new corte_Caja();
    Scanner sc = new Scanner(System.in);
    Date fechaHoy = new Date ();
    SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");
    String formatoFecha = sdf.format(fechaHoy);
         
    public void mostrarMenu(){
         int opMenu = -1;
         do {
             do {
             //Menu de opciones
             
            System.out.println("Bienvenido a Pago y Facturas");
            System.out.println("Selecciona la opción deseada");
            System.out.println("1.Agregar Factura");
            System.out.println("2.Agregar ingreso a caja ");        
            System.out.println("3.Agregar egreso a caja ");        
            System.out.println("4.Mostrar Factura");
            System.out.println("5.Realizar Corte de Caja");
            System.out.println("6.Volver a Menu Principal");
            try {
                opMenu = sc.nextInt();
                }catch(Exception e){
                    System.out.println("Ingresa un número válido");
                    sc.nextLine();
                    opMenu = 0;
                    if (opMenu >= 7) {
                    System.out.println("***Ingresa un número válido**");
                    }
                }
             } while (opMenu <= 0 || opMenu > 6);
                 switch(opMenu){
                     case 1:
                         System.out.println("******Agregar Factura******");
                         agregar_Fac();
                         System.out.println("******Factura ingresada en sistema correctamente****");
                          int volver = -1;
                        do {
                        System.out.println("Presiona 1 para volver al menu de opciones");
                        /*System.out.println("Presiona 2 para ingresar otro producto");*/
                            try{
                                volver = sc.nextInt();
                                if (volver == 1) {
                                    break;
                                }/*else if(volver == 2){
                                    agregar_Producto();
                                }*/ else {
                                    System.out.println("Ingresa un número válido");
                                    sc.nextLine();
                                }
                            }catch(Exception e){
                            }
                        } while (volver != 1);
                         break;
                     case 2:
                         System.out.println("****Agregar ingreso a caja****");
                         agregar_Monto();
                        System.out.println("Caja actualizada con exito");
                         
                        volver = -1;
                        do {
                        System.out.println("Presiona 1 para volver al menu de opciones");
                        /*System.out.println("Presiona 2 para ingresar otro producto");*/
                            try{
                                volver = sc.nextInt();
                                if (volver == 1) {
                                    break;
                                }else {
                                    System.out.println("Ingresa un número válido");
                                    sc.nextLine();
                                }
                            }catch(Exception e){
                            }
                        } while (volver != 1);
                         break;
                 
                     case 3: 
                         System.out.println("*******Agregar egreso a caja***********");
                         agregar_Egreso();
                         System.out.println("Caja actualizada con exito");
                         
                        volver = -1;
                        do {
                        System.out.println("Presiona 1 para volver al menu de opciones");
                        /*System.out.println("Presiona 2 para ingresar otro producto");*/
                            try{
                                volver = sc.nextInt();
                                if (volver == 1) {
                                    break;
                                }else {
                                    System.out.println("Ingresa un número válido");
                                    sc.nextLine();
                                }
                            }catch(Exception e){
                            }
                        } while (volver != 1);
                         break;
                     case 4:
                         String id_Ing = "";
                         do {
                             System.out.println("Ingresar ID de factura para proceder");
                             id_Ing = sc.next();
                             if (fac01.getId_Fac().equals(id_Ing)) {
                                 ver_Factura();
                             }else {
                                 System.out.println("Favor de ingresar el Id correctamente");
                             }
                         } while (!fac01.getId_Fac().equals(id_Ing));
                         volver = -1;
                        do {
                        System.out.println("Presiona 1 para volver al menu de opciones");
                            try{
                                volver = sc.nextInt();
                                if (volver == 1) {
                                    break;
                                }else {
                                    System.out.println("Ingresa un número válido");
                                    sc.nextLine();
                                }
                            }catch(Exception e){
                            }
                        } while (volver != 1);
                         break;
                     case 5:
                         System.out.println("*******CORTE CAJA******");
                         corteCaja();
                         volver = -1;
                         do {
                        System.out.println("Presiona 1 para volver al menu de opciones");
                            try{
                                volver = sc.nextInt();
                                if (volver == 1) {
                                    break;
                                }else {
                                    System.out.println("Ingresa un número válido");
                                    sc.nextLine();
                                }
                            }catch(Exception e){
                            }
                        } while (volver != 1);
                         break;
                     case 6:
                        System.out.println("Sesión exitosa");
                        System.out.println("Redirigiendo a Menú Principal");
                        //System.exit(0);
                        break;
                    default:
                        break;
                 }
         }while (opMenu != 6);
     }
         
     private boolean agregar_Fac(){
        try{
            System.out.println("Ingresar Monto");
            fac01.setMonto(sc.next());
            sc.nextLine();

            System.out.println("Ingresar descripcion de la factura");
            fac01.setDescripcion(sc.next());
            sc.nextLine();

            System.out.println("Ingresar ID de factura");
            fac01.setId_Fac(sc.next());
            sc.nextLine();

            System.out.println("Fecha: " + formatoFecha);
            return true;
        }catch(Exception e){
            System.out.println("Favo de ingresar la información correctamente");
            return false;
        }
     }
     
     private boolean ver_Factura(){
        System.out.println("Los datos de factura son: ");
        System.out.println("Descripcion: " + fac01.getDescripcion());
        System.out.println("Id: " + fac01.getId_Fac());
        System.out.println("Monto de factura: " + fac01.getMonto());
        System.out.println("Fecha: " + formatoFecha);
        return true;
     }
     
    private boolean agregar_Monto(){
        try{
            do {
                System.out.println("Ingresa un monto en caja");
                corte01.setIngresos(sc.next());
                if (corte01.getIngresos() <= 0) {
                    System.out.println("Favor de ingresar un monto mayor a 0");
                }return true;
            } while (corte01.getIngresos()<=0);
        }catch(Exception e){
            System.out.println("Favor de ingresar un monto válido");
            return false;
        }
    }
    
    private boolean agregar_Egreso(){
        try{
            do {
                System.out.println("Ingresa monto a retirar de caja");
                corte01.setEgresos(sc.next());
                if (corte01.getEgresos()<=0) {
                    System.out.println("Favor de ingresar un monto mayor a 0");
                }return true;
            } while (corte01.getEgresos()<=0);
            
        }catch(Exception e){
            System.out.println("Favor de ingresar un monto válido");
            return false;
        }
    }
    
    private boolean corteCaja(){
        corte01.setMonto_Total(corte01.getIngresos() - corte01.getEgresos());
        int volver = 0;
        do {
            if (corte01.getMonto_Total() < 0 || corte01.getIngresos() == 0 || corte01.getEgresos() == 0) {
                System.out.println("Saldo incorrecto, favor de verificar ingresos o egresos");
                System.out.println("Presiona 1 para volver a menu");
                volver = sc.nextInt();
                return false;
            }else {
                System.out.println("El corte total de caja acorde a fecha " + formatoFecha + "es: ");
                System.out.println(corte01.getMonto_Total());
                System.out.println("Ingresos: " + corte01.getIngresos());
                System.out.println("Egresos: " + corte01.getEgresos());
                return true;
            }
        } while (volver != 1);
    }
    
}
