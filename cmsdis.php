<?php
$text = file('CMS.csv');
foreach($text as $index=>$value){
 echo iconv("utf-8","tis-620",$value)."<br />";
}

?>
