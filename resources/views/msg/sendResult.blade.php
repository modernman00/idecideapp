@extends ('email')
@section('title', 'email')

@section('subject', 'SUBJECT: Your Decision Matrix Result')

@section('content')

<style>
  :root {
    --primary-color: #0d6efd;
    --secondary-color: #6c757d;
    --success-color: #198754;
    --warning-color: #ffc107;
    --danger-color: #dc3545;
    --background-light: #f8f9fa;
    --background-dark: #343a40;
    --text-light: #212529;
    --text-dark: #f8f9fa;
  }

  [data-theme="dark"] {
    --background-light: #343a40;
    --background-dark: #212529;
    --text-light: #f8f9fa;
    --text-dark: #212529;
  }

  body {
    background-color: var(--background-light);
    color: var(--text-light);
    opacity: 0;
    animation: fadeIn 1s ease-in forwards;
    transition: background-color 0.3s, color 0.3s;
  }

  @keyframes fadeIn {
    to { opacity: 1; }
  }

  .container {
    max-width: 800px;
    padding: 2rem;
  }

  .card {
    border: none;
    border-radius: 1rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    background: linear-gradient(135deg, #ffffff, #e9ecef);
    transition: transform 0.3s;
  }

  [data-theme="dark"] .card {
    background: linear-gradient(135deg, #495057, #343a40);
  }

  .card:hover {
    transform: translateY(-5px);
  }

  .card-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--primary-color);
  }

  #score {
    font-size: 2rem;
    font-weight: bold;
    color: var(--primary-color);
    transition: color 0.3s;
  }

  .highlight {
    font-weight: 600;
  }

  .success { color: var(--success-color); }
  .warning { color: var(--warning-color); }
  .danger { color: var(--danger-color); }

  .badge-custom {
    font-size: 1rem;
    padding: 0.5em 1em;
    border-radius: 0.5em;
    margin-top: 1em;
  }

  .badge-success { background-color: #d4edda; color: #155724; }
  .badge-warning { background-color: #fff3cd; color: #856404; }
  .badge-danger { background-color: #f8d7da; color: #721c24; }

  .share-buttons a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: var(--secondary-color);
    color: white;
    margin: 0 0.5rem;
    transition: background-color 0.3s, transform 0.3s;
  }

  .share-buttons a:hover {
    transform: scale(1.1);
    background-color: var(--primary-color);
  }

  #scoreSlider {
    width: 100%;
    max-width: 300px;
    height: 20px;
    margin: 1rem auto;
    display: block;
    -webkit-appearance: none;
    appearance: none;
    background: linear-gradient(to right, var(--danger-color) 0%, var(--danger-color) 49%, var(--warning-color) 50%, var(--warning-color) 74%, var(--success-color) 75%, var(--success-color) 100%);
    border-radius: 10px;
    outline: none;
    cursor: default;
  }

  #scoreSlider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 16px;
    height: 16px;
    background: var(--text-light);
    border: 2px solid var(--primary-color);
    border-radius: 50%;
    cursor: default;
  }

  #scoreSlider::-moz-range-thumb {
    width: 16px;
    height: 16px;
    background: var(--text-light);
    border: 2px solid var(--primary-color);
    border-radius: 50%;
    cursor: default;
  }

  #scoreSlider:disabled {
    opacity: 1;
  }

  .slider-label {
    text-align: center;
    font-size: 14px;
    font-weight: bold;
    color: var(--text-light);
    margin-top: 0.5rem;
  }

  .result-image {
    max-width: 200px;
    height: auto;
    border-radius: 0.5rem;
    transition: opacity 0.5s ease-in;
  }

  .theme-toggle {
    position: absolute;
    top: 1rem;
    right: 1rem;
    cursor: pointer;
  }

  .btn {
    border-radius: 0.5rem;
    padding: 0.75rem 1.5rem;
    transition: transform 0.2s, background-color 0.3s;
  }

  .btn:hover {
    transform: translateY(-2px);
  }

    .smiley-container {
    display: flex;
    justify-content: space-around;
    width: 200px;
    margin: 0.5rem auto;
  }

  .smiley {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
  }

  .smiley.green { background: var(--success-color); }
  .smiley.yellow { background: var(--warning-color); }
  .smiley.red { background: var(--danger-color); }

  /* Responsive Design */
  @media (max-width: 576px) {
    .card-title { font-size: 1.5rem; }
    #score { font-size: 1.5rem; }
    #scoreSlider, .result-image { max-width: 150px; }
    .btn { padding: 0.5rem 1rem; font-size: 0.9rem; }
     .result-image { max-width: 150px; }
        .smiley-container { width: 150px; }
    .smiley { width: 25px; height: 25px; font-size: 16px; }
  }

  @media (min-width: 577px) and (max-width: 992px) {
    #scoreSlider, .result-image { max-width: 180px; }
        .smiley-container { width: 180px; }
  }

  .img-wrapper {
    width: 200px;
    height: 200px;
    position: relative;
    background: linear-gradient(to bottom, #fff9e6, #fff4cc);
    border-radius: 8px;
    overflow: hidden;
  }

  .img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .img-wrapper .scale-icon {
    position: absolute;
    width: 60px;
    height: 60px;
   climbed: 10px;
    right: 10px;
    opacity: 0.3;
  }
  .share-buttons a {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: var(--secondary-color);
  color: white;
  margin: 0 0.5rem;
  text-decoration: none;
  transition: background-color 0.3s, transform 0.3s;
  }


  .share-buttons a .fa-twitter {
    color: #1da1f2; /* Twitter blue */
  }
  .share-buttons a .fa-whatsapp {
    color: #25d366; /* WhatsApp green */
  }

  .share-buttons a .fa-facebook-f {
    color: #3b5998; /* Facebook blue */
  }
  .share-buttons a .fa-bullhorn {
    color: #ff4500; /* Truth Social (using a reddish-orange as a placeholder) */
  }
  .share-buttons a .fa-linkedin-in {
    color: #0077b5; /* LinkedIn blue */
  }
  .share-buttons a .fa-reddit-alien {
    color: #ff4500; /* Reddit orange */
  }

  .share-buttons a:hover {
    transform: scale(1.2);
  }

  .success-light { color: #28a745; }
  .badge-success-light { background-color: #d4edda; color: #155724; }

  .advice-list {
    list-style-type: disc;
    padding-left: 20px;
    margin-top: 1rem;
  }
  .advice-list li {
    margin-bottom: 0.5rem;
    font-size: 1rem;
    color: #212529;
  }

</style>


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
           
                <div class="smiley red">😞</div>
                <div class="smiley red">😞</div>
                <div class="smiley red">😞</div>
                <div class="smiley red">😞</div>
              
              <div class="smiley yellow">🙁</div>
              <div class="smiley yellow">😐</div>
          <div class="smiley green">🙂</div>
                 <div class="smiley green">😄</div>
             
            </div>
            <input type="range" id="scoreSlider" min="0" max="100" value="0" disabled>.
          </div>
          {{-- <div class="col-12 col-md-6 text-center">
            <img id="image" src="" alt="" class="result-image" />
          </div> --}}

          <div class="col-12 col-md-6 text-center">
            <img src=""
                alt=""
                id="image"
                class="result-image img-fluid"
                style="min-width:100%; min-height:100%; object-fit:cover;">

          </div>
        </div>

        <ul class="list-group list-group-flush mt-4">

          <li class="list-group-item">
            <strong>Score:</strong> 
            <span id="score"></span>
          </li>

          <li class="list-group-item">
            <strong>Decision:</strong> 
            <span id="decision" class="highlight"></span>
          </li>

        

          <li class="list-group-item">
            <strong>Comments:</strong> 
            <span id="comments"></span>
          </li>

          <li class="list-group-item">
            <strong>Personalised Advice </strong> 
            <span id="personalisedAdvice"> loading...</span>
          </li>

          <ul id="advice-list" class="advice-list"></ul>

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
    
        <div class="text-center mt-4">

          <button id="emailModalBtn" data-bs-toggle="modal" data-bs-target="#emailModal" class="btn btn-secondary">Email Result</button>
  
          <button id="referFriend" class="btn btn-success">Invite a Friend</button>
        </div>

        <br><br>

        {{-- CHOOSE YOUR LANGUAGE --}}

        <div class="row mt-4">
          <div class="col">
            <label for="languageSelect" class="form-label">Choose Language:</label>
            <select id="languageSelect" class="form-select w-auto d-inline-block">
              <option value="en" selected>English</option>
              <option value="es">Spanish</option>
              <option value="fr">French</option>
              <!-- Add more languages as needed -->
            </select>
          </div>
        </div>


        </div>
  
      </div>
    </div>
  </div>
</div>



@endsection
