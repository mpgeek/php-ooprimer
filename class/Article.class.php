<?php
/**
 * @file Article.php
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
		$this->title = $title;
		$this->body = $body;
	}
	
	// A destructor insn't mandatory, but memories of C/C++ make me think when
	// we build more-complex objects, we will want destructors to manage memory
	// and prevent leaks (maybe not, but we'll see).
	public function __destruct() {}

	// Simple getter.
	public function getTitle() {
		return $this->title;
	}

	// Simple getter.
	public function getBody() {
		return $this->body;
	}

	// Get an excerpt that is $length characters long, starting from the
	// beginning. The break may be in teh middle of a word. If the length
	// is less than one, or larger then the character count in the body, an
	// error string is retured instead.

	public function getExcerpt($length) {
		$info = 'Cannot get an excerpt of length ' . $length;
		if ((((int)$length) < 1) || (((int)$length) <= strlen($this->body))) {
			$info = substr($this->body, 0, $length);
		}
		return $info;
	}
}

?>
