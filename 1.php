<?php
	$host = "192.168.1.64";
	$port = '123';
	set_time_limit(0);
	$socket = socket_create(AF_INET,SOCK_STREAM,0);
	$res = socket_bind($socket,$host,$port);
	$res = socket_listen($socket,3);
	$spawn = socket_accept($socket);
	while(!feof($socket)){
		$input = socket_read($spawn,1024);
		$input = trim($input);
		$out = strrev($input);
		echo $out;
		socket_write($spawn,$out,strlen($out));
		sleep(1);
	}
	socket_close($spawn);
	socket_close($socket);