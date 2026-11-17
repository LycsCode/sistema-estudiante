# Sistema de Gestión de Estudiantes

Aplicación web desarrollada con **Laravel 12**, PHP y MySQL para administrar registros de estudiantes.

## Funcionalidades

- Registrar estudiantes.
- Consultar el listado de estudiantes.
- Editar sus datos.
- Eliminar registros.

La información se almacena en la tabla `personal`.

## Tecnologías

- PHP 8.2 o superior.
- Laravel 12.
- Composer.
- MySQL.
- XAMPP (o un entorno equivalente).
- Blade, HTML y CSS.

## Requisitos previos

Instalar PHP 8.2+, Composer, MySQL y Git. Si se utiliza XAMPP, iniciar el servicio MySQL antes de ejecutar la aplicación.

## Instalación en Windows

Los comandos siguientes se ejecutan desde una terminal.

### 1. Descargar el repositorio

```bash
git clone https://github.com/LycsCode/sistema-estudiante.git
cd sistema-estudiante/example-app
```

### 2. Instalar dependencias de PHP

```bash
composer install
```

### 3. Crear el archivo de configuración

En PowerShell:

```powershell
Copy-Item .env.example .env
```

### 4. Crear la base de datos

Abrir phpMyAdmin o el cliente MySQL y crear una base de datos llamada `registro_estudiantes`.

En el archivo `.env`, verificar que la conexión esté configurada así. Ajustar usuario y contraseña si el entorno local utiliza otros datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=registro_estudiantes
DB_USERNAME=root
DB_PASSWORD=
```

No subir el archivo `.env` a GitHub: contiene configuración local y puede contener credenciales.

### 5. Generar la clave de la aplicación

```bash
php artisan key:generate
```

### 6. Crear las tablas

```bash
php artisan migrate
```

Las migraciones incluidas en `database/migrations` crean la estructura necesaria, incluida la tabla `personal`. No se necesita importar un archivo SQL para crear esa estructura. Este comando crea las tablas; no importa automáticamente los registros que existieran en otro computador.

### 7. Iniciar Laravel

```bash
php artisan serve
```

Abrir en el navegador la dirección que muestra la terminal. Normalmente es:

```
http://127.0.0.1:8000
```

## Estructura principal

- `example-app/`: aplicación Laravel.
- `example-app/app/Models/`: modelos.
- `example-app/app/Http/Controllers/`: controladores.
- `example-app/routes/web.php`: rutas web.
- `example-app/resources/views/`: vistas Blade.
- `example-app/database/migrations/`: migraciones de base de datos.
- `example-app/public/`: archivos públicos, como CSS e imágenes.

En la raíz también se conservan algunos archivos PHP de la versión anterior del proyecto. La aplicación Laravel que se debe ejecutar está dentro de `example-app`; esos archivos PHP de la raíz no son el punto de entrada de Laravel.

## Base de datos

La tabla `personal` contiene los campos utilizados por el sistema, entre ellos `ID`, `Nombre`, `Correo` y `Asignatura`. La definición exacta está en la migración del proyecto.

La migración crea la estructura, pero no recupera datos de una base de datos local anterior. Cada instalación debe configurar su propia base de datos.

## Seguridad

- No publicar archivos `.env`, contraseñas ni credenciales.
- No subir respaldos ni volcados de bases de datos con información personal.
- Mantener `.env.example` como plantilla sin credenciales privadas.
