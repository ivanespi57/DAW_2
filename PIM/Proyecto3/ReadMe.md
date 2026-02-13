# Sistema de Chat Anónimo para Denuncias de Acoso

## Descripción del Proyecto

Este proyecto consiste en el desarrollo de una aplicación web de **chat anónimo para denuncias de acoso**, orientada a entornos educativos, laborales y digitales.

El sistema permite a cualquier usuario:

* Crear una conversación anónima protegida por contraseña.
* Obtener un código único generado automáticamente.
* Acceder posteriormente a su conversación usando código + contraseña.
* Enviar mensajes de texto sin necesidad de registro.
* Mantener el anonimato total.

Además, el sistema incluye:

* Panel de administración.
* Persistencia en base de datos MySQL.
* Integración de Inteligencia Artificial en Python.
* Despliegue completo mediante Docker.
* Arquitectura MVC.
* Control de versiones con Git.

---

## Objetivos

* Garantizar el anonimato de los denunciantes.
* Permitir seguimiento de denuncias sin revelar identidad.
* Detectar automáticamente spam o lenguaje ofensivo.
* Crear un entorno reproducible mediante Docker.
* Aplicar buenas prácticas de arquitectura y seguridad.

---

## Arquitectura del Sistema

El proyecto sigue una arquitectura **MVC (Modelo – Vista – Controlador)**.

```
frontend → interfaz de usuario
backend
   ├── models → acceso a base de datos
   ├── controllers → lógica de negocio
   ├── api → endpoint único (api.php)
python-ia → análisis de texto
sql → base de datos
docker → despliegue
```

### Frontend

* HTML5
* CSS3
* JavaScript (ES6)
* Fetch API (AJAX)

### Backend

* PHP 8
* PDO para acceso seguro a base de datos
* Arquitectura MVC
* Endpoint único (`api.php?action=...`)

### Base de Datos

* MySQL 8
* Relaciones con claves foráneas
* Contraseñas hasheadas

### Inteligencia Artificial

* Python 3
* Detección básica de:

  * Spam
  * Lenguaje ofensivo

### Contenedores

* Docker
* Docker Compose

---

## Diseño de Base de Datos

### Tabla: `conversations`

* id
* code (código único por timestamp)
* password_hash
* status
* created_at

### Tabla: `messages`

* id
* conversation_id
* message
* flagged_spam
* flagged_offensive
* created_at

### Tabla: `admins`

* id
* username
* password_hash

---

## Seguridad Implementada

* Contraseñas protegidas con `password_hash()`
* Verificación con `password_verify()`
* Consultas preparadas con PDO (prevención SQL Injection)
* Sanitización de mensajes (`htmlspecialchars`)
* No se almacenan IPs ni datos personales
* Generación de código único por timestamp + número aleatorio
* Validación de campos obligatorios
* Endpoint único controlado por switch

---

## Integración de Inteligencia Artificial

Se integran dos scripts en Python:

* `spam_detector.py`
* `language_filter.py`

El backend ejecuta los scripts mediante:

```
shell_exec()
```

Cada mensaje es analizado automáticamente antes de guardarse en la base de datos.

Si detecta:

* Spam → flagged_spam = 1
* Lenguaje ofensivo → flagged_offensive = 1

Esto facilita la revisión del administrador.

---

## Despliegue con Docker

### Requisitos

* Docker instalado
* Docker Compose instalado

### Ejecutar el proyecto

Desde la carpeta `/docker`:

```
docker compose up --build
```

### Acceso

Frontend:

```
http://localhost:8080/frontend
```

Base de datos:

* Host: db
* Usuario: root
* Password: root
* Base de datos: chat_denuncias

---

## Funcionalidades del Administrador

El panel de administración permite:

* Visualizar todas las conversaciones
* Ver estados de conversación
* Consultar códigos
* Revisar mensajes marcados por IA

(El login de administrador puede ampliarse con sesiones activas.)

---

## Casos de Uso

### Usuario Anónimo

1. Accede a la página principal.
2. Crea nueva conversación.
3. Recibe código único.
4. Envía mensajes.
5. Puede volver más tarde usando código + contraseña.

### Administrador

1. Accede al panel.
2. Visualiza conversaciones.
3. Revisa mensajes.
4. Gestiona estados.

---

## Estructura del Proyecto

```
chat-denuncias/
│
├── frontend/
├── backend/
│   ├── config/
│   ├── models/
│   ├── controllers/
│   └── api/
├── python-ia/
├── sql/
├── docker/
└── README.md
```

---

## Tecnologías Utilizadas

* HTML5
* CSS3
* JavaScript ES6
* PHP 8
* MySQL 8
* Python 3
* Docker
* Git

---

## Retos Encontrados

* Garantizar anonimato completo.
* Integrar Python dentro de un entorno Docker.
* Diseñar arquitectura MVC clara.
* Evitar vulnerabilidades SQL.
* Gestionar comunicación frontend-backend mediante Fetch.

---

## Posibles Mejoras Futuras

* Implementar autenticación real de administrador con sesiones.
* Subida de archivos adjuntos.
* Sistema de notificaciones.
* IA más avanzada con scikit-learn.
* WebSocket para chat en tiempo real.
* Panel de estadísticas.

---

## Conclusión

Este proyecto demuestra la integración de múltiples tecnologías para resolver un problema social real.

Se ha priorizado:

* Seguridad
* Anonimato
* Persistencia
* Arquitectura limpia
* Entorno reproducible

El sistema cumple los requisitos técnicos solicitados y puede ampliarse fácilmente en el futuro.

---

## Autor

Iván Espí Asins -
Grado Superior DAW -
Proyecto Interdisciplinar
