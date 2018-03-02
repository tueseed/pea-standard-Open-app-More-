<?php
$url = parse_url(getenv("mysql://bdb2c368d1a6ad:09b374bf@us-cdbr-iron-east-05.cleardb.net/heroku_056efb00ca70c61?reconnect=true"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);
if($conn){
echo "connect";

}
else{
echo "error";

}
//echo "Hello LINE BOT";
?>
