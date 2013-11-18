<?php
echo "<h1>URL 1:</h2> ";
$url ="http://localhost/webprog/uebungen/10/resolver.php?service=kantone&methode=list";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$body = curl_exec($ch);
curl_close($ch);
// Via json
$json = json_decode($body);


echo "<br>";
echo "<br>";
echo "<h1>URL 2:</h2> ";
$url ="http://localhost/webprog/uebungen/10/resolver.php?service=kantone&methode=single&id=ZH";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$body = curl_exec($ch);
curl_close($ch);
// Via json
$json = json_decode($body);

echo "<br>";
echo "<br>";
echo "<h1>URL 3:</h2> ";
$url ="http://localhost/webprog/uebungen/10/resolver.php?service=kantone&methode=list&sort=Kanton";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$body = curl_exec($ch);
curl_close($ch);
// Via json
$json = json_decode($body);