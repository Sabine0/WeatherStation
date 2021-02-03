import java.io.*;
import java.net.*;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.concurrent.Executor;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

/**
 * Deze klasse luistert naar een poort en als er een client is gaat die de request in een
 * aparte Thread behandelen. Om chache invalidation te vorkomen maakt de klasse gebruikt van een
 * volatile list. Omdat meerdere thread veranderingen aanbrigen aan de list wordt deze list
 * gesynchroniseerd. Zo wordt de list thread-safe gemaakt.
 * versie 1.2
 */

public class MultiThreadedServer{

    public static volatile List<String> xmlData = Collections.synchronizedList(new ArrayList<String>());


    public static void main(String[] args) {

        ExecutorService executor = Executors.newFixedThreadPool(800);


        ServerSocket ss;
        try {
            // creating the server
            System.out.println("server started");
            ss = new ServerSocket(7789);
            System.out.println("server is waiting for client request");
            // parser thread
            Thread parser = new Thread(new Parser());
            //parser.setPriority(10);
            parser.start();


            while (true) {
                try {

                    // establishes connection
                    Socket s = ss.accept();

                    executor.execute(new Handler(s));



                } catch (Exception e) {
                    System.out.println(e);
                }
            }
        } catch (Exception e) {
            System.out.println(e);
        }
    }

}
