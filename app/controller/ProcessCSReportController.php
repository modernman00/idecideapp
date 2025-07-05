<?php

namespace App\controller;

use App\Classes\ProcessCSReport;
use Illuminate\Support\Collection;


class ProcessCSReportController
{
  public function handle()
  {
    ProcessCSReport::handle();

    
  }

  public function show()
  {


    $logFile = __DIR__ . '/../../bootstrap/csp/csp-reports.log';
    if (!file_exists($logFile)) {
      echo "No reports logged yet.";
      exit;
    }
    $logs = file_get_contents($logFile);
    return view('csp-report', ['logs' =>  $logs]);
  }
}
