<?php

namespace SortMyAnimals;

class Animal
{
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var int
	 */
	private $numberOfLegs;

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 *
	 * @return Animal
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getNumberOfLegs()
	{
		return $this->numberOfLegs;
	}

	/**
	 * @param int $numberOfLegs
	 *
	 * @return Animal
	 */
	public function setNumberOfLegs($numberOfLegs)
	{
		$this->numberOfLegs = $numberOfLegs;

		return $this;
	}
}
