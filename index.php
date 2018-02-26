<?php
//Require the template parser class
require_once(classes/TemplateParser.php);

//New template parser object
$tParser = new TemplateParser(templates/template.html);

//Provide data for the class
$tags = array(
    "title" => "",
    "nav" => "",
    "top-section" => "",
    "mid-section" => "",
    "bot-section" => "",
    "footer" => ""
);

//Parser template file
$tParser = parseTemplate($tags);

//Display page
echo $tParser->display();

?>