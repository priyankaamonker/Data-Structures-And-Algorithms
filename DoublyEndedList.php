<?php
class Node {
	private $data;
	private $nextNode;
	
	function Node($data) {
		$this->data = $data;
	}
	
	function getData() {
		return $this->data;
	}
	
	function setData(int $data) {
		$this->data = $data;
	}
	
	function getNextNode() {
		return $this->nextNode;
	}
	
	function setNextNode(Node $nextNode = NULL) {
		$this->nextNode = $nextNode;
	}
	
	function _toString() {
		return "Data: " . serialize($this->data);
	}
}

class DoublyEndedList {
	private $head;
	private $tail;
	
	function DoublyEndedList() {
		$this->head instanceof Node;
		$this->tail instanceof Node;
	}
	
	function getHead() {
		return $this->head;
	}
	
	function setHead($data) {
		$this->head = $data;
	}
	
	function getTail() {
		return $this->tail;
	}
	
	function setTail($data) {
		$this->tail = $data;
	}
	
	function insertAtTail($data) {
		$newNode = new Node($data);
		if($this->head == NULL) {
			$this->head = $newNode;
		}
		if($this->head != NULL) {
			$newNode->setNextNode($this->tail);
			$this->tail = $newNode;
		}
	}
	
	function _toString() {
		$result = "{";
		$current = $this->head;
		while($current!=NULL) {
			$result .= $current->toString() + ", ";
			$current = $current->getNextNode();
		}
		$result .= "}";
		return $result;
	}
}

class DoublyEndedListDemo {
	function main($args) {
		$dList = new DoublyEndedList();
		$dList->insertAtTail(19);
		$dList->insertAtTail(18);
		$dList->insertAtTail(17);
		print_r($dList);
	}
}

$a = new DoublyEndedListDemo();
$a->main(0);
?>