import java.io.*;
import java.util.*;

public class IntensUsoSimple {
    public static void main(String[] args) {
        if (args.length < 2) {
            System.out.println("Uso: java Intens_uso <ruta_csv> <n>");
            return;
        }

        String ruta = args[0];
        int n = Integer.parseInt(args[1]);

        try {
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
                        try {
                            double valor = Double.parseDouble(valorStr);
                            System.out.println("Territorio: " + territorio);
                            System.out.println("Valor: " + valor);
                            System.out.println("Código: " + codigo);
                            System.out.println("-------------------");
                            contador++;
                        } catch (NumberFormatException e) {
                            System.out.println("Valor inválido en línea: " + linea);
                        }
                    }
                }
            }

            br.close();
        } catch (IOException e) {
            System.out.println("Error al leer el archivo: " + e.getMessage());
        }
    }
}

