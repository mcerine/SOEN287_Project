<?php

if(isset($_POST['submit'])){
    $xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\"?><record></record>");

    $xml->addChild('FirstName', $_POST['UFname']);
    $xml->addChild('LastName', $_POST['ULname']);
    $xml->addChild('Email', $_POST['Uemail']);
    $xml->addChild('PostalCode', $_POST['Upostcod']);
    $xml->addChild('Password', $_POST['Upw']);

    $asXML = $xml->asXML();
    $file = fopen("UsersListData.xml","w+");
    fwrite($file,$asXML);
    fclose($file); 
    print_r(error_get_last());

    if(file_exists('./UsersListData.xml'))
    {
        $myXML = file_get_contents('./UsersListData.xml');
        $xml = new SimpleXMLElement($myXML);
        $xmlpretty = $xml->asXML();
    }

}


?>