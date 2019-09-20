@extends("app")
@section("content")
<section class="ftco-section ftc-no-pb">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading subheading-with-line"><small class="pr-2 bg-white"></small></span>
                <h2 class="mb-4" style="text-align: center;">VLog</h2>
            </div>
        </div>
        <div class="row">
            @if(!empty($vlogs))
            @foreach($vlogs as $vlog)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="staff">
                    <div class="embed-responsive embed-responsive-16by9">
                        <p>{{$vlog->title}}</p>
                        <figure>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#youtubemodal{{$vlog->id}}" >
                                <img class="img-responsive" src="https://img.youtube.com/vi/{{$vlog->name}}/0.jpg" />
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
            <div id="youtubemodal{{$vlog->id}}" class="modal fade youtubemodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="text-align: left;">{{$vlog->title}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="560" height="315" src="{{'https://www.youtube.com/embed/'.$vlog->name}}" class="embed-responsive-item" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script>
$(".youtubemodal").on('hidden.bs.modal', function (e) {
    $(".youtubemodal iframe").attr("src", $(".youtubemodal iframe").attr("src"));
});
</script>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection