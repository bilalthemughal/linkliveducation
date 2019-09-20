<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

<a href="{{route('userProfile')}}" class="btn btn-primary">Go back</a>

<div id="app">

    <example-component quizid1="{{$id}}"></example-component>

</div>


<script src="{{ asset('js/app.js') }}"></script>

