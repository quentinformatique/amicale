create table type_annonce
(
    id  int auto_increment
        primary key,
    nom varchar(10) not null
);

create table users
(
    id         int auto_increment
        primary key,
    code_agent varchar(6)   not null,
    mail       varchar(255) not null,
    phone      varchar(10)  not null
);

create table annonces
(
    id          int auto_increment
        primary key,
    id_agent    int   not null,
    prix        float not null,
    description text  not null,
    titre       varchar(350) null,
    valide      tinyint(1) default 0 not null,
    type        int   not null,
    image       text  not null,
    date        date null,
    constraint id_agent
        foreign key (id_agent) references users (id),
    constraint type
        foreign key (type) references type_annonce (id)
);

