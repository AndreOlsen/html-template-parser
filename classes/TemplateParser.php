<?php
class TemplateParser {

    protected $outputFile;

    public function templateParser($templateFile = "default_template.html") {
        (file_exists($templateFile)) ? $this->outputFile = file_get_contents($templateFile) : die("Fejl: Template fil " . $templateFile . " ikke fundet.");
    }

    public function parseTemplate($tags = []) {
        if (count($tags) > 0) {
            foreach($tags as $tag => $data) {
                $data = (file_exists($data)) ? $this->parseFile($data) : $data;
                $this->outputFile = str_replace('{'.$tag.'}', $data, $this->outputFile);
            }
        } else {
            die("Fejl: Tags ikke givet til udskiftning.");
        }
    }

    private function parseFile($file) {
        ob_start();
        include($file);
        $content = ob_get_contents();
        ob_end_clean();
        return $content; 
    }

    public function display() {
        return $this->outputFile;
    }

}

?>