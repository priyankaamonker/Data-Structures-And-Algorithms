<?php
class TwoStack {
	private $items = array();
	private $top1 = -1;
	private $top2 = -2;
	private $limit = 15;
	
	function isEmptyFirst() {
		return $this->top1 < 0;
	}
	
	function isEmptySecond() {
		return $this->top2 < 0;
	}
	
	function pushFirst($item) {
		if($this->limit <= (count($this->items) - 1)) 
			throw new Exception("Stack1 is Full");
		$this->items[$this->top1 += 2] = $item;
	}
	
	function pushSecond($item) {
		if($this->limit <= (count($this->items) - 1)) 
			throw new Exception("Stack2 is Full");
		$this->items[$this->top2 += 2] = $item;
	}
	
	function popFirst() {
		if($this->isEmptyFirst())
			throw new Exception("Stack is empty");
		
		$this->top1 -= 2; //adjust the top pointer
		return $this->items[$this->top1 + 2]; // return the value at old top
	}
	
	function popSecond() {
		if($this->isEmptySecond())
			throw new Exception("Stack2 is empty");
		
		$this->top2 -= 2; //adjust the top pointer
		return $this->items[$this->top2 + 2]; // return the value at old top
	}
	
	function peekFirst() {
		if($this->isEmptyFirst())
			throw new Exception("Stack1 is empty");
		return $this->items[$this->top1];
	}
	
	function peekSecond() {
		if($this->isEmptySecond())
			throw new Exception("Stack2 is empty");
		return $this->items[$this->top2];
	}
}

$stack = new TwoStack();
try {
	$stack->pushFirst(1);
	$stack->pushFirst(5);
	$stack->pushFirst(4);
	$stack->pushFirst(6);
	$stack->pushFirst(10);
	
	echo $stack->popFirst();
	echo "<br>";
	echo $stack->peekFirst();
	
	echo "<br><hr><br>";
	
	$stack->pushSecond(11);
	$stack->pushSecond(51);
	$stack->pushSecond(41);
	$stack->pushSecond(61);
	$stack->pushSecond(101);
	
	echo $stack->popSecond();
	echo "<br>";
	echo $stack->peekSecond();
	
	echo "<br>";
} 
catch(Exception $e) {
	echo "Message: " . $e->getMessage() . "<br>";
}
print_r($stack);
?>