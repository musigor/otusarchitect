#!/bin/sh

curl -X POST -i -d @create.json http://localhost/api/products --header "Content-Type:application/json"