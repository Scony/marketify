#!/bin/bash

rm -f ify.jar
pushd .
cd /home/scony/ify/libs/ifyAPI/
git pull
ant jar
popd
cp /home/scony/ify/libs/ifyAPI/ify.jar .
