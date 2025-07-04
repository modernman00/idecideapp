@extends('base')
@section('title', 'Terms & Privacy')

@section('content')
    <style>
        .accordion-button {
            font-size: 1rem;
            padding: 1rem;
        }

        .accordion-body {
            font-size: 0.95rem;
            line-height: 1.6;
        }
    </style>
    <div class="container py-5">
        <h1 class="mb-4 text-center">Privacy Policy</h1>

        <div class="accordion" id="policyAccordion">

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingService">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseService" aria-expanded="false" aria-controls="collapseService">
                        1. 🧠 About This Service
                    </button>
                </h2>
                <div id="collapseService" class="accordion-collapse collapse" aria-labelledby="headingService"
                    data-bs-parent="#policyAccordion">
                    <div class="accordion-body">
                        The Decision Matrix is designed to support thoughtful decision-making. It is not financial, legal,
                        or psychological advice. Use it as guidance — final decisions are always your responsibility.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingCommitments">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseCommitments" aria-expanded="false" aria-controls="collapseCommitments">
                        2. 🤝 User Commitments
                    </button>
                </h2>
                <div id="collapseCommitments" class="accordion-collapse collapse" aria-labelledby="headingCommitments"
                    data-bs-parent="#policyAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Use the service responsibly and lawfully</li>
                            <li>Do not duplicate, resell, or manipulate any part of the tool</li>
                            <li>Respect intellectual property and platform integrity</li>
                            <li>Users must be at least 16 years old or have guardian consent</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingPrivacy">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsePrivacy" aria-expanded="false" aria-controls="collapsePrivacy">
                        3. 🔐 Privacy & Data Protection
                    </button>
                </h2>
                <div id="collapsePrivacy" class="accordion-collapse collapse" aria-labelledby="headingPrivacy"
                    data-bs-parent="#policyAccordion">
                    <div class="accordion-body">
                        We collect quiz responses, decision data, and technical information such as browser type and IP
                        address to improve functionality and performance.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDataUse">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseDataUse" aria-expanded="false" aria-controls="collapseDataUse">
                        4. 📊 How We Use Your Data
                    </button>
                </h2>
                <div id="collapseDataUse" class="accordion-collapse collapse" aria-labelledby="headingDataUse"
                    data-bs-parent="#policyAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Generate personalized results</li>
                            <li>Enhance user experience and site analytics</li>
                            <li>Fulfill legal and compliance requirements</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDataSharing">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseDataSharing" aria-expanded="false" aria-controls="collapseDataSharing">
                        5. 🚫 Data Sharing
                    </button>
                </h2>
                <div id="collapseDataSharing" class="accordion-collapse collapse" aria-labelledby="headingDataSharing"
                    data-bs-parent="#policyAccordion">
                    <div class="accordion-body">
                        We do not sell personal data. Information may be shared with trusted providers or legal entities
                        with appropriate privacy safeguards.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingRights">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseRights" aria-expanded="false" aria-controls="collapseRights">
                        6. 🧑‍⚖️ Your Rights
                    </button>
                </h2>
                <div id="collapseRights" class="accordion-collapse collapse" aria-labelledby="headingRights"
                    data-bs-parent="#policyAccordion">
                    <div class="accordion-body">
                        You may request access, correction, or deletion of your personal data by contacting
                        <strong>{{ $_ENV['SUPPORT_EMAIL'] }}</strong>.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingCookies">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseCookies" aria-expanded="false" aria-controls="collapseCookies">
                        7. 🍪 Cookies & Tracking
                    </button>
                </h2>
                <div id="collapseCookies" class="accordion-collapse collapse" aria-labelledby="headingCookies"
                    data-bs-parent="#policyAccordion">
                    <div class="accordion-body">
                        Cookies are used only to improve site functionality and user experience. You may manage cookie
                        preferences via your browser settings.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDisclaimer">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseDisclaimer" aria-expanded="false" aria-controls="collapseDisclaimer">
                        8. ⚠️ Disclaimer
                    </button>
                </h2>
                <div id="collapseDisclaimer" class="accordion-collapse collapse" aria-labelledby="headingDisclaimer"
                    data-bs-parent="#policyAccordion">
                    <div class="accordion-body">
                        The Decision Matrix is an educational tool. Our platform is not liable for personal, financial, or
                        emotional outcomes resulting from use of the Service.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingUpdates">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseUpdates" aria-expanded="false" aria-controls="collapseUpdates">
                        9. 🔁 Policy Updates
                    </button>
                </h2>
                <div id="collapseUpdates" class="accordion-collapse collapse" aria-labelledby="headingUpdates"
                    data-bs-parent="#policyAccordion">
                    <div class="accordion-body">
                        Policies may evolve. Continued use constitutes acceptance of any changes. Always refer to this page
                        for the latest terms.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingContact">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseContact" aria-expanded="false" aria-controls="collapseContact">
                        10. 📬 Contact Information
                    </button>
                </h2>
                <div id="collapseContact" class="accordion-collapse collapse" aria-labelledby="headingContact"
                    data-bs-parent="#policyAccordion">
                    <div class="accordion-body">
                        Questions or privacy concerns? Reach us at <strong>{{ $_ENV['SUPPORT_EMAIL'] }}</strong><br>
                        Or visit: <a href="{{ $_ENV['APP_URL'] }}/privacy"
                            target="_blank">{{ $_ENV['APP_URL'] }}/privacy</a>
                    </div>
                </div>
            </div>

        </div>

          @include('include.returnToMain')
    </div>
@endsection
