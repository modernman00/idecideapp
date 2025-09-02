@extends ('email')
@section('title', 'contact')

@section('subject', 'SUBJECT: CONTACT')

@section('content')

 Please, be informed that you have received a contact message from {{ $data['name'] }} at this time {{ date('jS \of F Y h:i:sa', strtotime(date('Y-m-d h:i:sa'))) }}.
 
 <br><br> Name: {{ $data['name'] }}
 <br><br> Email: {{ $data['email'] }}
 <br><br> Message: {{ $data['message'] }}

@endsection
