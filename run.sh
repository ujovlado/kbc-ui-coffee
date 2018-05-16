#!/bin/bash

set -e

rm -rf kbc-ui

git clone --depth 1 https://github.com/keboola/kbc-ui.git kbc-ui
git clone --depth 1 --branch gh-pages https://github.com/ujovlado/kbc-ui-coffee.git gh-pages

cd kbc-ui

DATE="`date +%Y-%m-%d`"
COFFEE_COUNT="`find . -type f -name *.coffee | wc -l`"
COFFEE_WITH_REACT_COMPONENTS="`grep . -ire "createClass" -l | grep coffee | uniq | wc -l`"

cd ..

echo "{
  \"date\": \"$DATE\",
  \"coffeeFiles\": $COFFEE_COUNT,
  \"coffeeFilesWithReactComponents\": $COFFEE_WITH_REACT_COMPONENTS
}" > "gh-pages/$DATE.json"

php run.php > gh-pages/index.md
