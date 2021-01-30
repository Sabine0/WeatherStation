import java.io.*;
import java.net.*;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.Collections;
import java.util.concurrent.Executor;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

/**
 * Deze klasse luistert naar een poort en als er een client is gaat die de request in een
 * aparte Thread behandelen.
 * versie 1.2
 */

public class MultiThreadedServer {
    public static void main(String[] args) {

        ExecutorService executor = Executors.newFixedThreadPool(800);

        ServerSocket ss;
        try {
            // creating the server
            System.out.println("server started");
            ss = new ServerSocket(7789);
            System.out.println("server is waiting for client request");

            while (true) {
                try {

                    // listening on the port
                    Socket s = ss.accept();// establishes connection

                    //Ctreating a thread
                    //Thread t = new Thread(new Handler(s));
                    //t.start();
                    executor.execute(new Handler(s));
                    System.out.println("Client connected");
                } catch (Exception e) {
                    System.out.println(e);
                }
            }
        } catch (Exception e) {
            System.out.println(e);
        }
    }
}