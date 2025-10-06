import java.io.*;
import java.util.*;

public class Intens_uso {
    public static void main(String[] args) throws Exception {

        String ruta = args[0];
        int n = (args.length > 1) ? Integer.parseInt(args[1]) : 3;

        List<String[]> datos = new ArrayList<>();

        BufferedReader br = new BufferedReader(new FileReader(ruta));
        br.readLine();
        String linea;
        while ((linea = br.readLine()) != null) {
            String[] partes = linea.split(";");
            if (partes.length >= 3) {
                try {
                    double valor = Double.parseDouble(partes[2].replace(",", "."));
                    datos.add(new String[]{partes[0], String.valueOf(valor), partes[1]});
                } catch (NumberFormatException e) {
                    
                }
            }
        }
        br.close();

        datos.sort((a, b) -> Double.compare(Double.parseDouble(b[1]), Double.parseDouble(a[1])));

        for (int i = 0; i < Math.min(n, datos.size()); i++) {
            System.out.println("Territorio: " + datos.get(i)[0]);
            System.out.println("Valor: " + datos.get(i)[1]);
            System.out.println("Código: " + datos.get(i)[2]);
            System.out.println("---------------------");
        }
    }
}
