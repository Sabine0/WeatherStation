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
/*
                DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
                DocumentBuilder builder = factory.newDocumentBuilder();
                Document doc = builder.newDocument();
                InputSource src = new InputSource();

                Element root = doc.createElement("users");
                doc.appendChild(root);
                Element measurement = doc.createElement("MEASUREMENT");
                root.appendChild(measurement);
                //write();
                //root.appendChild(createMeasurment(doc,123456,"2009-09-19", "15:59:46", -60.1, 0,1034.5,1007.6,123.7,10.8,11.28,11.1,010101,87.4,342));

                TransformerFactory transformerFactory = TransformerFactory.newInstance();
                Transformer transformer = transformerFactory.newTransformer();
                transformer.setOutputProperty(OutputKeys.OMIT_XML_DECLARATION, "yes");
                transformer.setOutputProperty(OutputKeys.ENCODING, "UTF-8");
                transformer.setOutputProperty(OutputKeys.INDENT, "yes");
                transformer.setOutputProperty("{http://xml.apache.org/xslt}indent-amount", "2");

                FileOutputStream outStream = new FileOutputStream("WeatherData.xml", true);

                transformer.transform(new DOMSource(doc), new StreamResult(outStream));

                //write();

*/
                while(true){
                    synchronized (MultiThreadedServer.xmlData) {

                        while (MultiThreadedServer.xmlData.size() > 0) {
                            String data = MultiThreadedServer.xmlData.get(0);
                            System.out.println(data);

                            //System.out.println(MultiThreadedServer.xmlData.size());
                            if (data != null){
                                //measurement.appendChild(convertStringToXMLDocument(data));
                               writeXmlDocumentToXmlFile(convertStringToXMLDocument(data), "WeatherData.xml");
                                //transf.transform(new DOMSource(doc), file);

                            }
                            MultiThreadedServer.xmlData.remove(0);
                        }
                    }
                }

            } catch (Exception e) {
                System.out.println(e);
            }
        }

        public void write(){
        try {
            while(true){
            synchronized (MultiThreadedServer.xmlData) {

                while (MultiThreadedServer.xmlData.size() > 0) {
                    String data = MultiThreadedServer.xmlData.get(0);
                    System.out.println(data);
                    convertStringToXMLDocument(data);
                    //System.out.println(MultiThreadedServer.xmlData.size());
                   /* if (data != null){
                        src.setCharacterStream(new StringReader(data));
                        doc = builder.parse(src);
                    }*/
                    MultiThreadedServer.xmlData.remove(0);
                }
                }
            }
        }catch (Exception e){
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

    private static Node createMeasurment(Document doc,
                                         int stn,
                                         String date,
                                         String time,
                                         float temp,
                                         float dewp,
                                         float stp,
                                         float slp,
                                         float visib,
                                         float wdsp,
                                         float prcp,
                                         float sndp,
                                         int frshtt,
                                         float cldc,
                                         int wnddir) {

        Element user = doc.createElement("MEASUREMENT");


        user.appendChild(createMeasurmentElement(doc, "STN", stn));
        user.appendChild(createMeasurmentElement(doc, "DATE", date));
        user.appendChild(createMeasurmentElement(doc, "TIME", time));
        user.appendChild(createMeasurmentElement(doc, "TEMP", temp));
        user.appendChild(createMeasurmentElement(doc, "DEWP", dewp));
        user.appendChild(createMeasurmentElement(doc, "STP", stp));
        user.appendChild(createMeasurmentElement(doc, "SLP", slp));
        user.appendChild(createMeasurmentElement(doc, "VISIB", visib));
        user.appendChild(createMeasurmentElement(doc, "WDSP", wdsp));
        user.appendChild(createMeasurmentElement(doc, "PRCP", prcp));
        user.appendChild(createMeasurmentElement(doc, "SNDP", sndp));
        user.appendChild(createMeasurmentElement(doc, "FRSHTT", frshtt));
        user.appendChild(createMeasurmentElement(doc, "CLDC", cldc));
        user.appendChild(createMeasurmentElement(doc, "WNDDIR", wnddir));


        return user;
    }

    private static Node createMeasurment(Document doc,
                                         int stn,
                                         String date,
                                         String time,
                                         double temp,
                                         double dewp,
                                         double stp,
                                         double slp,
                                         double visib,
                                         double wdsp,
                                         double prcp,
                                         double sndp,
                                         int frshtt,
                                         double cldc,
                                         int wnddir) {

        Element user = doc.createElement("MEASUREMENT");


        user.appendChild(createMeasurmentElement(doc, "STN", stn));
        user.appendChild(createMeasurmentElement(doc, "DATE", date));
        user.appendChild(createMeasurmentElement(doc, "TIME", time));
        user.appendChild(createMeasurmentElement(doc, "TEMP", temp));
        user.appendChild(createMeasurmentElement(doc, "DEWP", dewp));
        user.appendChild(createMeasurmentElement(doc, "STP", stp));
        user.appendChild(createMeasurmentElement(doc, "SLP", slp));
        user.appendChild(createMeasurmentElement(doc, "VISIB", visib));
        user.appendChild(createMeasurmentElement(doc, "WDSP", wdsp));
        user.appendChild(createMeasurmentElement(doc, "PRCP", prcp));
        user.appendChild(createMeasurmentElement(doc, "SNDP", sndp));
        user.appendChild(createMeasurmentElement(doc, "FRSHTT", frshtt));
        user.appendChild(createMeasurmentElement(doc, "CLDC", cldc));
        user.appendChild(createMeasurmentElement(doc, "WNDDIR", wnddir));


        return user;
    }

    private static Node createMeasurmentElement(Document doc, String name, String value) {

        Element node = doc.createElement(name);
        node.appendChild(doc.createTextNode(value));

        return node;
    }

    private static Node createMeasurmentElement(Document doc, String name, float value) {

        Element node = doc.createElement(name);
        node.appendChild(doc.createTextNode(String.valueOf(value)));

        return node;
    }

    private static Node createMeasurmentElement(Document doc, String name, int value) {

        Element node = doc.createElement(name);
        node.appendChild(doc.createTextNode(String.valueOf(value)));

        return node;

    }
    private static Node createMeasurmentElement(Document doc, String name, double value) {

        Element node = doc.createElement(name);
        node.appendChild(doc.createTextNode(String.valueOf(value)));

        return node;

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
