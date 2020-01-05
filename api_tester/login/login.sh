#!/bin/sh

curl -X POST -i -d @login.json http://localhost/api/login --header "Content-Type:application/json"