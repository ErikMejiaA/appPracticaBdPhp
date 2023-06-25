CREATE DATABASE campus_estudiantes;
USE campus_estudiantes;

CREATE TABLE estudiantes (
    id_estudiante INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    edad INT NOT NULL,
    logros VARCHAR(60) NOT NULL,
    detalle VARCHAR(100) NOT NULL,
    CONSTRAINT PK_Estudiante PRIMARY KEY (id_estudiante)
);
