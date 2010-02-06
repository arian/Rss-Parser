<?php

class Rss_Item {

	/**
	 *
	 * @var string
	 */
	protected $title;

	/**
	 *
	 * @var string
	 */
	protected $link;

	/**
	 *
	 * @var string
	 */
	protected $description;

	/**
	 *
	 * @return string
	 */
	public function getTitle(){
		return $this->title;
	}

	/**
	 *
	 * @param string $title
	 * @return Rss_Item
	 */
	public function setTitle($title){
		$this->title = $title;
		return $this;
	}

	/**
	 *
	 * @return string
	 */
	public function getLink(){
		return $this->link;
	}

	/**
	 *
	 * @param string $link
	 * @return Rss_Item
	 */
	public function setLink($link){
		$this->link = $link;
		return $this;
	}

	/**
	 *
	 * @return string
	 */
	public function getDescription(){
		return $this->description;
	}

	/**
	 *
	 * @param string $desc
	 * @return Rss_Item
	 */
	public function setDescription($desc){
		$this->description = $desc;
		return $this;
	}

	public function toArray(){
		return array(
			'title' => $this->getTitle(),
			'link' => $this->getLink(),
			'description' => $this->getDescription()
		);
	}

}