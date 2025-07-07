<?php

use eftec\bladeone\BladeOne;


/**
 * echo view('checkout', ['cart' => $cartItems], ['enable' => true,
 *    'report_only' => false, // Enforce CSP (not just report)
 *    'extra' => [
 *        "script-src https://js.stripe.com",
 *        "frame-src https://js.stripe.com"
 *    ]
 * ]);
 * 
 * <!-- Script Tag -->
 *  <script nonce="{{ $csp_nonce }}">
 *    window.userData = @json(auth()->user());
 * </script>

 * <!-- External Script -->
 * <script 
 *    nonce="{{ $csp_nonce }}" 
 *    src="https://platform.sharethis.com/loader.js"
 *    defer
 * ></script>

 * <!-- Inline Styles -->
 * <style nonce="{{ $csp_nonce }}">
 *    .featured { background: #f0f8ff; }
 * </style>
 * 
 * Check browser console for blocked resources. Examine /csp-report-log endpoint.Temporarily add 'unsafe-inline' to diagnose: 'extra' => ["script-src 'unsafe-inline'"]
 * 
 * Phase Out unsafe-inline.
 * Move all inline scripts to external files
 * Use nonce-{{ $csp_nonce }} for critical inline code
 * 
 * Implement report-to
 * 'extra' => ["report-to csp-endpoint"]
 */

function view(string $viewFile, array $data = [], array $cspOptions = [])
{
    try {
        // ===== 1. CSP SETUP =====
        $cspEnabled = $cspOptions['enable'] ?? true;
        $reportOnly = $cspOptions['report_only'] ?? true;
        $nonce = '';

        if ($cspEnabled) {
            // Generate cryptographic nonce
            $nonce = bin2hex(random_bytes(16));

            // Build dynamic CSP header
            $directives = [
                "default-src 'self'",
                // Scripts: Allow scripts with nonce and HTTPS sources, strict-dynamic allows dynamic loading
                "script-src 'self' 'nonce-$nonce' 'strict-dynamic' https:",

                "script-src-elem 'self' 'nonce-$nonce' https://cdn.jsdelivr.net https://platform.sharethis.com https://buttons-config.sharethis.com https://count-server.sharethis.com ",

                // Styles
                "style-src 'self' 'nonce-$nonce' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com",
                "style-src-elem 'self' 'nonce-$nonce' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://fonts.googleapis.com",

                // Fonts
                "font-src 'self' https://cdnjs.cloudflare.com https://fonts.gstatic.com",

                // Images
                "img-src 'self' data: https://*.sharethis.com https://www.google-analytics.com",

                // Connections
                "connect-src 'self' https://data.stbuttons.click https://l.sharethis.com https://www.google-analytics.com",

                // Frames
                "frame-src 'self' https://platform.sharethis.com",

                // Reporting
                "report-uri " . ($cspOptions['report_uri'] ?? '/csp-report-log'),
                "report-to csp-endpoint"
            ];
            // Add custom directives if provided
            if (!empty($cspOptions['extra'])) {
                $directives = array_merge($directives, $cspOptions['extra']);
            }

            header(($reportOnly ? 'Content-Security-Policy-Report-Only: ' : 'Content-Security-Policy: ')
                . implode('; ', $directives));
        }


        // 2. Initialize Blade
        static $blade = null;
        if (!$blade) {
            // 1. Get validated paths
            $viewsPath = realpath(__DIR__ . '/../../resources/views');
            $cachePath = realpath(__DIR__ . '/../../bootstrap/cache');
            $blade = new BladeOne($viewsPath, $cachePath, BladeOne::MODE_DEBUG);
            $blade->setIsCompiled(false);
        }

        // 3. Normalize and verify view path
        $viewFile = str_replace(['.', '/'], DIRECTORY_SEPARATOR, $viewFile);
        $data['nonce'] = $nonce;
        // 4. Render with debug
        echo $blade->run($viewFile, $data);
    } catch (Exception $e) {
        error_log("VIEW ERROR: " . $e->getMessage());
        return "<!-- VIEW ERROR -->\n"
            . "<h1>Rendering Error</h1>\n"
            . "<pre>" . htmlspecialchars($e->getMessage()) . "</pre>\n"
            . "<p>Template: " . htmlspecialchars($viewFile) . "</p>\n"
            . "<p>Search Path: " . htmlspecialchars($viewsPath ?? '') . "</p>";
    }
}


function printArr($data): void
{

    if ($data === array()) {
        echo "<pre>";
        var_export($data);
        echo "</pre>";
    } else {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}



function replace_whitespace($string): string|null
{
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}


/**
 * @return null|string
 */
function number2word(int $number)
{

    try {
        $fool = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);
        $fool->setTextAttribute(\NumberFormatter::DEFAULT_RULESET, "%spellout-numbering-verbose");
        $output = $fool->format($number);
        return ucfirst($output);
    } catch (TypeError $e) {
        echo $e->getMessage() . "\n";
    }
}



// score application
function Scoring(string $postName, string $policy1, string $policy2, int $score1, int $score2): void
{
    if ($_POST[$postName] == $policy1) {
        ${$postName} = $score1;
    } else {
        if ($_POST[$postName] == $policy2) {
            ${$postName} = $score2;
        } else {
            ${$postName} = 2;
        }
    }

    ${$postName};
}

/**
 * @psalm-return array<empty, empty>|string
 */
function setMinMaxLimit(array $minPolicy, array $maxPolicy, array $post): array|string
{
    $error = [];
    for ($x = 0; $x < count($minPolicy); $x++) {

        if (strlen($post[$x]) < $minPolicy && strlen($post[$x]) > $maxPolicy) {
            $cleanNameKey = strtoupper(preg_replace('/[^0-9A-Za-z@.]/', ' ', $post[$x]));
            $error  = "The response {-$cleanNameKey-} response does not meet either the required minimal or maximum limit";
        };
    };

    return $error;
}

/**
 * compare two variable or use to verify
 */
function compare($var1, $var2): bool
{
    if ($var1 != $var2) {
        return false;
    }
    return true;
}

// GET IP ADDRESS

function getUserIpAddr(): string
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

/**
 * $month is the terms
 * while the date is the month
 *
 * @return string[]
 *
 * @psalm-return array{fullDate: string, dateFormat: string}
 */
function addMonthsToDate($months, $date): array
{

    $dt = new DateTime($date, new DateTimeZone('Europe/London'));
    $oldDay = $dt->format("d");
    $dt->add(new DateInterval("P{$months}M"));
    $newDay = $dt->format("d");
    if ($oldDay != $newDay) {
        // Check if the day is changed, if so we skipped to the next month.
        // Substract days to go back to the last day of previous month.
        $dt->sub(new DateInterval("P" . $newDay . "D"));
    }
    $newDay3 = $dt->format("Y-m-d");
    $newDay2 = $dt->format(" jS \of F Y"); // 2016-02-29
    //  return $newDay2;
    $datetime = ['fullDate' => $newDay2, 'dateFormat' => $newDay3];
    return $datetime;
}


function cleanSession($x): string|null|int
{
    if ($x) {
        $z = preg_replace(
            pattern: '/[^0-9A-Za-z@.]/',
            replacement: '',
            subject: $x
        );
        return $z;
    } else {
        return null;
    }
}

// SHOW THE ERROR EXCEPTION MESSAGE

function showError($th): void
{
    error_log("Error: " . $th->getMessage());
    $errorCode = (int) $th->getCode();
    http_response_code($errorCode); // sets the response to 406
    $error = "Error on line {$th->getLine()} in {$th->getFile()}\n\n: The error message is {$th->getMessage()}\n\n";

    echo json_encode(['error' => $error]);
}

/**
 * Summary of showErrorExp
 * @param mixed $th
 * @return void
 */
function showErrorExp($th): void
{
    echo "Error msg - " . $th->getMessage();
    echo "<br>";
    echo "Error Line - " . $th->getLine();
    echo "<br>";
    echo "Error code - " . $th->getCode();
    echo "<br>";
    echo "Error File- " . $th->getFile();
}

function showSSEError($th): void
{
    error_log("SSE Error: " . $th->getMessage());
    echo "Error msg - " . $th->getMessage() . $th->getFile() . $th->getLine();
    echo "<br>";
    echo "data: Error occurred\n\n";
    ob_flush();
    flush();
}


function spinner(): string
{
    return  '<div class="loader"></div>';
}

// FUNCTION TO SEND TEXT TO PHONE


function sendText($message, $numbers): void
{

    $apiKey = urlencode('y9X1o/Ko6M4-MCz6zJfBeGMv9TMOLG54k0c53EfCfo');
    $numbers = array($numbers);
    $sender = urlencode('Loaneasy Finance');
    $message = rawurlencode($message);
    $numbers = implode(',', $numbers);
    // Prepare data for POST request
    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
    $ch = curl_init('http://api.txtlocal.com/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); // This is the result from the API
    curl_close($ch);
    echo $result;
}

// function to use php-clamavlib
// if($_POST){
//   $error = '';
//   //print_r($_FILES);
//   if($_FILES['file']['size'] == 0 || !is_file($_FILES['file']['tmp_name'])){
//      $error .= 'Please select a file for upload!';
//   } else {
//     cl_setlimits(5, 1000, 200, 0, 10485760);
//     if($malware = cl_scanfile($_FILES['file']['tmp_name'])) $error .= 'We have Malware: '.$malware.'<br>ClamAV version: '.clam_get_version();
//   }
//   if($error == ''){
//     rename($_FILES['file']['tmp_name'], $upload_dir.$_FILES['file']['name']);
//   }
// }

//NOTE: Ensure Socket Path: Verify the ClamAV socket path in getClamavSocket matches your server's configuration.

// Function to scan file for viruses using ClamAV
// function scanFileForVirus($file)
// {


//     $validator = new ClamClient();

//     // printArr($file);

//     // // always check this code as originally it accepts three arguments
//     // $validateFile = $validator->validate($file);

//     if (!$validateFile) {
//         msgException(500, "virus detected");
//     }
// }

// return email once logged in

/**
 * fileLocation: where you want to save the file
 * formInputName : the input name of the $_file
 */
function fileUploadMultiple($fileLocation, $formInputName): void
{
    // scanFileForVirus($_FILES[$formInputName]);
    // Count total files
    $countFiles = count($_FILES[$formInputName]['name']);

    ini_set('post_max_size', '20M');
    ini_set('upload_max_filesize', '20M');

    // Looping all files
    for ($i = 0; $i < $countFiles; $i++) {
        $fileName = basename($_FILES[$formInputName]['name'][$i]);
        // trim out the space in the file name
        $fileName = str_replace(' ', '', $fileName);
        $fileTemp = $_FILES[$formInputName]['tmp_name'][$i];
        $fileSize = $_FILES[$formInputName]['size'][$i];
        $pathToImage = "$fileLocation$fileName";



        // virus scan using ClamAV
        new ScanVirus(tempFileLocation: $fileTemp);

        // Validate file
        $picError = "";
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedFormats = ['png', 'jpg', 'gif', 'jpeg'];

        if (!in_array($fileExtension, $allowedFormats)) {
            $picError .= 'Format must be PNG, JPG, GIF, or JPEG. ';
        }


        if ($fileSize > 102400000) {
            $picError .= 'File size must not exceed 10240kb';
            msgException(400, "Error Processing Request - post images - $picError");
        }
        // if (file_exists($pathToImage)) {
        //     $picError .= "File $fileName already uploaded";
        //     msgException(401, "Error Processing Request - post images - $picError");
        // }
        if ($picError) {
            msgException(400, "Error Processing Request - post images - $picError");
            continue; // skip this file upload
        }

        // Move uploaded file
        if (!move_uploaded_file($fileTemp, $pathToImage)) {
            $_SESSION['imageUploadOutcome'] = 'Image was not successfully uploaded';
            continue; // Skip optimization if upload failed
        }

        // Optimize the image
        $optimizerChain = ImgOptimizer::create();
        $optimizerChain->optimize($pathToImage);
        $_SESSION['imageUploadOutcome'] = 'Image was successfully uploaded';
    }
}

/**
 * fileLocation: where you want to save the file
 * formInputName : the input name of the $_file
 */
function fileUpload($fileLocation, $formInputName): void
{
    // UPLOAD PICTURE
    $fileName = basename($_FILES[$formInputName]['name']); #the fileName
    $fileTemp = $_FILES[$formInputName]['tmp_name'];
    $fileError = $_FILES[$formInputName]['error'];
    $size = $_FILES[$formInputName]['size'];  # the file size

    // trim out the space in the file name
    $fileName = str_replace(' ', '', $fileName);

    // Check for virus using ClamAV
    new ScanVirus(tempFileLocation: $fileTemp);

    if (!$fileName) {
        throw new Exception("No File Name ", 1);
    }

    if ($fileError !== UPLOAD_ERR_OK) {

        throw new Exception('File upload error: ' . $fileError);
    }

    if (!$fileTemp) {
        throw new Exception("No Temp File", 1);
    }

    # the file temp name

    if (!$size) {
        throw new Exception("File has no size", 1);
    }

    // throw exception if fileLocation does not exist  
    if (!file_exists($fileLocation) || !is_dir($fileLocation)) {
        throw new \Exception("File location does not exist", 1);
    }

    $fileName_location = "$fileLocation$fileName";

    // sanitise the file
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION); # use pathinfo to get the file extension
    $fileExtension = strtolower($fileExtension); #turn the extension to a lowercase
    if ($fileExtension != 'png' && $fileExtension != 'jpg' && $fileExtension != 'gif' && $fileExtension != 'jpeg') {
        throw new \Exception("Format must be PNG, JPG, JPEG or GIF", 1);
    }
    if ($size > 10240000) {
        throw new \Exception("File size is bigger than the required size", 1);
    }
    if (file_exists($fileName)) {
        throw new \Exception("File $fileName already uploaded", 1);
    }
    if (!move_uploaded_file($fileTemp, $fileName_location)) {
        throw new \Exception("Sorry, there was an error uploading your file.", 1);
    }

    $optimizerChain = ImgOptimizer::create();
    $optimizerChain->optimize($fileName_location);
}

// ADD COUNTRY CODE

function addCountryCode($mobile, $code): string
{
    $telephone = $mobile;
    $telephone = substr($telephone, 1);
    $telephone = $code . $telephone;
    return $telephone;
}

/**
 * return a bulma panel row
 */
function bulmaPanelMoney($input, $label, $color): void
{
    echo " <div class='column'>
        <div class='panel panel-$color'>
            <div class='panel-heading'>
                <div class='has-text-centered'>
                    <div class=huge>
                       £" . number_format($input)
        . "</div>
                    <div>$label</div>
                </div>
            </div>
        </div>
    </div>";
}


function bulmaPanel($input, $label, $color): void
{
    echo " <div class='column'>
        <div class='panel panel-$color'>
            <div class='panel-heading'>
                <div class='has-text-centered'>
                    <div class=huge>
                    $input
                    </div>
                    <div>$label</div>
                </div>
            </div>
        </div>
    </div>";
}

function changeToJs($variableName, $variable): void
{
    echo "<script> const $variableName = $variable </script>";
}

/**
 * 
 * @param mixed $time that is the full date and time e.g 2010-04-28 17:25:43
 * @return string | bool
 */

function humanTiming($time)
{
    try {
        $time = strtotime($time);
        $time = time() - $time; // to get the time since that moment
        $time = ($time < 1) ? 1 : $time;
        $tokens = array(
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
        }
        return 'just now'; // Default fallback if time is not within any unit
    } catch (\Throwable $th) {
        showError($th);
        return false;
    }
}

function milliSeconds(): string
{
    $microtime = microtime();
    $comps = explode(' ', $microtime);

    // Note: Using a string here to prevent loss of precision
    // in case of "overflow" (PHP converts it to a double)
    return sprintf('%d%03d', $comps[1], $comps[0] * 1000);
}



function checkEmailExist($email): array|int|string
{
    $query = Select::formAndMatchQuery(selection: 'SELECT_COUNT_ONE', table: 'account', identifier1: 'email');
    return Select::selectFn2(query: $query, bind: [$email]);
}

function getPostDataAxios()
{
    return json_decode(file_get_contents("php://input"), true);
}
