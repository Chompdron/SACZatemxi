CREATE TABLE Role(
	RoleID int AUTO_INCREMENT primary key not null,
	Nombre varchar(256) not null
);

CREATE TABLE Users (
	id int AUTO_INCREMENT primary key not null,
	username varchar(50) not null,
	password varchar(50) not null,
	auth_Key varchar(50) not null,
	accessToken varchar(50) not null
);

CREATE TABLE User_Role (
	id int AUTO_INCREMENT primary key not null,
	UserID int  not null,
	foreign key (UserID) references Users(id),
	RoleID int not null,
	foreign key (RoleID) references Role(RoleID)
);


CREATE TABLE Empleado(
	EmpleadoID int AUTO_INCREMENT primary key not null,
    HorasxSem float,
    PagoxHrs float,
	UserID int  not null,
	foreign key (UserID) references Users(id)
);


CREATE TABLE UnidadPresentacion (
    UnidadPresentacionID int AUTO_INCREMENT primary key NOT NULL,
    Nombre varchar(256)  NOT NULL,
    cantidadMlGInd float  NOT NULL
);

CREATE TABLE Insumo (
    InsumoID int AUTO_INCREMENT primary key NOT NULL,
    Descripcion varchar(256)  NOT NULL,
    UnidadPresentacionID int  NOT NULL,
    foreign key (UnidadPresentacionID ) references UnidadPresentacion(UnidadPresentacionID),
    Stock float  NOT NULL,
    PrecioXUnidad float  NOT NULL
);

CREATE TABLE Proveedor (
    ProveedorID int AUTO_INCREMENT primary key NOT NULL,
    NombreComercial varchar(256)  NOT NULL,
    RazonSocial varchar(256)  NOT NULL,
    RFC varchar(256)  NOT NULL,
    Telefono varchar(15)  NOT NULL,
    CorreoElectronico varchar(256)  NOT NULL,
    Direccion varchar(256)  NOT NULL
);

CREATE TABLE PedidoProv (
    PedidoProvID int AUTO_INCREMENT primary key NOT NULL,
    ProveedorID int  NOT NULL,
    foreign key (ProveedorID ) references Proveedor(ProveedorID) ,
    Fecha datetime  NOT NULL,
    Total float  NOT NULL
);

CREATE TABLE PedidoProvLista (
    PedidoProvListaID int AUTO_INCREMENT primary key NOT NULL,
    PedidoProvID int  NOT NULL,
    foreign key (PedidoProvID ) references PedidoProv(PedidoProvID),
    InsumoID int  NOT NULL,
    foreign key (InsumoID ) references Insumo(InsumoID),
    Cantidad float  NOT NULL,
    ImportePorPieza float  NOT NULL
);

CREATE TABLE Producto (
    ProductoID int AUTO_INCREMENT primary key NOT NULL,
    Nombre varchar(256)  NOT NULL,
    Cantidad float  NOT NULL,
    Precio float  NOT NULL,
    Stock int  NOT NULL
);

CREATE TABLE Receta (
    RecetaID int AUTO_INCREMENT primary key NOT NULL,
    ProductoID int  NOT NULL,
    foreign key (ProductoID ) references Producto(ProductoID),
    InsumoID int  NOT NULL,
    foreign key (InsumoID ) references Insumo(InsumoID),
    Cantidad float  NOT NULL
);

CREATE TABLE Pedido (
    PedidoID int AUTO_INCREMENT primary key NOT NULL,
    ProductoID int  NOT NULL,
    foreign key (ProductoID ) references Producto(ProductoID),
    UnidadXLote float  NOT NULL,
    FechaInicio datetime  NOT NULL,
    FechaFin datetime  NOT NULL,
    Status bit  NOT NULL,
    FechaStatusFin datetime  NOT NULL
);

CREATE TABLE Cliente (
    ClienteID int AUTO_INCREMENT primary key NOT NULL,
    NombreComercial varchar(256)  NOT NULL,
    RazonSocial varchar(256)  NOT NULL,
    RFC varchar(256)  NOT NULL,
    Direccion varchar(256)  NOT NULL,
    Telefono varchar(15)  NOT NULL,
    HorarioEntrega varchar(256)  NOT NULL
);


CREATE TABLE Venta (
    VentaID int AUTO_INCREMENT primary key NOT NULL,
    Fecha datetime  NOT NULL,
    Total float  NOT NULL,
    Descuento float  NULL,
    ClienteID int  NOT NULL,
    foreign key (ClienteID ) references Cliente(ClienteID)
);

CREATE TABLE VentaLista (
    DetVentaID int AUTO_INCREMENT primary key NOT NULL,
    VentaID int  NOT NULL,
    foreign key (VentaID ) references Venta(VentaID),
    ProductoID int  NOT NULL,
    foreign key (ProductoID ) references Producto(ProductoID),
    Cantidad int  NOT NULL,
    PrecioVenta float  NOT NULL
);

