#!/bin/sh

curl -X PUT -d @update.json http://architect.de/api/users --header "Content-Type:application/json"