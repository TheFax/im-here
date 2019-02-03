#!/bin/bash

plain_ip_url="icanhazip.com"
name="MY_NAME"
password="MY_PASS"

ip=$(wget -qO- $plain_ip_url)
imhere_url="MY_PHP_SCRIPT.php?name=$name&newip=$ip&pass=$password"
wget -qO- $imhere_url &> /dev/null
