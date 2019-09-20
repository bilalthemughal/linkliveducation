@extends("app")
@section("content")
<section class="ftco-section ftc-no-pb">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading subheading-with-line"><small class="pr-2 bg-white"></small></span>
                <h2 class="mb-4" style="text-align: center;">Course Details</h2>
            </div>
        </div>
        <div class="row">
            <div class="col col-sm-4">
                <div class="user-heading round">
                    <a href="javascript:void(0);">
                        @if(isset($coursesubcat->image))
                        <img src="{{URL::asset('upload/course/images/'.$coursesubcat->image)}}" width="300" alt="featured" />
                        @endif
                        <h1>{{$subcat->name}}</h1>
                    </a>
                </div>
                <ul class="nav-stacked" role="tablist">
                    <li role="presentation">
                        @if(Auth::check())
                            <?php
                            if(!empty($coursesubcat)){
                                $chk_order = DB::table('orders')
                                                ->where('user_id',Auth::user()->id)
                                                ->where('subcat',$coursesubcat->subcat)
                                                ->where('status','Completed')
                                                ->get();
                            }
                            ?>
                            @if(!empty($chk_order) && count($chk_order)>0)
                            <a href="{{URL::to('course-videos/'.$coursesubcat->subcat.'/'.$subcat->name)}}" class="btn btn-info">View Course</a>
                            @else
                            {!! Form::open(array('url'=>'buy-course','enctype'=>'multipart/form-data')) !!}
                            <input type="hidden" name="subcat" value="{{isset($coursesubcat->subcat) ? $coursesubcat->subcat : null}}">
                            <input type="hidden" name="name" value="{{$subcat->name}}">
                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-check"></span>Buy / Enroll</button>
                            {!! Form::close() !!}
                            @endif
                        @else
                        {!! Form::open(array('url'=>'buy-course','enctype'=>'multipart/form-data')) !!}
                        <input type="hidden" name="subcat" value="{{$coursesubcat->subcat}}">
                        <input type="hidden" name="name" value="{{$subcat->name}}">
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-check"></span>Buy / Enroll</button>
                        {!! Form::close() !!}
                        @endif
                    </li>
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Course Benefits</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Description</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Table of Content</a></li>
                </ul>
            </div>
            <div class="col col-sm-8">
                <div class="row tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        {{isset($coursesubcat->benifit) ? $coursesubcat->benifit : null}}
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        {{isset($coursesubcat->description) ? $coursesubcat->description : null}}
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">
                        {{isset($coursesubcat->content) ? $coursesubcat->content : null}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection