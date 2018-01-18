<?php

class UnholyFactory
{
	private $soldats = array();

	public function absorb($soldat) {
		if (in_array("Fighter", class_parents($soldat))) {
			if (array_key_exists($soldat->getType(), $this->soldats))
				print("(Factory already absorbed a fighter of type "
					. $soldat->getType() . ")");
			else {
				$this->soldats[$soldat->getType()] = $soldat;
				print("(Factory absorbed a fighter of type "
					. $soldat->getType() . ")");
			}
		}
		 else
			print("(Factory can't absorb this, it's not a fighter)");
		print (PHP_EOL);
	}

	public function fabricate($type) {
		if (array_key_exists($type, $this->soldats)) {
			$soldat = clone $this->soldats[$type];
			print("(Factory fabricates a fighter of type " . $type . ")");
		} else {
			$soldat = null;
			print("(Factory hasn't absorbed any fighter of type " . $type . ")");
		}
		print(PHP_EOL);
		return $soldat;
	}
}
?>
