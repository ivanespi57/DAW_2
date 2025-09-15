import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.util.Scanner;

public class Intens_uso{
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        String line = "";

        if(args.length <= 0){
            System.out.println("");
        }else{
            try{
                
                File f = new File(args[0]);
                
                FileReader fr = new FileReader(f);
                BufferedReader br = new BufferedReader(fr);

                while ((line = br.readLine()) != null) {                
                    String[] datos = line.split(";");
                    
                    
                }
                br.close();
                fr.close();  

            }catch(Exception e){
                e.getMessage();
            }
        }
    }
}