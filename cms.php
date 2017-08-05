<?php
$access_token = 'tdzLYf9xfGIqTskPJrg1oK1BkchAQvgfuICDhheJJ65GvMxKIeL29rO5PLkYVbXLEiBFllEQC96ml4ZE69XM7TF40477TPfGBVmqmsGi67YNeaTv94J7kkPhlWl/rf1LO5ESck74M6zkhl057mCG0AdB04t89/1O/w1cDnyilFU=';
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
			// Get replyToken
			$replyToken = $event['replyToken'];
			
            $csv = array_map('str_getcsv', file('CMS.csv'));
            $findName = iconv("utf-8","tis-620",$text);
           $findName = $text;
			//$findName = strtoupper($findName);
            foreach($csv as $values)
            {
		    
             if(trim($values[1])==$findName or trim($values[2])==$findName) {  // เอาทะเบียนหรือรหัสรถมาเทียบ
                                 $Myd0 = "สังกัด:".iconv("tis-620","utf-8",$values[0]);  // เก็บค่า กฟฟ
				 $Myd1 = "\nหมายเลขทะเบียน:".iconv("tis-620","utf-8",$values[1]); // ทะเบียนรถ
				 $Myd2 = iconv("tis-620","utf-8",$values[2]);// จังหวัด
				 $Myd3 = "\nรหัส:".iconv("tis-620","utf-8",$values[3]);// รหัส
				 $Myd4 = "\nยี่ห้อ:".iconv("tis-620","utf-8",$values[4]);//ยี่ห้อ
				 $Myd5 = "\nลักษณะ:".iconv("tis-620","utf-8",$values[5]);//ลักษณะ
				 $Myd6 = "\nเลขเครื่อง:".iconv("tis-620","utf-8",$values[6]);//เลขเครื่อง
				 $Myd7 = "\nรุ่น:".iconv("tis-620","utf-8",$values[7]);//รุ่น
				 $Myd8 = "\nจดทะเบียน:".iconv("tis-620","utf-8",$values[8]);//วันจดทะเบียน
				 $Myd9 = "\nอายุ:".iconv("tis-620","utf-8",$values[9]);//อายุ
				 $Myd10 = "\nปก.:".iconv("tis-620","utf-8",$values[10]);//ประกันภัย
				 $Myd11 = "\nเชื่อเพลิง:".iconv("tis-620","utf-8",$values[11]);//เชื่อเพลิง
				 $MydTotal = $Myd0.$Myd1.$Myd2.$Myd3.$Myd4.$Myd5.$Myd6.$Myd7.$Myd8.$Myd9.$Myd10.$Myd11;  
		     $messages=[
				'type' => 'text',
				'text' => $MydTotal    
						
			];
	     }
			                                         }
			if ($Myd0=="") {
		                
			    $MydTotal = "ไม่พบข้อมูล";
			$messages =[
				'type' => 'text',
				'text' => $MydTotal   
						
			];
			
			 }
			
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
}

echo "OK";
?>
