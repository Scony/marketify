#!/bin/bash

rm -f ify.jar
pushd .
cd ~/ify/libs/ifyAPI/
git pull
ant jar
popd
cp ~/ify/libs/ifyAPI/ify.jar .
