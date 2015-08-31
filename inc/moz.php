<?php
// you can obtain you access id and secret key here: https://moz.com/products/api/keys
$accessID = "mozscape-c400337ba7";
$secretKey = "272edc64ff57f002b64551e2ea3b5de";
// Set your expires for several minutes into the future.
// Values excessively far in the future will not be honored by the Mozscape API.
$expires = time() + 300;
// A new linefeed is necessary between your AccessID and Expires.
$stringToSign = $accessID."\n".$expires;
// Get the "raw" or binary output of the hmac hash.
$binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
// We need to base64-encode it and then url-encode that.
$urlSafeSignature = urlencode(base64_encode($binarySignature));
// Add up all the bit flags you want returned.
// Learn more here: http://apiwiki.moz.com/url-metrics
$cols = 
/* Title */1 +
/* Canonical URL */4 +
/* External Equity Links */32 +
/* MozRank: URL */16384 +
/* Page Authority */34359738368 +
/* Domain Authority */68719476736 +
/* Time Last Crawled. */144115188075855872
;
// Put it all together and you get your request URL.
$requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/?Cols=".$cols."&AccessID=".$accessID."&Expires=".$expires."&Signature=".$urlSafeSignature;
// Put your URLS into an array and json_encode them.
$domain1 = $_POST['domain1'];
$domain2 = $_POST['domain2'];
$domain3 = $_POST['domain3'];

$batchedDomains = array($domain1);
$encodedDomains = json_encode($batchedDomains);
// We can easily use Curl to send off our request.
// Note that we send our encoded list of domains through curl's POSTFIELDS.
$options = array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POSTFIELDS     => $encodedDomains
	);
$ch = curl_init($requestUrl);
curl_setopt_array($ch, $options);
$content = curl_exec($ch);
curl_close( $ch );
$contents = json_decode($content, true);
//print_r ($contents);

$page_title = $content['ut'];
$canonical_url = $content['uu'];
$external_link_equity = $content['euid'];
$mozRank_url = round($content['umrp'],0);
$page_authority = round($content['upa'],0);
$domain_authority = round($content['pda'],0);
$last_crawled = $content['ulc'];

	header('Content-Type: application/json');
	echo json_encode($contents);
?>