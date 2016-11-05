<?php
class MergeSorter {
	private $input_array;
	
	function sortdata($array) {
		$this->input_array = $array;
		$this->mergeSort(0, count($this->input_array)-1);
		print_r($this->input_array);
	}
	
	function mergeSort($start, $end) {
		if($start < $end) {
			$middle = floor(($start+$end)/2);
			$this->mergeSort($start, $middle);
			$this->mergeSort($middle+1, $end);
			return $this->merge($start, $middle, $end);
		}
	}

	function merge($start, $middle, $end) {
		$n1 = $middle - $start + 1;
		$n2 = $end - $middle;
		$left = array();
		$right = array();
		for($i=0; $i<$n1; $i++) {
			$left[$i] = $this->input_array[$start + $i];
		}
		
		for($j=0; $j<$n2;$j++) {
			$right[$j] = $this->input_array[$middle + 1 + $j];
		}
		
		$i = 0;
		$j = 0;
		for($k = $start; $k <= $end; $k++) {
			if($j >= $n2 || ($i < $n1 && $left[$i] <= $right[$j])) {
				$this->input_array[$k] = $left[$i];
				$i++;
			} else {
				$this->input_array[$k] = $right[$j];
				$j++;
			}
		}
	}
}
$sorter = new MergeSorter();
$array = array(12,4,5,2,90,3,1,34,55);
$sorter->sortdata($array);
?>