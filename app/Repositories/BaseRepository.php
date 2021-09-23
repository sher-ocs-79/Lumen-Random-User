<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use Doctrine\ORM\EntityManager;

abstract class BaseRepository implements RepositoryInterface
{
	protected $entityManager;

	/**
	 * BaseRepository constructor.
	 * @param EntityManager $entityManager
	 */
	public function __construct(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	/**
	 * @param $entity
	 * @return null
	 */
	public function create($entity)
	{
		$this->entityManager->persist($entity);
		$this->entityManager->flush();
	}

	/**
	 * @param array $criteria
	 * @return null|object
	 */
	public function get(array $criteria)
	{
		return $this->entityManager->getRepository($this->class)->findOneBy($criteria);
	}

	/**
	 * @return array|object[]
	 */
	public function all()
	{
		return collect($this->entityManager->getRepository($this->class)->findAll());
	}
}