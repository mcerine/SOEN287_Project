<?php

if(isset($_POST['submit'])){
    $xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\"?><record></record>");

    $xml->addChild('Number', $_POST['orderNb']);
    $xml->addChild('Cost', $_POST['orderCost']);
    $xml->addChild('User', $_POST['orderUser']);
    $xml->addChild('Products', $_POST['orderProducts']);

    $asXML = $xml->asXML();
    $file = fopen("OrdersListData.xml","w+");
    fwrite($file,$asXML);
    fclose($file); 
    print_r(error_get_last());

    if(file_exists('./OrdersListData.xml'))
    {
        $myXML = file_get_contents('./OrdersListData.xml');
        $xml = new SimpleXMLElement($myXML);
        $xmlpretty = $xml->asXML();
    }

}


?>