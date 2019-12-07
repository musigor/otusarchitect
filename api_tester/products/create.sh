#!/bin/sh

curl -X POST -d @create.json http://architect.de/api/products --header "Content-Type:application/json"