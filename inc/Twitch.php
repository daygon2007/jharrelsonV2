<?php
/**
 * @package Twitch TV PHP Api
 * @author Aaron Bartholomew <aaronbartholomew.com>
 * @copyright Aaron Bartholomew 2013
 * @version 1.3
 **/


class Twitch {

	public function getApiUri($type) {
		$apiUrl = "https://api.twitch.tv/kraken";
		$apiCalls = array(
			"streams" => $apiUrl."/streams/",
			"search" => $apiUrl."/search/",
			"channel" => $apiUrl."/channels/",
			"user" => $apiUrl."/user/",
			"teams" => $apiUrl."/teams/",
		);
		return $apiCalls[$type];
	}

	public function getFeatured($game) {
		$s = file_get_contents($this->getApiUri("streams")."?game=".urlencode($game)."&limit=1&offset=0");
		$activeStreams = json_decode($s, true);
		$streams = $activeStreams["streams"];
		foreach($streams as $stream) {
			return $stream["channel"]["name"];
		}
	}
	public function getStreams($game, $page, $limit) {
		$offset = ($page-1)*$limit;
		$s = file_get_contents($this->getApiUri("streams")."?game=".urlencode($game)."&limit=$limit&offset=$offset");
		$activeStreams = json_decode($s, true);
		$streams = $activeStreams["streams"];
		$final = "";
		foreach($streams as $stream) {
			$imgsm = $stream["preview"]["small"];
			$imgmed = $stream["preview"]["medium"];
			$viewers = $stream["viewers"];
			$channel = $stream["channel"];
			$status = $channel["status"];
			$twitchName = $channel["name"];
			$twitchDisplay = $channel["display_name"];
			$twitchLink = $channel["url"];

			$final .= "<a class=\"stream-item\" href=\"/users/$twitchName\"><img src=\"$imgmed\"><span class=\"name\">$status</span><span class=\"viewers\">$viewers viewers</span></a>";
		}
		echo $final;
	}

	public function getChannel($channel) {
		$c = file_get_contents($this->getApiUri("channel").$channel);
		$channelData = json_decode($c, true);
		return $channelData;
	}
	public function getFollowers($channel) {
		$f = file_get_contents($this->getApiUri("channel").$channel."/follows");
		$followData = json_decode($f, true);
		return $followData["_total"];
	}
	public function getChannelStream($channel) {
		$s = file_get_contents($this->getApiUri("streams").$channel);
		$streamData = json_decode($s, true);
		return $streamData;
	}

}
?>