#!/bin/sh

curl -X POST -d @login.json http://architect.de/api/login --header "Content-Type:application/json"