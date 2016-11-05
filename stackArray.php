<?php
class Stack {
	private $items = array();
	private $top = -1;
	private $limit = 10;
	
	function isEmpty() {
		return $this->top < 0;
	}
	
	function push($item) {
		if($this->limit == count($this->items)-1)
			throw new Exception("Stack is Full");
		$this->items[++$this->top] = $item;
	}
	
	function pop() {
		if($this->isEmpty())
			throw new Exception("Stack is empty");
		return $this->items[$this->top--];
	}
	
	function peek() {
		if($this->isEmpty())
			throw new Exception("Stack is empty");
		return $this->items[$this->top];
	}
}

$stack = new Stack();
var_dump($stack->isEmpty()); 
try {
	$stack->push(1);
	$stack->push(5);
	$stack->push(4);
	$stack->push(6);
	$stack->push(10);
	$stack->push(12);
	$stack->push(51);
	$stack->push(45);
	$stack->push(66);
	$stack->push(103);
	$stack->push(662);
	
	echo $stack->pop();
	echo "<br>";
	echo $stack->peek();
} 
catch(Exception $e) {
	echo "Message: " . $e->getMessage() . "<br>";
}
var_dump($stack->isEmpty());
print_r($stack);
?>