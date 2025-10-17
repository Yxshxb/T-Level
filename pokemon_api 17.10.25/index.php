<?php

$url = "https://pokeapi.co/api/v2/pokemon/eevee";
$response = file_get_contents($url);
$data = json_decode($response, true);
$name = $data['name'];
$sprite = $data['sprites']['front_default'];


echo "Name: " . $name . "<br>";
echo "Sprite: <img src='" . $sprite . "' alt='" . $name . "'>";
?>
