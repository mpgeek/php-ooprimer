<?php

class Article {

	protected $title;
	protected $body;

	public function __construct($title, $body) {
		$this->title = $title;
		$this->body = $body;
	}
	public function __destruct() {}

	public function getTitle() {
		return $this->title;
	}

	public function getBody() {
		return $this->body;
	}
}

?>
