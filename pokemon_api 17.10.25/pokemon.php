<?php

function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

function fetchJson($url){
    $resp = @file_get_contents($url);
    if ($resp === false) return null;
    $data = json_decode($resp, true);
    return is_array($data) ? $data : null;
}

$raw = isset($_GET['pokemon']) ? trim($_GET['pokemon']) : '';
if ($raw === '') {
    echo '<p>No Pokémon name provided. <a href="index.php">Back to search</a></p>';
    exit;
}

$name = strtolower($raw);
$apiName = urlencode($name);

$pokemonUrl = "https://pokeapi.co/api/v2/pokemon/{$apiName}";
$data = fetchJson($pokemonUrl);
if ($data === null) {
    echo '<p>Pokémon not found or API error. <a href="index.php">Back to search</a></p>';
    exit;
}

$pokemonName = h($data['name'] ?? $raw);
$id = h($data['id'] ?? '');
$sprite = $data['sprites']['front_default']
          ?? $data['sprites']['other']['official-artwork']['front_default']
          ?? '';
$types = array_map(function($t){ return $t['type']['name']; }, $data['types'] ?? []);
$abilities = array_map(function($a){ return $a['ability']['name']; }, $data['abilities'] ?? []);
$stats = [];
foreach ($data['stats'] ?? [] as $s) {
    $stats[] = ['name' => $s['stat']['name'], 'value' => $s['base_stat']];
}

$speciesUrl = "https://pokeapi.co/api/v2/pokemon-species/{$apiName}";
$speciesData = fetchJson($speciesUrl);
$evolutions = [];

if (is_array($speciesData) && isset($speciesData['evolution_chain']['url'])) {
    $evoChainUrl = $speciesData['evolution_chain']['url'];
    $chainData = fetchJson($evoChainUrl);

    if (is_array($chainData) && isset($chainData['chain'])) {
        $traverse = function($node) use (&$traverse, &$evolutions) {
            if (!isset($node['species']['name'])) return;
            $evolutions[] = $node['species']['name'];
            if (!empty($node['evolves_to'])) {
                foreach ($node['evolves_to'] as $next) {
                    $traverse($next);
                }
            }
        };
        $traverse($chainData['chain']);
    }
}


$evolutions = array_values(array_unique($evolutions));
if (!in_array(strtolower($data['name']), $evolutions)) {
    array_unshift($evolutions, strtolower($data['name']));
}

$evoDetails = [];
foreach ($evolutions as $speciesName) {
    $url = "https://pokeapi.co/api/v2/pokemon/" . urlencode($speciesName);
    $d = fetchJson($url);
    if ($d === null) continue;
    $sprit = $d['sprites']['front_default']
             ?? $d['sprites']['other']['official-artwork']['front_default']
             ?? '';
    $st = [];
    foreach ($d['stats'] ?? [] as $ss) {
        $st[] = ['name' => $ss['stat']['name'], 'value' => $ss['base_stat']];
    }
    $evoDetails[] = [
        'name' => $d['name'] ?? $speciesName,
        'id' => $d['id'] ?? '',
        'sprite' => $sprit,
        'types' => array_map(function($t){ return $t['type']['name']; }, $d['types'] ?? []),
        'abilities' => array_map(function($a){ return $a['ability']['name']; }, $d['abilities'] ?? []),
        'stats' => $st
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $pokemonName; ?> — Pokémon Stats & Evolutions</title>
  <style>
    body{font-family: Arial, sans-serif; max-width:1000px;margin:20px;}
    .pokemon, .evo {display:inline-block;vertical-align:top;border:1px solid #ddd;padding:12px;margin:8px;border-radius:6px;width:220px;}
    .pokemon img, .evo img{max-width:160px;display:block;margin:0 auto 8px;}
    table{border-collapse:collapse;width:100%}
    th,td{border:1px solid #ccc;padding:6px;text-align:left;font-size:90%;}
    .evo-grid{display:flex;flex-wrap:wrap;gap:12px;}
    .meta{font-size:90%;color:#333;}
  </style>
</head>
<body>
  <p><a href="index.php">← Back to search</a></p>

  <h1><?php echo $pokemonName; ?> <?php echo $id ? "(#{$id})" : ''; ?></h1>

  <div class="pokemon">
    <?php if ($sprite): ?>
      <img src="<?php echo h($sprite); ?>" alt="<?php echo $pokemonName; ?>">
    <?php endif; ?>
    <p class="meta"><strong>Types:</strong> <?php echo h(implode(', ', $types)); ?></p>
    <p class="meta"><strong>Abilities:</strong> <?php echo h(implode(', ', $abilities)); ?></p>

    <h3>Base stats</h3>
    <table>
      <tr><th>Stat</th><th>Value</th></tr>
      <?php foreach ($stats as $s): ?>
        <tr>
          <td><?php echo h($s['name']); ?></td>
          <td><?php echo h($s['value']); ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <h2>Evolutions</h2>
  <?php if (empty($evoDetails)): ?>
    <p>No evolution data available.</p>
  <?php else: ?>
    <div class="evo-grid">
      <?php foreach ($evoDetails as $ed): ?>
        <div class="evo">
          <h3 style="text-align:center;"><?php echo h($ed['name']); ?> <?php echo $ed['id'] ? "(#".h($ed['id']).")" : ''; ?></h3>
          <?php if ($ed['sprite']): ?>
            <img src="<?php echo h($ed['sprite']); ?>" alt="<?php echo h($ed['name']); ?>">
          <?php endif; ?>
          <p class="meta"><strong>Types:</strong> <?php echo h(implode(', ', $ed['types'])); ?></p>
          <p class="meta"><strong>Abilities:</strong> <?php echo h(implode(', ', $ed['abilities'])); ?></p>

          <h4>Base stats</h4>
          <table>
            <?php foreach ($ed['stats'] as $s): ?>
              <tr>
                <td><?php echo h($s['name']); ?></td>
                <td><?php echo h($s['value']); ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

</body>
</html>