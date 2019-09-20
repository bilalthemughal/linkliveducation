<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand " href="{{URL::asset('/')}}">{!!getcong('site_name')!!}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse " id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php
                if ($_SERVER['REQUEST_URI'] == '/') {
                    echo 'active';
                }
                ?>"><a href="{{URL::asset('/')}}" class="nav-link">Home</a></li>
                <li class="nav-item ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Video Courses<span class="caret"></span></a>
                    <ul class="dropdown-menu">
            <?php $coursevideos = App\StudyMaterialCat::get(); ?>
                        @if(!empty($coursevideos))
                        @foreach($coursevideos as $coursevideo)
                        <li>
                            <a href="{{ URL::to('video-courses/'.$coursevideo->id.'/'.$coursevideo->name) }}"><?php echo $coursevideo->name; ?></a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Certifications
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php $categories = App\TestCat::get(); ?>
                        @if(!empty($categories))
                            @foreach($categories as $category)
                                    <a class="dropdown-item" href="{{URL::to('subCategories/'.$category->id)}}"><?php echo $category->name; ?></a>
                            @endforeach
                        @endif
                    </div>
                </li>
                <li class="nav-item <?php
                if ($_SERVER['REQUEST_URI'] == '/faq') {
                    echo 'active';
                }
                ?>"><a href="{{URL::asset('faq')}}" class="nav-link">FAQ</a></li>
                <li class="nav-item <?php
                if ($_SERVER['REQUEST_URI'] == '/vlog') {
                    echo 'active';
                }
                ?>"><a href="{{URL::asset('vlog')}}" class="nav-link">VBlog</a></li>
                <li class="nav-item <?php
                if ($_SERVER['REQUEST_URI'] == '/contact') {
                    echo 'active';
                }
                ?>"><a href="{{URL::asset('contact')}}" class="nav-link">Contact Us</a></li>
                <li class="nav-item">
                    @if(!Auth::check())
                    <a href="{{URL::asset('signin')}}" class="nav-link">Sign In</a>
                    @else
                    <a href="{{URL::asset('profile')}}" class="nav-link">Profile</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>