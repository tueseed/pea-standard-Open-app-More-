<?php
//$access_token = 'tdzLYf9xfGIqTskPJrg1oK1BkchAQvgfuICDhheJJ65GvMxKIeL29rO5PLkYVbXLEiBFllEQC96ml4ZE69XM7TF40477TPfGBVmqmsGi67YNeaTv94J7kkPhlWl/rf1LO5ESck74M6zkhl057mCG0AdB04t89/1O/w1cDnyilFU=';
$access_token = 'Myc5kI+C9Ef72jVTlnESF5LD9XKW9t4LSdfUzRnzzupF/7ICudMwdv+RRtKq9l1FVMnXVkqIZOOA3DuEopCbtQe+boVe4hSZ5gMJ98I+lkPfzUMiHXw1+svtwwJuDdj/TN9HUJstv+gZAmO02cjA5QdB04t89/1O/w1cDnyilFU=';
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
			 if($text=="แรงสูง" or $text=="HT" or $text=="ht"){ 
			    $Myd = "1.1 การปักเสา เสาตอม่อ\n1.2 การติดตั้งคอน ลูกถ้วย และประกอบอนด์ไวร์\n1.3 การติดตั้งเหล็กรับสายล่อฟ้า\n1.4 การฝังสมอบก และประกอบยึดโยงระบบจำหน่าย\n1.5 การฝังสมอบก และประกอบยึดโยงสายล่อฟ้า\n1.6 การพาดสายไฟ ระยะหย่อนยาน\n1.7 การพาดสายล่อฟ้า ระยะหย่อนยาน\n1.8 ระยะห่าง ความสูงของสายไฟ\n1.9 การพันและผูกลูกถ้วย\n1.10 การต่อสาย พันเทป(\n1.11 การเชื่อมสาย สายแยก พันเทป\n1.12 การเข้าปลายสาย\n1.13 การตัดต้นไม้\n1.14 การทาสีเสา\n1.15 การพ่นสี หมายเลขเสา\n1.16 การยึดโยง\n1.17 การต่อลงดิน\n1.18 การติดตั้งกับดักเสิร์จแรงสูง\nต้องการดูแบบมาตรฐานหัวข้อไหนสามารถพิมพ์เลขที่หัวข้อได้เลย";
			}
			 if($text=="หม้อแปลง" or $text=="TR" or $text=="tr"){ 
			    $Myd = "3.1 การติดตั้งหม้อแปลง (ระยะความสูง,ทิศทาง)            3.2 การติดตั้งคอน ลูกถ้วย และประกอบบอนด์ไวร์                                                                                                                                                                                                3.3 การพาดสายแรงสูงเข้าหม้อแปลง และลำดับเฟส                                                                                                                                                                                            3.4 การผูกสายไฟกับลูกถ้วย                                                                                                                                                                                                                              3.5 การติดตั้งกับดักเสิร์จแรงสูง หางปลา                                                                                                                                                                                                              3.6 การติดตั้งดร็อปเอาท์ พินเทอร์มินอล และฟิวส์ลิงค์                                                                                                                                                                                         3.7 การติดตั้งคอนสปัน 3,200 มม.ระยะความสูง                                                                                                                                                                                                    3.8 การเข้าสายบุชชิ่งหม้อแปลง หางปลา ฉนวนครอบลุชชิ่ง                                                                                                                                                                                  3.9 การติดตั้งสายแรงต่ำ และลำดับเฟส                                                                                                                                                                                                             3.10 การติดตั้งกับดักเสิร์จแรงต่ำ                                                                                                                                                                                                                       3.11 การติดตั้งคอนสำหรับ LT ,LT สวิตซ์ และฟิวส์แรงต่ำ                                                                                                                                                                                      3.12 การติดตั้งที่จับขอบถัง,เหล็กแขวน ท่อร้อยสายแรงต่ำ                                                                                                                                                                                  3.13 เทคตอนกรีตที่คาน โคนเสา                                                                                                                                                                                                                      3.14 การต่อลงดิน                                                                                                                                                                                                                                            3.15 ความต้านทานดินต่อจุด                                                                                                                                                                                                                     ต้องการดูแบบมาตรฐานหัวข้อไหนสามารถพิมพ์เลขที่หัวข้อได้เลย";
			}
			 if($text=="แรงต่ำ" or $text=="LT" or $text=="lt"){ 
			    $Myd = "1.1 การปักเสา เสาตอม่อ\n1.2 การติดตั้งคอน ลูกถ้วย และประกอบอนด์ไวร์\n1.3 การติดตั้งเหล็กรับสายล่อฟ้า\n1.4 การฝังสมอบก และประกอบยึดโยงระบบจำหน่าย\n1.5 การฝังสมอบก และประกอบยึดโยงสายล่อฟ้า\n1.6 การพาดสายไฟ ระยะหย่อนยาน\n1.7 การพาดสายล่อฟ้า ระยะหย่อนยาน\n1.8 ระยะห่าง ความสูงของสายไฟ\n1.9 การพันและผูกลูกถ้วย\n1.10 การต่อสาย พันเทป(\n1.11 การเชื่อมสาย สายแยก พันเทป\n1.12 การเข้าปลายสาย\n1.13 การตัดต้นไม้\n1.14 การทาสีเสา\n1.15 การพ่นสี หมายเลขเสา\n1.16 การยึดโยง\n1.17 การต่อลงดิน\n1.18 การติดตั้งกับดักเสิร์จแรงสูง\nต้องการดูแบบมาตรฐานหัวข้อไหนสามารถพิมพ์เลขที่หัวข้อได้เลย";
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
