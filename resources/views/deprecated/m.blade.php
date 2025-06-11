@extends('base')
@section('title', 'iDecide')
@section('content')

<section class="hero">

  <div class="overlay">
    <h1>The Smart Decisioning Tool</h1>
    <a href="#questions" class="cta-button">Click for your questions</a>
  </div>


</section>

<div class="container">

  <div class="description row row-cols-1 row-cols-md-2 g-4">

    <div class="description-image col">
      <img src="public/images/about-image.jpg" alt="Smart Decision Tool" class="hero-image">
    </div>


    <div class="description-text col">

      <h3 class="subtitle">Every purchase satisfies either a need or want and most times we are conflicted on whether to spend on something we desire or not</h3>
      <h3 class="subtitle">Especially in this modern world, where we are bombarded with advertisements on the latest items/products/services. With all, trying to convince us to spare our pennies, and the reality is that, it is difficult not be influenced by this desire to buy, sometimes, things we don't need, or even want. This creates a strong pull toward many ‘nice-to-have’ things.</h3>
      <h3 class="subtitle"> <span class="highlight">Our app is created to guide you in making fair and rational decisions when conflicted on whether to make a purchase or not.</span> Using our simple list of questions can help you to make smarter buying decisions in all areas of your expenditures.</h3>

    </div>
  </div>

  <br><br>
 
  <h1>Questions to Consider</h1>
  {{-- <h3 class="subtitle">Do you sometimes struggle to make simple decisions? Our easy-to-use decision tool will guide you.</h3>  --}}


  <form id="questions" class="questions" action="post">

    <div class="mb-3">
      <label for="email" class="form-label email-label"><b>Email address</b></label>
      <input type="email" class="form-control email" id="email" placeholder="name@example.com">
    </div>
    <div id="passwordHelpBlock" class="form-text">
      We need your email to send you the result of the decision tool
    </div>




{{-- the questions --}}
<div class="row row-cols-1 row-cols-md-3 g-4 allCards ">
  <div class="card hidden col">
    <div class="card h-100 hidden">
      <img src="public/images/CARS.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">What do you want to buy? This could be anything?</h5>
        <input type="text" class="form-control" id="whatToBuy" name="whatToBuy" placeholder="Text input">
      </div>
    </div>
  </div>

  <div class="card hidden col">
    <div class="card h-100 hidden">
      <img src="public/images/THINKING_OF_WHY.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Why do you need or want it? Think carefully about this.</h5>
        <input type="text" class="form-control" id="needOrWant" name="needOrWant" placeholder="Text input">
      </div>
    </div>
  </div>

  <div class="card hidden col">
    <div class="card h-100 hidden">
      <img src="public/images/FEELINGS.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">If you bought it, how would it make you feel?</h5>
        <select class="form-select" arial-label='Default' name="buyingFeeling" id="buyingFeeling" class="form-select" aria-label="Default select example">
          <option value="select">Select dropdown</option>
          <option value="yes" data-score="10">Yes, It will spur me on to greater things</option>
          <option value="no" data-score="2">No, it makes no difference</option>
          <option value="think" data-score="7.5">I think it should</option>
          <option value="unsure" data-score="5">Am unsure until I get it</option>
        </select>
      </div>
    </div>
  </div>

  <div class="card hidden col">
    <div class="card h-100 hidden">
      <img src="public/images/THINKING_AT_TABLE.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">How long have you been thinking about it?</h5>
        <select class="form-select" arial-label='Default' name="finance" id="finance">
          <option>Select dropdown</option>
          <option value="now" data-score="5">Just now</option>
          <option value="one-month" data-score="10">One month</option>
          <option value="two-months" data-score="10">Two Months</option>
          <option value="three-months-plus" data-score="10">Three Months Plus</option>
        </select>
      </div>
    </div>
  </div>

  <div class="card hidden col">
    <div class="card h-100 hidden">
      <img src="public/images/BUY_LESS_CHOOSE_WISE.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Is this a "Need - necessary" or a "Want - nice to have"?</h5>
        <select class="form-select" arial-label='Default' name="necessity" id="necessity">
          <option value="select">Select dropdown</option>
          <option value="yes" data-score="10">Yes - Necessity. I really need it</option>
          <option value="love" data-score="7">I love and want it</option>
          <option value="nice" data-score="4">It is just something nice to have</option>
          <option value="spoil" data-score="3">I just feel like spending to spoil myself</option>
        </select>
      </div>
    </div>
  </div>

  <div class="card hidden col">
    <div class="card h-100 hidden">
      <img src="public/images/CREDIT.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Where would you source the money from? </h5>
        <select class="form-select" arial-label='Default' name="reward" id="reward">
          <option value="select">Select dropdown</option>

          <option value="savings" data-score="10">Savings</option>
          <option value="salary" data-score="10">Salary/Income</option>
          <option value="freeCash" data-score="10">Free Cash</option>
          <option value="" data-score="4">Credit Card</option>
          <option value="gift" data-score="10">Gift</option>
          <option value="loan" data-score="6">Loan</option>
          <option value="repayment" data-score="6">Monthly Repayment</option>
        </select>
      </div>
    </div>
  </div>

  <div class="card hidden col">
    <div class="card h-100 hidden">
      <img src="public/images/OPTIONS.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Have you considered other options or alternatives?</h5>
        <select class="form-select" arial-label='Default' name="options" id="options">
          <option value="select">Select dropdown</option>
          <option value="yes" data-score="10">Yes, but this seems as the best options</option>
          <option value="no" data-score="5">No, perhaps I should</option>
          <option value="need" data-score="3">I don't need to look at other options</option>
          <option value="clear" data-score="7">I'm clear this is what I want.</option>
        </select>
      </div>
    </div>
  </div>

  <div class="card hidden col">
    <div class="card h-100 hidden">
      <img src="public/images/MONEY.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Can you afford it without stretching your finance?</h5>
        <select class="form-select" arial-label='Default' name="affordability" id="affordability">
          <option value="select">Select dropdown</option>
          <option value="yes" data-score="10">Yes!</option>
          <option value="cut" data-score="7">Yes, but I may need to cut my expenses</option>
          <option value="paying" data-score="10">Someone else is paying for it</option>
          <option value="risk" data-score="1">Possible big risk to my finance</option>
          <option value="fine" data-score="4">I think it will be fine</option>
        </select>
      </div>
    </div>
  </div>

  <div class="card hidden col">
    <div class="card h-100 hidden">
      <img src="public/images/DEBT_LEVEL.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Do you have concerns about either your debt level/expenses/job?</h5>
        <select class="form-select" arial-label='Default' name="concerns" id="concerns">
          <option value="select">Select dropdown</option>
          <option value="income" data-score="10">My income is robust</option>
          <option value="expenses" data-score="8">Expenses and debt level are quite low</option>
          <option value="difference" data-score="5">Yes, but it shouldn't make a difference</option>
          <option value="concerns" data-score="1">I have serious concerns</option>
        </select>
      </div>
    </div>
  </div>
</div>

{{-- checkbox --}}
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    I agree to the <a href="#">terms and conditions</a>
  </label>
</div>

{{-- build large submit and it should be centred --}}
<div class="d-grid gap-2 card hidden col-6 mx-auto">
  <button class="btn btn-primary btn-lg submitBtn" type="button">Check Decision</button>
</div>

</form>

</div>


<!-- Modal Structure -->
<div class="modal fade" id="resultModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Your Results</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalBody">
        <!-- Results will be injected here -->
      </div>
    </div>
  </div>
</div>

@endsection
