<?php

    $doc = new DOMDocument; 
    $doc->load('ProductsListData.xml');

    $thedocument = $doc->documentElement;

    $list = $thedocument->getElementsByTagName('record');

    //figure out which ones you want -- assign it to a variable (ie: $nodeToRemove )
    $nodeToRemove = null;
    foreach ($list as $domElement){
    $attrValue = $domElement->getAttribute('Product');
    if ($attrValue == $_GET['dltProduct']) {
        $nodeToRemove = $domElement;
    }
    }

    //remove it
    if ($nodeToRemove != null)
    $thedocument->removeChild($nodeToRemove);
?>