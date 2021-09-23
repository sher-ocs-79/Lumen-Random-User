<?php

namespace App\Services\Customer;

class ArrayDataFormatter extends DataFormatter
{
	/**
	 * @return array
	 */
	public function fetch()
	{
		$formatted = [];
		$records = parent::fetch();

		if (!empty($records->results)) {
			foreach($records->results as $record) {
				$item = [
					'username' => $record->login->username,
					'password' => $record->login->password,
					'fullname' => $record->name->first.' '.$record->name->last,
					'email' => $record->email,
					'city' => $record->location->city,
					'phone' => $record->phone,
					'gender' => $record->gender,
					'country' => $record->location->country
				];
				array_push($formatted, $item);
			}
		}

		return $formatted;
	}
}