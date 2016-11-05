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

class LinkedList {
	private $head;
	
	function LinkedList() {
		$this->head instanceof Node;	
	}
	
	function getHead() {
		return $this->head;
	}
	
	function setHead($data) {
		$this->head = $data;
	}
	
	function insertAtHead($data) {
		$newNode = new Node($data);
		$newNode->setNextNode($this->head);
		$this->head = $newNode;
	}
	
	function _toString() {
		$result = "{";
		$current = new Node($this->head);
		while($current != NULL) {
			$result .= $current->toString() + ",";
			$current = $current->getNextNode();
		}
		
		$result .= "}";
		return $result;
	}
	
	function length(){
		$length = 0;
		$current = $this->head;
		while($current != NULL) {
			$length++;
			$current = $current->getNextNode();
		}
		return $length;
	}
	
	function deleteFromHead() {
		$this->head = $this->head->getNextNode();
	}
	
	function find($data) {
		$current = $this->head;
		while($current != NULL) {
			if($current->getData() == $data) {
				return $current;
			}
			$current = $current->getNextNode();
		}
		return NULL;
	}
}

class LinkedListDemo {
	static function main($args) {
		$list = new LinkedList();
		
		$list->insertAtHead(14);
		$list->insertAtHead(3);		
		$list->insertAtHead(6);		
		$list->insertAtHead(4);		
		$list->insertAtHead(8);		
		$list->insertAtHead(10);	
		print_r($list);	
		$length = $list->length();
		echo "<br>".$length."<br>";
		$list->deleteFromHead();
		print_r($list);
		$found = $list->find(3);
		echo "<br>Found 3: ";
		print_r($found);
	}
}

$a = new LinkedListDemo();
$a->main(0);
?>