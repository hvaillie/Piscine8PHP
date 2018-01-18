<?php

class Lannister
{
	public function sleepWith($personne)
	{
		if ($this->isSameFamily($personne)) {
			if ($this->isSameSex($personne))
				print ("Not even if I'm drunk !");
			else {
				if ($this->auth_incest())
					print ("With pleasure, but only in a tower in Winterfell, then.");
				else
					print ("Not even if I'm drunk !");
			}
		} else
			print ("Let's do this.");
		print (PHP_EOL);
	}

	public function auth_incest() {
		return false;
	}

	public function is_male() {
		return false;
	}

	public function isSameFamily($personne) {
		return (get_parent_class($personne) === get_parent_class($this));
	}

	public function isSameSex($personne) {
		return ($personne->is_male() == $this->is_male());
	}
}

?>
