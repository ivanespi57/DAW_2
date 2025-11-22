# Disponibilidad Valenbisi — Proyecto DAW (Proyecto1)

## 3.5 Documentación técnica

Esta documentación técnica acompaña al código fuente del proyecto `Proyecto1` y sirve como memoria para explicar el propósito, la arquitectura, el comportamiento y posibles mejoras futuras.

### Introducción

El propósito del proyecto es mostrar la disponibilidad en tiempo real de estaciones de Valenbisi (bicicletas públicas) cerca de la ubicación del usuario. Está enmarcado en la temática de movilidad sostenible, ya que ayuda a usuarios a localizar bicicletas y anclajes disponibles reduciendo el uso de vehículos privados y optimizando los desplazamientos urbanos.

### Arquitectura del proyecto

- Estructura de carpetas principal:
  - `index.html` — Página principal (interfaz de usuario).
  - `proyecto.html` — Página auxiliar sin contenido (plantilla).
  - `readme.md` — Documentación (este archivo).
  - `css/estilos.css` — Estilos CSS globales del proyecto.
  - `js/app.js` — Módulo de arranque y enlazado de eventos.
  - `js/controlador.js` — Lógica de negocio y comunicación con API.
  - `js/vista.js` — Renderizado del mapa y de la tabla de estaciones.

### Justificación del patrón Vista–Controlador:

Se ha empleado una separación clara entre la lógica (Controlador) y la presentación (Vista). `Controlador` se encarga de obtener datos, procesarlos y calcular distancias; `Vista` se ocupa únicamente de mostrar el mapa, los marcadores y la tabla. Esta separación facilita pruebas, mantenimiento y futuras ampliaciones (p. ej. cambiar la fuente de datos o añadir una API propia) sin mezclar responsabilidades.

### Breve descripción de cada fichero:

- `index.html`: carga los estilos (`css/estilos.css`) y las librerías externas de Leaflet. Incluye el contenedor del mapa (`#mapa`), controles (rango, botón de refrescar) y una tabla para listar estaciones.
- `css/estilos.css`: reglas de estilo responsivo, diseño del panel de controles, mapa y tabla.
- `js/app.js`: archivo módulo principal que instancia `Vista` y `Controlador`, enlaza eventos de la UI (control de número de estaciones y botón refrescar) y arranca la aplicación cuando el DOM está listo.
- `js/controlador.js`: obtiene la geolocalización del usuario, recupera los datos remotos de la API de Valenbisi en lotes, calcula distancias entre usuario y estaciones y selecciona las más cercanas.
- `js/vista.js`: inicializa Leaflet, gestiona marcadores y tabla, y muestra mensajes de error mínimos.

### Explicación detallada del código

1) `js/app.js` (arranque y eventos)

```javascript
import {Controlador} from './controlador.js';
import {Vista} from './vista.js';

const iniciarAplicacion = async () => {
  const vista = new Vista({mapId: 'mapa'});
  const controlador = new Controlador({vista});

  // Enlace de controles
  const rango = document.getElementById('num-estaciones');
  rango.addEventListener('input', () => {
    controlador.setMaxEstaciones(Number(rango.value));
  });

  await controlador.iniciarAplicacion();
};

window.addEventListener('DOMContentLoaded', iniciarAplicacion);
```

Comentario: `app.js` actúa como orquestador: crea las instancias y conecta la UI con el `Controlador`.

2) `js/controlador.js` (lógica y consumo de API)

- Principales responsabilidades:
  - Obtener geolocalización con `navigator.geolocation`.
  - Consultar la API pública en bloques (`limit=100`, `offset=...`) para recoger todas las estaciones.
  - Normalizar los campos relevantes (`id`, `direccion`, `bicicletas`, `anclajes_libres`, `lat`, `lon`, `actualizado`).
  - Calcular la distancia al usuario usando la fórmula de Haversine y ordenar por proximidad.

### Fragmento relevante (carga por lotes):

```javascript
const total = 300;
for (let offset = 0; offset < total; offset += 100) {
  const url = `${this.apiBase}?order_by=number&limit=100&offset=${offset}`;
  const res = await fetch(url);
  const data = await res.json();
  // mapear resultados a objetos usados internamente
}
```

Comentario: si la API cambia o el dataset tiene otro nombre, `this.apiBase` debe actualizarse; comprobar la URL es importante para evitar errores 404.

3) `js/vista.js` (renderizado con Leaflet)

- Inicializa el mapa con `L.map()` y añade la capa de OpenStreetMap.
- Añade un control de leyenda y un marcador de ubicación del usuario.
- Dibuja marcadores de estaciones con color según disponibilidad y actualiza la tabla HTML.

Ejemplo de creación de marcador:

```javascript
const marker = L.circleMarker([e.lat, e.lon], { radius:8, color }).addTo(this.mapa)
  .bindPopup(`<strong>${e.direccion}</strong><br>Bicis: ${e.bicicletas}`);
```

Comentario: `vista.js` asume que la librería Leaflet ya está cargada en el HTML (por eso `index.html` incluye el `<script>` de Leaflet antes de `js/app.js`).

### Interacción entre módulos

Diagrama simple de flujo (texto):

```
API Valenbisi (JSON)  --->  Controlador (fetch, normaliza datos, calcula distancias)  --->  Vista (muestra mapa, marcadores, tabla)  --->  DOM/Usuario
                 ↑
                 | (geolocalización del navegador)
```

Descripción: cuando el `Controlador` obtiene datos de la API y la posición del usuario, calcula las estaciones más cercanas y pasa ese subconjunto a la `Vista` para su representación. La `Vista` actualiza el DOM y los elementos de Leaflet.

### Conclusiones

Trabajo realizado: se ha implementado un prototipo funcional que combina consumo de datos abiertos y visualización geográfica con Leaflet. Facilita al usuario localizar estaciones cercanas y conocer su disponibilidad en tiempo real.

Dificultades encontradas: comunicación con APIs externas (nombres de dataset/endpoint y límites de paginación), y manejo de permisos de geolocalización en navegadores.

Recomendación final: antes de desplegar, validar la URL del dataset (parámetro `apiBase` en `js/controlador.js`) y probar desde un servidor local (p. ej. `python -m http.server 8000`) para evitar problemas de CORS/seguridad al abrir los archivos desde `file://`.
