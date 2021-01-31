import java.io.*;
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
            BufferedReader input = new BufferedReader(new InputStreamReader(client.getInputStream()));

            String line;
            String currentdata = "";
            while((line = input.readLine()) !=null) {
                if(line.equals("	<MEASUREMENT>")){
                    currentdata = "";
                    currentdata = currentdata + line;
                } else if (line.equals("	</MEASUREMENT>")) {
                    currentdata = currentdata + line;
                    MultiThreadedServer.xmlData.add(currentdata);
                } else {
                    currentdata = currentdata +line;
                }
            }
            client.close();
        } catch (Exception e) {
            System.out.println(e);
        }
    }
}
