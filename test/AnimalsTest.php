<?php

use SortMyAnimals\Animal;
use SortMyAnimals\AnimalList;
use SortMyAnimals\AnimalSort;

class AnimalTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var Animal
	 */
	private $animal;

	/**
	 * @var AnimalSort
	 */
	private $animalSort;

	public function setUp()
	{
		parent::setUp();

		$this->animal     = new Animal();
		$this->animalSort = new AnimalSort();
	}

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

	/**
	 * @param $expected
	 * @param $input
	 *
	 * @dataProvider emptyProvider
	 */
	public function testEmpty($expected, $input)
	{
		$animalList = $input;

		$this->assertEquals($expected, $this->animalSort->sort($animalList));
	}

	/**
	 * @param $expected
	 * @param $animalList
	 *
	 * @dataProvider sortByLegsOnlyProvider
	 */
	public function testSortByLegsOnly($expected, $animalList)
	{
		$sortedAnimals = $this->animalSort->sort($animalList);

		for ($i = 0; $i < count($animalList); $i++)
		{
			$this->assertEquals($expected[$i], $sortedAnimals[$i]->getName());
		}
	}

	public function testCopy()
	{
		$dog = new Animal();
		$dog
			->setName('dog')
			->setNumberOfLegs(4);

		$spider = new Animal();
		$spider
			->setName('spider')
			->setNumberOfLegs(8);

		$human = new Animal();
		$human
			->setName('human')
			->setNumberOfLegs(2);

		$animalList = [$spider, $dog, $human];
		$animalListCopy = $this->animalSort->sort($animalList);

		$this->assertNotSame($animalList, $animalListCopy);
	}

	/**
	 * @return array
	 */
	public function sortByLegsOnlyProvider()
	{
		$dog = new Animal();
		$dog
			->setName('dog')
			->setNumberOfLegs(4);

		$spider = new Animal();
		$spider
			->setName('spider')
			->setNumberOfLegs(8);

		$human = new Animal();
		$human
			->setName('human')
			->setNumberOfLegs(2);

		return [
			[['dog'], [$dog]],
			[['dog', 'spider'], [$spider, $dog]],
			[['human', 'dog', 'spider'], [$spider, $dog, $human]],
		];
	}

	/**
	 * @return array
	 */
	public function emptyProvider()
	{
		return [
			[null, null],
			[[], []]
		];
	}
}
