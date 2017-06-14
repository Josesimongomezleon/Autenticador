CREATE DATABASE basePrueba;

CREATE TABLE Usuarios(

	id int(11) NOT NULL auto_increment,
	username varchar(20),
	password varchar(10),
	PRIMARY KEY(id)
)DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE Table Historial(

	id  int(11) NOT NULL auto_increment,
	Usuarios_id int(11) DEFAULT 0,
	Hora_inicio datetime NOT NULL DEFAULT NOW(),
	Hora_fin datetime NOT NULL DEFAULT NOW(),
	PRIMARY KEY (id)

)
CREATE Table if not exists Servicios(

	id  int(11) NOT NULL auto_increment,
	Usuarios_id int(11) DEFAULT 0,
	nombre varchar(20),
	url varchar(30),
	password varchar(20),
	PRIMARY KEY (id)
)

INSERT INTO Usuarios (username, password) VALUES ('Invitado', '1234');
INSERT INTO Usuarios (username, password) VALUES ('David', 'SORD940813');

insert into Historial(Usuarios_id)VALUES(2);
delete from Historial where Usuarios_id=2;

INSERT INTO Servicios (Usuarios_id, nombre, url, password) VALUES (2,"jose","www.google.com","hola");




