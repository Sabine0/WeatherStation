import java.io.DataInputStream;
import java.io.File;
import java.io.FileWriter;
import java.net.Socket;
import java.util.logging.SocketHandler;

public class Handler implements Runnable {

    private Socket client;

    public Handler(Socket client){
        this.client = client;
    }

    @Override
    public void run() {

        try {
            //streams
            DataInputStream dis = new DataInputStream(client.getInputStream());
            String str = (String) dis.readUTF();
            File file = new File("WeatherData.xml"); //creates weatherdata file
            FileWriter fr = new FileWriter(file, true); // makes new filewriter
            fr.write(str); // writes to file
            System.out.println("message= " + str);
            // ss.close();
            client.close();
        } catch (Exception e) {
            System.out.println(e);
        }
    }
}
