create table administrador (
idAdministrador int auto_increment not null primary key,
nomeAdministrador varchar(255),
cpfAdministrador varchar(11) unique,
emailAdministrador varchar(255),
senhaAdministrador varchar(255)  default '12345',
ativo boolean default 1, 
telefoneAdministrador varchar(255),
dataCadastro timestamp

    );

    create table usuario (
idUsuario int auto_increment not null primary key,
nomeUsuario varchar(255),
cpfUsuario varchar(11) unique,
emailUsuario varchar(255),
senhaUsuario varchar(255)  default '12345',
ativo boolean default 1, 
telefoneUsuario varchar(255),
engenheiro boolean default 0,
numeroCrea varchar(20) default null,
dataCadastro timestamp

    );
CREATE TABLE prdoduto(
    idPrdoduto int auto_increment not null primary key,
   nomePrdoduto varchar(100) not null,
   imagemPrdoduto varchar(100) not null,
   ativo boolean default 1,
   codCorporativa int,
   unidade varchar (15) not null,

   


  
      
    
    
    
);
    create table empresa(
        idEmpresa int auto_increment not null primary key,
        nomeEmpresa varchar(50) not null,
        cnpjEmpresa varchar(50) unique not null,
        telefoneEmpresa varchar(30) not null,
        logoEmpresa varchar(50) not null, 
        ativa boolean default 1,
        usuario int,
        dataCadastro timestamp,
        foreign key(usuario) references usuario (idUsuario) ON update cascade on delete restrict
    );
    create table statusObra(
           idStatus int auto_increment not null primary key,
        nomeStatus varchar(50) not null,
        dataCadastro timestamp
    );



create table obra(
    idObra int auto_increment not null primary key,
    dataInicial date not null,
     dataProvavel date not null,
        dataEntrega date default null,
        entregue boolean default 0,
        empresa int,
        usuario int,
        statusObra int,
        observacoes longtext default null,
        dataCadastro timestamp,
        foreign key(usuario) references usuario (idUsuario) ON update cascade on delete restrict,
        foreign key(empresa) references empresa (idEmpresa) ON update cascade on delete restrict,
        foreign key(statusObra) references statusObra (idStatus) ON update cascade on delete restrict
        );

        create table imagemObra(
            idImagem int auto_increment not null primary key,
            imagem varchar(50) not null,
            obra int,
            dataCadastro timestamp,
            foreign key(obra) references obra (idObra) ON update cascade on delete restrict


        );


    