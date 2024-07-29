<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# AREA DE USUARIOS V1

AREA DE USUARIOS V1 es una plataforma diseñada para proporcionar una experiencia integral de compras de cursos en línea. Este
proyecto está construido con el framework Laravel.

* Panel Administrativo
![image](https://github.com/user-attachments/assets/98c6d64c-9826-4a67-b623-a680afccfbd2)
* Generar Certificado con Cordenadas
![image](https://github.com/user-attachments/assets/ab248d70-af6f-4123-ad05-e62a3708ffde)
* Area de usuarios
![image](https://github.com/user-attachments/assets/c99cf55a-0d01-4612-a394-a9d11ee8d94b)
* Entre otras funciones



## Instalación

Sigue estos pasos para configurar y ejecutar el proyecto localmente:

1. **Renombra el archivo de configuración:**
    - Renombra el archivo `.env.example` a `.env` para iniciar la configuración:
        ```bash
        mv .env.example .env
        ```
        

2. **Instala las dependencias de PHP con Composer:**
    ```bash
    composer install
    ```

3. **Instala las dependencias de JavaScript con npm:**
    ```bash
    npm install
    ```

4. **Genera la clave de aplicación:**
    ```bash
    php artisan key:generate
    ```

5. **Configura la base de datos en el archivo .env:**
    - Crea una base de datos en tu sistema de gestión de bases de datos (por ejemplo, MySQL).
    - Actualiza las siguientes líneas en el archivo .env con los detalles de tu base de datos:
        ```dotenv
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=nombre_de_tu_base_de_datos
        DB_USERNAME=tu_usuario_de_base_de_datos
        DB_PASSWORD=tu_contraseña_de_base_de_datos
        ```



7. **Ejecuta las migraciones de la base de datos y los seeders:**
    ```bash
    php artisan migrate --seed
    ```

8. **Construye los assets para producción:**
    ```bash
    npm run production
    ```
