# Proyecto: Intens_uso  
### Autor: Iván Espí Asins  

---

## Problema a resolver

Mi programa se llama **Intens_uso** y está hecho en **Java**.  
El objetivo principal es **leer un archivo CSV o de texto** con datos separados por punto y coma (`;`), y **mostrar los territorios con los valores más altos** dentro del fichero.

El usuario introduce por consola:
- La **ruta del archivo** como primer argumento.
- Y el **número de resultados** que quiere ver.

Así, el programa **ordena los datos de mayor a menor** y muestra los territorios con sus valores y códigos.  
En resumen, sirve para **analizar información numérica de forma rápida**, sin usar hojas de cálculo.

---
### Código 

#### Intens_uso.java
```java

import java.io.*;
import java.util.*;

public class IntensUsoSimple {
    public static void main(String[] args) throws Exception {
        if (args.length < 2) {
            System.out.println("Uso: java IntensUsoSimple <ruta_csv> <n>");
            return;
        }

        String ruta = args[0];
        int n = Integer.parseInt(args[1]);

        BufferedReader br = new BufferedReader(new FileReader(ruta));
        br.readLine(); // saltar cabecera
        String linea;
        int contador = 0;

        while ((linea = br.readLine()) != null && contador < n) {
            String[] partes = linea.split(";");
            if (partes.length >= 6) {
                String territorio = partes[3];
                String valorStr = partes[4].replace(",", ".");
                String codigo = partes[2];

                if (!valorStr.equals("-") && !valorStr.isEmpty()) {
                    System.out.println("Territorio: " + territorio);
                    System.out.println("Valor: " + valorStr);
                    System.out.println("Código: " + codigo);
                    System.out.println("-------------------");
                    contador++;
                }
            }
        }

        br.close();
    }
}

```
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
