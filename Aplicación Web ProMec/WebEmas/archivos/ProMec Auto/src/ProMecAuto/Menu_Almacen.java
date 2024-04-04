 
package ProMecAuto;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Scanner;


public class Menu_Almacen {
    Refaccion refac01 = new Refaccion();
    /*Refaccion refac02 = new Refaccion();
    Refaccion refac03 = new Refaccion();*/
    Scanner sc = new Scanner(System.in);
    Date fechaHoy = new Date ();
    SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");
    String formatoFecha = sdf.format(fechaHoy);
    
     public void mostrarMenu(){
         int opMenu = -1;
         do {
             do {
             //Menu de opciones
            System.out.println("Bienvenido a Almacen ");
            System.out.println("Selecciona la opción deseada");
            System.out.println("1. Agregar Refaccion");
            System.out.println("2. Eliminar Productos");        
            System.out.println("3. Ver Producto");
            System.out.println("4. Volver a Menu Principal");
            try {
                opMenu = sc.nextInt();
                }catch(Exception e){
                    System.out.println("Ingresa un número válido");
                    sc.nextLine();
                    opMenu = 0;
                    if (opMenu >= 5) {
                    System.out.println("***Ingresa un número válido**");
                    }
                }
             } while (opMenu <= 0 || opMenu > 4);
                 switch(opMenu){
                    case 1:
                        System.out.println("***Capturar Refaccion******");
                        agregar_Producto();
                        System.out.println("Refacción agregada exitosamente");
                        System.out.println("Almacen actualizado acorde a fecha: " + formatoFecha);
                        
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
                        //hacer que se repite al buclie SÍ la info NO es correcta
                        System.out.println("Eliminar producto");
                        if (refac01.getNombre().isEmpty() && refac01.getId_Refac().isEmpty()) {
                            System.out.println("***No se ha encontrado información**");
                            System.out.println("***Favor de ingresar productos**");
                        }else {
                            eliminar_Producto();
                        }
                        
                        
                        break;
                    case 3:
                        System.out.println("**Productos en Almacen**");
                        if (refac01.getNombre().isEmpty() && refac01.getId_Refac().isEmpty()) {
                            System.out.println("***No se ha encontrado información**");
                            System.out.println("***Favor de ingresar productos**");
                        }else {
                            ver_Producto();
                        }
                        break;
                    case 4:
                        System.out.println("Sesión exitosa");
                        System.out.println("Redirigiendo a Menú Principal");
                        //System.exit(0);
                        break;
                    default:
                        break;
                 }
         }while (opMenu != 4 );
     }

     private boolean agregar_Producto(){
        try{
            System.out.println("Ingresa el Nombre");
            refac01.setNombre(sc.next());
            sc.nextLine();
            
            System.out.println("Ingresa una descripcion");
            refac01.setDescripcion(sc.next());
            sc.nextLine();
            
            System.out.println("Ingresa la cantidad de items");
            refac01.setCantidad(sc.next());
            sc.nextLine();
            
            System.out.println("Proporciona el Id");
            refac01.setId_Refac(sc.next());
            sc.nextLine();
            
            System.out.println("Ingresa un Precio");
            refac01.setPrecio(sc.nextLine());
            return true;
        }catch(Exception e){
            System.out.println("Favor de ingresar la informacion correctamente");
            return false;
        }
    }
    
    
    private boolean eliminar_Producto(){
        String verificar = "";
        do {
            System.out.println("Favor de ingresar el ID del producto a eliminar ");
            verificar = sc.next();
            if (refac01.getId_Refac().equals(verificar)) {
                refac01.setNombre("");
                refac01.setDescripcion("");
                refac01.setCantidad(0);
                refac01.setId_Refac("");
                refac01.setPrecio(0.0);
                System.out.println("Producto eliminado exitosamente");
              return true;
            }else{
                System.out.println("ID no coincide con ningún producto en almacen, intentar de nuevo");
            }
        } while (!verificar.equals(refac01.getId_Refac()));
        return false;
    }
    
    private boolean ver_Producto(){
        System.out.println("Los datos del producto son: ");
        System.out.println("Nombre: " + refac01.getNombre());
        System.out.println("Id: " + refac01.getId_Refac());
        System.out.println("Cantidad: " + refac01.getCantidad());
        System.out.println("Descripcion: " + refac01.getDescripcion());
        System.out.println("Precio: $" + refac01.getPrecio());
        return true;
    }
}


