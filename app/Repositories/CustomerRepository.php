<?php

namespace App\Repositories;

use App\Entities\Customers;

class CustomerRepository extends BaseRepository
{
	/**
	 * @var string
	 */
	protected $class = 'App\Entities\Customers';

	/**
	 * @param Customers $customer
	 */
	public function store(Customers $customer)
	{
		$record = $this->get(['email' => $customer->getEmail()]);
		if (!is_null($record)) {  // Just update the existing record
			$record->setUsername($customer->getUsername());
			$record->setPassword($customer->getPassword());
			$record->setFullname($customer->getFullname());
			$record->setEmail($customer->getEmail());
			$record->setCity($customer->getCity());
			$record->setPhone($customer->getPhone());
			$record->setGender($customer->getGender());
			$record->setCountry($customer->getCountry());
			$this->entityManager->flush();
		} else {  // Inserting a new record
			$this->create($customer);
		}
	}
}