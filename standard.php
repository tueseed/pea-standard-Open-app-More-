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
			// Get replyToken
			$replyToken = $event['replyToken'];
			
            $csv = array_map('str_getcsv', file('sta.csv'));
            $findName = iconv("utf-8","tis-620",$text);
			//$findName = strtoupper($findName);
            foreach($csv as $values)
            {
             if($values[1]==$findName)   // index 0 contains the name
                 $Myd = iconv("tis-620","utf-8",$values[0]);
                 	                     // index 1 contains the googlemap link 
			 
			 }
			 //if ($doc=="")
				// $doc = "ไม่พบข้อมูล";
                
		
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
}
echo "OK";
