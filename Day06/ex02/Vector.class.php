<?php

class Vector
{
	private $_x;
	private $_y;
	private $_z;
	private $_w = 0;
	static $verbose = false;

	public function __construct($array)
	{
		if (isset($array['dest']) && $array['dest'] instanceof Vertex)
		{
			if (isset($array['orig']) && $array['orig'] instanceof Vertex)
				$orig = new Vertex(array('x' => $array['orig']->getX(),
										'y' => $array['orig']->getY(),
										'z' => $array['orig']->getZ()));
			else
				$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
			$this->_x = $array['dest']->getX() - $orig->getX();
			$this->_y = $array['dest']->getY() - $orig->getY();
			$this->_z = $array['dest']->getZ() - $orig->getZ();
			$this->_w = 0;
		}
		if (Self::$verbose)
			printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n",
					$this->_x, $this->_y, $this->_z, $this->_w);
	}

	public function magnitude()
	{
		return (float)sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2));
	}

	public function normalize()
	{
		$magnitude = $this->magnitude();
		if ($magnitude == 1)
			return clone $this;
		$newVertex = new Vertex(array('x' => $this->_x / $magnitude,
										'y' => $this->_y / $magnitude,
										'z' => $this->_z / $magnitude));
		return new Vector(array('dest' => $newVertex));
	}

	public function add(Vector $rhs)
	{
		$newVertex = new Vertex(array('x' => $this->_x + $rhs->_x,
										'y' => $this->_y + $rhs->_y,
										'z' => $this->_z + $rhs->_z));
		return new Vector(array('dest' => $newVertex));
	}

	public function sub(Vector $rhs)
	{
		$newVertex = new Vertex(array('x' => $this->_x - $rhs->_x,
										'y' => $this->_y - $rhs->_y,
										'z' => $this->_z - $rhs->_z));
		return new Vector(array('dest' => $newVertex));
	}

	public function opposite()
	{
		$newVertex = new Vertex(array('x' => -$this->_x,
										'y' => -$this->_y,
										'z' => -$this->_z));
		return new Vector(array('dest' => $newVertex));
	}

	public function scalarProduct($k)
	{
		$newVertex = new Vertex(array('x' => $this->_x * $k,
										'y' => $this->_y * $k,
										'z' => $this->_z *$k));
		return new Vector(array('dest' => $newVertex));
	}

	public function dotProduct(Vector $rhs)
	{
		return (float)(($this->_x * $rhs->_x)
		 			+ ($this->_y * $rhs->_y)
					+ ($this->_z * $rhs->_z));
	}

	public function cos(Vector $rhs)
	{
		return ((($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z))
		/ sqrt(		(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z))
				* (($rhs->_x * $rhs->_x) + ($rhs->_y * $rhs->_y) + ($rhs->_z * $rhs->_z))));
	}

	public function crossProduct(Vector $rhs)
	{
		$newVertex = new Vertex(array(
				'x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(),
				'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(),
				'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()));
		return new Vector(array('dest' => $newVertex));
	}

	function __destruct()
	{
		if (Self::$verbose)
			printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) destructed\n",
			 	$this->_x, $this->_y, $this->_z, $this->_w);
	}

	function __toString()
	{
		return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )",
			array($this->_x, $this->_y, $this->_z, $this->_w)));
	}

		static function doc()
		{
			$file = fopen( "Vector.doc.txt", "r" );
			$content = "";
			while(!feof($file))
				$content .= fgets($file, 4096);
			fclose($file);
			echo(PHP_EOL .$content . PHP_EOL);
		}

		public function getX() {return $this->_x;}

		public function getY() {return $this->_y;}

		public function getZ() {return $this->_z;}

		public function getW() {return $this->_w;}
}
