@extends("app")
@section("content")
<section class="ftco-section ftc-no-pb">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading subheading-with-line"><small class="pr-2 bg-white"></small></span>
                <h2 class="mb-4" style="text-align: center;">Course Sub-Categories</h2>
            </div>
        </div>
        <div class="row">
            @if(!empty($coursesubcat))
            @foreach($coursesubcat as $coursesub)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="staff">
                    <div class="embed-responsive embed-responsive-16by9">
                        <figure>
<!--                            <a href="{{ URL::to('video-courses-subcategory/'.$coursesub->id.'/'.$coursesub->name) }}" >{{$coursesub->name}}</a>-->
                            <a href="{{ URL::to('view-course/'.$coursesub->id.'/'.$coursesub->name) }}" >{{$coursesub->name}}</a>
                        </figure>
                    </div>
                    <div class="text px-4 pt-4">
                        <span class="position mb-2">
                        </span>
                        <a href="{{ URL::to('view-course/'.$coursesub->id.'/'.$coursesub->name) }}" >View Course</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection