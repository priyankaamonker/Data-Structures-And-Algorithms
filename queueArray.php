<?php
class Queue {
	private $items = array();
	private $head = -1;
	private $tail = -1;
	private $numOfItems = 10;
	
	function isFull() {
		return $this->numOfItems == count($this->items);
	}

	function isEmpty() {
		return $this->numOfItems == 0;
	}
	
	function enqueue($item) {
		if($this->isFull())
			throw new Exception("Queue is full");
		if ($this->numOfItems == count($this->items)-1) // deal with circular case
			$this->tail = -1;
		$this->items[++$this->tail] = $item;
		$this->numOfItems--;
	}

	function dequeue() {
		if ($this->isEmpty())
			throw new Exception("Queue is empty");
		if ($this->head == count($this->items)-1)
			$this->head = -1;
		$this->numOfItems++;
		return $this->items[++$this->head];
	}

	function peek() {
		return $this->items[$this->head+1];
	}
}

$queue = new Queue();
try {
	var_dump($queue->isEmpty());
	$queue->enqueue(1);
	$queue->enqueue(3);
	$queue->enqueue(5);
	$queue->enqueue(6);
	$queue->enqueue(2);
	print_r($queue);
	echo "<br>";
	echo $queue->dequeue() . "<br>";
	echo $queue->dequeue() . "<br>";
	echo $queue->peek();
}
catch(Exception $e) {
	echo "Message: " . $e->getMessage() . "<br>";
}
?>
