<?php
class QuickSort {
	private $array;
	function mainfn($array) {
		$this->array = $array;
		$length = count($this->array);
		$result = $this->quick_sort(0, $length-1);
		print_r($result);
	}
	
	function quick_sort($start, $end) {
		if($start < $end) {
			$pivot = $this->partition($start, $end);
			$this->quick_sort($start, $pivot-1);
			$this->quick_sort($pivot+1, $end);
		}
		return $this->array;
	}

	function partition($start, $end) {
		$pivot = $this->array[$end];
		$i = $start;
		for($j=$start;$j<=$end-1;$j++) {
			if($this->array[$j] <= $pivot) {
				$temp = $this->array[$i];
				$this->array[$i] = $this->array[$j];
				$this->array[$j] = $temp;
				$i++;
			}
		}
		$temp = $this->array[$i];
		$this->array[$i] = $this->array[$end];
		$this->array[$end] = $temp;
		return $i;
	}
}
$qsort = new QuickSort();
$array = [12, 3, 5, 2, 17, 10, 4, 90];
$qsort->mainfn($array);
?>