<?php

namespace App\Classes;
use Illuminate\Support\Str;



class ProcessCSReport
{
  public static function handle()
  {
    // Receive JSON POST data
    $report = file_get_contents('php://input');
    $data = json_decode($report, true);
    // get current date
    $currentDate = date('Y-m-d H:i:s');
    $date = dateFormat($currentDate);

    // use illuminate unique id to generate unique id

    $uniqueId = Str::random(12);
 
    

    // Validate it’s a CSP report
    if (isset($data['csp-report'])) {
      $logLine = $date . " $uniqueId- CSP Violation:\n" . print_r($data['csp-report'], true) . "\n\n";
      // Log to file (make sure web server has write permissions)
      // move this to a config file
      // the directory is bootstrap/csp 
      // the log file is csp-reports.log
      // create the directory if it doesn't exist
      // create the csp folder if it doesn't exist
      if (!file_exists(__DIR__ . '/../../bootstrap/csp')) {
        mkdir(__DIR__ . '/../../bootstrap/csp', 0777, true);
      }
      $logFile = __DIR__ . '/../../bootstrap/csp/csp-reports.log';
      // append in descending order using 

      file_put_contents($logFile, $logLine, FILE_APPEND);
    }

    // Respond with HTTP 204 No Content to acknowledge
    http_response_code(204);
  }
}
