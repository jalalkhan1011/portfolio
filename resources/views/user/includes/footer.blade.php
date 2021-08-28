<footer class="footer text-center">
    <div class="container">
        <div class="row">
            <!-- Footer Location-->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">Location</h4>
                <p class="lead mb-0">
                    {!! nl2br(!empty($profile->address) ? $profile->address : 'Address not found') !!}<!--nl2br use for line brake inside in print tag-->
                </p>
            </div>
            <!-- Footer Social Icons-->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">Around the Web</h4>
                <a class="btn btn-outline-light btn-social mx-1" href="{{ !empty($profile->facebook) ? $profile->facebook : '' }}"><i class="fab fa-fw fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-social mx-1" href="{{ !empty($profile->twitter) ? $profile->twitter : '' }}"><i class="fab fa-fw fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-social mx-1" href="{{ !empty($profile->linkedin) ? $profile->linkedin : '' }}"><i class="fab fa-fw fa-linkedin-in"></i></a>
                <a class="btn btn-outline-light btn-social mx-1" href="{{ !empty($profile->github) ? $profile->github : '' }}"><i class="fab fa-fw fa-github"></i></a>
            </div>
            <!-- Footer About Text-->
            <div class="col-lg-4">
                <h4 class="text-uppercase mb-4">About Me</h4>
                <p class="lead mb-0">
                    Contact me with the following number
                    <a href="tel:{{  !empty($profile->mobile) ? $profile->mobile : '' }}">{{ !empty($profile->mobile) ? $profile->mobile : '' }}</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Copyright Section-->
<div class="copyright py-4 text-center text-white">
    <div class="container"><small>Copyright &copy; Your Website 2021</small></div>
</div>
