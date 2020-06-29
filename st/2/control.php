<?php
class Mig {
    public $name = 'МИГ';
   
   
    function Up() {
        print $this->name.' набирает высоту';
    }
	function Down() {
        print $this->name.' выполняет посадку';
    }
	function Attack() {
        print $this->name.' атакует цель';
    }
}
class Ty154 {
    public $name = 'ТУ-154';
   
   
    function Up() {
        print $this->name.' набирает высоту';
    }
	function Down() {
        print $this->name.' выполняет посадку';
    }
}

	
?>