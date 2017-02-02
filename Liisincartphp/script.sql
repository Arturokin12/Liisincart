create database liisincart;
use liisincart;

create table usuario(
	id_usuario int auto_increment,
    Nombre varchar(100),
    correo varchar(200),
    pass varchar(100),
    telefono varchar(20),
    rol varchar(20),
    primary key(id_usuario)
);

select * from usuario;

create table producto(
	id_producto int auto_increment,
    Descripcion varchar(1000),
    Detalles varchar(1000),
    precio decimal, 
    tipo varchar(20),
    primary key(id_producto)
);

create table proveedor(
	id_proveedor int auto_increment,
    Nombre varchar(100),
    Mail varchar(100),
	primary key(id_proveedor)
);

create table calificacion(
	id_calificacion int auto_increment,
    nota decimal,
    comentario varchar(3000),
    id_producto int,
    id_usuario int,
    foreign key(id_producto) references producto(id_producto),
    foreign key(id_usuario) references usuario(id_usuario),
    primary key(id_calificacion)
);

create table imagen(
	id_imagen int auto_increment,
    ruta varchar(500),
    id_producto int,
    foreign key(id_producto) references producto(id_producto),
    primary key(id_imagen)
);

create table prod_proveedor(
	id_prod_proveedor int auto_increment,
    id_producto int,
    id_proveedor int,
    foreign key(id_producto) references producto(id_producto),
    foreign key(id_proveedor) references proveedor(id_proveedor),
    primary key(id_prod_proveedor)
);

create table categoría(
	id_category int auto_increment,
    nombre varchar(70),
    primary key (id_category)
);

create table Mail(
	id_mail int,
    mail varchar(100),
    pass varchar(200),
    primary key(id_mail)
);
