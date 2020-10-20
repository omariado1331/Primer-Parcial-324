create table identificador(
ci varchar(10) primary key,
nombre varchar(30),
apP varchar(15),
apM varchar(15),
fnac date,
lugarnac varchar(4),
pass varchar(15)
);

INSERT INTO `identificador` (`ci`, `nombre`, `apP`, `apM`, `fnac`, `lugarnac`, `pass`) VALUES ('6957465', 'Omar Alejandro', 'Calle', 'Guachalla', '28/09/95', '01', 'Oacalle');
INSERT INTO academico.identificador (ci,nombre,apP,apM,fnac,lugarnac,pass) VALUES ('1234567', 'Vanessa', 'Vizcarra', 'Lima', '1996-10-24', '01', 'Vane123');


create table usuario(
ci varchar(10) primary key,
nombre varchar(20),
contraseña varchar(15),
color varchar(10)
);

INSERT INTO `usuario` (`ci`, `nombre`, `contraseña`) VALUES ('6957465', 'Omar Alejandro', 'Oacalle');
INSERT INTO academico3.usuario (ci,nombre,contraseña) VALUES ('9199600', 'Enrique Martin', 'Quique');
INSERT INTO `usuario` (`ci`, `nombre`, `contraseña`) VALUES ('1234567', 'Vanessa', 'Vane123'), ('9876543', 'Henry', 'Henry123');
INSERT INTO academico3.usuario (ci,nombre,contraseña,color) VALUES ('9199600', 'Enrique Martin', 'Quique','#2F4F4F');


create table notas(
	ci varchar(10),
	materia varchar(20),
	nota int
);

INSERT INTO notas (ci, materia, nota) VALUES ('2583697', 'INF-324', '100');


			SELECT count(case when i.lugarnac like '01' then n.nota end) 'La Paz',
							count(case when i.lugarnac like '02' then n.nota end) 'Cochabamba',
						 	count(case when i.lugarnac like '03' then n.nota end) 'Santa Cruz',
						 	count(case when i.lugarnac like '04' then n.nota end) 'Beni',
						 	count(case when i.lugarnac like '05' then n.nota  end) 'Oruro',
						 	count(case when i.lugarnac like '06' then n.nota  end) 'Potosi',
						 	count(case when i.lugarnac like '07' then n.nota  end) 'Tarija',
						 	count(case when i.lugarnac like '08' then n.nota  end) 'Chuquisaca',
						 	count(case when i.lugarnac like '09' then n.nota  end) 'Pando'
			FROM identificador as i, notas as n
			where i.ci like n.ci
			and n.nota > 50



	SELECT count(a.lugarnac) cantidad,(a.lugarnac),(case 
				when a.lugarnac like '01' then 'La Paz'
				when a.lugarnac like '02' then 'Cochabamba'
				when a.lugarnac like '03' then 'Santa Cruz'
				when a.lugarnac like '04' then 'Beni'
				when a.lugarnac like '05' then 'Oruro'
				when a.lugarnac like '06' then 'Potosi'
				when a.lugarnac like '07' then 'Tarija'
				when a.lugarnac like '08' then 'Chuquisaca'
				when a.lugarnac like '09' then 'Pando'
				end) Departamento
			FROM (SELECT ci,lugarnac
			FROM identificador) as a, notas as n
				where a.ci like n.ci
				and n.nota > 50
			GROUP by a.lugarnac