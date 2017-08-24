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
		     $messages = [
				'type' => 'text',
				'text' => $Myd ];
	     }
			 }
			
			 if($text=="คุณเลือกแผนกแรงสูง"){ 
			    $Myd = "1.การปักเสา เสาตอม่อ\n2.การติดตั้งคอน ลูกถ้วย และประกอบอนด์ไวร์\n3.การติดตั้งเหล็กรับสายล่อฟ้า\n4.การฝังสมอบก และประกอบยึดโยงระบบจำหน่าย\n5.การฝังสมอบก และประกอบยึดโยงสายล่อฟ้า\n6.การพาดสายไฟ ระยะหย่อนยาน\n7.การพาดสายล่อฟ้า ระยะหย่อนยาน\n8.ระยะห่าง ความสูงของสายไฟ\n9.การพันและผูกลูกถ้วย\n10.การต่อสาย พันเทป(\n11.การเชื่อมสาย สายแยก พันเทป\n12.การเข้าปลายสาย\n13.การตัดต้นไม้\n14.การทาสีเสา\n15.การพ่นสี หมายเลขเสา\n16.การยึดโยง\n17.การต่อลงดิน\n18.การติดตั้งกับดักเสิร์จแรงสูง\nต้องการดูแบบมาตรฐานหัวข้อไหนสามารถพิมพ์เลขที่หัวข้อได้เลย";
			
			 $messages = [
				'type' => 'text',
				'text' => $Myd 
			           ];
			 }
			 if($text=="คุณเลือกแผนกหม้อแปลง"){ 
			    $Myd = "34.การติดตั้งหม้อแปลง (ระยะความสูง,ทิศทาง\n35.การติดตั้งคอน ลูกถ้วย และประกอบบอนด์ไวร์\n36.การพาดสายแรงสูงเข้าหม้อแปลง และลำดับเฟส\n37.การผูกสายไฟกับลูกถ้วย\n38.การติดตั้งกับดักเสิร์จแรงสูง หางปลา\n39.การติดตั้งดร็อปเอาท์ พินเทอร์มินอล และฟิวส์ลิงค์\n40.การติดตั้งคอนสปัน 3,200 มม.ระยะความสูง\n41.การเข้าสายบุชชิ่งหม้อแปลง หางปลา ฉนวนครอบุชชิ่ง\n42.การติดตั้งสายแรงต่ำ และลำดับเฟส\n43.การติดตั้งกับดักเสิร์จแรงต่ำ\n44.การติดตั้งคอนสำหรับ LT ,LT สวิตซ์ และฟิวส์แรงต่ำ\n45.การติดตั้งที่จับขอบถัง,เหล็กแขวน ท่อร้อยสายแรงต่ำ\n46.เทคตอนกรีตที่คาน โคนเสา\n47.การต่อลงดิน\n48.ความต้านทานดินต่อจุด\nต้องการดูแบบมาตรฐานหัวข้อไหนสามารถพิมพ์เลขที่หัวข้อได้เลย";
			$messages = [
				'type' => 'text',
				'text' => $Myd   
			              ];
			 }
			 if($text=="คุณเลือกแผนกแรงต่ำ"){ 
			    $Myd = "19.การปักเสา เสาตอม่อ\n20.การติดตั้งคอน แร็ค\n21.การฝังสมอบก และประกอบยึดโยง\n22.การพาดสายไฟ ระยะหย่อนยาน\n23.ระยะห่าง ความสูงของสายไฟ\n24.การผูกสายไฟกับลูกรอกแรงต่ำ\n25.การต่อสาย พันเทป\n26.การเชื่อมสาย สายแยก พันเทป\n27.การเข้าปลายสาย\n28.การติดตั้งกับดักเสิร์จแรงต่ำ\n29.การทาสีเสา\n30.การพ่นสีเสา หมายเลขเสา\n31.การยึดโยง\n32.การต่อลงดิ\n33.ค่าความต้านทานดินรวม\nต้องการดูแบบมาตรฐานในหัวข้อไหนสามารถพิมพ์เลขที่หัวข้อได้เลย";
			$messages = [
				'type' => 'text',
				'text' => $Myd    
			             ];
			 }
			 if($Myd=="999"){ 
				 $findresult = "success";
			    $messages = array(
					 'type'=> 'template',
                                          'altText'=> 'อุปกรณ์ในระบบจำหน่าย',
                                           'template'=>array (
                                                             'type'=> 'carousel',
                                                         'columns'=> array(
							   
						                    array(
								    'title'=>'อุปกรณ์ในระบบจำหน่าย',    
								    'text'=> 'กรุณาเลือกหมวด',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เสา',
                                                                                            'text'=> 'pole'
                                                                                            ),
									    array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เสา',
                                                                                            'text'=> 'pole'
                                                                                            )
                                                                                      )//action col1
								     ),
								     array(
							            'title'=>'อุปกรณ์ในระบบจำหน่าย', 
								    'text'=> 'กรุณาเลือกหมวด',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'คอนสาย',
                                                                                            'text'=> 'คุณเลือกแผนกหม้อแปลง'
                                                                                            ),
									    array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เสา',
                                                                                            'text'=> 'pole'
                                                                                            )
                                                                                      )//action col2
							             ),
							              array(
							           'title'=>'อุปกรณ์ในระบบจำหน่าย', 
								    'text'=> 'กรุณาเลือกหมวด',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'คุณเลือกแผนกแรงต่ำ'
                                                                                            ),
									    array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เสา',
                                                                                            'text'=> 'pole'
                                                                                            )
                                                                                      )//action col3
								     ),
								   array(
							           'title'=>'มาตรฐานงานก่อสร้างกรุณาเลือกแผนก', 
								    'text'=> 'อุปกรณ์ในระบบจำหน่าย',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'อุปกรณ์ในระบบจำหน่าย'
                                                                                            )
									    array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เสา',
                                                                                            'text'=> 'pole'
                                                                                            )
									               
                                                                                      )//action col4
								     )
								 
								 
								 
								 
								     ) //array columns
                                                            )//array templete
				                    
                                            ); //array messages 
			 }
			
			
			 if ($Myd==""){
				 $findresult = "N/A";
				 $messages = array(
					 'type'=> 'template',
                                          'altText'=> 'มาตรฐานงานก่อสร้างกรุณาเลือกแผนก',
                                           'template'=>array (
                                                             'type'=> 'carousel',
                                                         'columns'=> array(
							   
						                    array(
								    'title'=>'มาตรฐานงานก่อสร้างกรุณาเลือกแผนก',    
								    'text'=> 'แผนกแรงสูง',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'คุณเลือกแผนกแรงสูง'
                                                                                            )
                                                                                      )//action col1
								     ),
								     array(
							            'title'=>'มาตรฐานงานก่อสร้างกรุณาเลือกแผนก', 
								    'text'=> 'แผนกหม้อแปลง',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'คุณเลือกแผนกหม้อแปลง'
                                                                                            )
                                                                                      )//action col2
							             ),
							              array(
							           'title'=>'มาตรฐานงานก่อสร้างกรุณาเลือกแผนก', 
								    'text'=> 'แผนกแรงต่ำ',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'คุณเลือกแผนกแรงต่ำ'
                                                                                            )
                                                                                      )//action col3
								     ),
								   array(
							           'title'=>'มาตรฐานงานก่อสร้างกรุณาเลือกแผนก', 
								    'text'=> 'อุปกรณ์ในระบบจำหน่าย',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'device'
                                                                                            )
									               
                                                                                      )//action col4
								     )
								 
								 
								 
								 
								     ) //array columns
                                                            )//array templete
				                    
                                            ); //array messages 
			 }
                // Build message to reply back
			

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
