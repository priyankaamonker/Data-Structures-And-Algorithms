<?php
class Heap {
	private $data;
	private $position = -1;
	
	function setData($data) {
		$this->data = $data;
	}
	
	function getdata() {
		return $this->data;
	}
	
	function insert($data) {
		$this->data[++$this->position] = $data;
		$this->fixUp($this->position);
	}
	
	function fixUp($index) {
		$i = ($index - 1)/2; // parent index
		while($i >= 0 && $this->data[$i] < $this->data[$index]) {
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
		$this->position--;
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
				
				if($this->data[$index] < $this->data[$childToSwap]) {
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
	
	function heapSort($data) {	
		$this->setData($data->data);
	    $index = $data->position;
		for($i=0;$i<$index;$i++) {
			$tmp = $this->data[0];
			$this->data[0] = $this->data[$index-$i];
			$this->data[$index-$i] = $tmp;	
			$this->fixDown(0,$index-$i-1);
		}
		print_r($this->data);
	}
	
	//built heap from array
	function heapify($data) {
		$newHeap = new Heap;
		for($i=0;$i<count($data);$i++) {
			$newHeap->insert($data[$i]);
		}
		return $newHeap;
	}
}
$a = new Heap();
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
echo "<br>";
$a->deleteRoot();
print_r($a);
$b = new Heap();
$array = [12, 3, 5, 2, 7];
$bheap = $b->heapify($array);
print_r($bheap);
echo "<br>";
$b->heapSort($bheap);
?>