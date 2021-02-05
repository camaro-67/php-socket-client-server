<?php
$host    = "127.0.0.1";
$port    = 25003;
echo "What do you want to input? ";
$input = rtrim(fgets(STDIN));
echo "I got it:\n" . $input;
echo "\n";
// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
// connect to server
$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
// send string to server
socket_write($socket, $input, strlen($input)) or die("Could not send data to server\n");
// get server response
$result = socket_read ($socket, 1024) or die("Could not read server response\n");
echo "\n";
echo "Reply From Server  :".$result;
// close socket
socket_close($socket);