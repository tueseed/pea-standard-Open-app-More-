<?php
$url = parse_url(getenv("mysql://bdb2c368d1a6ad:09b374bf@us-cdbr-iron-east-05.cleardb.net/heroku_056efb00ca70c61?reconnect=true"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);
if($conn){
echo "เชื่อมต่ออออออออ";

}
else{
echo "ไม่เชื่อมต่ออออออออ";

}
function DateThai($strDate){
				$strYear = date("Y",strtotime($strDate))+543;
				$strMonth= date("n",strtotime($strDate));
				$strDay= date("j",strtotime($strDate));
				$strthaiday = date("w",strtotime($strDate));
				//$strHour= date("H",strtotime($strDate));
				//$strMinute= date("i",strtotime($strDate));
				//$strSeconds= date("s",strtotime($strDate));
				$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
				$strMonthThai=$strMonthCut[$strMonth];
	                        $strthaiday_cut = Array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
	                        $strthaiday_t = $strthaiday_cut[$strthaiday];
				return "$strthaiday_t $strDay $strMonthThai $strYear";
			}
$strDate1 = date("Y-m-d");
$d_w = date("w",strtotime($strDate1));
echo DateThai($strDate1);
echo "        เลขวันที่คือ   ".$d_w;
//echo "Hello LINE BOT";
?>
