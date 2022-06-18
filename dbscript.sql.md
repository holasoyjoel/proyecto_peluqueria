# Archivo **dbscript.sql**

### Contiene los scripts para la creacion de la base de datos *'peluqueria'* y la creación de las siguientes tablas:

* ### Clientes
* ### Trabajos
* ### Peluqueros


---
## Base de datos **peluqueria**
-- ``script`` --
```
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `peluqueria` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `peluqueria`;
```


---
## Tabla **clientes**

### Contiene las siguientes columnas:

1. id
2. nombre
3. apellido
4. sexo
5. telefono
6. direccion

-- ``script`` --
```
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `telefono` varchar(50) NULL,
  `direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
```


---
## Tabla **peluqueros**

### Contiene las siguientes columnas:

1. id
2. nombre
3. apellido
4. sexo
5. telefono
6. direccion

-- ``script`` --
```
CREATE TABLE IF NOT EXISTS `peluqueros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

```


---
## Tabla **trabajos**

### Contiene las siguientes columnas:

1. id
2. idCliente
3. idPeluquero
4. titulo
5. descripcion
6. fechaTrabajo

-- ``script`` --
```
CREATE TABLE IF NOT EXISTS `trabajos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11)NOT NULL,
  `idPeluquero` int(11)NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `fechaTrabajo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
```