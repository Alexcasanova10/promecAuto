--DDL CORRECTO PARA LA BASE DE DATOS

create database ProMec_Auto;
use ProMec_Auto;

create table Cliente(
    Id_Cliente int not null,
    Nombre varchar (100) not null,
    Apellido varchar (100) not null,
    Direccion varchar (200) not null,
    Telefono varchar (15) not null,
    Correo varchar (150) not null,
    Primary key (Id_Cliente)
);

create table Auto(
    Id_Auto int not null,
    Id_Cliente int not null,
    Numero_Serie varchar (50) not null,
    Placas varchar (40) not null,
    Marca varchar (100),
    Modelo varchar (100),
    Propietario varchar (100) not null,
    Kilometros int not null,
    Primary key (Id_Auto),
    Foreign key (Id_Cliente) references Cliente (Id_Cliente)
);

create table Servicios(
    Descripcion varchar (200) not null,
    Monto decimal (8, 2) not null,
    Id_OrdServ int not null,
    Fecha date not null,
    Estatus varchar (50) not null,
    Placas varchar(40) not null,
    Primary key (Id_OrdServ),
    Foreign key (Placas) references Auto (Id_Auto);
);
 
create table Facturacion(
    nombre varchar(150) not null,
    apellido varchar(150) not null,
    producto varchar(150) not null,
    descripcion varchar(250) not null,
    cantidad int not null,
    Id_Factura int not null,
    fecha Date not null,
    monto decimal (8, 2) not null,
    correo varchar(100) not null,
    Estatus varchar (20) not null,
    Primary key (Id_Factura)
);

create table Pagos(
    id_Transac int not null,
    Fecha Date not null,
    Monto Decimal (8, 2) not null,
    tipo varchar(65),
    Primary key (id_Transac)
    Foreign key (id_Transac) references Facturacion(Id_Factura)
);

create table Productos(
   nombre varchar(100) not null,
   cantidad int not null,
   id_Prod int not null,
   Monto Decimal (8, 2) not null,
   Primary key (id_Prod)
);








