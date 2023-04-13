<?php
    $beerUrl = "https://random-data-api.com/api/beer/random_beer?size=10";
    $data = file_get_contents($beerUrl);
    $beers = json_decode($data, true);

    usort($beers, function($a, $b) {
        return $a['alcohol'] <=> $b['alcohol'];
    });

    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Brand</th>';
    echo '<th>Name</th>';
    echo '<th>Alcohol</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($beers as $beer) {
        echo '<tr>';
        echo '<td>' . $beer['brand'] . '</td>';
        echo '<td>' . $beer['name'] . '</td>';
        echo '<td>' . $beer['alcohol'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beers</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <div style="overflow-x:auto;">
        </div>
    </body>
</html>