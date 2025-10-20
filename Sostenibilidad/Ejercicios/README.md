# Proyecto: Intens_uso  
### Autor: Iván Espí Asins  

---

## Problema a resolver

Mi programa se llama **Intens_uso** y está hecho en **Java**.  
El objetivo principal es **leer un archivo CSV o de texto** con datos separados por punto y coma (`;`), y **mostrar los territorios con los valores más altos** dentro del fichero.

El usuario introduce por consola:
- La **ruta del archivo** como primer argumento.
- Y opcionalmente, el **número de resultados** que quiere ver (por defecto son 3).

Así, el programa **ordena los datos de mayor a menor** y muestra los territorios con sus valores y códigos.  
En resumen, sirve para **analizar información numérica de forma rápida**, sin usar hojas de cálculo.

---

## Tecnologías utilizadas

El proyecto está desarrollado en **Java SE**, utilizando herramientas básicas del lenguaje:

- **Lectura de archivos** con `BufferedReader` y `FileReader`.
- **Estructuras de datos dinámicas** como `ArrayList`.
- **Gestión de excepciones** con `try-catch` para evitar errores de formato.

Esto lo hace un programa **simple, eficiente y fácil de mantener**.

---

## Funcionamiento del código

1. El programa recibe los argumentos desde la línea de comandos.  
2. Abre el fichero indicado y salta la primera línea (la cabecera).  
3. Divide cada línea por el carácter `;` y extrae tres datos:
   - El **nombre del territorio**  
   - El **valor numérico**  
   - Y el **código del territorio**
4. Convierte los valores a número, guarda todo en una lista y luego **ordena los resultados** de mayor a menor.  
5. Finalmente, **muestra por pantalla los n primeros registros**, con formato claro y separado por líneas.

📘 **Ejemplo de ejecución:**
```bash
java Intens_uso datos.csv 5
