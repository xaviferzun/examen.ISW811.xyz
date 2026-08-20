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

# Examen Final, ejercicio práctico: HelpDesk Gestor de solicitudes de soporte
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

## Configuracion de la conexion con MariaDB

En el archivo `.env`, configurar las siguientes variables con los datos de tu base de datos: