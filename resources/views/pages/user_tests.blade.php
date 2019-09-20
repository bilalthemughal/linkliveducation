@extends('app1')



@section('content')

    @include("includes.user_profile_nav")
    <div class="row text-center cover-container-inner-sec">
        <h1 class="text-center">
            {{Auth::user()->first_name}}'s Tests
        </h1>
    </div>

        <div class="container" style="margin-bottom: 5rem; margin-top: 5rem;">
            @if(count($tests)>0)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tests as $test)
            <tr>
                <td>{{$test->description}}</td>
                <td><img height="50" width="100" alt="" src="{{asset('/site_assets/images/'.$test->image)}}"></td>
                <td>{{$test->price}}</td>
                @if(Auth::user()->checkQuizTaken($test->id)==0)
                <td><a href="{{route('giveTest', $test->id)}}" class="btn btn-primary btn-sm">Take Test</a></td>
                    @else
                        @if(((Auth::user()->checkMarks($test->id)/count($test->questions))*100)<70)
                    <td><a href="" class="btn btn-primary btn-sm">Retake Test</a></td>
                        @endif
                    @endif
            </tr>
            @endforeach
            </tbody>
        </table>
                @else
                <h3>No Tests Found</h3>
                @endif
        </div>


@endsection