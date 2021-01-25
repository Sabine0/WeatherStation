import java.io.*;
import java.net.*;

/**
 * deze klasse luistert naar een poort en als er een klient is gaat die de data ontvangen. 
 *
 */

public class ServerV1_0 {
    public static void main(String[] args) {
        while (true) {
            try {
                // creating the server
                System.out.println("server started");
                ServerSocket ss = new ServerSocket(7789);
                System.out.println("server is waiting for client reqeut");
                // listening on the port
                Socket s = ss.accept();//establishes connection
                System.out.println("Client connected");
                DataInputStream dis = new DataInputStream(s.getInputStream());

                String str = (String) dis.readUTF();
                System.out.println("message= " + str);
                ss.close();
            } catch (Exception e) {
                System.out.println(e);
            }
        }
    }
}