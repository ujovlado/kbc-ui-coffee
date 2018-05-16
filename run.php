<?php

echo <<<MD
# Coffeescript in kbc-ui

| date | .coffee files | .coffee files with React components |
| --- | --- | --- |\n
MD;

$stats = [];

foreach (glob('data/*.json') as $file) {
    $json = file_get_contents($file);
    $data = json_decode($json, true);
    $stats[$data['date']] = $data;
}

krsort($stats);

foreach ($stats as $item) {
    echo '|' . implode(' | ', $item) . '|' . "\n";
}
