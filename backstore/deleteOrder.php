<?php

    $doc = new DOMDocument; 
    $doc->load('OrdersListData.xml');

    $thedocument = $doc->documentElement;

    $list = $thedocument->getElementsByTagName('record');

    //figure out which ones you want -- assign it to a variable (ie: $nodeToRemove )
    $nodeToRemove = null;
    foreach ($list as $domElement){
    $attrValue = $domElement->getAttribute('Number');
    if ($attrValue == $_GET['dltOrder']) {
        $nodeToRemove = $domElement;
    }
    }

    //remove it
    if ($nodeToRemove != null)
    $thedocument->removeChild($nodeToRemove);
?>