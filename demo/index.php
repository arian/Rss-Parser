<?php

include_once '../Rss_Item.php';
include_once '../Rss_Parser.php';

$rss = new Rss_Parser();
$rss->load('http://feeds.feedburner.com/tweakers/mixed');

foreach($rss->getItems() as $item){
	echo '<a href="'.$item->getLink().'">'.$item->getTitle().'</a><br />';
}
