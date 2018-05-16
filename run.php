<?php

echo <<<MD
# Coffeescript in kbc-ui

Daily stats for `.coffee` files in [kbc-ui](https://github.com/keboola/kbc-ui) repository.

| date | .coffee files | .coffee files with React components |
| --- | --- | --- |\n
MD;

$stats = [];

foreach (glob('gh-pages/*.json') as $file) {
    $json = file_get_contents($file);
    $data = json_decode($json, true);
    $stats[$data['date']] = $data;
}

krsort($stats);

foreach ($stats as $item) {
    echo '|' . implode(' | ', $item) . '|' . "\n";
}
