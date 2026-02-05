
#  Diseño de Interfaces – Grid y Flexbox

Este documento resume los conceptos clave sobre **CSS Grid Layout** que pueden aparecer en el examen de Diseño de Interfaces.

---

## 🔹 Diferencia entre Grid Layout y Flexbox

### Grid Layout
- Sistema de maquetación **bidimensional**
- Trabaja con **filas y columnas**
- Ideal para el **layout general** de una página

### Flexbox
- Sistema de maquetación **unidimensional**
- Trabaja solo en **una dirección** (fila o columna)
- Ideal para **componentes pequeños** (menús, cards, botones)

### Similitudes
- Ambos sirven para **maquetar interfaces**
- Permiten **alinear elementos**
- Son **responsive**

---

## 🔹 Plantilla de diseño con Grid

### Usando `grid-template-rows` y `grid-template-columns`

```css
.container {
  display: grid;
  grid-template-rows: 100px 1fr 80px;
  grid-template-columns: 200px 1fr;
}
````

---

### Usando la propiedad abreviada `grid`

```css
.container {
  display: grid;
  grid: 100px 1fr 80px / 200px 1fr;
}
```

📌 **Formato:**

```
grid: filas / columnas
```

---

##  Espacio entre columnas en un Grid

Agregar **1em de espacio entre columnas** en un contenedor grid llamado `#gallery`:

```css
#gallery {
  column-gap: 1em;
}
```

También es válido:

```css
#gallery {
  gap: 1em;
}
``` 

---

##  Alineación en Grid

### `justify-self`

* Alinea **un solo elemento**
* En el **eje horizontal**

```css
.item {
  justify-self: end;
}
```

---

### `align-items`

* Alinea **todos los elementos del contenedor**
* En el **eje vertical**

```css
.container {
  align-items: center;
}
```

---

### `justify-items`

* Alinea **todos los elementos del contenedor**
* En el **eje horizontal**

```css
.container {
  justify-items: center;
}
```

---

##  Resumen rápido

* `justify` → eje horizontal
* `align` → eje vertical
* `items` → todos los elementos
* `self` → un solo elemento

---


## Respuestas examen

### 1 -

Las diferencias clave entre Grid Layout y Flexbox son que con Grid Layout, como su nombre indica es perfecto para el diseño de la página en general, es decir, el Layout de la página; mientras que Flexbox es ideal para componentes pequeños como botones, menús, etc.
Otra de las principales diferencias es que Flexbox trabaja en un solo sentido, es decir, con filas o con columnas, al contrario de Grid Layout que trabaja con las dos a la vez.
Una similitud entre los dos es que nos permiten alinear elementos y que las dos se utilizan para maquetar interfaces.
---
### 2 - 

```css
.container {
    display: grid;
       grid-template-rows: 12em 1fr 100px;
    grid-template-columns: 300px 1fr 1fr;
}
.container {
    display: grid;
    grid: 12em 1fr 100px / 300px 1fr 1fr;
}
```
---
### 3 - 
La 1 es la D
```css
grid-row-start: 1;
grid-row-end: 3;
rid-column-start: 3;
grid-column-end: 7;
```

La 2 es la E - 
```css
grid-area: 2 / 2 / span 4 / 3;
```
La 3 es la C - 
```css
grid-area: bowie;
```
La 4 es la A -
```css
grid-row: -2 / -1;
grid-column: -2 / -1;
```

La 5 es la B -
```css
grid-row-start: george;
grid-row-end: ringo;
grid-column-start: paul;
grid-column-end: john;
```

---
### 4 - 
```css
#gallery {
  column-gap: 1em;
}
```
---
### 5 - 
2
4
3
1
5
