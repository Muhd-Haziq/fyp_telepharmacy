<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$jsonString = json_encode(
        array(
            array("id"=> 1, "qty" => 3),
            array("id"=> 2, "qty" => 2)
        )
);
echo $jsonString . "<br/>";

$json = json_decode($jsonString);

// Insert Each item
foreach ($json as $item) {
    print_r($item); 
    echo "<br/>";
    echo $item->{'id'} . "<br/>";   
    echo $item->{'qty'} . "<br/>";
}
