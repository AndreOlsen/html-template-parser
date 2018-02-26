<?php
class TemplateParser {

    //Output variable
    var $outputFile;

    public function __construct($templateFile) {
        $this->file = $templateFile;
    }

    //Check if file exists and then get document content into a string
    public function parse() {
        (file_exists($this->file)) ? $this->outputFile = file_get_contents($this->file) : die("Fejl: Template fil " . $this->file . " ikke fundet.");
    }

    //Parse template file
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

    //Display finished page
    public function display() {
        return $this->outputFile;
    }

}

?>