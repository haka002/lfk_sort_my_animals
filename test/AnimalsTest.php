<?php

use SortMyAnimals\Animal;

class AnimalTest extends PHPUnit_Framework_TestCase
{
	public function testDefault()
	{
		$name         = 'almafa';
		$numberOfLegs = 7;

		$animal = new Animal();

		$animal
			->setName($name)
			->setNumberOfLegs($numberOfLegs);

		$this->assertEquals($name, $animal->getName());
		$this->assertEquals($numberOfLegs, $animal->getNumberOfLegs());
	}
}
