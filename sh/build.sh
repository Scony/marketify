#!/bin/bash

if [ $# -eq 1 ];
then
    # clean
    rm -f recipe.jar
    # build
    javac -source 1.6 -target 1.6 -bootclasspath rt.jar -cp ify.jar:android.jar:rt.jar $1.java || exit 1 # compability with jdk 1.6 (dex req)
    # javac -cp ify.jar:android.jar $1.java || exit 1
    jar cf tmp.jar $1.class
    ./dx --dex --output=classes.dex tmp.jar
    jar cf recipe.jar $1.class classes.dex
    # post-clean
    rm -f *.class
    rm -f classes.dex
    rm -f tmp.jar
    rm -f *.java
    exit 0
else
    # echo 'Usage: ./build.sh [recipe class name without .java]'
    echo 'Cannot find class that extends YReceipt'
    exit 2
fi
