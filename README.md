<table border="0">
  <tr>
    <td>
      <strong>Universidad Técnica Nacional</strong><br>
      ISW-811 Aplicaciones Web – Software Libre<br>
      <strong>Docente:</strong> Misael Matamoros Soto<br>
      <strong>Estudiante:</strong> Xavier Fernández Zúñiga
    </td>
    <td align="right">
      <img src="./UTN LOGO OFICIAL (Custom).png" width="100">
    </td>
  </tr>
</table>

# Examen final, ejercicio práctico: HelpDesk - Gestor de solicitudes de soporte

Permite registrar, listar, editar, eliminar y filtrar solicitudes basicas de soporte tecnico, cada una asociada a una categoria mediante una relacion uno a muchos.

## Requisitos

- PHP 8.2 o superior
- Composer
- MariaDB
- Node.js y npm (para compilar los assets)

## Instalacion de dependencias PHP

```bash
composer install
```

## Configuracion del archivo .env

Copiar el archivo de ejemplo y generar la key de la aplicacion:

```bash
cp .env.example .env
php artisan key:generate
```

## Configuracion de la conexion cn MariaDB

En el archivo `.env`, configurar las siguientes variables con los datos de tu base de datos:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=examen_isw811_xyz
DB_USERNAME=examenuser
DB_PASSWORD=secret


Antes de migrar, crear la base de datos y el usuario en MariaDB:

```sql
CREATE DATABASE examen_isw811_xyz;
CREATE USER 'examenuser'@'localhost' IDENTIFIED BY 'secret';
GRANT ALL PRIVILEGES ON examen_isw811_xyz.* TO 'examenuser'@'localhost';
FLUSH PRIVILEGES;
```

## Preparar la aplicacion

Instalar dependencias de Node y compilar los assets:

```bash
npm install
npm run build
```

## Migrar la base de datos y añadir las categorias iniciales

```bash
php artisan migrate --seed
```

Esto crea las tablas `categories` y `tickets`, y añade las categorias base: Hardware, Software, Redes y Accesos.

## Ejecutar la aplicacion

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Luego acceder desde el navegador a:

http://127.0.0.1:8000


## Funcionalidad

- Listado de solicitudes con categoria (via relacion Eloquent), estado y fecha
- Registro de solicitudes con validacion de campos obligatorios
- Edicion de solicitudes existentes
- Eliminacion de solicitudes
- Filtro de solicitudes por categoria o por estado

---

<sub>Documentado por Xavier Fernández Zúñiga - ISW-811</sub>