<?php

namespace App\Services\Customer;

class DataProvider
{
	/**
	 * @var ApiDataProvider
	 */
	protected $_dataSource;

	/**
	 * DataProvider constructor.
	 * @param ApiDataProvider $dataSource
	 */
	public function __construct(ApiDataProvider $dataSource)
	{
		$this->_dataSource = $dataSource;
	}

	/**
	 * @return mixed
	 */
	public function provide()
	{
		/**
		 * Decorates the response getting from the source data, by formatting into a single dimensional array.
		 */
		$formatter = new ArrayDataFormatter($this->_dataSource);

		return $formatter->fetch();
	}
}