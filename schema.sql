/**
* Modelo  de base de datos para littlebox un sistema para compartir archivos
* @author evilnapsis
**/
create database littlebox;
use littlebox;

create table user(
	id int not null auto_increment primary key,
	name varchar(50) not null,
	lastname varchar(50) not null,
	username varchar(50),
	email varchar(255) not null unique,
	password varchar(60) not null,
	image varchar(255),
	is_active boolean not null default 1,
	is_admin boolean not null default 0,
	created_at datetime not null
);

# insert into user(name,lastname,email,password,is_active,is_admin,created_at) value ("Administrador", "","admin","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad",1,1,NOW());

create table file (
	id int not null auto_increment primary key,
	code varchar(12) not null,
	filename varchar(255) not null,
	description varchar(255) not null,
	is_public boolean not null default 0,
	is_folder boolean not null default 0,
	user_id int not null,
	folder_id int,
	created_at datetime not null,
	foreign key (folder_id) references file(id),
	foreign key (user_id) references user(id)
);

create table permision(
	id int not null auto_increment primary key,
	p_id int, /* identificador del tipo de permiso, lo utilizare despues */
	user_id int not null,
	file_id int not null,
	foreign key (file_id) references file(id),
	foreign key (user_id) references user(id),
	created_at datetime not null
);

create table comment(
	id int not null auto_increment primary key,
	comment text,
	user_id int not null,
	file_id int not null,
	comment_id int,
	foreign key (comment_id) references comment(id),
	foreign key (file_id) references file(id),
	foreign key (user_id) references user(id),
	created_at datetime not null
);
