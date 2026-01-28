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
sudo git clone https://github.com/MarkelCorral1/Gestor-de-hoteles.git
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
BSE_URL=https://hoteles-schumacher
```

- Ajustar permisos de la carpeta del servidor
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

## Funcionamiento

### Cuenta usuario

La cuenta de usuario se crea en la base de datos y se guarda como una cookie de PHP cuando inicias sesion.

#### Registro

En la pagina `registrarse.php`, al darle click al boton de registrarse:

1. Se comprueba que las 2 contraseñas son iguales
```js
let password1 = encodeURIComponent(inputPassword1.value);
let password2 = encodeURIComponent(inputPassword2.value);

if (password1 !== password2) {
   respuestaForm.innerHTML = 'Las contraseñas no coinciden.';
   ...     
```
2. Se realiza un fetch a `registrarse.php` (backend)
```js
 fetch('../PHP/registrarse.php', {
      method: 'POST',
      headers: {
            "Content-Type": "application/x-www-form-urlencoded"
      },
      body: `username=${username}&password=${password1}`
   })
   ...
```
3. Se comprueba que el usuario no existe
```php
$yaExiste = $entityManager->createQuery('SELECT u FROM usuario u WHERE u.username = :username')
   ->setParameter('username', $username)
   ->getResult();

   // Comprobar si el usuario ya existe
   if ($yaExiste) {
      echo json_encode(['estado' => 'error', 'mensaje' => 'Ya exieste un usuario con ese nombre.']);
      exit();
   }
```
4. Se crea el usuario
```php
$usuario = new Usuario();
$usuario->setUsername($username);
...
$entityManager->persist($usuario);
$entityManager->flush();
```
5. Se redirige a inicio sesion
```php
echo json_encode(['estado' => 'correcto', 'redireccion' => '../webpages/inicioSesion.php']);
```
```js
.then(data => {
   console.log(data);
   
   if (data.estado === 'error') {
      ...
   } else if (data.estado === 'correcto') {
      window.location.href = data.redireccion;
   }
```

#### Inicio sesion

En la pagina `inicioSesion.php`, al darle click al boton de iniciar sesion:

1. Se hace un fetch a `iniciarSesion.php`
```js
let username = encodeURIComponent(inputUsername.value);
let password = encodeURIComponent(inputPassword.value);

fetch('../PHP/iniciarSesion.php', {
   method: 'POST',
   headers: {
         "Content-Type": "application/x-www-form-urlencoded"
   },
   body: `username=${username}&password=${password}`
})
```
2. Se comprueba que el usuario existe
```php
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$usuario = $entityManager->createQuery('SELECT u FROM usuario u WHERE u.username = :username')
   ->setParameter('username', $username)
   ->getResult();


if (!$usuario) {
   echo json_encode(['estado' => 'error', 'mensaje' => 'Usuario no encontrado']);
   exit();
}
```
3. Se comprueba que la contraseña es correcta
```php
if (password_verify($password, $usuario[0]->getPassword_hash())) {
   ...
```
4. Se crea una cookie llamada usuario en PHP.
```php
setcookie("usuario", $usuario[0]->getUsername(), time() + 86400 * 30, "/");

```
5. Se redirige al usuario a `index.php`
```php
echo json_encode(['estado' => 'correcto', 'redireccion' => '../webpages/index.php']);
```
```js
if (data.estado === 'error') {
   ...
} else if (data.estado === 'correcto') {
   window.location.href = data.redireccion;
}
```

### Manejo de la cookie `usuario`

#### Paginas publicas
Dependiendo de la pagina, las personas sin iniciar sesion tendran acceso a ella:
- index.php
- dashboard.php
- listaHabitaciones.php
- quienesSomos.php
- inicioSesion.php
- registro.php

#### Paginas privadas
En la pagina de `misReservas.php`, se requiere de cuenta. Para evitar la entrada ha esta pagina si no se tiene cuenta, se comprueba que existe la cookie `usuario`.
```php
if (!isset($_COOKIE["usuario"])) {
    header('Location: index.php');
    exit();
}
```

##### navbar
Ademas, en `navbar.php` dentro de la carpeta includes, solo se muestra la pagina de `misReservas.php` si se tiene cuenta (ademas del php de `cerrarSesion.php`)
```php
<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow">
    <div class="container">
    ...
    <div class="collapse navbar-collapse" id="menu">
    <?php if (isset($_COOKIE["usuario"])): ?>
    ...
      <li><a class="dropdown-item" href="<?= PAGINAS_URL ?>/misReservas.php">Mis reservas</a></li>
      <li><a class="dropdown-item" href="<?= PHP_URL ?>/cerrarSesion.php">Cerrar sesion</a></li>
   ...
```

Si no se tiene la sesion iniciada, en el navbar se muestra la pagina de inicio sesion.
```php
<?php else: ?>
   ...
   <a class="nav-link" href="<?= PAGINAS_URL?>/inicioSesion.php">
   ...
<?php endif; ?>
```

#### Paginas de admin
Las paginas `gestionHoteles.php`, `gestionUsuarios.php`  y `admin_contacto.php` son solo para admins, por lo que al inicio de la pagina, se comprueba si el usuario es admin haciendo una consulta al ORM.
```php
$usuario = $entityManager->getRepository('Usuario')
   ->findBy(['tipo' => 'admin', 'username' => $_COOKIE["usuario"]]);

if (!$usuario) { // si no es admin
   header('Location: index.php');
   exit();
}
```

### Guardar datos de reserva (sessionStorage)

El sistema utiliza **sessionStorage** para guardar los datos de reserva del usuario durante la navegación dentro de la misma sesión del navegador. Esto permite que los datos se mantengan entre páginas sin necesidad de estar registrado.

#### Estructura de datos

Los datos de reserva se guardan en un objeto JSON con la siguiente estructura:
```js
{
   destino: '1',                    // ID del hotel
   fechaEntrada: '2026-02-04',      // YYYY-MM-DD
   fechaSalida: '2026-02-11',       // YYYY-MM-DD
   personas: 2                      // Número de personas
}
```

#### Inicialización - `reservaSesion.js`

Al cargar la página, si no existen datos previos en sessionStorage, se crean datos por defecto:

```js
if (!sessionStorage.getItem("datos-reserva")) {
   // Fechas por defecto: hoy + 7 días de entrada, + 14 días de salida
   let fechaEntrada = new Date()
   fechaEntrada.setDate(fechaEntrada.getDate() + 7)
   let fechaSalida = new Date(fechaEntrada)
   fechaSalida.setDate(fechaSalida.getDate() + 7)

   datosReserva = {
      destino: '1',
      fechaEntrada: fechaEntrada.toISOString().slice(0, 10),
      fechaSalida: fechaSalida.toISOString().slice(0, 10),
      personas: 1
   }

   sessionStorage.setItem("datos-reserva", JSON.stringify(datosReserva))
}
```

#### Formulario en index.php - `formReservaIndex.js`

En la página principal, el formulario de búsqueda se rellena automáticamente con los datos guardados al ser enviado:

```js
// Obtener datos de sessionStorage
let datosReserva = JSON.parse(sessionStorage.getItem("datos-reserva"))

// Rellenar campos si existen datos
if (sessionStorage.getItem("datos-reserva")) {
   let datos = JSON.parse(sessionStorage.getItem("datos-reserva"))
   inputDestino.value = datos.destino
   inputFechaEntrada.value = datos.fechaEntrada
   inputFechaSalida.value = datos.fechaSalida
   inputPersonas.value = datos.personas
}
```

Cuando el usuario envía el formulario, se actualizan los datos en sessionStorage y se redirige a la página de habitaciones:

```js
form.addEventListener('submit', (e) => {
   e.preventDefault()

   // Actualizar datos
   datosReserva.destino = inputDestino.value
   datosReserva.fechaEntrada = inputFechaEntrada.value
   datosReserva.fechaSalida = inputFechaSalida.value
   datosReserva.personas = inputPersonas.value

   // Guardar en sessionStorage
   sessionStorage.setItem("datos-reserva", JSON.stringify(datosReserva))

   // Redirigir a lista de habitaciones
   window.location.href = `webpages/listaHabitaciones.php?id_hotel=${datosReserva.destino}`
})
```

#### Modal de reserva - `modalReserva.js`

En el modal de reserva de habitaciones, los campos se rellenan automáticamente con los datos guardados:

```javascript
let datosReserva = JSON.parse(sessionStorage.getItem("datos-reserva"))

// Rellenar campos del modal
if (datosReserva) {
   inputFechaInicio.value = datosReserva.fechaEntrada
   inputFechaFinal.value = datosReserva.fechaSalida
   inputPersonas.value = datosReserva.personas
}
```

#### Validaciones de fechas

Ambos formularios implementan validaciones para asegurar que:
- La fecha de salida sea al menos 1 día después de la entrada
- La fecha mínima de entrada sea la actual
- Se actualizan automáticamente los atributos `min` y `max` al cambiar cualquier fecha

```js
function fechaSalidaMinima() {
   let fechaEntrada = new Date(inputFechaEntrada.value)
   fechaEntrada.setDate(fechaEntrada.getDate() + 1)
   inputFechaSalida.setAttribute("min", fechaEntrada.toISOString().slice(0, 10))
}

function fechaEntradaMaxima() {
   let fechaSalida = new Date(inputFechaSalida.value)
   fechaSalida.setDate(fechaSalida.getDate() - 1)
   inputFechaEntrada.setAttribute("max", fechaSalida.toISOString().slice(0, 10))
}
```