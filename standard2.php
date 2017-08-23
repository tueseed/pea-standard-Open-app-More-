<?php
///standard3
$access_token = 'EcX9Jf8e86UnCxojiaZ8r8kS5IuarhF/9I52+d8udqcuLgx80ko9vgso8Emo/yuJ89TxVccLyf/Nuu7ooHG/LNIpExNnL5s+3rUWliMDLFUPYpwKcBxOG1FRfZ7neiPFKiQ2zOFBqUhsN/oJCBx7ZQdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			$userid = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			
            $csv = array_map('str_getcsv', file('sta.csv'));
            $findName = iconv("utf-8","tis-620",$text);
			//$findName = strtoupper($findName);
            foreach($csv as $values)
            {
		    
             if($values[1]==$findName or $values[2]==$findName or $values[3]==$findName) {  // index 0 contains the name
                 $Myd = iconv("tis-620","utf-8",$values[0]);  // index 1 contains the googlemap link   
		    $findresult = "success";
	     }
			 }
			 if($Myd==1){ 
			    break;
			}
			 if ($Myd==""){
				 $findresult = "N/A";
				 $Myd = "สวัสดีครับ มาตรฐานการก่อสร้างระบบจำหน่ายเป็นเรื่องสำคัญ สงสัยเรื่องไหนเรามีคำตอบ พิมพ์ แรงสูง หม้อแปลง แรงต่ำ หรือคลิกที่ลิ้ง เพื่อดูวิธีการใช้งาน 
https://drive.google.com/open?id=0B4BTAaYsG0CpMF9VRUExRWhZLUU 
พบปัญหาการใช้งานหรือมีคำติชม ข้อเสนอแนะเพิ่มเติมติดต่อ 
นายนัทธพงศ์ เจริญกิจพิเชียร 
วิศวกรระดับ 5 ผกส.กฟอ.พธร. 
 เบอร์ดาวเทียม 14850 
LINE : tueseed 
email : nattapong.cha@pea.co.th,tue_seed@hotmail.com 
หรือ โทร 095-5579848";
			 }
                // Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $Myd    //."  [".$KVA." KVA]"
			];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		
			
		}
	}
	//// getdisplay
	$url = 'https://api.line.me/v2/bot/profile/'.$userid;
   $headers = array('Authorization: Bearer ' . $access_token);
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   //curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
   $result = curl_exec($ch);
   curl_close($ch);
   $displayname = $result;
	//end get
}
$Ti = date("H:i:s",mktime(date("H")+7, date("i")+0, date("s")+0));
$Da = date("d.m.y");
$strFileName = "stadis.csv";
$objFopen = fopen($strFileName, 'a');
//$findName1 = iconv("tis-620","utf-8",$findName);
$strText1 = "\n".$Da.",".$Ti.",".$findName.",".$findresult.",".$displayname;
fwrite($objFopen, $strText1);
fclose($objFopen);
echo "OK";
