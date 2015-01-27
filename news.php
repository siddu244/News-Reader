$feed_url="http://feeds.feedburner.com/NdtvNews-TopStories?format=xml";
$s="";
// $feed_url="http://timesofindia.feedsportal.com/c/33039/f/533916/index.rss";

$content = file_get_contents($feed_url);
$x = new SimpleXmlElement($content);
 

foreach($x->channel->item as $entry) {
	echo $entry->title.'<br>';

}