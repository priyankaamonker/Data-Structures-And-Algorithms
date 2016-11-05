<?php
class ShellSort {
	private $arr;
	
	function shell_sort($array) {
		if(count($array) == 0)
			return;
		
		$this->arr = $array;
		$size = count($this->arr);
	    $h = $this->knuthSequenceNumber($size);
		while($h >= 1) {
			for($i = 0; $i < $h; $i++) {
				$this->insertion_sort($i, $h);
			}
			$h = ($h-1)/3;
		}
		print_r($this->arr);
	}
	
	function insertion_sort($start, $gap) {
		$length = count($this->arr);
		$i = $start;
		while($i < $length) {
			$current = $this->arr[$i];
			$j = $i - $gap;
			while($j>=0 && $this->arr[$j] >= $current) {
				$this->arr[$j+$gap] = $this->arr[$j];
				$j = $j - $gap;
			}
			$this->arr[$j+$gap] = $current;
			$i = $i + $gap;
		}
	}
	
	function knuthSequenceNumber($size) {
		$h = 1;
		while($h < $size/3){
			$h = 3 * $h + 1;
		}
		return $h;
	}
}
$ssort = new ShellSort();
$array = [12, 3, 5, 2, 17, 10, 4, 90];
$ssort->shell_sort($array);
?>