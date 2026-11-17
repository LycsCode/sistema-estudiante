# Sistema de Gestión de Estudiantes

Aplicación web desarrollada con **Laravel** y **PHP**, que permite administrar la información de los estudiantes mediante una base de datos MySQL.

## Descripción del proyecto

Este proyecto consiste en un sistema de gestión de estudiantes que permite realizar operaciones CRUD (Crear, Leer, Actualizar y Eliminar) sobre los registros almacenados en la base de datos.

La información de los estudiantes se administra mediante la tabla `personal`.

## Tecnologías utilizadas

- PHP 8.2 o superior.
- Laravel 12.
- Composer.
- MySQL.
- XAMPP.
- HTML, CSS y Blade.

## Requisitos previos

Antes de instalar el proyecto, es necesario tener:

- PHP 8.2 o superior.
- Composer instalado.
- MySQL.
- XAMPP o un entorno equivalente.
- Git.

## Instalación del proyecto

### 1. Clonar el repositorio

Abrir una terminal y ejecutar:

```bash
git clone https://github.com/LycsCode/sistema-estudiante.git
```

### 2. Ingresar a la carpeta de Laravel

```bash
cd sistema-estudiante/example-app
```

### 3. Instalar las dependencias

```bash
composer install
```

### 4. Configurar el archivo de entorno

Crear el archivo `.env` a partir del ejemplo:

En Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

En el archivo `.env`, configurar la conexión a MySQL según el entorno local:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=registro_estudiantes
DB_USERNAME=root
DB_PASSWORD=
```

**Importante:** Crear previamente la base de datos `registro_estudiantes` en MySQL. Si se utilizan otras credenciales, deben modificarse según la configuración local.

El archivo `.env` contiene información privada y no debe subirse a GitHub.

### 5. Generar la clave de Laravel

```bash
php artisan key:generate
```

### 6. Limpiar la configuración

```bash
php artisan config:clear
```

### 7. Ejecutar las migraciones

```bash
php artisan migrate
```

Este comando crea las tablas necesarias para el funcionamiento del proyecto, incluida la tabla `personal`, donde se almacenan los estudiantes.

### 8. Iniciar el servidor

```bash
php artisan serve
```

Abrir en el navegador la dirección que aparece en la terminal. Normalmente es:

```text
http://127.0.0.1:8000
```

## Estructura de la información de estudiantes

La tabla `personal` contiene los siguientes campos:

| Campo | Descripción |
|---|---|
| ID | Identificador del estudiante |
| Nombre | Nombre del estudiante |
| Correo | Correo electrónico |
| Asignatura | Asignatura correspondiente |

## Funcionalidades

- Registrar estudiantes.
- Consultar estudiantes registrados.
- Editar información de estudiantes.
- Eliminar estudiantes.

## Base de datos

El proyecto utiliza MySQL para almacenar la información.

La estructura de la tabla `personal` se genera mediante una migración de Laravel ubicada en:

```text
database/migrations/
```

No es necesario importar un archivo SQL para crear la estructura de la tabla.

Los datos de prueba o registros deben agregarse desde la aplicación o mediante el procedimiento correspondiente.

## Seguridad

- El archivo `.env` no se incluye en el repositorio.
- Las credenciales de la base de datos deben configurarse localmente.
- Los archivos SQL y respaldos de bases de datos no forman parte del repositorio.
- Cada persona