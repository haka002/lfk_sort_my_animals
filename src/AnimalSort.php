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

		$animalListCopy = $animalList;

		$sortedByLegs = $this->sortByLegs($animalListCopy);

		return $this->sortEquals($sortedByLegs);
	}

	/**
	 * @param Animal[] $animalList
	 *
	 * @return Animal[]
	 */
	public function sortEquals($animalList)
	{
		$tempArrayForPartialSorting = [];
		for ($i = 0; $i < count($animalList) - 1; $i++)
		{
			if ($animalList[$i]->getNumberOfLegs() == $animalList[$i + 1]->getNumberOfLegs())
			{
				$tempArrayForPartialSorting[$i][serialize($animalList[$i])]     = $animalList[$i];
				$tempArrayForPartialSorting[$i][serialize($animalList[$i + 1])] = $animalList[$i + 1];
			}
		}

		return $this->sortByName($animalList, $tempArrayForPartialSorting);
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

	/**
	 * @param Animal[] $animalList
	 * @param Animal[] $equalAnimals
	 *
	 * @return Animal[]
	 */
	private function sortByName($animalList, $equalAnimals)
	{
		$changeableIndexes = array_keys($equalAnimals);

		/**
		 * @var  string    $animalListIndex
		 * @var  Animal[] $animals
		 */
		foreach ($changeableIndexes as $animalListIndex)
		{

			$animals = array_values($equalAnimals[$animalListIndex]);

			for ($i = count($animals); $i > 1; $i--)
			{
				for ($j = 0; $j < $i - 1; $j++)
				{
					$tempCompareArray       = [$animals[$j]->getName(), $animals[$j + 1]->getName()];
					$tempCompareArraySorted = $tempCompareArray;
					sort($tempCompareArray, SORT_STRING);

					if ($tempCompareArray != $tempCompareArraySorted)
					{
						$tempElement     = $animals[$j];
						$animals[$j]     = $animals[$j + 1];
						$animals[$j + 1] = $tempElement;
					}
				}
			}


			array_splice($animalList, $animalListIndex, count($animals), $animals);
		}

		return $animalList;
	}
}
