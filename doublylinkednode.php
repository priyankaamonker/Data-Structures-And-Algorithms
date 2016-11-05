<?php
class DoublyLinkedNode {
	private $data;
	private $nextNode;
	private $previousNode;
	
	function DoublyLinkedNode($data) {
		$this->data = $data;
	}
	
	function getData() {
		return $this->data;
	}
	
	function getNextNode() {
		return $this->nextNode;
	}
	
	function getPreviousNode() {
		return $this->previousNode;
	}
	
	function setData($data) {
		$this->data = $data;
	}
	
	function setNextNode(DoublyLinkedNode $nextNode = NULL) {
		$this->nextNode = $nextNode;
	}
	
	function setPreviousNode(DoublyLinkedNode $previousNode = NULL) {
		$this->previousNode = $previousNode;
	}
	
	function _toString() {
		return "Data: " . serialize($this->data);
	}
}

class DoublyLinkedList {
	private $head;
	
	function DoublyLinkedList() {
		$this->head instanceof DoublyLinkedNode;
	}
	
	function getHead() {
		return $this->head;
	}
	
	function setHead($data) {
		$this->head = $data;
	}
	
	function isHead($node) {
		return $this->head == $node;
	}
	
	function insertAtHead($data) {
		$newNode = new DoublyLinkedNode($data);
		$newNode->setNextNode($this->head);
		if($this->head != NULL) {
			$this->head->setPreviousNode($newNode);
		}
		$this->head = $newNode;
	}
	
	function _toString() {
		$result = "{";
		$current = new DoublyLinkedNode($this->head);
		while($current != NULL) {
			$result .= $current->toString() + ",";
			$current = $current->getNextNode();
		}
		
		$result .= "}";
		return $result;
	}	
}

class DoublyLinkedListDemo {
	function main($args) {
		$intergers = new DoublyLinkedList();
		
		$intergers->insertAtHead(5);
		$intergers->insertAtHead(10);
		$intergers->insertAtHead(7);
		$intergers->insertAtHead(8);
		$intergers->insertAtHead(4);
		
		print_r($intergers);
	}
}

$a = new DoublyLinkedListDemo();
$a->main(0);
?>