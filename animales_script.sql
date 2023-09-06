
--- Tabla tipos de animales
CREATE TABLE tipos_animales (
    id serial PRIMARY KEY,
    nombre_tipo VARCHAR(50) NOT NULL
);

---- Tabla datos animales
CREATE TABLE animales (
    id serial PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    tipo_id INT REFERENCES tipos_animales(id),
    fecha_nacimiento DATE NOT NULL
);

-- Inserciones en tipos_animales
INSERT INTO tipos_animales (nombre_tipo) VALUES
    ('Perro'),
    ('Gato'),
    ('Conejo'),
    ('Pájaro'),
    ('Tortuga');
	
-- Inserciones en animales
INSERT INTO animales (nombre, tipo_id, fecha_nacimiento) VALUES
    ('Rex', 1, '2019-05-10'),
    ('Luna', 2, '2022-01-15'),
    ('Bugs', 3, '2020-11-20'),
    ('Tweety', 4, '2018-08-05'),
    ('Michelangelo', 5, '2017-04-03'),
    ('Whiskers', 2, '2021-06-30'),
    ('Max', 1, '2020-09-12'),
    ('Simba', 2, '2019-12-25'),
    ('Daisy', 3, '2023-03-08'),
    ('Charlie', 1, '2019-08-14'),
    ('Oliver', 4, '2022-10-19'),
    ('Coco', 3, '2022-07-01'),
    ('Pikachu', 4, '2017-11-02'),
    ('Spike', 5, '2018-02-28'),
    ('Nemo', 4, '2016-09-05');

-- Mas inserciones para animales
INSERT INTO animales (nombre, tipo_id, fecha_nacimiento) VALUES
    ('Rocky', 1, '2021-04-17'),
    ('Misty', 2, '2022-05-25'),
    ('Snowball', 3, '2021-09-08'),
    ('Blue', 4, '2021-12-03'),
    ('Chloe', 2, '2023-02-10'),
    ('Lucky', 1, '2022-11-28'),
    ('Oreo', 3, '2021-07-14'),
    ('Buddy', 1, '2021-03-19'),
    ('Nala', 2, '2023-06-02'),
    ('Whiskey', 4, '2022-08-11'),
    ('Shadow', 1, '2021-10-07'),
    ('Bella', 3, '2022-04-30'),
    ('Lola', 4, '2021-02-15'),
    ('Milo', 5, '2022-01-08'),
    ('Smokey', 3, '2021-06-23');


-- Query consulta conteo nacimiento 2020 >2
SELECT
    ta.nombre_tipo AS tipo_animal,
    COUNT(*) AS cantidad
FROM
    animales a
JOIN
    tipos_animales ta ON a.tipo_id = ta.id
WHERE
    a.fecha_nacimiento > '2020-01-01'
GROUP BY
    ta.nombre_tipo
HAVING
    COUNT(*) > 2;

