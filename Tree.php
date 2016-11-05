<?php
class TreeNode {
	private $data;
	private $leftChild;
	private $rightChild;
	private $isDeleted = false;
	private $numberOfLeaves = 0;
	private $leftHeight = 0;
	private $rigthHeight = 0;
	
	function TreeNode($data) {
		$this->data = $data;
	}
	
	function setData($data) {
		$this->data = $data;
	}
	
	function setLeftChild($data) {
		$this->leftChild = $data;
	}
	
	function setRightChild($data) {
		$this->rightChild = $data;
	}
	
	function getData() {
		return $this->data;
	}
	
	function getLeftChild() {
		return $this->leftChild;
	}
	
	function getRightChild() {
		return $this->rightChild;
	}
	
	function isLeaf() {
		return $this->leftChild == NULL && $this->rightChild == NULL;
			 
	}
	
	function find($data) {
		if($this->data == $data && !$this->isDeleted())
			return $this->data;
		if($data < $this->data && $this->leftChild != NULL)
			return $this->leftChild->find($data);
		if($this->rightChild != NULL)
			return $this->rightChild->find($data);
		return NULL;
	}
	
	function insert($data) {
		if($data >= $this->data) {
			if($this->rightChild == NULL) 
				$this->rightChild = new TreeNode($data);
			else
				$this->rightChild->insert($data);
		} else {
			if($this->leftChild == NULL)
				$this->leftChild = new TreeNode($data);
			else
				$this->leftChild->insert($data);
		}
	}
	
	function delete() {
		$this->isDeleted = true;
	}
	
	function isDeleted() {
		return $this->isDeleted;
	}
	
	function smallest() {
		if($this->leftChild == NULL)
			return $this->data;
		return $this->leftChild->smallest();
	}
	
	function largest() {
		if($this->rightChild == NULL)
			return $this->data;
		return $this->rightChild->largest();
	}
	
	function traverseInOrder() { // in order
		if($this->leftChild != NULL)
			$this->leftChild->traverseInOrder();
		echo $this->data . " ";
		if($this->rightChild != NULL)
			$this->rightChild->traverseInOrder();
	}
	
	function numOfLeafNodes() {
		if($this->isLeaf()) return 1;
		if($this->leftChild != NULL)
			$this->numberOfLeaves += $this->leftChild->numOfLeafNodes();
		if($this->rightChild != NULL)
			$this->numberOfLeaves += $this->rightChild->numOfLeafNodes();
		return $this->numberOfLeaves;
	}
	
	function height() {
		if($this->isLeaf()) return 1;
		if($this->leftChild != NULL)
			$this->leftHeight += $this->leftChild->height();
		if($this->rightChild != NULL)
			$this->rigthHeight += $this->rightChild->height();
		return $this->leftHeight > $this->rigthHeight ? $this->leftHeight + 1: $this->rigthHeight + 1;
	}
	
	function addSorted($array, $start, $end) {
		if($end >= $start) {
			$mid = floor(($start+$end)/2);
			$newNode = new TreeNode($array[$mid]);
			$newNode->leftChild = $this->addSorted($array, $start, $mid-1);
			$newNode->rightChild = $this->addSorted($array, $mid+1, $end);
			return $newNode;
		}
		return;
	}
}

class BinarySearchTree {
	private $root;
	
	function __construct() {
		$this->root instanceof TreeNode;
	}
	
	function insert($data) {
		if($this->root == NULL)
			$this->root = new TreeNode($data);
		else
			$this->root->insert($data);
	}
	
	function find($data) {
		if($this->root != NULL)
			return $this->root->find($data);
		return NULL;
	}
	
	function delete($data) {
		$current = $this->root;
		$parent = $this->root;
		$isLeftChild = false;
		
		if($current == NULL)
			return;
		
		while($current != NULL && $current->getData() != $data) {
			$parent = $current;
			
			if($data < $current->getData()) {
				$current = $current->getLeftChild();
				$isLeftChild = true;
			} else {
				$current = $current->getRightChild();
				$isLeftChild = false;
			}
			
			if($current == NULL) // reached end of tree
				return;
					
			if($current->getLeftChild() == NULL && $current->getRightChild() == NULL) { //delete case 1
				if($current == $this->root) {
					$this->root = NULL;
				} else {
					if($isLeftChild)
						$parent->setleftChild(NULL);
					else
						$parent->setRightChild(NULL);
				}
			} 
			else if($current->getRightChild() == NULL) { // delete case 2 - for leftChild
				if($current == $this->root) {
					$this->root = $current->getLeftChild();
				} else if($isLeftChild) {
					$parent->setLeftChild($current->getLeftChild());
				} else {
					$parent->setRightChild($current->getLeftChild());
				}
			}
			else if($current->getLeftChild() == NULL) { // delete case 2 - for rightChild
				if($current == $this->root) {
					$this->root = $current->getRightChild();
				} else if($isLeftChild) {
					$parent->setLeftChild($current->getRightChild());
				} else {
					$parent->setRightChild($current->getRightChild());
				}
			}
		}
	}
	
	function softDelete(int $data) {
		$toDelete = find($data);
		$toDelete->delete();
	}
	
	function smallest() {
		if($this->root != NULL)
			return $this->root->smallest();
		return NULL;
	}
	
	function largest() {
		if($this->root != NULL)
			return $this->root->largest();
		return NULL;
	}
	
	function traverseInOrder() {
		if($this->root != NULL)
			return $this->root->traverseInOrder();
		return NULL;
	}
	
	function numOfLeafNodes() {
		if($this->root != NULL)
			return $this->root->numOfLeafNodes();
		return NULL;
	}
	
	function height() {
		if($this->root != NULL)
			return $this->root->height();
		return NULL;		
	}
	
	function createBinarySearchTree($array) {
		$bst = new BinarySearchTree();
		$length = count($array);
		if($length > 0)
			$bst = $this->root->addSorted($array, 0, $length-1);
		
		return $bst;
	}
}

$a = new BinarySearchTree();
$a->insert(14);
$a->insert(3);
$a->insert(6);
$a->insert(4);
$a->insert(24);
$a->insert(7);
//$a->insert(11);
//$a->insert(25);
//$a->insert(23);
print_r($a);echo "<br>";
echo $a->find(6);echo "<br>";
echo $a->find(16);echo "<br>";
echo $a->smallest();echo "<br>";
echo $a->largest();echo "<br>";
//$a->delete(4);
//print_r($a);echo "<br>";
echo $a->traverseInOrder();echo "<br>";
echo $a->numOfLeafNodes();echo "<br>";
echo $a->height();echo "<br>";
$array = [1,2,3,4,5,6,7,8,9,10];
$m = $a->createBinarySearchTree($array);
print_r($m);
?>