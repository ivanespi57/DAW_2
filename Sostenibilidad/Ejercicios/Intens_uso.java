import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.util.Scanner;

public class Intens_uso{
    class Municipio {
        String codigo;
        String territorio;
        Integer valor;

        public Municipio(String codigo, String territorio, Integer valor) {
            this.codigo = codigo;
            this.territorio = territorio;
            this.valor = valor;
        }
    }

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        String linea = "";

        if(args.length <= 0){
            System.out.println("");
        }else{
            try{
                
                File f = new File(args[0]);
                
                FileReader fr = new FileReader(f);
                BufferedReader br = new BufferedReader(fr);

                while ((linea = br.readLine()) != null) {                
                    
                    
                    String territorio = datos[3];
                    String valor = datos[4];
                    String cod;

                    
                }
                br.close();
                fr.close();  

            }catch(Exception e){
                e.getMessage();
            }
        }
    }
}