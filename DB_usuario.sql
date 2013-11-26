CREATE TABLE `usuario` (
	`user_id` INT(11) NOT NULL AUTO_INCREMENT,
	`apellido_materno` VARCHAR(50) NOT NULL COLLATE 'utf8_spanish_ci',
	`apellido_paterno` VARCHAR(50) NOT NULL COLLATE 'utf8_spanish_ci',
	`nombre` VARCHAR(50) NOT NULL COLLATE 'utf8_spanish_ci',
	PRIMARY KEY (`user_id`)
)