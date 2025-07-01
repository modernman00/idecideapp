@extends ('email')
@section('title', 'email')

@section('subject', 'SUBJECT: Your Decision Matrix Result')

@section('content')


<div class="bg-light d-flex align-items-center justify-content-center min-vh-100">

  <div class="container">

    <div class="theme-toggle">
      <input type="checkbox" id="themeSwitch" />
      <label for="themeSwitch">🌙</label>
    </div>


    <h1 class="text-center mb-4">Decision Matrix Result</h1>
    <div class="card shadow">
      <div class="card-body">
        <h5 class="card-title">Your Decision Matrix Result</h5>
        <p class="card-text">Thank you for using our decision matrix tool. Here are your results:</p>

        <!-- Chart and Image Row -->
        <div class="row align-items-center justify-content-center mb-4">
          <div class="col-12 col-md-6 text-center">
            {{-- <canvas id="scoreChart" width="200" height="200"></canvas> --}}
            <div class="smiley-container">
           
               <div class="smiley red">😡</div>
                <div class="smiley red">😬</div>
                <div class="smiley red">😞</div>
                <div class="smiley red">😞</div>
                <div class="smiley yellow">🙃</div>
                <div class="smiley yellow">😐</div>
                <div class="smiley green">😀</div>
                <div class="smiley green">👍</div>
             
            </div>
            <input type="range" id="scoreSlider" min="0" max="100" value={{(int) $data['score']}} disabled>.
          </div>
          {{-- <div class="col-12 col-md-6 text-center">
            <img id="image" src="" alt="" class="result-image" />
          </div> --}}

          <div class="col-12 col-md-6 text-center">
            <img src={{$data['resultImage']}}
                alt="image"
                id="image"
                class="result-image img-fluid"
                style="min-width:100%; min-height:100%; object-fit:cover;">

          </div>
        </div>

        <ul class="list-group list-group-flush mt-4">

          <li class="list-group-item">
            <strong>Score:</strong> 
            <span id="score">{{ $data['score'] }}</span>
          </li>

          <li class="list-group-item">
            <strong>Decision:</strong> 
            <span id="decision" class="highlight">{{ $data['decision'] }}</span>
          </li>

        

          <li class="list-group-item">
            <strong>Comments:</strong> 
            <span id="comments">{{ $data['comments'] }}</span>
          </li>

          <li class="list-group-item">
            <strong>Personalised Advice </strong> 
            <span id="personalisedAdvice">{{ $data['advice'] }}</span>
          </li>
  <ul id="advice-list" class="advice-list">
          @foreach ($data['personalisedAdvice'] as $advice)
              <li class="list-group-item">{{ $advice }}</li>
          @endforeach

        </ul> 

        </ul>


        <div class="text-center mt-4">
          <span id="badge" class="badge-custom"></span>
        </div>
        
        <div class="text-center mt-4">
          <a href="/#questions" class="btn btn-primary">
          Take Quiz Again
          </a>
        </div>

        <div class="text-center mt-4">
          <p class="mb-2">Share your result:</p>
          <div class="share-buttons">
         
            <a href="#" target="_blank" id="twitterShare" title="Share on Twitter" aria-label="Share on Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank" id="whatsappShare" title="Share on WhatsApp" aria-label="Share on WhatsApp"><i class="fab fa-whatsapp"></i></a>
            <a href="#" target="_blank" id="facebookShare" title="Share on Facebook" aria-label="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" target="_blank" id="truthSocialShare" title="Share on Truth Social" aria-label="Share on Truth Social"><i class="fab fa-bullhorn"></i></a>
            <a href="#" target="_blank" id="linkedinShare" title="Share on LinkedIn" aria-label="Share on LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" target="_blank" id="redditShare" title="Share on Reddit" aria-label="Share on Reddit"><i class="fab fa-reddit-alien"></i></a>
          </div>

        </div>
    
    

        </div>
  
      </div>
    </div>
  </div>
</div>




@endsection
