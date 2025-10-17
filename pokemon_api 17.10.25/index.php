<?php

$url = "https://pokeapi.co/api/v2/pokemon/eevee";
$response = file_get_contents($url);
$data = json_decode($response, true);
$name = $data['name'];
$sprite = $data['sprites']['front_default'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Pokemon Search</title>
</head>
<body>
  <h1>Search for a Pokémon</h1>
  <p>Enter a Pokémon name and submit to query the API via pokemon.php</p>

  <form action="pokemon.php" method="get">
    <label for="pokemon">Name:
      <input id="pokemon" name="pokemon" type="text" required>
    </label>
    <button type="submit">Search</button>
  </form>

</body>
</html>