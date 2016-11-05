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
	
	function setData($data) {
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
	
	function appendLastNAtHead(LinkedList $l, $n) {
		$ref1 = $l->getHead();
		$ref2 = $l->getHead();
		
		for($i=0;$i<$n;$i++) {
			$ref1 = $ref1->getNextNode();
		}
		
		while($ref1->getNextNode() != NULL) {
			$ref1 = $ref1->getNextNode();
			$ref2 = $ref2->getNextNode();
		}

		$ref1->setNextNode($l->getHead());
		$l->setHead($ref2->getNextNode());
		$ref2->setNextNode(NULL);
	}
	
	function reverse(LinkedList $l) {
		$current = $l->getHead();
		$prev = NULL;
		$next = "";
		
		while($current!=NULL) {
			$next = $current->getNextNode();
			$current->setNextNode($prev);
			$prev = $current;
			$current = $next;
		}
		$l->setHead($prev);
	}
	
	function findNthNodeFromTail(LinkedList $l, $k) {
		$length = $l->length();
		$m = $length-$k;
		$ref = $l->getHead();
		for($i=0;$i<$m;$i++) {
			$ref = $ref->getNextNode();
		}
		print_r($ref);
	}
	
	function deleteDuplicates1(LinkedList $l) {//extra memory used
		$arr = array();
		$ref = $l->getHead();
		$prev = "";
		while($ref->getNextNode() != NULL) {
			if(!in_array($ref->getData(),$arr)) {
				$arr[] = $ref->getData();
				$prev = $ref;
			} else{
				$prev->setNextNode($ref->getNextNode());
			}
			$ref = $ref->getNextNode();
		}
		
		if($ref->getNextNode() == NULL) {
			if(in_array($ref->getData(),$arr)) {
			$prev->setNextNode(NULL);
			}
		}
		print_r($l);
	}
	
	function deleteDuplicates2(LinkedList $l) {
		$ref1 = $l->getHead();
		$prev = "";
		while($ref1->getNextNode() != NULL) {
			$ref2 = $ref1->getNextNode();
			while($ref2->getNextNode() != NULL) {
				if($ref1->getData() == $ref2->getData()) {			
					$prev->setNextNode($ref2->getNextNode());
				}
				$prev = $ref2;
				$ref2 = $ref2->getNextNode();
			}
			if($ref2->getNextNode() == NULL) {
				if($ref1->getData() == $ref2->getData()) {	
					$prev->setNextNode(NULL);
				}
			}
			$ref1 = $ref1->getNextNode();
		}
		print_r($l);
	}
	
	function deleteNode(Node $n) {
		if($n != NULL && $n->getNextNode() != NULL) {
			$n->setData($n->getNextNode()->getData());
			$n->setNextNode($n->getNextNode()->getNextNode());
		}
	}
	
	function isCircular(LinkedList $l) {
		$start = $l->getHead();
		$next = $start->getNextNode();
		if($l == NULL || $start == NULL || $start->getNextNode() == NULL)
			return "Not Circular";
		while($next->getNextNode() != NULL) {
			if($next == $start)
				return "Circular List";
			$next = $next->getNextNode();
		}
		if($next->getNextNode() == NULL)
			return "Not Circular";
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
}

class LinkedListDemo {
	static function main($args) {
		$list = new LinkedList();
		
		$list->insertAtHead(7);
		$list->insertAtHead(14);
		$list->insertAtHead(3);		
		$list->insertAtHead(6);		
		$list->insertAtHead(4);		
		$list->insertAtHead(8);	
		$list->insertAtHead(3);
		$list->insertAtHead(14);		
		$list->insertAtHead(10);
		$list->insertAtHead(3);		
		print_r($list);
		//$list->appendLastNAtHead($list, 2);
		//$list->reverse($list);
		//$list->findNthNodeFromTail($list, 2);
		//$list->deleteDuplicates1($list);
		//$list->deleteDuplicates2($list);
		
		//$n = $list->getHead()->getNextNode()->getNextNode()->getNextNode()->getNextNode();
		//$list->deleteNode($n);
		//print_r($list);
		
		print_r($list->getHead());
		echo $ans = $list->isCircular($list);
	}
}

$a = new LinkedListDemo();
$a->main(0);
?>