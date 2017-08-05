<?php
$text = file('CMS.csv');
foreach($text as $index=>$value){
 echo iconv("tis-620","utf-8",$value)."<br />";
}

?>
