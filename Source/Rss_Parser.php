<?php

/**
 * @author Arian Stolwijk <http://www.aryweb.nl>
 * @license MIT-license
 */

class Rss_Parser {

	/**
	 *
	 * @var DOMDocument
	 */
	protected $doc;

	/**
	 *
	 * @var array
	 */
	protected $items = array();

	public function __construct(){
		$this->doc = new DOMDocument();
	}

	/**
	 *
	 * @param string $url
	 * @return Rss_Parser
	 */
	public function load($url){
		$this->doc->load($url);
		return $this;
	}

	/**
	 *
	 * @return DOMNode
	 */
	protected function getChannel(){
		return $this->doc->getElementsByTagName('channel')->item(0);
	}

	/**
	 *
	 * @param $reparse Should it reparse the rss feed if it was already done
	 * @return array with instances of Rss_Item
	 */
	public function getItems($reparse=false){
		if(empty($this->items) || $reparse){
			$channel = $this->getChannel();

			foreach($channel->getElementsByTagName("item") as $domItem){
				$this->items[] = $this->parseItem($domItem);
			}
		}
		return $this->items;
	}

	/**
	 * Get a certain item from the items
	 * @param $i
	 * @return Rss_Item
	 */
	public function getItem($i){
		$items = $this->getItems();
		if(isset($items[$i])){
			return $items[$i];
		}
		return false;
	}

	/**
	 * Parses an item
	 * @param DOMNode $item
	 * @return Rss_Item
	 */
	protected function parseItem(DOMNode $item){
		$rss_item = new Rss_Item();
		$rss_item->setTitle(		$item->getElementsByTagName("title")->item(0)->firstChild->data)
			->setLink(			$item->getElementsByTagName("link")->item(0)->firstChild->data)
			->setDescription(	$item->getElementsByTagName("description")->item(0)->firstChild->data);

		return $rss_item;
	}
}
