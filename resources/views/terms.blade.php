@extends('base')

@section('title', 'Decision Matrix')

@section('content')

    <style nonce="{{ $nonce }}">
        .accordion-button {
            font-size: 1rem;
            padding: 1rem;
        }

        .accordion-body {
            font-size: 0.95rem;
            line-height: 1.6;
        }
        .terms-title{
            color: var(--primary-color);
        }
    </style>

    @php
        $email = $_ENV['SUPPORT_EMAIL'];
        $url = $_ENV['APP_URL'];

        $data = [
            [
                'title' => '1. 🔓 Acceptance of Terms',
                'body' =>
                    "By accessing or using the Decision Matrix service provided by We (\"Service\"), you agree to be bound by these Terms. If you do not agree, please refrain from using the Service.",
            ],
            [
                'title' => '2. 🧠 Description of Service',
                'body' =>
                    'The Service is a personal decision-making tool designed to help users reflect on financial, emotional, and practical choices...',
            ],
            [
                'title' => '3. 🙋‍♂️ User Responsibilities',
                'body' =>
                    '<ul><li>Provide accurate inputs</li><li>Use the Service lawfully</li><li>Maintain confidentiality</li></ul>',
            ],
            [
                'title' => '4. 📘 Intellectual Property',
                'body' => 'All content is owned by We or its licensors. You may not reuse it commercially.',
            ],
            [
                'title' => '5. 🔐 Privacy and Data Use',
                'body' => "See our <a href=\"/privacy\">Privacy Policy</a>. Contact <strong>$email</strong> for data rights.",
            ],
            [
                'title' => '6. 🍪 Cookie Usage',
                'body' => 'We use cookies for site functionality. Manage them via your browser.',
            ],
            [
                'title' => '7. ⚠️ Limitations of Liability',
                'body' => "The Service is provided \"as is.\" We are not liable for indirect or consequential damages.",
            ],
            [
                'title' => '8. 🚫 Termination',
                'body' => 'We may suspend access anytime due to misuse or breach.',
            ],
            [
                'title' => '9. ⚖️ Governing Law',
                'body' => 'These Terms follow the laws of England and Wales.',
            ],
            [
                'title' => '10. 🔁 Updates to Terms',
                'body' => 'Terms may change. Continued use implies acceptance.',
            ],
            [
                'title' => '11. 📬 Contact Information',
                'body' => "Email <strong>$email</strong> or visit <a href=\"$url/privacy\" target=\"_blank\">$url/privacy</a>.",
            ],
        ];
    @endphp
    <div class="container py-5">
       <h1 class="mb-4 text-center terms-title" nonce="{{ $nonce }}">Terms Of Use</h1>
        <div class="accordion" id="termsAccordion">

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse0" aria-expanded="false" aria-controls="collapse0">
                        {{ $data[0]['title'] }}
                    </button>
                </h2>
                <div id="collapse0" class="accordion-collapse collapse" aria-labelledby="heading0"
                    data-bs-parent="#termsAccordion">
                    <div class="accordion-body">{!! $data[0]['body'] !!}</div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                        {{ $data[1]['title'] }}
                    </button>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1"
                    data-bs-parent="#termsAccordion">
                    <div class="accordion-body">{!! $data[1]['body'] !!}</div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        {{ $data[2]['title'] }}
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                    data-bs-parent="#termsAccordion">
                    <div class="accordion-body">{!! $data[2]['body'] !!}</div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        {{ $data[3]['title'] }}
                    </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
                    data-bs-parent="#termsAccordion">
                    <div class="accordion-body">{!! $data[3]['body'] !!}</div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                        {{ $data[4]['title'] }}
                    </button>
                </h2>
                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4"
                    data-bs-parent="#termsAccordion">
                    <div class="accordion-body">{!! $data[4]['body'] !!}</div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading5">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                        {{ $data[5]['title'] }}
                    </button>
                </h2>
                <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5"
                    data-bs-parent="#termsAccordion">
                    <div class="accordion-body">{!! $data[5]['body'] !!}</div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading6">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                        {{ $data[6]['title'] }}
                    </button>
                </h2>
                <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6"
                    data-bs-parent="#termsAccordion">
                    <div class="accordion-body">{!! $data[6]['body'] !!}</div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading7">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                        {{ $data[7]['title'] }}
                    </button>
                </h2>
                <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7"
                    data-bs-parent="#termsAccordion">
                    <div class="accordion-body">{!! $data[7]['body'] !!}</div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading8">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                        {{ $data[8]['title'] }}
                    </button>
                </h2>
                <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8"
                    data-bs-parent="#termsAccordion">
                    <div class="accordion-body">{!! $data[8]['body'] !!}</div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading9">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                        {{ $data[9]['title'] }}
                    </button>
                </h2>
                <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9"
                    data-bs-parent="#termsAccordion">
                    <div class="accordion-body">{!! $data[9]['body'] !!}</div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading10">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                        {{ $data[10]['title'] }}
                    </button>
                </h2>
                <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10"
                    data-bs-parent="#termsAccordion">
                    <div class="accordion-body">{!! $data[10]['body'] !!}</div>
                </div>
            </div>

        </div>
           @include('include.returnToMain')
    </div>


@endsection
