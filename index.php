<?php
//Require the template parser class
require_once("classes/TemplateParser.php");

//New template parser object
$tParser = new TemplateParser("templates/template.html");

$tParser->parse();

//Provide data for the class
$tags = array(
    "title" => "title",
    "header" => "header",
    "nav" => "nav",
    "top-section" => "top",
    "mid-section" => "mid",
    "bot-section" => "bot",
    "footer" => "footer"
);

//Parser template file
$tParser->parseTemplate($tags);

//Display page
echo $tParser->display();

?>