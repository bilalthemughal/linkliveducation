@extends("app")
@section("content")
<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <h1 style="text-align: center;">Get In Touch</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 margin30" >
                <p><b>Phone:</b> <a style="color: #1a1a1a;" href="tel://+91 8929887709">+91 8929887709</a></p>
            </div>  
            <div class="col-md-3 margin5" >
                <p><b>Email:</b> <a style="color: #1a1a1a;" href="mailto:info@scholera.com">info@scholera.com</a></p>
            </div>
        </div>
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-8 offset-md-2 p-5 order-md-last">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <ul style="list-style: none;padding-left: 0px;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(Session::has('flash_message'))
                <div class="alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    {{ Session::get('flash_message') }}
                </div>  
                @endif
                {!! Form::open(array('url' => 'contact','role'=>'form','enctype' => 'multipart/form-data')) !!}
                    <div class="form-group">
                        <input type="text" class="form-control" name="uname" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="uemail" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="usubject" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea id="" cols="30" rows="7" name="umessage" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <!-- <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5"> -->
                        <input type="submit" value="Send Message" class="btn btn-primary btn-block">
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection