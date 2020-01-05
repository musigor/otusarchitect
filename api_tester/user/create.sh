#!/bin/sh

curl -X POST -d @create.json http://localhost/api/users --header "Content-Type:application/json"