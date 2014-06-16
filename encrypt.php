<?php
include 'functions.php';

if($_REQUEST["text"] && $_REQUEST["key"])
{
    $text = $_REQUEST['text'];
    $key = $_REQUEST['key'];
    $textExploded = explode(" ", $text);   
    $trimmedKey = trim($key);
    $encryptedText = Encrypt($textExploded, $trimmedKey);    
    $encryptedTextString = implode(" ", $encryptedText);
    echo $encryptedTextString; //Returns an array of strings                    
}
?>
