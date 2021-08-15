<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5 image-round"  src="{{ !empty($profile->profile_image) ? asset('uploads/profile_image/'.$profile->profile_image) : asset('frontend/assets/img/avataaars.svg') }}" alt="..." />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ !empty($user->name) ? $user->name : 'Name not found' }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">@foreach($skills as $skill){{ $skill->title }}{{$loop->last ? '' : ' - '}} @endforeach</p>
    </div>
</header>
