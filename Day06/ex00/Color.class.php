<?php

Class Color {

	public $red;
	public $green;
	public $blue;
	static $verbose = false;
	const WHITE = 0xFFFFFF;

	function __construct( array $kwargs )
	{
		if (array_key_exists( 'rgb', $kwargs ))
		{
			$rgb = intval($kwargs['rgb']);
			$this->red   = ($rgb / pow(256, 2) % 256);
			$this->green = ($rgb / pow(256, 1) % 256);
			$this->blue  = ($rgb / pow(256, 0) % 256);
		}
		else if ((isset($kwargs['red']))
			 && (isset($kwargs['green']))
			 &&(isset( $kwargs['blue'])))
		{
			$this->red   = intval($kwargs['red']);
			$this->green = intval($kwargs['green']);
			$this->blue  = intval($kwargs['blue']);
		}
		if (self::$verbose == true)
		{
			$chaine = "Color( red: %3d, green: %3d, blue: %3d ) constructed." . PHP_EOL;
			printf($chaine, $this->red, $this->green, $this->blue);
		}
	}

	public function add(Color $Color)
	{
		$newR = $this->red + $Color->red;
		$newG = $this->green + $Color->green;
		$newB = $this->blue + $Color->blue;
		$newColor = new Color(array( 'red' => $newR, 'green' => $newG, 'blue' => $newB));
		return ($newColor);
	}

	public function sub(Color $Color)
	{
		$newR = $this->red - $Color->red;
		$newG = $this->green - $Color->green;
		$newB = $this->blue - $Color->blue;
		$newColor = new Color(array( 'red' => $newR, 'green' => $newG, 'blue' => $newB));
		return ($newColor);
	}

	public function mult($factor)
	{
		$newR = $this->red * $factor;
		$newG = $this->green * $factor;
		$newB = $this->blue * $factor;
		$newColor = new Color(array( 'red' => $newR, 'green' => $newG, 'blue' => $newB));
		return ($newColor);
	}

	static function doc()
	{
		$file = fopen( "Color.doc.txt", "r" );
		$content = "";
		while(!feof($file))
			$content .= fgets($file, 4096);
		fclose($file);
		echo(PHP_EOL . $content . PHP_EOL);
	}

	public function __toString()
	{
		$chaine = "Color( red: %3d, green: %3d, blue: %3d )";
		return vsprintf($chaine, array($this->red, $this->green, $this->blue));
	}

	function __destruct()
	{
		if (self::$verbose == true)
		{
			$chaine = "Color( red: %3d, green: %3d, blue: %3d ) destructed." . PHP_EOL;
			printf($chaine, $this->red, $this->green, $this->blue);
		}
	}
}

?>
