<?php

namespace App\Contracts;

interface RepositoryInterface
{
	/**
	 * @param $entity
	 * @return mixed
	 */
	public function create($entity);

	/**
	 * @param array $criteria
	 * @return mixed
	 */
	public function get(array $criteria);

	/**
	 * @return mixed
	 */
	public function all();
}