<?php

class Color
{
	public $red;
	public $green;
	public $blue;
	public static $verbose = false;

	public function __construct(array $color)
	{
		if (array_key_exists('rgb', $color))
		{
			$this->red = ($color['rgb'] >> 16) % 256;
            $this->green = ($color['rgb'] >> 8) % 256;
            $this->blue = $color['rgb'] % 256;
		}
		else
		{
			$this->red = $color['red'];
            $this->green = $color['green'];
            $this->blue = $color['blue'];
		}

		if (Self::$verbose == true)
		{
				print("$this constructed.".PHP_EOL);
		}
		
	}

	public function  __destruct()
	{
		if (Self::$verbose == true)
			{
				print("$this destructed.".PHP_EOL);
			}
	}

	//addition des composants de l'instance courante aux composants de l'instance passe en param
	public function add(Color $rhs)
	{
		return (new Color(array('red' => $this->red + $rhs->red, 'green' => $this->green + $rhs->green, 'blue' => $this->blue + $rhs->blue)));
	}

	//soustraction des composants de l'instance courante aux composants de l'instance passe en param
	public function sub(Color $rhs)
	{
		return (new Color(array('red' => $this->red - $rhs->red, 'green' => $this->green - $rhs->green, 'blue' => $this->blue - $rhs->blue)));
	}

	//multip;ication des composants de l'instance courante aux composants de l'instance passe en param
	public function mult($f)
	{
		return (new Color(array('red' => $this->red * $f, 'green' => $this->green * $f, 'blue' => $this->blue * $f)));
	}

	public function __toString()
	{
		return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}

	//methode statique retournqnt une documentqtion de la forme d4une chaine de caracteres lu depuisun fichier Color.doc.txt
	public static function doc()
	{
		$read = fopen("Color.doc.txt", 'r');
    	while ($read && !feof($read))
   		echo fgets($read);
    	echo "\n";
	}

}

?>