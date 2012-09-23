<?php
/**
 * @file ArticleSeries.class.php
 *		A simple class demonstrating inheritance.
 */

class ArticleSeries extends LinkedList {

	// Tell us how many articles are in the series.
	public function count() {
		return $this->_total;
	}

	// Get an array of article titles
	public function getTitles() {
		// Start from the head.
		$this->reset();
		$info = array();
		for ($i = 0; $i < $this->_total; $i++) {
			$info[] = $this->next()->getTitle();
		}
		return $info;
		
	}
}

?>
