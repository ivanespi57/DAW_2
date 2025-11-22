# Albuaves

**Autor/a:** Iván Espí Asins

Proyecto didáctico que ejemplifica un flujo Cliente–Servidor: una API REST
en PHP que sirve datos desde SQLite y un cliente Java de consola que consume
esa API para mostrar registros.

## Endpoints

- `GET /api.php` — lista todas las aves
- `GET /api.php?bird_id=<id>` — devuelve el ave con id indicado

## Requisitos mínimos

- `php` con `sqlite` (p. ej. `php-sqlite3`)
- `sqlite3`
- `openjdk` (javac, java)

## Instrucciones rápidas

1. Crear y poblar la base de datos:

```bash
sqlite3 db/albuaves.db < db/albuaves-db-create.sql
sqlite3 db/albuaves.db < db/albuaves-tables-population.sql
```

2. Iniciar la API (script incluido):

```bash
./run-api-server.sh
```

O alternativamente:

```bash
cd php
php -S 127.0.0.1:9191
```

3. Probar desde terminal o navegador:

```bash
curl "http://127.0.0.1:9191/api.php"
curl "http://127.0.0.1:9191/api.php?bird_id=1"
```

4. Ejecutar el cliente Java (desde `java/`):

```bash
./BuscadorAvesCompiler.sh
```

> Nota: si usas Linux/macOS, puedes necesitar `chmod +x run-api-server.sh java/BuscadorAvesCompiler.sh`.

## Scripts de puesta en marcha

- Servidor: `run-api-server.sh`
- Cliente: `java/BuscadorAvesCompiler.sh`

## Estructura

- `db/` — SQL y base de datos
- `php/` — `api.php`
- `java/` — cliente y scripts
- `imgs/` — capturas para la entrega
- `run-api-server.sh` — arranque del servidor

## Capturas

![Captura](imgs\Java_terminal.png)

![Captura](imgs\Api_navegador.png)

---