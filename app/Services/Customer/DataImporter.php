<?php

namespace App\Services\Customer;

use App\Entities\Customers;
use App\Repositories\CustomerRepository;

class DataImporter
{
	/**
	 * @var DataProvider
	 */
	protected $_dataProvider;
	/**
	 * @var CustomerRepository
	 */
	protected $_repository;

	/**
	 * DataImporter constructor.
	 * @param DataProvider $dataProvider
	 * @param CustomerRepository $repository
	 */
	public function __construct(DataProvider $dataProvider, CustomerRepository $repository)
	{
		$this->_dataProvider = $dataProvider;
		$this->_repository = $repository;
	}

	/**
	 * Executes to import the data
	 */
	public function import()
	{
		$data = $this->_dataProvider->provide();
		if (!empty($data)) {
			foreach ($data as $record) {
				/**
				 * Store each customer record in the repository
				 */
				$customer = new Customers($record);
				$this->_repository->store($customer);
			}
		}
	}
}