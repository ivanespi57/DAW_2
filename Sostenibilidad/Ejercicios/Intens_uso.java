import java.io.*;
import java.util.*;

public class Intens_uso {
    public static void main(String[] args) throws Exception {

        if (args.length < 2) {
            System.out.println("Uso: java Intens_uso <ruta_csv> <n>");
            return;
        }

        String ruta = args[0];
        int n = Integer.parseInt(args[1]);

        List<String[]> datos = new ArrayList<>();

        BufferedReader br = new BufferedReader(new InputStreamReader(new FileInputStream(ruta)));
        br.readLine(); // saltar cabecera
        String linea;

        while ((linea = br.readLine()) != null) {
            String[] partes = linea.split(";");
            if (partes.length >= 6) {
                String codigo = partes[2].trim();
                String territorio = partes[3].trim();
                String valorStr = partes[4].trim().replace(",", ".");

                if (!valorStr.equals("-") && !valorStr.isEmpty()) {
                    try {
                        double valor = Double.parseDouble(valorStr);
                        datos.add(new String[]{territorio, String.valueOf(valor), codigo});
                    } catch (NumberFormatException e) {
                        
                    }
                }
            }
        }
        br.close();

        datos.sort((a, b) -> Double.compare(Double.parseDouble(b[1]), Double.parseDouble(a[1])));

        // Mostrar los n primeros
        for (int i = 0; i < Math.min(n, datos.size()); i++) {
            System.out.println("Territorio: " + datos.get(i)[0]);
            System.out.println("Valor: " + datos.get(i)[1]);
            System.out.println("Código: " + datos.get(i)[2]);
            System.out.println("---------------------");
        }
    }
}
