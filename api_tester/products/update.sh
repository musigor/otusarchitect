#!/bin/sh

curl -X PUT -d @update.json http://localhost/api/products --header "Content-Type:application/json"