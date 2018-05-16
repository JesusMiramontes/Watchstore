**Pasos para configuración**
1. Create db squema.
1. Run script:

**//INICIO DE SCRIPT**

USE `watchstore`; //*SUSTITUIR `watchstore` con el nombre de la base de datos creada.

CREATE TABLE \`users\` (
  \`id\` int(11) NOT NULL,
  \`username\` varchar(255) NOT NULL,
  \`email\` varchar(255) NOT NULL,
  \`password\` varchar(255) NOT NULL,
  \`activation_key\` varchar(255) NOT NULL,
  \`is_active\` enum('0','1') NOT NULL,
  \`date_time\` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE \`users\`
  ADD PRIMARY KEY (\`id\`);

ALTER TABLE \`users\`
  MODIFY \`id\` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
  
**//FIN DE SCRIPT**

 3.- Configurar los datos de conexion a la db en /scripts/connection_database.php lineas 13 a 16
 4.- 