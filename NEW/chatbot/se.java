import freemarker.template.Configuration;
import freemarker.template.Template;
import java.io.File;
import java.io.FileWriter;
import java.util.HashMap;
import java.util.Map;

public class Main {
    public static void main(String[] args) {
        Configuration cfg = new Configuration(Configuration.VERSION_2_3_31);
        try {
            // Set the directory where templates are stored
            cfg.setDirectoryForTemplateLoading(new File("te/template.ftl"));
            
            // Load the template
            Template template = cfg.getTemplate("template.ftl");
            
            // Prepare the data model
            Map<String, Object> data = new HashMap<>();
            data.put("name", "World");
            
            // Process the template
            FileWriter fileWriter = new FileWriter("output.html");
            template.process(data, fileWriter);
            fileWriter.close();
            
            System.out.println("HTML file generated successfully.");
        } catch (Exception e) {
            System.out.println("An error occurred while generating the HTML file: " + e.getMessage());
        }
    }
}
