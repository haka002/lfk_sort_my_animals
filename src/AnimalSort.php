<?php

namespace SortMyAnimals;

class AnimalSort
{
	/**
	 * @param Animal[] $animalList
	 *
	 * @return null|Animal[]
	 */
	public function sort(array $animalList = null)
	{
		if (empty($animalList))
		{
			return $animalList;
		}

		return $this->sortByLegs($animalList);
	}

	/**
	 * @param Animal[] $animalList
	 *
	 * @return Animal[]
	 */
	private function sortByLegs($animalList)
	{
		for ($i = count($animalList); $i > 1; $i--)
		{
			for ($j = 0; $j < $i - 1; $j++)
			{
				if ($animalList[$j]->getNumberOfLegs() > $animalList[$j + 1]->getNumberOfLegs())
				{
					$tempElement        = $animalList[$j];
					$animalList[$j]     = $animalList[$j + 1];
					$animalList[$j + 1] = $tempElement;
				}
			}
		}

		return $animalList;
	}

	private function sortByName()
	{

	}
}
