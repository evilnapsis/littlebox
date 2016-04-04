/**
* Modelo  de base de datos para littlebox un sistema para compartir archivos
* @author evilnapsis
**/
create database littlebox;
use littlebox;

create table user(
	id int not null auto_increment primary key,
	name varchar(50),
	lastname varchar(50),
	username varchar(50),
	email varchar(255) unique,
	password varchar(60),
	image varchar(255),
	is_active boolean default 1,
	is_admin boolean default 0,
	created_at datetime
);

# insert into user(name,lastname,email,password,is_active,is_admin,created_at) value ("Administrador", "","admin","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad",1,1,NOW());

create table file (
	id int not null auto_increment primary key,
	code varchar(12),
	filename varchar(255),
	description varchar(255),
	is_public boolean default 0,
	is_folder boolean default 0,
	user_id int,
	folder_id int,
	created_at datetime,
	foreign key (folder_id) references file(id),
	foreign key (user_id) references user(id)
);

create table permision(
	id int not null auto_increment primary key,
	p_id int, /* identificador del tipo de permiso, lo utilizare despues */
	user_id int,
	file_id int,
	foreign key (file_id) references file(id),
	foreign key (user_id) references user(id),
	created_at datetime
);

create table comment(
	id int not null auto_increment primary key,
	comment text,
	user_id int,
	file_id int,
	comment_id int,
	foreign key (comment_id) references comment(id),
	foreign key (file_id) references file(id),
	foreign key (user_id) references user(id),
	created_at datetime
);
