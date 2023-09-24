<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Backend Base App

Proyecto base con los componentes lógicos que debe tener toda aplicación de la organización FocusIT con la versión Php 8.2, asi como la versión de Laravel 10.15.0

## Requisitos

El repositorio cuenta con las siguientes tecnologías:

-   [Php 8.2](https://www.php.net/releases/8.2/en.php)
-   [Docker](https://www.docker.com/)
-   [Laravel 10](https://laravel.com/docs/10.x/installation)

## Scripts Disponibles

### Con Docker - `docker compose up -d`

Corre la aplicación en modo desarrollo instanciando una maquina virtual generada por docker.<br>
Abre [http://localhost:4000](http://localhost:4000) para visualizar en el navegador. (Aplica para probar las rutas y las respuestas generadas)

Tomar en cuenta que el proyecto laravel solo debe ser usado para crear RestApi, quizás se requiera alguna herramienta adicional como lo pueden ser:

-   [Insonmia](https://insomnia.rest/download)
-   [Postman](https://www.postman.com/)
