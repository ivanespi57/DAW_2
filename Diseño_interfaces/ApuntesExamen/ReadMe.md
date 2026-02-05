
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

