@extends('base')

@section('title', 'About iDecide')
@section('meta_description', 'Learn how iDecide helps you make smarter, regret-free purchases. Discover our mission and the team behind the tool.')
@section('og_title', 'About iDecide – Your Smart Spending Assistant')
@section('og_description', 'Meet the mission behind iDecide. We help users spend smarter and live better through thoughtful decision-making.')
@section('twitter_title', 'About iDecide')
@section('twitter_description', 'Get to know the team and mission behind iDecide. Smart tools for smart decisions.')

<style nonce="{{ $nonce }}">     .title{
            color: var(--primary-color);
        }</style>


@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-center title">About iDecide</h1>

  <p>
    In today's fast-paced digital world, where online shopping and social media ads influence our choices daily, making wise financial decisions has become harder than ever. We’re bombarded with promotions, flash sales, and influencers convincing us we need the next best gadget, fashion item, or luxury upgrade. But what if there were a way to pause, reflect, and truly assess the value of a purchase — before hitting "buy now"? That’s exactly why we built <strong>iDecide</strong>.
  </p>

  <h2 class="mt-4 title">What Is iDecide?</h2>
  <p>
    <strong>iDecide</strong> is a simple yet powerful decision-making assistant built to help you evaluate whether a potential purchase is worth your money, time, and attention. Through a smart questionnaire, scoring system, and personalised feedback, iDecide guides you to make thoughtful spending choices based on your values, financial situation, and long-term goals.
  </p>

  <p>
    We believe that smart decision-making shouldn’t be complicated or reserved for financial experts. Everyone — from students managing limited budgets to professionals juggling responsibilities — deserves a tool that puts clarity back in control.
  </p>

  <h2 class="mt-4 title">Why We Created iDecide</h2>
  <p>
    The inspiration behind iDecide was simple: regret. We've all bought something on impulse only to feel unsure later. Whether it’s buyer’s remorse or a dent in your bank balance, those little "why did I buy this?" moments add up. The creators of iDecide experienced this repeatedly — despite being financially literate and mindful.
  </p>

  <p>
    The problem wasn’t knowledge — it was emotional decision-making in moments of excitement, boredom, or pressure. So we set out to create a product that introduces a moment of pause between desire and action. iDecide isn't just a budgeting tool; it's your digital conscience, nudging you to think before spending.
  </p>

  <h2 class="mt-4">How It Works</h2>
  <p>
    The iDecide experience is rooted in simplicity. Users are guided through a structured series of questions that cover key decision-making areas:
  </p>
  <ul>
    <li>What exactly are you considering buying?</li>
    <li>Is it a need or a want?</li>
    <li>How long have you been thinking about it?</li>
    <li>Can you afford it without stress?</li>
    <li>What’s the emotional driver behind this decision?</li>
  </ul>

  <p>
    Each answer contributes to a score, categorised into zones: <strong>Don’t Buy</strong>, <strong>Reconsider</strong>, and <strong>Buy</strong>. But we don’t stop there. iDecide also offers personalised advice based on your answers — including financial tips and reflective prompts powered by AI.
  </p>

  <h2 class="mt-4 title">What Makes Us Different</h2>
  <p>
    Unlike typical budgeting tools or financial calculators, iDecide is behaviour-focused. We don’t just look at numbers — we explore the motivation behind your purchase. Our platform combines psychology, financial literacy, and modern tech to create a well-rounded, empathetic decision tool.
  </p>

  <p>
    Most importantly, we don’t judge. Whether you decide to buy or walk away, the goal is to empower you with clarity — not restrict your choices.
  </p>

  <h2 class="mt-4 title">Our Mission</h2>
  <p>
    Our mission is to help people make better everyday spending decisions that align with their values and goals. By encouraging self-reflection and transparency, we aim to promote smarter habits, reduce regret, and improve financial well-being.
  </p>

  <h2 class="mt-4 title">Who Can Use iDecide?</h2>
  <p>
    iDecide is for everyone:
  </p>
  <ul>
    <li>Students deciding whether to spend on lifestyle vs. essentials</li>
    <li>Young professionals managing personal budgets</li>
    <li>Families evaluating major purchases</li>
    <li>Small business owners weighing business investments</li>
  </ul>
  <p>
    If you’ve ever asked yourself, “Should I really buy this?” — iDecide is for you.
  </p>

  <h2 class="mt-4 title">Our Vision for the Future</h2>
  <p>
    iDecide is just getting started. We're planning new features including:
  </p>
  <ul>
    <li>Financial habit tracking</li>
    <li>Goal-based decision templates</li>
    <li>Community advice sharing</li>
    <li>Mobile app with push-reminders for high-risk spending situations</li>
  </ul>

  <p>
    We envision a world where decision-making tools like iDecide are part of every digital wallet — helping people not just manage money, but master it.
  </p>

  <h2 class="mt-4 title">Join the Movement</h2>
  <p>
    Smart spending is about more than just saving money — it’s about being intentional. Whether you use iDecide once or daily, you’re taking control of your choices. We invite you to try the tool, share it with friends, and become part of a movement that values clarity over chaos.
  </p>

  <p>
    Thank you for visiting, and remember — every purchase is a decision. Make it a smart one.
  </p>
</div>
@endsection
