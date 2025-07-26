<?php

namespace App\classes;

use App\classes\AlterTable;

class BuildFormBulma extends AlterTable
{
    /**
     * This function is used to build a form
     * it takes an array which denotes the type of question
     * When there is a need for new entries, use the newEnt array
     *
     */
    private array $entKey;
    private string $token;
    private array $entValue;
    private int $entCount;
    public ?string $ref = null;
    public ?string $year = null;
    public ?string $month = null;
    private array $setYear = [];
    private array $setDay = [];


    /**
     * enter the array to create the form 'name'=> 's' s denotes string, 1 integer, date for date, textera for textera and select is an array ['select' followed by the options]
     * mixed - you can use to generate text, number, select, inputButton
     * textera
     * it also autogenerate the token
     * title of section ( work_information => title)
     */

    public function __construct(public array $question)
    {
        $this->token = urlencode(base64_encode((random_bytes(32))));
    }

    /**
     * it extracts out the values of the form. this is what we use to decide the type of question
     *
     * @return array
     */
    public function setEntValue(): array
    {
        $this->entValue = array_values($this->question);
        $this->entCount = count($this->entValue);
        return $this->entValue;
    }



    /**
     * function to set the key of the form. Keys are the names of questions and the names of the database
     */
    public function setEntKey(): array
    {
        $this->entKey = array_keys($this->question);
        return $this->entKey;
    }

    public function setSessionToken(): string
    {
        $_SESSION['token'] = $this->token;
        return $_SESSION['token'];
    }

    /**
     * important ones are mixed, select-many, setError
     *
     * example - mixed 'spouse' => ['mixed','label' => ["Spouse's name", "Spouse's mobile", "Spouse's Email"],'attribute' => ['spouseName', 'spouseMobile', 'spouseEmail'],'placeholder' => ['Toyin', '23480364168089', "toyin@gmail.com"], 'inputType' => ['text', 'text', 'email'],'icon' => ['<i class="fas fa-user"></i>','<i class="fas fa-user"></i>','<i class="fas fa-envelope-square"></i>']],
     *
     *
     * example select-many  'married_gender' => ['select-many','label' => ['Marital status', 'gender']'attribute' => ['maritalStatus', 'gender'],'options' => [['select', 'Yes', 'No'],['select', 'Male', 'Female']],'icon' => ['<i class="far fa-kiss-wink-heart"></i>','<i class="fas fa-user-friends"></i>',]],
     *
     *
     * example showError  nameKey => showError - the namekey should be the id of the div or form that will release the error. See Login or Register.js for a clear example
     *
     * example button_captcha  'submit'=> ['button_captcha', 'js'=> 'loginSubmission', 'key'=>getenv('RECAPTCHA_KEY')],
     *
     * @return void
     */
    public function genForm(): void
    {
        $this->setEntValue();
        $this->setEntKey();
        $this->setSessionToken();

        for ($i = 0; $i < $this->entCount; $i++) {
            $value = isset($_POST['submit']) ? $_POST[$this->entKey[$i]] : '';

            $var = strtoupper(preg_replace('/[^0-9A-Za-z@.]/', ' ', $this->entKey[$i]));
            $nameKey = $this->entKey[$i];
            $value = $value ?? "";

            if ($this->entValue[$i][0] === 'button_captcha') {
                $js = $this->entValue[$i]['js'];
                $siteKey = $this->entValue[$i]['key'];
                $action = $this->entValue[$i]['action'];
                echo <<<HTML
                <div class="field">
                    <p class="control">
                        <button data-sitekey=$siteKey data-callback=$js id="button" data-action=$action class="button is-success button is-large is-fullwidth g-recaptcha">
                            {$nameKey}
                        </button>
                    </p>
                </div>
                HTML;
            } elseif ($this->entValue[$i][0] === 'mixed') {
                for ($y = 0; $y < count($this->entValue[$i]['label']); $y++) {
                    $label = empty($this->entValue[$i]['label'][$y]) ? '' : $this->entValue[$i]['label'][$y];
                    $name = empty($this->entValue[$i]['attribute'][$y]) ? '' : $this->entValue[$i]['attribute'][$y];

                    $error = $name . '_error';
                    $help = $name . '_help';
                    $cleanLabel = strtoupper($label);
                    $value = empty($this->entValue[$i]['value'][$y]) ? '' : $this->entValue[$i]['value'][$y];

                    $labelType = $this->entValue[$i]['inputType'][$y] ? $this->entValue[$i]['inputType'][$y] : "";
                    $cardImg = $this->entValue[$i]['cardImg'][$y] ?? "";


                    if ($labelType === 'cardSelect') {
                        echo <<<HTML
                        <div class="column">
                        <div class="card $name" id="{$name}_div" onclick="selectCard(this)">

                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="{$cardImg}" alt="{$name}_img">
                                </figure>
                            </div>

                            <div class="card-content has-text-centered">
                                <div class="content">
                                    <p class="title is-5">{$label}</p>

                                    <div class="field">
                                        <!-- <label class="label">Select Option</label> -->
                                        <div class="control">
                                            <div class="select is-fullwidth is-medium">
                                                <select name={$name} id={$name}_id>
                                                    <option value="0">Select Option</option>
                        HTML;
                        if ($this->entValue[$i]['options'][$y]) {
                            $decide = $this->entValue[$i]['options'][$y];

                            foreach ($decide as $selectOption) {
                                echo "<option value=\"{$value}\"> $selectOption </option>";
                            }
                        }
                        echo <<<HTML
                                                </select>
                                            
                                 
                                    </div>
                                                <p class="help" id="$help"></p>
                                                <p class="help error" id="$error"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                          
                        HTML;
                    } elseif ($labelType === 'cardInput') {
                        echo <<<HTML
                        <div class="column">
                        <div class="card $name" id="{$name}_div" onclick="selectCard(this)">

                            <div class="card-image">
                               
                                    <img src="{$cardImg}" alt="{$name}_img">
                               
                            </div>

                            <div class="card-content has-text-centered">
                                <div class="content">
                                    <p class="title is-5">{$label}</p>

                                    <div class="field">
                                        <div class="control">
                                            <input class="input $name input is-medium" id="{$name}_id" type="text" placeholder="$cleanLabel">
                                            <p class="help" id="$help"></p>
                                            <p class="help error" id="$error"></p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                            
                          
                        HTML;
                    } else {
                        echo <<<HTML
                        <div class="field $name" id="{$name}_div">
                            <label class="label is-medium" id="$name"><b>$cleanLabel</b></label>
                            <div class="control is-expanded ">
                                <input class="input $name input is-medium" type="$labelType" value="$value" maxlength="30" minlength="1" name="$name" id="{$name}_id" placeholder="{$label}"  autocomplete="$name">
                              
                                <p class="help" id="{$name}_help"></p>
                                <p class="help error" id="{$name}_error"></p>
                            </div>
                        </div>
                        HTML;
                    }
                }
            } elseif ($this->entValue[$i] === 'captcha') {
                 echo sprintf('<div class="g-recaptcha" data-sitekey="%s"></div>', getenv('RECAPTCHA_KEY'));
            } else {
                echo "Invalid form element type: {$this->entValue[$i]}";
            }
        }
    }
}
