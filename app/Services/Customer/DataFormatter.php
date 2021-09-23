<?php

namespace App\Services\Customer;

use App\Contracts\CustomerDatasourceInterface;

class DataFormatter implements CustomerDatasourceInterface
{
	/**
	 * @var CustomerDatasourceInterface
	 */
	protected $_dataSource;

	/**
	 * DataFormatter constructor.
	 * @param CustomerDatasourceInterface $datasource
	 */
	public function __construct(CustomerDatasourceInterface $datasource)
	{
		$this->_dataSource = $datasource;
	}

	/**
	 * @return mixed
	 */
	public function fetch()
	{
		return $this->_dataSource->fetch();
	}
}