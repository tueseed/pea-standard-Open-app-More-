<?php
$text = file('CMS.csv');
foreach($text as $index=>$value){
 echo iconv("windows-874","tis-620",$value)."<br />";
}

?>
