import org.w3c.dom.Element;
import org.xml.sax.InputSource;

import org.w3c.dom.Document;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import java.io.StringReader;
import java.util.Iterator;

public class Parser implements Runnable {

    @Override
    public void run() {
        try {
            DocumentBuilderFactory documentFactory = DocumentBuilderFactory.newInstance();

            DocumentBuilder documentBuilder = documentFactory.newDocumentBuilder();

            Document document = documentBuilder.newDocument();
            System.out.println("test");
            // root element
            Element root = document.createElement("weatherData");
            document.appendChild(root);
            /*while (MultiThreadedServer.xmlData !=null){
                if(MultiThreadedServer.xmlData.size() > 0){
                    String data = MultiThreadedServer.xmlData.get(0);
                    MultiThreadedServer.xmlData.remove(0);
                    System.out.println(MultiThreadedServer.xmlData.size());
                    if (data != null){
                        src.setCharacterStream(new StringReader(data));
                        doc = builder.parse(src);
                    }
                }
            }*/
            synchronized (MultiThreadedServer.xmlData){
                Iterator i = MultiThreadedServer.xmlData.iterator();
                while(i.hasNext()){
                    String data = (String) i.next();
                    System.out.println(MultiThreadedServer.xmlData.size());
                    if (data != null) {

                        i.remove();
                    }
                }
            }
        } catch (Exception e){
            System.out.println(e);
        }

    }
}
