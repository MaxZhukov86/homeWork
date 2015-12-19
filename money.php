<?php

class CMoney{
	function __construct($money, $sum){
		$this->money = $money;
		$this->sum = $sum;
	}
}

class CShowMoney extends CMoney{
	public function __toString(){
    return "у вас: ".$this->sum." ".$this->money;
  }
}

class CEur extends CShowMoney{
	public $money;
	public $sum;
}

class CRub extends CShowMoney{
	public $money;
	public $sum;
}

$eur = new CEur("eur", 50);
echo $eur;
echo "<br>";
$rub = new CRub("rub", 100);
echo $rub;


?>