import java.io.*;
import java.net.*;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.Collections;

/**
 * deze klasse luistert naar een poort en als er een client is gaat die de data
 * ontvangen.
 *
 */

public class ServerV1_0 {
    public static void main(String[] args) {

        try {
            // creating the server
            System.out.println("server started");
            ServerSocket ss = new ServerSocket(7789);
            System.out.println("server is waiting for client reqeut");
            while (true) {
                // listening on the port
                Socket s = ss.accept();// establishes connection
                System.out.println("Client connected");
                DataInputStream dis = new DataInputStream(s.getInputStream());

                String str = (String) dis.readUTF();
                Path file = Paths.get("testfilename.xml");
                Files.write(file, Collections.singleton(str));
                System.out.println("message= " + str);
                // ss.close();
            }
        } catch (Exception e) {
            System.out.println(e);
        }

    }
}