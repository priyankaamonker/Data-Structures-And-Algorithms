<?php
class AscHeap {
	private $data;
	private $position = -1;
	
	function setData($data) {
		$this->data = $data;
	}
	
	function getData() {
		return $this->data;
	}
	
	function getPosition() {
		$this->position;
	}
	
	function insert($data) {
		$this->data[++$this->position] = $data;
		$this->fixUp($this->position);
	}
	
	function fixUp($index) {
		$i = ($index - 1)/2; // parent index
		while($i >= 0 && $this->data[$i] > $this->data[$index]) {
			$tmp = $this->data[$index];
			$this->data[$index] = $this->data[$i];
			$this->data[$i] = $tmp;
			$index = $i;
			$i = ($index - 1)/2;
		}
	}
	
	function deleteRoot() {
		$this->data[0] = $this->data[$this->position];
		$this->data[$this->position] = "";
		$this->position--;echo "<br>here";print_r($this->data);
		$this->fixDown(0,-1);
		
	}
	
	function fixDown($index, $upto) {
		if($upto < 0) 
			$upto = $this->position;
		while($index <= $upto) {
			$left = 2 * $index + 1;
			$right = 2 * $index +2;
			if($left <= $upto) {
				if($right > $upto)
					$childToSwap = $left;
				else
					$childToSwap = ($this->data[$left] > $this->data[$right]) ? $left : $right;
				
				if($this->data[$index] > $this->data[$childToSwap]) {
					$tmp = $this->data[$index];
					$this->data[$index] = $this->data[$childToSwap];
					$this->data[$childToSwap] = $tmp;
				} else {
					break;
				}
				$index = $childToSwap;
			} else {
				break;
			}
		}		
	}
}
$a = new AscHeap();
$a->insert(8);
$a->insert(3);
$a->insert(5);
$a->insert(7);
$a->insert(2);
$a->insert(15);
$a->insert(17);
$a->insert(19);
print_r($a);

echo "<br>";
$a->deleteRoot();
print_r($a);
?>