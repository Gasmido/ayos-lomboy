import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;

public class HelloWorldHTML {
    public static void main(String[] args) {
        String htmlContent = "<!DOCTYPE html>\n" +
                "<html lang=\"en\">\n" +
                "<head>\n" +
                "    <meta charset=\"UTF-8\">\n" +
                "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n" +
                "    <title>Hello World HTML</title>\n" +
                "</head>\n" +
                "<body>\n" +
                "    <h1>Hello, World!</h1>\n" +
                "</body>\n" +
                "</html>";

        try {
            FileWriter fileWriter = new FileWriter("hello_world.html");
            PrintWriter printWriter = new PrintWriter(fileWriter);
            printWriter.println(htmlContent);
            printWriter.close();
            System.out.println("HTML file generated successfully.");
        } catch (IOException e) {
            System.out.println("An error occurred while generating the HTML file: " + e.getMessage());
        }
    }
}
