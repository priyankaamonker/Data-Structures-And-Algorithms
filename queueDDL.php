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
	
	function getLastNode() {
		$node = $this->head;
		while($node->getNextNode() != NULL) 
			$node = $node->getNextNode();
		
		if($node->getNextNode() == NULL) 
			return $node;
	}
	
	function insertAtTail($data) { // push method for queue
		$newNode = new DoublyLinkedNode($data);
		if($this->head == NULL) {
			$this->head = $newNode;
		} else {
			$lastNode = $this->getLastNode();
			$lastNode->setNextNode($newNode);
			$newNode->setPreviousNode($lastNode);
		}
	}
	
	function deleteAtHead() { // pop method for queue
		$newHead = $this->head->getNextNode();
		$newHead->setPreviousNode(NULL);
		$this->head = $newHead;
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
		

		$intergers->insertAtTail(6); // push method
		$intergers->insertAtTail(16); // push method
		$intergers->insertAtTail(26); // push method
		print_r($intergers);
		$intergers->deleteAtHead(); // pop method
		print_r($intergers);
		print_r($intergers->getHead()->getData()); //peek method
	}
}

$a = new DoublyLinkedListDemo();
$a->main(0);
?>