@extends('base')

@section('title', 'Decision Matrix')


@section('content')



<section class="hero">

  <div class="overlay">
    <h1>The Smart Decisioning Tool</h1>
    <a href="#questions" class="cta-button">Click for your questions</a>
  </div>


</section>



    <div class = "container overflow-hidden text-center">

       <div class="description row row-cols-1 row-cols-md-2 g-4">

          <div class="description-image col">
            <img src="public/images/about-image.jpg" alt="Smart Decision Tool" class="hero-image">
          </div>

        <div class="description-text col" id="mainDescription">

          <h3 class="subtitle">Every purchase satisfies either a need or want and most times we are conflicted on whether to spend on something we desire or not</h3>
          <h3 class="subtitle">Especially in this modern world, where we are bombarded with advertisements on the latest items/products/services. With all, trying to convince us to spare our pennies, and the reality is that, it is difficult not be influenced by this desire to buy, sometimes, things we don't need, or even want. This creates a strong pull toward many ‘nice-to-have’ things.</h3>
          <h3 class="subtitle"> <span class="highlight">Our app is created to guide you in making fair and rational decisions when conflicted on whether to make a purchase or not.</span> Using our simple list of questions can help you to make smarter buying decisions in all areas of your expenditures.</h3>

        </div>
  </div>
  <br><br>


    {{-- <div class="notification"></div> --}}

     <form id="questions" class="questions" action="post">

        @php

        $formArray = [
        
          'Questions to Consider' => 'title',
          'x1'=> 'br',
          'x2'=> 'hr',

             'Intro'=> ['mixed', 
                 'label' => [
                  'What do you want to buy? This could be anything?', 
                  'How does the item’s cost compare to your monthly budget?',
                  'If you bought it, how would it make you feel?'
                  ],
                 'attribute' => ['whatToBuy', 'cost', 'buyingFeeling'],
                 'inputType' => ['cardSelect', 'cardSelect', 'cardSelect'],
                 'img' => [
                  '/public/images/CARS.jpg', 
                  '/public/images/THINKING_OF_WHY.jpg',
                  '/public/images/FEELINGS.jpg'
                  ],
                 'options' => [
                     '',
                    [
                      5 => 'Less than 5% of my budget',
                      3 => '5–10% of my budget',
                      1 => '10 - 20% of my budget',
                      0 => 'Over 20% of my budget'
                    ],
                    [
                        4 => 'I will be over the moon',
                        4 => 'I will be happy and satisfied',
                        3 => 'Satisfied but not thrilled',
                        2 => 'Mixed feelings',
                        1 => 'Not sure till I get it',
                        0 => 'No difference to how I feel',
                    ],
                 ]
                 
             ],
              'x3'=> 'br',

            'purchase' => ['mixed', 
                 'label' => [
                  'How long have you been thinking about it?', 
                  "Is this a Need - necessity or a Want - nice to have?",
                  'Have you explored other options or alternatives to this item?',
                 ],
                  'attribute' => ['notImpulsive', 'necessity', 'option'],

                  'inputType' => ['cardSelect', 'cardSelect', 'cardSelect'],

                  'img' => [
                   '/public/images/THINKING_AT_TABLE.jpg',
                   '/public/images/BUY_LESS_CHOOSE_WISE.jpg',
                     '/public/images/OPTIONS.jpg',
                   
                  ],
             'options' => [
                 [
                  0=>'Just now', 
                  2=>'One month', 
                  3=>'Two Months', 
                  4=>'Over Three Months ', 
                  5=>'I have been thinking about it for a long time'
                 ], 
               
                 [
                  5=>'Yes - Necessity. I really need it', 
                  4=>'I love and want it', 
                  3=>'It is just something nice to have', 
                  1=>'I just feel like spending to spoil myself'

                 ],
                  [
                      5=>'Yes, but this seems as the best options', 
                      3=>'No, perhaps I should', 
                      2=>'No, I don\'t need to look at other options.',
                      0=> 'No'
                     ]
                

             ]
            ],
              'x5'=> 'br',
             

            'finance' => ['mixed', 
                 'label' => [
                  "How would you pay for the item?",
                  'Can you afford it without stretching your finance?',
                  'Are you concerned about your debt, expenses, or job?'
                 ],
                 'attribute' => ['paymentSource', 'affordability', 'concerns'],
                 'inputType' => ['cardSelect', 'cardSelect', 'cardSelect'],
                 'img' => [
                 
                   '/public/images/CREDIT.jpg',
                   '/public/images/MONEY.jpg',
                   '/public/images/DEBT_LEVEL.jpg'
                 ],
                 'options' => [
                    
                      [
                  5=>'Gift or prize money',
                  4=>'Salary, savings, bonus or commission',
                  3=>'Credit card',
                  2=>'Borrowing from family or friends',
                  1=>'Bank loan, or other loan',
                  0=>'I don\'t know yet',

                 ],
                     [
                      5=>'Yes!', 
                      3=>'Yes, but I may need to cut my expenses', 
                      2=>'I can afford it, but it will stretch my finances',
                      0=>'No, I can\'t afford it, but I will buy it anyway',
                      0=>'No'
                     ],
                     [
                      5=>'No, I have no concerns', 
                      3=>'Yes, I have some concerns but I can manage', 
                      1=> 'Yes, I have significant concerns',
                      0=>'I have serious concerns about my debt level and expenses'

                     ]
                 ]
            ],
             'x7'=> 'br',
           

            'checkbox' => 'I agree to the <a href="terms">terms and conditions</a>',
                 'x8'=> 'br',
            'Submit to get a decision' => 'button',

                 'x9'=> 'br',
        ];


        $form = new Src\BuildFormBStrap($formArray);

        $form->genForm();



        @endphp




                   


</form>

<script>
  document.getElementById('button').classList.add('btn-lg', 'btn-block');
</script>


@endsection