# Albuaves (versión corta)

Proyecto docente que demuestra:

- Una API REST mínima en PHP (`php/api.php`) que usa SQLite (`db/albuaves.db`).
- Un cliente Java (`java/SearchBirdsAPI.java`) que consume la API y muestra resultados.

Evidencia (capturas incluidas en `imgs/`):

- Llamada API en navegador: `imgs/Api_navegador.png`
 # Albuaves — README para entrega

Proyecto docente simple que muestra un flujo Cliente-Servidor.

Componentes incluidos:

- API REST en PHP (`php/api.php`) que consulta SQLite (`db/albuaves.db`).
- Cliente Java (`java/SearchBirdsAPI.java`) que consume la API y formatea salida.
- Scripts y SQL para crear y poblar la base de datos (`db/`).

Evidencia (colocar en `imgs/`):

- `imgs/Api_navegador.png`  (captura: API en navegador con JSON)
- `imgs/Java_terminal.png`  (captura: salida del cliente Java en terminal)

Software necesario (resumen):

- php, php-sqlite3
- sqlite3 o sqlitebrowser
- openjdk (javac, java)
 # Albuaves — README para entrega

Proyecto docente simple que muestra un flujo Cliente-Servidor.

Componentes incluidos:

- API REST en PHP (`php/api.php`) que consulta SQLite (`db/albuaves.db`).
- Cliente Java (`java/SearchBirdsAPI.java`) que consume la API y formatea salida.
- Scripts y SQL para crear y poblar la base de datos (`db/`).

Evidencia (colocar en `imgs/`):

- `imgs/Api_navegador.png`  (captura: API en navegador con JSON)
- `imgs/Java_terminal.png`  (captura: salida del cliente Java en terminal)

Software necesario (resumen):

- php, php-sqlite3
- sqlite3 o sqlitebrowser
- openjdk (javac, java)

Instalación rápida (Ubuntu/Debian):

```bash
sudo apt update
sudo apt install php php-sqlite3 sqlite3 sqlitebrowser openjdk-17-jdk
```

Preparar la base de datos:

Crear las tablas:

 # Albuaves — README para entrega

Proyecto docente simple que muestra un flujo Cliente-Servidor.

Componentes incluidos:

- API REST en PHP (`php/api.php`) que consulta SQLite (`db/albuaves.db`).
- Cliente Java (`java/SearchBirdsAPI.java`) que consume la API y formatea salida.
- Scripts y SQL para crear y poblar la base de datos (`db/`).

Evidencia (colocar en `imgs/`):

- `imgs/Api_navegador.png`  (captura: API en navegador con JSON)
- `imgs/Java_terminal.png`  (captura: salida del cliente Java en terminal)

Software necesario (resumen):

- php, php-sqlite3
- sqlite3 o sqlitebrowser
- openjdk (javac, java)

Instalación rápida (Ubuntu/Debian):

```bash
sudo apt update
sudo apt install php php-sqlite3 sqlite3 sqlitebrowser openjdk-17-jdk
```

Preparar la base de datos:

Crear las tablas:

 # Albuaves — README para entrega

Proyecto docente simple que muestra un flujo Cliente-Servidor.

Componentes incluidos:

- API REST en PHP (`php/api.php`) que consulta SQLite (`db/albuaves.db`).
- Cliente Java (`java/SearchBirdsAPI.java`) que consume la API y formatea salida.
- Scripts y SQL para crear y poblar la base de datos (`db/`).

Evidencia (colocar en `imgs/`):

- `imgs/Api_navegador.png`  (captura: API en navegador con JSON)
- `imgs/Java_terminal.png`  (captura: salida del cliente Java en terminal)

Software necesario (resumen):

- php, php-sqlite3
- sqlite3 o sqlitebrowser
- openjdk (javac, java)

Instalación rápida (Ubuntu/Debian):

```bash
sudo apt update
sudo apt install php php-sqlite3 sqlite3 sqlitebrowser openjdk-17-jdk
```

Preparar la base de datos:

Crear las tablas:

```bash
sqlite3 db/albuaves.db < db/albuaves-db-create.sql
```

Poblar con datos de ejemplo:

```bash
sqlite3 db/albuaves.db < db/albuaves-tables-population.sql
```

Arrancar la API (script incluido):

```bash
./run-api-server.sh
# El script arranca el servidor PHP en 127.0.0.1:9191
```

Arranque manual (alternativa):

```bash
cd php
php -S 127.0.0.1:9191
```

Pruebas rápidas:

- Todas las aves: http://127.0.0.1:9191/api.php
- Ave por id:  http://127.0.0.1:9191/api.php?bird_id=1

Con curl:

```bash
curl "http://127.0.0.1:9191/api.php"
curl "http://127.0.0.1:9191/api.php?bird_id=1"
```

Compilar y ejecutar el cliente Java:

```bash
cd java
./BuscadorAvesCompiler.sh
# o manualmente:
# javac -cp .:json-20250517.jar SearchBirdsAPI.java
# java -cp .:json-20250517.jar SearchBirdsAPI
```

Descripción breve de funcionamiento:

- La API responde JSON con la lista de aves o un objeto por `bird_id`.
- El cliente Java realiza GET a la URL y presenta la información en terminal.
- Se incluyen jars en `libs/` para parsing JSON si es necesario.

Archivos clave:

- `php/api.php`  — endpoint REST
- `run-api-server.sh`  — script de arranque
- `db/albuaves-db-create.sql`  — esquema
- `db/albuaves-tables-population.sql`  — datos de ejemplo
- `java/SearchBirdsAPI.java`  — cliente
- `java/BuscadorAvesCompiler.sh` — compila y ejecuta el cliente

Recomendaciones antes de entregar:

- Añade las dos capturas en `imgs/` con los nombres indicados.
- Asegúrate de que los scripts son ejecutables (`chmod +x`).
- Verifica que `db/albuaves.db` se crea correctamente.

Verificación mínima: la API responde 200 y el cliente Java imprime la lista.


