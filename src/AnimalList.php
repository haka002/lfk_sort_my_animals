<?php

namespace SortMyAnimals;

class AnimalList
{
	/**
	 * @var Animal[]
	 */
	private $elementList;

	public function get()
	{
		return $this->elementList;
	}
}
