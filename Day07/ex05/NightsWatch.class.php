<?php

class NightsWatch implements IFighter
{

	private $soldat = array();

	public function recruit($s)
	{
		if (in_array("IFighter", class_implements($s)))
			$this->soldat[] = $s;
	}

	function fight() {
		foreach ($this->soldat as $s) {
			$s->fight();
		}
	}

}
