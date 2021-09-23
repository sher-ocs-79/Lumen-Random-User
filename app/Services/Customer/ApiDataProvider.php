<?php

namespace App\Services\Customer;

use App\Contracts\CustomerDatasourceInterface;

class ApiDataProvider implements CustomerDatasourceInterface
{
	/**
	 * @var string
	 */
	protected $_endpoint = 'https://randomuser.me/api';

	/**
	 * @var int
	 */
	protected $_minimum = 100;

	/**
	 * @var string
	 */
	protected $_nationality = 'au';

	/**
	 * @var
	 */
	protected $_num_records;

	/**
	 * ApiDataProvider constructor.
	 */
	public function __construct()
	{
		$this->_num_records = $this->_minimum;
	}

	/**
	 * @return mixed
	 */
	public function fetch()
	{
		$params = [
			'nat' => $this->_nationality,
			'results' => $this->_num_records,
		];

		return HttpClient($this->_endpoint, $params);
	}

	/**
	 * @param $num
	 */
	public function setNumRecords($num)
	{
		$this->_num_records = $num >= $this->_minimum ? $num : $this->_minimum;
	}

	/**
	 * @param $nationality
	 */
	public function setNationality($nationality)
	{
		$this->_nationality = $nationality;
	}
}