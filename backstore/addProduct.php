<?php

if(isset($_POST['submit'])){
    $xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\"?><record></record>");

    $xml->addChild('Product', $_POST['Pname']);
    $xml->addChild('Quanitity', $_POST['Pqty']);
    $xml->addChild('Price', $_POST['PPrice']);
    $xml->addChild('Aisle', $_POST['PAisle']);
    $xml->addChild('LimitedQuantity', $_POST['PLim']);
    $xml->addChild('Description', $_POST['PDescr']);
    $xml->addChild('Fat', $_POST['PFat']);
    $xml->addChild('Cholesterol', $_POST['PChol']);
    $xml->addChild('Sodium', $_POST['PSod']);
    $xml->addChild('Carbohydrates', $_POST['PCarbs']);
    $xml->addChild('Protein', $_POST['PProtein']);
    $xml->addChild('VitaminA', $_POST['PVitA']);
    $xml->addChild('VitaminB', $_POST['PVitB']);

    $asXML = $xml->asXML();
    $file = fopen("ProductsListData.xml","w+");
    fwrite($file,$asXML);
    fclose($file); 
    print_r(error_get_last());

    if(file_exists('./ProductsListData.xml'))
    {
        $myXML = file_get_contents('./ProductsListData.xml');
        $xml = new SimpleXMLElement($myXML);
        $xmlpretty = $xml->asXML();
    }

}


?>