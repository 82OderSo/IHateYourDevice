<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<link href="http://fonts.googleapis.com/css?family=Lato%3A300%7COxygen%3A700" rel="stylesheet" type="text/css">
		<title>I hate your device</title>
		<style type="text/css">
			html, body {
				height: 100%;
				width: 100%;
			}

			body {
				margin: 0;
				padding: 10%;
				box-sizing: border-box;
				background: rgb(255,151,45); /* Old browsers */
				background: -moz-linear-gradient(45deg,  rgba(255,151,45,1) 0%, rgba(255,66,6,1) 100%); /* FF3.6+ */
				background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,rgba(255,151,45,1)), color-stop(100%,rgba(255,66,6,1))); /* Chrome,Safari4+ */
				background: -webkit-linear-gradient(45deg,  rgba(255,151,45,1) 0%,rgba(255,66,6,1) 100%); /* Chrome10+,Safari5.1+ */
				background: -o-linear-gradient(45deg,  rgba(255,151,45,1) 0%,rgba(255,66,6,1) 100%); /* Opera 11.10+ */
				background: -ms-linear-gradient(45deg,  rgba(255,151,45,1) 0%,rgba(255,66,6,1) 100%); /* IE10+ */
				background: linear-gradient(45deg,  rgba(255,151,45,1) 0%,rgba(255,66,6,1) 100%); /* W3C */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff972d', endColorstr='#ff4206',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
				color: #fff;
				overflow: hidden;
			}

			#device {
				font-size: 14vw;
				font-family: 'Oxygen', sans-serif;
			}

			#pre, #post {
				font-size: 4.2vw;
				font-family: 'Lato', sans-serif;
			}

			#github {
				position: absolute;
				bottom: 25px;
				right: 25px;
				font-family: 'Lato', sans-serif;
			}

			#github a {
				text-decoration: none;
				color: #fff;
			}

			#github a:hover {
				text-decoration: underline;
			}
		</style>
	</head>
	<body>
		<?php

			function get_quote($device, $arrangement, $rand) {
				global $hate_pre;
				global $hate_post;
				
				if($arrangement == 'pre') {
					return($hate_pre[$device][$rand]);
				} else {
					return($hate_post[$device][$rand]);
				}
				
			}
			
			$agent = $_SERVER['HTTP_USER_AGENT'];
				
			$array = array(
			
				'Your device sucks!', 'iPod', 'iPad', 'iPhone', 'Macintosh', 'Windows Phone', 'MSIE', 'Android', 'Windows'
				
			);
			
			$string = '';
			
			foreach ($array as $device) {
			
				$match = preg_match("/$device/", $agent);
				$string = $string.$match;
			
			}
			
			$result = str_split($string);
			
			$key = array_search('1', $result);
			
			$device = $array[$key];
			
			$hate_pre = array(
				'ios' => array(
					'You are using an overpriced',
					'Heavy patented',
					'Nice SSL you got with your',
					'Found your way with your',
					'What about Flash on your',
				),
				'android' => array(
					'Nice designed apps on your',
					'Do you still have the latest',
					'Let\'s talk about security for your'
				),
				'mac' => array(
					'If you want to upgrade your hardware on your',
					'I\'ve noticed you played much less games since you bought your',
					'Were you drunk when you payed for your'
				),
				'windows' => array(
					'When was your last BSOD with your',
					'Go, grab the latest virus scanner for',
					'An error has occured. Please turn off',
					'Are your'
				),
				'ie' => array(
					'How many toolbars does your',
					'Still no modern standards on your',
					'I hope you\'re just downloading another browser with your',
					'Did you rename your'
				),
				'wp' => array(
					'I hope you like the tiles on your',
					'The huge variety of apps on your',
					'Dont\'t cut off your fingers on the edges on your'
				)
			);
			
			$hate_post = array(
				'ios' => array(
					'',
					'you got there',
					'#gotofail',
					'though Apple Maps?',
					''
				),
				'android' => array(
					'device',
					'version?',
					''
				),
				'mac' => array(
					'you\'d better buy a new one',
					'',
					'or are you just an idiot?'
				),
				'windows' => array(
					'machine?',
					'',
					'and throw it in the trash',
					'drivers up to date?'
				),
				'ie' => array(
					'have?',
					'',
					'',
					'to "Browser-Download-Simulator '.date('Y').'" yet?'
				),
				'wp' => array(
					'',
					'is great, isn\'t it?',
					''
				)
			);
			
			switch($device) {
				case 'iPod':
				case 'iPad':
				case 'iPhone':
					$count = rand(0, (count($hate_pre['ios']) - 1));
					$pre = get_quote('ios', 'pre', $count);
					$post = get_quote('ios', 'post', $count);
					break;
				case 'Android':
					$count = rand(0, (count($hate_pre['android']) - 1));
					$pre = get_quote('android', 'pre', $count);
					$post = get_quote('android', 'post', $count);
					break;
				case 'MSIE':
					$count = rand(0, (count($hate_pre['ie']) - 1));
					$pre = get_quote('ie', 'pre', $count);
					$post = get_quote('ie', 'post', $count);
					$device = 'IE';
					break;
				case 'Windows':
					$count = rand(0, (count($hate_pre['windows']) - 1));
					$pre = get_quote('windows', 'pre', $count);
					$post = get_quote('windows', 'post', $count);
					break;
				case 'Windows Phone':
					$count = rand(0, (count($hate_pre['wp']) - 1));
					$pre = get_quote('wp', 'pre', $count);
					$post = get_quote('wp', 'post', $count);
					break;
				case 'Macintosh':
					$count = rand(0, (count($hate_pre['mac']) - 1));
					$pre = get_quote('mac', 'pre', $count);
					$post = get_quote('mac', 'post', $count);
					break;
			}
			
			echo '
			<div onclick="window.open(\'https://twitter.com/intent/tweet?hashtags=IHateYourDevice&amp;original_referer=http%3A%2F%2F'.$_SERVER['HTTP_HOST'].'%2F&amp;text='.urlencode($pre.' '.$device.' '.$post).'%20%E2%80%93&amp;tw_p=tweetbutton&amp;url=http%3A%2F%2F'.$_SERVER['HTTP_HOST'].'%2F\')">
			<div id="pre">'.$pre.'</div>
			<div id="device">'.$device.'</div>
			<div id="post">'.$post.'</div>
			</div>
			';
			echo '<div id="github"><a href="https://github.com/82OderSo/IHateYourDevice" target="_blank">Fork on GitHub</a></div>';
			
		?>
	</body>
</html>
