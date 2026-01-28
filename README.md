# Gestor de Hoteles - Schumacher Hotels

Sistema de gestión de reservas y hoteles desarrollado como proyecto para Desarrollo de Aplicaciones Web (DAW).

## Descripción

**Schumacher Hotels** Es una colección de hoteles basados en Michael Schumacher que cuenta con un sistema de gestión integral que permite a los clientes:
- Explorar y reservar habitaciones en diferentes hoteles
- Gestionar sus reservas
- Consultar información sobre los hoteles y sus servicios

Los administradores pueden:
- Gestionar usuarios y sus datos
- Gestionar hoteles y habitaciones
- Gestionar reservas y ver mensajes de contacto

## Tecnologías Utilizadas

### Backend
- **PHP** - Lenguaje de servidor
- **Doctrine ORM 2.16** - Mapeo objeto-relacional y gestión de entidades
- **PHP Dotenv** - Gestión de variables de entorno

### Base de Datos
- **MySQL** - Sistema de gestión de bases de datos relacional

### Frontend
- **HTML** - Estructura de páginas
- **CSS / SCSS** - Estilos y preprocesador
- **Bootstrap 5.3** - Framework CSS
- **JavaScript** - Interactividad del cliente y guardar datos de reserva

### Herramientas
- **Composer** - Gestor de dependencias de PHP
- **Git** - Control de versiones

## Estructura del Proyecto

```
├── webpages/          # Páginas principales de la aplicación
├── PHP/               # Backend
│   └── Clases/        # Clases ORM (Hotel, Usuario, Reserva, etc.)
├── JS/                # Scripts de JavaScript
├── scss/              # Estilos SCSS organizados por secciones
├── config/            # Configuración de la aplicación
├── includes/          # Componentes reutilizables (navbar, footer)
├── DB/                # Script de base de datos
└── vendor/            # Dependencias de Composer
```

## Páginas Principales

### Publicas (No requieren Login)

#### **index.php** - Página de Inicio
Página principal con:
- Hero section con imagen destacada y form para reserva
- Carrusel de experiencias y servicios
- Secciones: "Quiénes somos", "Restaurante", "Wellness", "Testimonios"
- Galería de habitaciones y servicios

#### **dashboard.php** - Hoteles
Panel principal de hoteles con:
- Lista de hoteles

#### **listaHabitaciones.php** - Categorias
Catálogo de habitaciones dependiendo de sus categorias:
- Filtrado por categoría
- Detalles de precios y características
- Modal de reserva
- Verificación de disponibilidad

#### **quienesSomos.php** - Quiénes Somos
Página informativa que presenta:
- Historia y misión del hotel
- Información sobre la empresa
- Valores y filosofía

#### **contacto.php** - Contacto
Página de contacto con:
- Formulario para enviar mensajes
- Información de ubicación y contacto
- Integración con base de datos de contactos

#### **inicioSesion.php** - Inicio de Sesión
Página de autenticación para:
- Usuarios registrados

#### **registro.php** - Registro
Formulario de registro para:
- Crear nuevas cuentas de usuario

### Privadas (Requieren Login)

#### **misReservas.php** - Mis Reservas
Gestión personal de reservas:
- Visualización de todas las reservas del usuario
- Ver detalles de cada reserva
- Opción de cancelar o editar reservas
- Historial de reservas

### Administrativas (Solo Administradores)

#### **gestionUsuarios.php** - Gestión de Usuarios
- Leer, actualizar y eliminar usuarios
- Ver reservas asociadas a cada usuario
- Edicion de reservas

#### **gestionHoteles.php** - Gestión de Hoteles
Administración de hoteles:
- Leer, Crear y editar información de hoteles
- Eliminar hoteles

#### **admin_contacto.php** - Gestión de Contactos
Gestión de mensajes de contacto:
- Ver mensajes recibidos
- Eliminar mensajes

## Componentes Clave

### Clases PHP (ORM)
Cada clase a su vez tiene su repositorio (menos Contacto)
- **Usuario** - Información de usuarios del sistema
- **Hotel** - Datos de hoteles
- **Categoria** - Categorías de habitaciones
- **Habitacion** - Detalles de habitaciones
- **Reserva** - Información de reservas
- **Contacto** - Mensajes de contacto

## Instalación y Configuración

### Windows

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/MarkelCorral1/Gestor-de-hoteles.git
   ```

2. **Instalar dependencias**
   ```bash
   composer install
   ```

3. **Configurar variables de entorno**
   - Crear archivo `.env` basado en `.env.example`
   - Configurar credenciales de base de datos y URL (si esta directamente en htdocs dentro de XAMPP la URL deberia ser `http://localhost//Gestor-de-hoteles`)

4. **Crear base de datos**
   - Ejecutar script `DB/db.sql` en MySQL

5. **Acceder a la aplicación**
   - Navegar a `http://localhost/DAW/Gestor-de-hoteles/webpages/`

### Linux (Debian 13)

1. **Crear maquina virtual**
- **Nombre**: hoteles-schumacher
- **ISO Image**: ubicacion de debian 13

El usuario y contraseña pueden cambiarse, pero habra que tenerlo en cuenta para el resto de apartados.
- **User Name**: superadmin
- **Contraseña**: superadmin

- **Memoria base**: >= 4GB
- **CPUs**: >= 4

- **Espacio disco**: >= 20GB

2. **Dar permisos sudo**

```bash
su -
# Actualizar sudo
apt update && apt install sudo -y
# Dar permisos de sudo a superadmin
usermod -aG sudo superadmin
```

3. **Instalar paquetes**
```bash
sudo apt install apache2 mariadb-server git unzip composer -y
sudo apt install php php-mysql php-xml php-mbstring php-curl php-zip php-intl php-gd -y
```
4. **Clonar aplicacion**
```bash
### Ubicacion de
cd /var/www/html/
sudo rm -rf *
sudo git clone http://localhost/DAW/Gestor-de-hoteles/webpages/
```
5. **Instalar librerias composer**
```bash
cd /var/www/html/Gestor-de-hoteles/
sudo composer require doctrine/orm:^2.16
sudo composer require symfony/cache
sudo composer require doctrine/annotations
sudo composer require vlucas/phpdotenv
```
6. **Crear .env**
```bash
sudo nano /var/www/html/Gestor-de-hoteles/.env
```
- Rellenar archivo con la siguiente informacion:
```
# Base de datos
DB_USER=superadmin
DB_PASSWORD=superadmin
DB_NAME=hoteles_schumacher
DB_HOST=127.0.0.1

# URL servidor
BSE_URL=
```

- Ajustar permisos
```bash
sudo chown -R www-data:www-data /var/www/html
sudo chmod -R 777 /var/www/html
```
7. **Creacion de la base de datos**
- Iniciar servicio
```bash
sudo systemctl start mariadb
sudo systemctl enable mariadb
```
- Creacion del usuario
```bash
sudo mariadb
# Crear usuario
CREATE USER 'superadmin'@'localhost' IDENTIFIED BY 'superadmin';
# Darle permisos
GRANT ALL PRIVILEGES ON *.* TO 'superadmin'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EXIT;
```
- Iniciar BD usando el archivo .sql
```bash
mysql -u superadmin -p < /var/www/html/Gestor-de-hoteles/DB/db.sql
```
8. **Crear certificado**
```bash
sudo mkdir /etc/apache2/ssl

sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout
etc/apache2/ssl/hoteles.key -out /etc/apache2/ssl/hoteles.crt
```
9. **Configuracion Apache con HTTPS**
```bash
sudo nano /etc/apache2/sites-available/hoteles-schumacher.conf
```
- Editar archivo tal que asi:
```bash
<VirtualHost *:80>
    ServerName hoteles-schumacher
    # Redirigir tráfico HTTP a HTTPS
    Redirect permanent / https://hoteles-schumacher/
</VirtualHost>
<VirtualHost *:443>
    ServerName hoteles-schumacher
    # Apunta a la carpeta GENERAL del proyecto
    DocumentRoot /var/www/html/Gestor-de-hoteles
    # Apunta al index
    DirectoryIndex webpages/index.php index.php
    # Configuración SSL
    SSLEngine on
    SSLCertificateFile /etc/apache2/ssl/hoteles.crt
    SSLCertificateKeyFile /etc/apache2/ssl/hoteles.key
    <Directory /var/www/html/Gestor-de-hoteles>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```
- Configuracion SSL final
```bash
# Activar modulos necesarios
sudo a2enmod ssl
sudo a2enmod rewrite

# Desactivar sitios por defecto
sudo a2dissite 000-default.conf
sudo a2dissite default-ssl.conf

# Activar tu sitio
sudo a2ensite hoteles-schumacher.conf

# Verificar que no haya errores de escritura
sudo apache2ctl configtest

# Reiniciar servicio
sudo systemctl restart apache2
```
10. **Pruebas**
- Probar entrando a:
`https://localhost` o `https://hoteles-schumacher`