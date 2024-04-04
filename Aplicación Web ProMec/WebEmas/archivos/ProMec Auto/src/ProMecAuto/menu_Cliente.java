
package ProMecAuto;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Scanner;


public class menu_Cliente {
    Cliente cliente01 = new Cliente(); 
    Scanner sc = new Scanner(System.in);
    Date fechaHoy = new Date ();
    SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");
    String formatoFecha = sdf.format(fechaHoy);
         public void mostrarMenu(){
         int opMenu = -1;
         do {
             do {
             //Menu de opciones
            System.out.println("Bienvenido a Clientes ");
            System.out.println("Selecciona la opción deseada");
            System.out.println("1. Agregar Cliente");
            System.out.println("2. Eliminar Cliente");        
            System.out.println("3. Ver Cartera de Clientes");
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
                        System.out.println("***Capturar cliente******");
                        agregar_Cliente();
                        System.out.println("Ingreso exitoso");
                        System.out.println("Cartera de clientes aztualizada a la fecha: " + formatoFecha);
                        
                        int volver = -1;
                        do {
                        System.out.println("Presiona 1 para volver al menu de opciones");
                            try{
                                volver = sc.nextInt();
                                if (volver == 1) {
                                    break;
                                } else {
                                    System.out.println("Ingresa un número válido");
                                    sc.nextLine();
                                }
                            }catch(Exception e){
                            }
                        } while (volver != 1);
                        break;
                        
                    case 2:
                        System.out.println("Eliminar cliente");
                        if (cliente01.getNombre().isEmpty() && cliente01.getId().isEmpty()) {
                            System.out.println("***No se ha encontrado cliente**");
                            System.out.println("***Favor de ingresar información**");
                        }else {
                            eliminar_Cliente();
                        }
                        
                        
                        break;
                    case 3:
                        System.out.println("**Cartera de clientes acorde a" + formatoFecha + "**");
                        validar_Info();
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
         
    private boolean agregar_Cliente(){
        try{
            System.out.println("Ingresa nombre");
            cliente01.setNombre(sc.next());
            sc.nextLine();

            System.out.println("Ingresa apellido");
            cliente01.setApellido(sc.next());
            sc.nextLine();

            System.out.println("Ingresa placa");
            cliente01.setPlaca(sc.next());
            sc.nextLine();

            System.out.println("Proporciona modelo del vehículo");
            cliente01.setModeloCoche(sc.next());
            sc.nextLine();
            
            System.out.println("Proporciona correo");
            cliente01.setEmail(sc.next());
            sc.nextLine();

            System.out.println("Proporciona telefono");
            cliente01.setTelefono(sc.next());
            
            System.out.println("Ingresa un ID para identificar al cliente");
            cliente01.setId(sc.next());
            sc.nextLine();
            
            
        }catch(Exception e){
            System.out.println("Favor de ingresar la informacion ");
        }
        return true;
    }
    private boolean eliminar_Cliente(){
        String verificarId = "";
        do {
            System.out.println("Ingresa id de servicio para proceder con la eliminacion");
            verificarId = sc.next();
            if (cliente01.getId().equals(verificarId)){
                cliente01.setNombre("");
                cliente01.setApellido("");
                cliente01.setPlaca("");
                cliente01.setModeloCoche("");
                cliente01.setEmail("");
                cliente01.setTelefono("");
                cliente01.setNombre("");
                cliente01.setId("");
                System.out.println("Servicio eliminado exitosamente");
                return true;
            }else {
                System.out.println("Favor de ingresar el ID correcto para proceder con la eliminacion");
                return false;
            }            
        } while (!cliente01.getId().equals(verificarId));
    }
    
    private boolean ver_Cliente(){
        System.out.println("Id: " + cliente01.getId());
        System.out.println("Nombre: "  + cliente01.getNombre() + " " + cliente01.getApellido());
        System.out.println("Modelo de coche: "  + cliente01.getModeloCoche());
        System.out.println("Placa: "  + cliente01.getPlaca());
        System.out.println("Telefono: "  + cliente01.getTelefono());
        System.out.println("Correo: " + cliente01.getEmail() );
        System.out.println("Fecha de ingreso a Sistema: "  + formatoFecha);
        
        return true;
    }
    
    private boolean validar_Info(){
       if (cliente01.getNombre().isEmpty() && cliente01.getId().isEmpty()) {
            System.out.println("***No se ha encontrado información**");
            System.out.println("***Favor de ingresar productos**");
            return false;
       }else {
           ver_Cliente();
           return true;
       }
    }
}









