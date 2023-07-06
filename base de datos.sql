-- Creación de la tabla "vivienda"
CREATE TABLE vivienda (
  vivienda_id SERIAL PRIMARY KEY NOT NULL,
  vivienda_residente VARCHAR (100) NOT NULL,
  condominio_id INT NOT NULL,
  vivienda_situacion char (1) DEFAULT '1',
  FOREIGN KEY (condominio_id) REFERENCES condominio (condominio_id)
);

-- Creación de la tabla "visita"
CREATE TABLE visita (
  visita_id SERIAL PRIMARY KEY NOT NULL,
  visita_vivienda_id INT NOT NULL,
  visita_fecha DATE NOT NULL,
  visita_nombre VARCHAR(100) NOT NULL,
  visita_documento VARCHAR (100) NOT NULL,
  visita_hora_ingreso INTERVAL HOUR TO MINUTE NOT NULL,
  visita_hora_salida INTERVAL HOUR TO MINUTE NOT NULL,
  visita_situacion char (1) DEFAULT '1',
  FOREIGN KEY (visita_vivienda_id) REFERENCES vivienda (vivienda_id)
);

-- Creación de la tabla "condominio"
CREATE TABLE condominio (
  condominio_id serial PRIMARY KEY not null,
  condominio_nombre VARCHAR(100) not null,
  condominio_situacion char (1) DEFAULT '1'
);
