#!/bin/sh

curl -X PUT -d @update.json http://localhost/api/users --header "Content-Type:application/json"