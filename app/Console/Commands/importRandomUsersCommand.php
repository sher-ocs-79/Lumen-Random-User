<?php

namespace App\Console\Commands;

use App\Repositories\CustomerRepository;
use Illuminate\Console\Command;
use App\Services\Customer\DataImporter;
use App\Services\Customer\DataProvider;
use App\Services\Customer\ApiDataProvider;

/**
 * Class importRandomUsersCommand
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */

class importRandomUsersCommand extends Command
{
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $signature = "import:random-users";

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = "Import random users from 3rd party api";

	/**
	 * @var CustomerRepository
	 */
	protected $_customerRepository;

	/**
	 * importRandomUsersCommand constructor.
	 * @param CustomerRepository $customerRepository
	 */
	public function __construct(CustomerRepository $customerRepository)
	{
		$this->_customerRepository = $customerRepository;

		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$sourceData = new ApiDataProvider();
		$sourceData->setNumRecords(200);
		$dataProvider = new DataProvider($sourceData);
		$dataImporter = new DataImporter($dataProvider, $this->_customerRepository);

		$this->info('Importing data started, please wait...');
		$dataImporter->import();
		$this->info('Importing completed!');
	}
}