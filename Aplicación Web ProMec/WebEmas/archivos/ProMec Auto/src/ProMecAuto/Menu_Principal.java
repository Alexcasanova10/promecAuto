package ProMecAuto;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Scanner; 

public class Menu_Principal {    
    public static void main(String[] args) {
        Date fechaHoy = new Date ();
        SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");
        String formatoFecha = sdf.format(fechaHoy);
        
        Scanner sc = new Scanner(System.in);
        menu_Cliente cliente = new menu_Cliente();
        Menu_Pago pago = new Menu_Pago();
        menu_Servicio servicio = new menu_Servicio();
        Menu_Almacen almacen = new Menu_Almacen();
        usuario usuario01 = new usuario();
        
        usuario01.setNuUsuario("persona01");
        usuario01.setClave("145678");
        
        int opMenu = -1;
        
        
        String usuario, clave;
        boolean entrar = false;
        do {
            System.out.println("\n\n-- Bienvenido a ProMec Software--");
            System.out.print("Ingresa el Nombre de Usuario: ");
            usuario = sc.nextLine();
            System.out.print("Contrasena: ");
            clave = sc.nextLine();
        } while (!usuario01.Validacion(usuario, clave));
               
        if(usuario01.Validacion(usuario, clave)) {
            entrar = true;
        }
        if(entrar == true) {
            do {
                do {
                    System.out.println("\n\n-- MENU PRINCIPAL --");
                    System.out.println("1. Menu de Clientes");
                    System.out.println("2. Menu de Pagos y Facturas");
                    System.out.println("3. Menu de Servicios");                    
                    System.out.println("4. Menu de Almacen");    
                    System.out.println("5. Salir");

                    try {
                        opMenu = sc.nextInt();
                        if (opMenu >= 6) {
                        System.out.println("***Ingresa un número válido**");
                        }
                    }catch(Exception e) {
                        System.out.println("Ingresa un dato válido");
                    }
                }while(opMenu <= 0 || opMenu > 5);
                
                switch(opMenu) {
                    case 1:
                        cliente.mostrarMenu();
                        break;
                    case 2:
                        pago.mostrarMenu();
                        break;
                    case 3: ;
                        servicio.mostrar_Menu();
                        break;
                    case 4: 
                        almacen.mostrarMenu();
                        break;
                    case 5: 
                        System.out.println("Gracias por usar ProMec Software");
                        break;
                }
            }while(opMenu != 5);
        }else {
            System.out.println("USUARIO NO VALIDO");
        }   
       }             
    }