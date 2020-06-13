<?php

namespace App\Console\Commands;

use App\services\rss\RssService;
use Illuminate\Console\Command;

class fetchData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull currencies data from Rss';
    /**
     * @var RssService
     */
    private RssService $service;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(RssService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->service->recordRssCurrencies();
    }
}
