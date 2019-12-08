#!/bin/sh

curl -X POST -d @create.json http://localhost/api/products --header "Content-Type:application/json"