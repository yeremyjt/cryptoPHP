<?php
include 'functions.php';

if($_REQUEST["text"] && $_REQUEST["key"])
{
    $text = $_REQUEST['text'];
    $key = $_REQUEST['key'];
    $textExploded = explode(" ", $text);
    $trimmedKey = trim($key);
    $decryptedText = Decrypt($textExploded, $trimmedKey);    
    $decryptedTextString = implode(" ", $decryptedText);
    echo $decryptedTextString; //Returns an array of strings                    
}
?>
