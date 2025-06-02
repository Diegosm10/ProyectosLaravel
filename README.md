# ProyectosLaravel

🛠️ Sistema de Gestión Vial
Este sistema permite la administración integral de máquinas viales, sus mantenimientos, obras de construcción y la asignación de máquinas a dichas obras. También incluye autenticación de usuarios mediante Laravel Breeze y funcionalidades avanzadas como reportes y exportación de datos.

✅ Funcionalidades Principales
  ABM de Máquinas

  ABM de Construcciones (Obras)

  ABM de Mantenimientos de máquinas

  ABM de Asignación de máquinas a obras

  Historial detallado por máquina:

    Obras en las que trabajó

    Mantenimientos realizados

    Filtros por fechas

  Exportación a PDF de un resumen mensual por provincia:

    Kilómetros recorridos

    Cantidad de mantenimientos realizados

    Obras activas

  Sistema de registro e inicio de sesión con Laravel Breeze

  Alerta automática por email cuando una máquina supera el límite de kilómetros sin mantenimiento

  Panel administrativo con acceso a todos los recursos del sistema

🚀 Requisitos
Antes de iniciar, asegúrate de tener instalado:

    PHP >= 8.1

    Composer

    Node.js y npm

    Laravel >= 10

    MySQL o cualquier base de datos compatible

    Laravel Breeze

⚙️ Instalación
Clonar el repositorio
    
    git clone https://github.com/tu_usuario/sistema-gestion-vial.git
    
    cd sistema-gestion-vial

Instalar dependencias de PHP
    
    composer install

Instalar dependencias de JavaScript
    
    npm install

Copiar archivo de entorno y configurar variables
    
    cp .env.example .env
    
  Luego edita el archivo .env para configurar la conexión a la base de datos y otros parámetros (nombre del sistema, mail, etc.).

Generar clave de la aplicación
    
    php artisan key:generate

Ejecutar migraciones y (opcionalmente) seeders
    
    php artisan migrate --seed

Compilar assets de frontend (Tailwind + JS)
Este paso es necesario ya que se utiliza Tailwind CSS y funciones JS ubicadas en resources/js

    npm run dev

👤 Sistema de autenticación
Este sistema utiliza Laravel Breeze como kit de autenticación. Permite:

    Registro de usuarios

    Inicio de sesión

    Edición de perfil

    Protección de rutas y secciones internas

📜 Historial por máquina
En la vista de detalle de cada máquina se puede consultar:

    Obra actual y anteriores donde estuvo asignada

    Historial completo de mantenimientos

    Filtro de datos por rango de fechas

📤 Exportación de reportes en PDF
Funcionalidad disponible para generar un informe mensual por provincia con:

    Total de kilómetros recorridos por máquinas

    Cantidad de mantenimientos realizados

    Obras activas y su ubicación

Los PDFs se pueden descargar desde el panel de obras con un solo clic.

✉️ Notificaciones de mantenimiento
Cuando una máquina supera el límite de kilómetros sin mantenimiento, el sistema envía una notificación automática por email al usuario administrador.

