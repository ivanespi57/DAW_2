import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;

public class plantilla {

    // Clase para guardar los datos de cada fila
    static class Municipio {
        String codigo;
        String territorio;
        double valor;

        Municipio(String codigo, String territorio, double valor) {
            this.codigo = codigo;
            this.territorio = territorio;
            this.valor = valor;
        }
    }

    public static void main(String[] args) {
        if (args.length < 1) {
            System.out.println("Uso: java ViviendasPorUso <ruta_csv> [n]");
            return;
        }

        String rutaCSV = args[0];
        int n = 3; // por defecto muestra 3 municipios
        if (args.length >= 2) {
            n = Integer.parseInt(args[1]);
        }

        ArrayList<Municipio> lista = new ArrayList<>();

        try (BufferedReader br = new BufferedReader(new FileReader(rutaCSV))) {
            String linea = br.readLine(); // leemos cabecera y la ignoramos
            while ((linea = br.readLine()) != null) {
                String[] datos = linea.split(",", -1);
                if (datos.length < 5) continue; // aseguramos que hay columnas suficientes

                String codigo = datos[0].trim();
                String territorio = datos[1].trim();
                String valorTexto = datos[4].trim();

                try {
                    double valor = Double.parseDouble(valorTexto.replace(",", "."));
                    lista.add(new Municipio(codigo, territorio, valor));
                } catch (NumberFormatException e) {
                    // si no es número, la saltamos
                }
            }
        } catch (IOException e) {
            System.out.println("Error al leer el archivo: " + e.getMessage());
            return;
        }

        // Ordenar de mayor a menor valor
        Collections.sort(lista, new Comparator<Municipio>() {
            public int compare(Municipio m1, Municipio m2) {
                return Double.compare(m2.valor, m1.valor);
            }
        });

        // Mostrar solo los primeros n
        for (int i = 0; i < n && i < lista.size(); i++) {
            Municipio m = lista.get(i);
            System.out.println("Territorio: " + m.territorio);
            System.out.println("Valor: " + m.valor);
            System.out.println("Código: " + m.codigo);
            System.out.println("-------------------------");
        }
    }
}
