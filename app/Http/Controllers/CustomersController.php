<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CustomerRepository;

class CustomersController extends Controller
{
	/**
	 * @var Request
	 */
	protected $request;

	/**
	 * @var CustomerRepository
	 */
	protected $repository;

	/**
	 * CustomersController constructor.
	 * @param Request $request
	 * @param CustomerRepository $repository
	 */
	public function __construct(Request $request, CustomerRepository $repository)
	{
		$this->repository = $repository;
		$this->request = $request;
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getAll()
	{
		$collection = $this->repository->all();
		$return = $collection->map(function($item) {
			return [
				'fullname' => $item->getFullname(),
				'email' => $item->getEmail(),
				'country' => $item->getCountry()
			];
		});
		return response()->json($return);
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getOne()
	{
		$criteria = [
			'id' => $this->request->id,
		];
		$return = collect($this->repository->get($criteria));
		$return->forget('id');
		$return->forget('password');
		$return->forget('createdAt');
		$return->forget('updatedAt');
		return response()->json($return);
	}
}