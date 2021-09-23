<?php

namespace App\Contracts;

interface CustomerDatasourceInterface
{
	/**
	 * @return mixed
	 */
	public function fetch();
}