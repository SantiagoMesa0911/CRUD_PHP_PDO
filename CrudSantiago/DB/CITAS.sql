CREATE TABLE `citas` (
	`Id` INT(11) NOT NULL AUTO_INCREMENT,
	`Fecha_cita` DATETIME NOT NULL,
	`Descripcion` TEXT(65535) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Nombre_cita` TEXT(65535) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`Conclusiones` TEXT(65535) NOT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`Id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=6