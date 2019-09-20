@extends('app1')



@section('content')

    @include("includes.user_profile_nav")
    <div class="row text-center cover-container-inner-sec">
        <h1 class="text-center">
            {{Auth::user()->first_name}}'s Results
        </h1>
    </div>

    <div class="container" style="margin-bottom: 5rem; margin-top: 5rem;">
        @if(count($tests)>0)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Description</th>
                    <th scope="col">Total Questions</th>
                    <th scope="col">Correct</th>
                    <th scope="col">Percentage</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tests as $test)
                    @if(Auth::user()->checkQuizTaken($test->id)==1)
                    <tr>
                        <td>{{$test->description}}</td>
                        <td>{{count($test->questions)}}</td>

                        <td>{{Auth::user()->checkMarks($test->id)}}</td>
                        <td>{{((Auth::user()->checkMarks($test->id)/count($test->questions))*100)}}%</td>
                        <td>
                            @if(((Auth::user()->checkMarks($test->id)/count($test->questions))*100)<70)
                                <a href="{{route('giveTest', $test->id)}}" class="btn btn-primary btn-sm">Retake Test</a>
                                @endif
                        </td>
{{--                        @if(Auth::user()->checkQuizTaken($test->id)==0)--}}
{{--                            <td><a href="" class="btn btn-primary btn-sm">Take Test</a></td>--}}
{{--                        @else--}}
{{--                            <td><a href="" class="btn btn-primary btn-sm">Retake Test</a></td>--}}
{{--                        @endif--}}
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        @else
            <h3>No Tests Found</h3>
        @endif
    </div>


@endsection