# Disponibilidad Valenbisi — Proyecto DIW (Versión con API real)


## Objetivo
Prototipo que usa datos abiertos en tiempo real desde la API de Valenbisi (https://valencia.opendatasoft.com) para mostrar las estaciones más cercanas según la ubicación del usuario.


## Estructura de carpetas
- /css/estilos.css — estilos responsive
- /js/app.js — arranque de la aplicación
- /js/controlador.js — conexión con API, lógica de negocio
- /js/vista.js — renderizado en mapa y tabla


## Cómo ejecutar
1. Abrir la carpeta en un servidor local (`python -m http.server 8000`).
2. Permitir la geolocalización.
3. Se mostrarán las estaciones más cercanas ordenadas por distancia.


## Notas
- La API se consulta en bloques de 100 registros para cubrir todas las estaciones (≈300).
- Leaflet se usa para el mapa.
- Código adaptado del archivo `valenbsis02.html`.