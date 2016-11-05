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
	
	function applyOperator($operator, $data1, $data2) {
		if($operator == "+") 
			return $data1 + $data2;
		if($operator == "-") 
			return $data1 - $data2;		
		if($operator == "*") 
			return $data1 * $data2;		
		if($operator == "/") 
			return $data1 / $data2;		
		if($operator == "%") 
			return $data1 % $data2;	
			
		throw new Exception("Invalid Operator");
	}
	
	function isOperator($data) {
		if($data == "+" || $data == "-" || $data == "*" || $data == "/" || $data == "%")
			return true;
		return false;		
	}
	
	function stripBrakets($data) {
		$data = str_replace("(", " ", $data);
		$data = str_replace(")", " ", $data);
		return trim($data);
	}
		
	function evaluateExp($data) {
		$exp = $this->stripBrakets($data);
		$exp = explode(" ", $exp);
		foreach($exp as $key => $val) {
			if($this->isOperator($val)) {
				$this->pushFirst($val);
				$this->pushSecond("#");
			}
			else if(is_numeric($val)) {
				if($this->isEmptySecond() || (!$this->isEmptySecond() && $this->peekSecond() == "#")) {
					$this->pushSecond($val);
				} else {
					while(!$this->isEmptySecond() && is_numeric($this->peekSecond())) {
						$inStack = $this->popSecond();
						$this->popSecond(); // pop the marker
						$operator = $this->popFirst();
						$result = $this->applyOperator($operator, $inStack, $val);
						if($this->isEmptySecond() || $this->peekSecond() == "#") {
							$this->pushSecond($result);
							break;
						}
						$val = $result;
					}
				}
			}
		}
		echo $this->popSecond(); // return evaluated result
	}
}

$stack = new TwoStack();
try {
	$stack->evaluateExp("+ 3 (+ (* 2 8) 9)");
} 
catch(Exception $e) {
	echo "Message: " . $e->getMessage() . "<br>";
}
print_r($stack);
?>