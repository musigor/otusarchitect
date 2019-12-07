#!/bin/sh

curl -X POST -d @create.json http://architect.de/api/users --header "Content-Type:application/json"