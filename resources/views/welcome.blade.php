@extends('user.layouts.master')

@section('content')
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Portfolio</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <!-- Portfolio Item-->
                @foreach($projects as $project)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1{{ $project->id }}">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ !empty($project->image) ? asset('uploads/project_image/'.$project->image) : asset('frontend/assets/img/portfolio/cabin.png') }}" alt="..." />
                        </div>
                    </div>
                    <!-- Portfolio Modal-->
                    <div class="portfolio-modal modal fade" id="portfolioModal1{{$project->id}}" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <div class="modal-body text-center pb-5">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <!-- Portfolio Modal - Title-->
                                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{ $project->title }}</h2>
                                                <!-- Icon Divider-->
                                                <div class="divider-custom">
                                                    <div class="divider-custom-line"></div>
                                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                                    <div class="divider-custom-line"></div>
                                                </div>
                                                <!-- Portfolio Modal - Image-->
                                                <img class="img-fluid rounded mb-5" src="{{ !empty($project->image) ? asset('uploads/project_image/'.$project->image) :asset('frontend/assets/img/portfolio/cabin.png') }}" alt="..." />
                                                <!-- Portfolio Modal - Text-->
                                                <p class="mb-4">{{ $project->description }}</p>
                                                <button class="btn btn-primary" href="#!" data-bs-dismiss="modal">
                                                    <i class="fas fa-times fa-fw"></i>
                                                    Close Window
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div class="col-lg-12 "><p class="lead">{{!empty($profile->about) ? $profile->about : 'About not found'}}</p></div>
                {{--            <div class="col-lg-4 me-auto"><p class="lead">You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!</p></div>--}}
            </div>
        </div>
    </section>
    <!-- Contact Section-->
    <section class="page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Contact Section Form-->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    @if(session('message'))
                        <div class="alert {{ Session('alert-class','alert-success','alert-block') }}">
                            {{--                        <button type="button" class="close" data-dissmiss="alert">x</button>--}}
                            <strong>{{ session('message') }}</strong>
                        </div>
                    @endif
                    <form action="{{ url('/contacts') }}"  method="post" id="contact" role="form">
                    @csrf
                    <!-- Name input-->
                        <div class="form-group mb-3">
                            <label for="full_name">Full name<span class="text-danger">*</span> </label>
                            <input class="form-control form-control-sm" id="full_name" name="full_name" type="text" placeholder="Enter your name..." required />
                            @if($errors->has('full_name'))
                                <span class="form-text">
                                <strong class="text-danger form-control-sm">{{ $errors->first('full_name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- Email address input-->
                        <div class="form-group mb-3">
                            <label for="email">Email address<span class="text-danger">*</span></label>
                            <input class="form-control form-control-sm" id="email" name="email" type="email" placeholder="name@example.com" required />
                            @if($errors->has('email'))
                                <span class="form-text">
                                <strong class="text-danger form-control-sm">{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- Phone number input-->
                        <div class="form-group mb-3">
                            <label for="mobile">Phone number<span class="text-danger">*</span></label>
                            <input class="form-control form-control-sm" id="mobile" name="mobile" type="number" placeholder="(123) 456-7890" required />
                            @if($errors->has('mobile'))
                                <span class="form-text">
                                <strong class="text-danger form-control-sm">{{ $errors->first('mobile') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- Message input-->
                        <div class="form-group mb-3">
                            <label for="message">Message<span class="text-danger">*</span></label>
                            <textarea class="form-control form-control-sm" id="message" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem" required></textarea>
                            @if($errors->has('message'))
                                <span class="form-text">
                                <strong class="text-danger form-control-sm">{{ $errors->first('message') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary btn-xl " id="submitButton" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
