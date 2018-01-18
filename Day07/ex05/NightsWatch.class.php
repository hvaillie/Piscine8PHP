<?php

class NightsWatch implements IFighter
{

	private $soldats = array();

	public function recruit($soldat)
	{
		if (in_array("IFighter", class_implements($soldat)))
			$this->soldats[] = $soldat;
	}

	function fight() {
		foreach ($this->soldats as $soldat) {
			$soldat->fight();
		}
	}

}

?>
