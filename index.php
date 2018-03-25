<?php
$url = parse_url(getenv("mysql://bdb2c368d1a6ad:09b374bf@us-cdbr-iron-east-05.cleardb.net/heroku_056efb00ca70c61?reconnect=true"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);
if($conn){
echo "เชื่อมต่ออออออออ";
echo "<br>";

}
else{
echo "ไม่เชื่อมต่ออออออออ";
echo "<br>";
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
$day_test = date(2018-04-06);
$sql = "SELECT * FROM tbl_holiday WHERE holiday_date LIKE '%".$day_test."%'";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_array($query);
if(!$result){
 $txtreturn ="วันทำงาน";
}
else
{
$txtreturn ="วันหยุด";	
}
$strDate1 = date("Y-m-d");
$d_w = date("N",strtotime($day_test));
echo DateThai($day_test);
echo "<br>";
echo "        เลขวันที่คือ   ".$d_w;
echo "<br>";
echo $txtreturn."    ".$result["holiday_name"];
//echo "Hello LINE BOT";
?>
