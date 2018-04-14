<?php

class script
{
	function getIP()
	{
		$ip = "189.201." . rand(100, 300) . "." . rand(1, 300);
		return $ip;
	}

	public $headers = [];
	public $token = "";
	public $time = "";

	function getPage()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://es.surveymonkey.com/r/3BP6KSX");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADERFUNCTION,
			function ($curl, $header) use (&$headers) {
				$len = strlen($header);
				$header = explode(':', $header, 2);
				if (count($header) < 2) // ignore invalid headers
					return $len;

				$name = strtolower(trim($header[0]));
				if (!array_key_exists($name, $headers))
					$headers[$name] = [trim($header[1])];
				else
					$headers[$name][] = trim($header[1]);

				return $len;
			}
		);
		$response = curl_exec($ch);
		foreach ($headers as $k => &$header) {
			//echo "K => " . $k . "<br>";
			if (is_array($header)) {
				$concat = "";
				foreach ($header as $h) {
					$concat .= $h . "; ";
				}
			} else {
				$concat = $header;
			}
			$header = $concat;
			//echo "V => " . $concat . "<br><br>";
		}
		$this->headers = $headers;
		$response = str_replace('action=""', 'action="http://es.surveymonkey.com/r/3BP6KSX"', $response);

		$r = explode('<input type="hidden" id="survey_data" name="survey_data" value=', $response);
		$r2 = explode('"', $r[1]);
		$this->token = $r2[1];

		$r = explode('type="radio"
               class="radio-button-input "
               value=', $response);
		$r2 = explode('"', $r[1]);
		$this->time = $r2[1];

		self::sendCurl();
		//self::printCurls();
	}

	function sendCurl()
	{
		$ch = curl_init();

		$fields = ["262127117" => $this->time, 'survey_data' => $this->token,
			'is_previous' => 'false'];

		$headers = array("Content-Type:multipart/form-data");
		$ch = curl_init();
		$options = array(
			CURLOPT_URL => "https://es.surveymonkey.com/r/3BP6KSX",
			CURLOPT_HEADER => true,
			CURLOPT_POST => 1,
			CURLOPT_HTTPHEADER => $headers,
			CURLOPT_POSTFIELDS => $fields,
			CURLOPT_INFILESIZE => 0,
			CURLOPT_RETURNTRANSFER => true
		); // cURL options
		curl_setopt_array($ch, $options);
		$response = curl_exec($ch);
		if (!curl_errno($ch)) {
			$info = curl_getinfo($ch);
			if ($info['http_code'] == 200)
				$errmsg = "File uploaded successfully";
		} else {
			$errmsg = curl_error($ch);
		}
		curl_close($ch);

		echo $response;
	}

	function randomString($length = 30)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}

if (isset($_GET['isPost'])) {
	$s = new script();
	$s->getPage();
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function makeAjax() {
        $.ajax({
            url: '/scriptSurveyMonkey.php?isPost=true',
            success: function (r) {
                console.log('ok');
                makeAjax();
            }, error: function (r) {
                console.log('no');
                console.log(r);
                makeAjax();
            }
        });
    }

    $(function () {
        makeAjax();
    });
</script>
