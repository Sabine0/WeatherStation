import org.w3c.dom.*;
import org.xml.sax.InputSource;

import org.w3c.dom.Document;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.transform.OutputKeys;
import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerException;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;
import java.io.File;
import java.io.FileOutputStream;
import java.io.FileWriter;
import java.io.StringReader;
import java.util.Date;
import java.util.Iterator;

public class Parser implements Runnable {

    @Override
    public void run() {

            try {

                while(true){
                    synchronized (MultiThreadedServer.xmlData) {

                        while (MultiThreadedServer.xmlData.size() > 0) {
                            String data = MultiThreadedServer.xmlData.get(0);
                            System.out.println(data);
                            if (data != null){

                               writeXmlDocumentToXmlFile(convertStringToXMLDocument(data), "/home/user1/WeatherShareClient/WeatherData.xml");
                            }
                            MultiThreadedServer.xmlData.remove(0);
                        }
                    }
                }

            } catch (Exception e) {
                System.out.println(e);
            }
        }


    private static void writeXmlDocumentToXmlFile(Document xmlDocument, String fileName)
    {
        TransformerFactory tf = TransformerFactory.newInstance();
        Transformer transformer;
        try {
            transformer = tf.newTransformer();

            //do not write XML declaration
            transformer.setOutputProperty(OutputKeys.OMIT_XML_DECLARATION, "yes");
            //transformer.setOutputProperty(OutputKeys.ENCODING, "UTF-8");
            transformer.setOutputProperty(OutputKeys.INDENT, "yes");
            transformer.setOutputProperty("{http://xml.apache.org/xslt}indent-amount", "4");
            //Write XML to file
            FileOutputStream outStream = new FileOutputStream(fileName, true);

            transformer.transform(new DOMSource(xmlDocument), new StreamResult(outStream));
        }
        catch (TransformerException e)
        {
            e.printStackTrace();
        }
        catch (Exception e)
        {
            e.printStackTrace();
        }
    }


    // convert a String into XMLDocument
    private static Document convertStringToXMLDocument(String XMLString) {
        DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
        DocumentBuilder builder;
        try {
            builder = factory.newDocumentBuilder();
            Document doc = builder.parse(new InputSource(new StringReader(XMLString)));
            return doc;
        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }

}
