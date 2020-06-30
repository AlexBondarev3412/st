<?php
class Ty154 {
    public $name;
	public function __construct($n) {
	$this->name = $n;
	}
    function Up() {
        print $this->name.' набирает высоту';
    }
	function Down() {
        print $this->name.' выполняет посадку';
    }
}
class Mig extends Ty154 {
	function Attack() {
        print $this->name.' атакует цель';
    }
}


	
?>