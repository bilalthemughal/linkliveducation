@extends('app')

@section('content')

<div class="row" style="margin-top: 5rem;">
    <div class="container section-heading">
        <h2 class="heading">Sub Categories</h2>
        @foreach($subCategories as $subCategory)

            <p class="d-inline"><a href="{{route('tests', $subCategory->id)}}" class="btn btn-outline-secondary btn-xl border rounded mt-2">{{$subCategory->name}}</a></p>

        @endforeach
    </div>
</div>




    @endsection