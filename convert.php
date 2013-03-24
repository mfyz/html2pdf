<?php

//set POST variables
$url = 'http://c.docverter.com/convert';
$fields = array('from' => 'html',
	'to' => 'pdf',
	'input_files[]' => "@/".realpath('input.html').";type=text/html; charset=UTF-8",
);
 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data"));
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
 
$fp = fopen('result.pdf', 'w');
fwrite($fp, $result);
fclose($fp);

die('Done');