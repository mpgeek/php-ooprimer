<?php
/**
 * @file LinkedList.class.php
 *		Simple linked list class.
 * @author Steve King <steve@sming.com.au>
 */	

class LinkedList {

	protected $_first;		// head
	protected $_last;			// tail
	protected $_total;		// node count
	protected $_pos;			// iterator position
	protected $_posData;	// node data at current position

	// Construct an empty list.
	public function __construct() {
		$this->_first = NULL;
		$this->_last = NULL;
		$this->_pos = 0;
		$this->_total = 0;
	}

	// Append a node, i.e. new item is tail.
	public function insert($Input = FALSE) {
		$Link = new LinkedListNode($Input);

		if ( $this->_last == NULL && $this->_first == NULL ) {
			$Link->next = NULL;
			$this->_first = &$Link;
			$this->_last = &$Link;
			$this->_total++;
		}
		else {
			$Link->next = NULL;
			$this->_last->next = $Link;
			$this->_last = &$Link;
			$this->_total++;
		}
	}

	// Get the next element.
	public function next() {
		if ( $this->_posData == NULL ) {
			// This is a circular LL
			$this->_posData = $this->_first;
		}
		else {
			$this->_posData = $this->_posData->next;
		}
		$this->_pos++;
		return $this->_posData->data;
	}

	// Reverse the list, also reset the position of the active element,
	// later it's probably a good idea to think about setting this to 
	// the right position?
	public function reverse() {
		// Because we have linked both first and last, we uset the last;
		unset($this->_last);
		// Now we begin to iterate through from the start;
		$linkNode = $this->_first;
		// Set the next element to null;
		$linkReverse = NULL;

		// While nodes are flowing...
		while ( $linkNode != NULL ) {
			// Set a switcher to the next element;
			$Switch = $linkNode->next;
			// Set the next element to the last;
			$linkNode->next = $linkReverse;
			// Set the last element to this one;
			$linkReverse = $linkNode;
			// And set the first one to the next;
			$linkNode = $Switch;
		}

		// Now find the last element again;
		// There's probably a more efficient way
		$Switcher = $this->_first;
		while ( $Switcher->next != NULL ) {
			$Switcher = $Switcher->next;
		}
		// Now set the last element correctly;
		$this->_last = $Switcher;
		// Set the first element again;
		$this->_first = $linkReverse;
	}

	// Resets the iterator position to the beginning.
	public function reset() {
		// Set our pointers back to the start;
		$this->_posData = NULL;
		$this->_pos = 0;
	}

	// Get the tail.
	public function last() {
		return $this->_last;
	}

	// Get the head.
	public function first() {
		return $this->_first;
	}

}

/**
 * @file ListNode.class.php
 * 		Simple linked list node class.
 */
class LinkedListNode {

	public $data;
	public $next;

	public function __construct($Input = FALSE) {
		$this->data = $Input;
		$this->next = NULL;
	}

	// Simple getter.
	public function read() {
		return $this->data;
	}

}

