#!/bin/sh

curl -X PUT -d @update.json http://architect.de/api/products --header "Content-Type:application/json"