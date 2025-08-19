@extends ('email')
@section('title', 'suspicious activity email')

@section('subject', 'SUBJECT: SUSPICIOUS ACTIVITY Alert: Multiple Failed Login Attempts')


@section('content')
<p>
@if ($data)
         <h2>Suspicious Activity Detected</h2>
            <p>Email: {{$data['email']}}</p>
            <p>IP Address: {{$data['ip']}}</p>
            <p>Failed Attempts: {{$data['attempts']}}</p>
            <p>Time: {{date('Y-m-d H:i:s')}} </p><br>
@else 
    There is a problem with the authentication.
@endif


    <br>

@endsection
