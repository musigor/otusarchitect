#!/bin/sh

curl -X POST -d @login.json http://localhost/api/login --header "Content-Type:application/json"