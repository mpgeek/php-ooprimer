<?php
/**
 * @file Article.class.php
 *		This is our first simple class. EARTH SHATTERING!
 */

class Article {

	// Don't use 'private' unless there's a good reason for it. Normally, we
	// will want derived class objects to have access to this member data.
	protected $title;
	protected $body;

	// Note that we cannot instantiate an "empty" article. We have to supply a
	// title and body. This is known as dependency injection. We could have opted
	// for providing default arguments if none were supplied (another time).
	public function __construct($title, $body) {
		if (strlen($title) < 1) {
			throw new InvalidArgumentException('Title must contain something.');
		}
		if (strlen($body) < 1) {
			throw new InvalidArgumentException('Body must contain something');
		}
		$this->title = $title;
		$this->body = $body;
	}
	
	// Simple getter.
	public function getTitle() {
		return $this->title;
	}

	// Simple getter.
	public function getBody() {
		return $this->body;
	}

	// Get an excerpt that is $length characters long, starting from the
	// beginning. Throws an out of range exception if the requested
	// length is larger than the body legth or if it is negative.
	public function getTeaser($length) {
		if ($length >= strlen($this->body)) {
			throw new OutOfRangeException('Teaser length requested is longer than the body of the article.');
		} elseif ($length < 0) {
			throw new OutOfRangeException('Teaser length cannot be negative');
		}

		return substr($this->body, 0, $length);
	}
}

?>
