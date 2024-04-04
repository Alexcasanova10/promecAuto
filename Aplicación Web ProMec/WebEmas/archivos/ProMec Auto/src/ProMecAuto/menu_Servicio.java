package ProMecAuto;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Scanner;

public class menu_Servicio {
    Servicio serv01 = new Servicio();
    Tecnico tecnico = new Tecnico();
    Scanner sc = new Scanner(System.in);
    Date fechaHoy = new Date ();
    SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");
    String formatoFecha = sdf.format(fechaHoy);
    
    public void mostrar_Menu(){
         int opMenu = -1;
         do {
             do {
             //Menu de opciones
            System.out.println("Bienvenido a Servicios ");
            System.out.println("Selecciona la opción deseada");
            System.out.println("1. Agregar Servicio");
            System.out.println("2. Eliminar Servicio");        
            System.out.println("3. Ver Servicio");
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
                        System.out.println("***Capturar Servicio******");
                        ingresar_Serv();
                        System.out.println("Servicio agregado exitosamente");
                        System.out.println("Almacen actualizado acorde a fecha: " + formatoFecha);
                        
                        int volver = -1;
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
                    case 2:
                        System.out.println("Eliminar servicio");
                        if (serv01.getIdServicio().isEmpty()) {
                            System.out.println("***No se ha encontrado servicio en sistema**");
                            System.out.println("***Favor de ingresar informacion**");
                        }else {
                            eliminar_Serv();
                        }
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
                    case 3:
                        System.out.println("**Mostrar Servicio**");
                        if (serv01.getIdServicio().isEmpty()) {
                            System.out.println("***No se ha encontrado servicio en sistema**");
                            System.out.println("***Favor de ingresar informacion**");
                        }else {
                            ver_Serv();
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
    
    private boolean ingresar_Serv(){
        try{
            System.out.println("Ingresa nombre de Cliente");
            serv01.setNombre(sc.next());
            sc.nextLine();

            System.out.println("Ingresa apellido de Cliente");
            serv01.setApellido(sc.next());
            sc.nextLine();

            System.out.println("Ingresa placa de Cliente");
            serv01.setPlaca(sc.next());
            sc.nextLine();

            System.out.println("Proporciona modelo del vehículo");
            serv01.setModeloCoche(sc.next());
            sc.nextLine();

            System.out.println("Proporciona ID de servicio");
            serv01.setIdServicio(sc.next());
            sc.nextLine();

            System.out.println("Proporciona corre de cliente");
            serv01.setEmail(sc.next());
            sc.nextLine();

            System.out.println("Proporciona telefono de cliente");
            serv01.setTelefono(sc.next());
            sc.nextLine();

            System.out.println("Ingresa una descripcion del servicio a realizar");
            serv01.setDescripcion(sc.next());
            sc.nextLine();

            System.out.println("Ingresa el monto del servicio");
            serv01.setMonto(sc.next());
            sc.nextLine();
            
            System.out.println("Ingresa nombre de tecnico asignado");
            tecnico.setNombre(sc.next());
            sc.nextLine();
            
            System.out.println("Ingresa ID de tecnico");
            tecnico.setId_Tec(sc.next());
            sc.nextLine();
            
            
            
            System.out.println("Fecha: " + formatoFecha);
            return true;
        }catch(Exception e){
            System.out.println("Favor de ingresar la información correcta");
            return false;
        }
    }
    private boolean eliminar_Serv(){
        String verificarId = "";
        do {
            System.out.println("Ingresa id de servicio para proceder con la eliminacion");
            verificarId = sc.next();
            if (serv01.getIdServicio().equals(verificarId)) {
                serv01.setNombre("");
                serv01.setApellido("");
                serv01.setPlaca("");
                serv01.setModeloCoche("");
                serv01.setIdServicio("");
                serv01.setEmail("");
                serv01.setTelefono("");
                serv01.setDescripcion("");
                serv01.setMonto("");
                tecnico.setNombre("");
                tecnico.setId_Tec("");
                System.out.println("Servicio eliminado exitosamente");
                return true;
            }else {
                System.out.println("Favor de ingresar el ID correcto para proceder con la eliminacion");
                return false;
            }            
        } while (!verificarId.equals(serv01.getIdServicio()));
    }
    
    private boolean ver_Serv(){
        System.out.println("Id de Servicio " + serv01.getIdServicio());
        System.out.println("Descripcion: "  + serv01.getDescripcion());
        System.out.println("Nombre: "  + serv01.getNombre() + " " + serv01.getApellido());
        System.out.println("Modelo de coche: "  + serv01.getModeloCoche());
        System.out.println("Placa: "  + serv01.getPlaca());
        System.out.println("Monto $: "  + serv01.getMonto());
        System.out.println("Telefono: "  + serv01.getTelefono()  + "Correo: " + serv01.getEmail());
        System.out.println("Tecnico asignado a servicio " + tecnico.getNombre());
        System.out.println("Id de tecnico encargado de servicio " + tecnico.getId_Tec());
        System.out.println("Fecha: "  + formatoFecha);
        return true;
    }
}
