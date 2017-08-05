<?php
$text = file('CMS.csv');
foreach($text as $index=>$value){
 echo $value."<br />";
}

?>