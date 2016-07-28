<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation Starter Template</title>
    <link rel="stylesheet" href="{{ asset('foundation-sites/css/foundation.css') }}" />
</head>
<body>
<div id="app">
    <div class="off-canvas-wrapper">
        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

            <div class="off-canvas position-left reveal-for-large" id="my-info" data-off-canvas data-position="left">
                <div class="row column">
                    <br>
                    @if (Auth::guest())
                        <a class="button success" href="{{ url('/login') }}">Login</a>
                        <br>
                        <a class="button" href="{{ url('/register') }}">Register</a>
                    @endif
                    @if(Auth::user())
                        @if(Auth::user()->role_id == 2)
                            @if(Request::url() !== 'http://localhost:8000/admin')
                                <a class="button success" href="{{ url('/admin') }}"><i class="fa fa-btn fa-sign-out"></i>Admin</a>
                            @endif
                            @if(Request::url() === 'http://localhost:8000/admin')
                                <a class="button success" href="{{ url('/') }}"><i class="fa fa-btn fa-sign-out"></i>Front</a>
                            @endif

                        @endif
                        <a class="button alert" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                        <img class="thumbnail" src="http://placehold.it/550x350">
                        <h5>{{ Auth::user()->name }}</h5>
                        <p><strong>Account: R{{ Auth::user()->account->amount }}</strong></p>
                        <form action="{{ url('/account/pay/'.Auth::user()->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="amount">
                            <button type="submit" class="button success">pay</button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="off-canvas-content" data-off-canvas-content>
                <div class="title-bar hide-for-large">
                    <div class="title-bar-left">
                        <button class="menu-icon" type="button" data-open="my-info"></button>
                        <span class="title-bar-title">Mike Mikerson</span>
                    </div>
                </div>
                <div class="callout primary">
                    <div class="row column">
                        <h1><a href="/">POD-POCALYPSE</a></h1>
                        @if(Auth::user())
                            <p class="lead">This is the {{ Auth::user()->community->name }} pod-pocalypse.</p>
                            <p>The kitty is currently sitting at R{{ Auth::user()->community->kitty }}</p>
                            <p>There are currently {{ count(Auth::user()->community->availablePods) }} flavours to choose from</p>
                        @endif
                        @if(Auth::guest())
                            <p class="lead">This is the {{ $community->name }} pod-pocalypse.</p>
                            <p>There are currently {{ count($community->availablePods) }} flavours to choose from</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    @yield('content')
                    {{--<div class="row small-up-2 medium-up-3 large-up-4">--}}
                        {{--<div class="column">--}}
                            {{--<img class="thumbnail" src="http://placehold.it/550x550">--}}
                            {{--<h5>My Site</h5>--}}
                        {{--</div>--}}
                        {{--<div class="column">--}}
                            {{--<img class="thumbnail" src="http://placehold.it/550x550">--}}
                            {{--<h5>My Site</h5>--}}
                        {{--</div>--}}
                        {{--<div class="column">--}}
                            {{--<img class="thumbnail" src="http://placehold.it/550x550">--}}
                            {{--<h5>My Site</h5>--}}
                        {{--</div>--}}
                        {{--<div class="column">--}}
                            {{--<img class="thumbnail" src="http://placehold.it/550x550">--}}
                            {{--<h5>My Site</h5>--}}
                        {{--</div>--}}
                        {{--<div class="column">--}}
                            {{--<img class="thumbnail" src="http://placehold.it/550x550">--}}
                            {{--<h5>My Site</h5>--}}
                        {{--</div>--}}
                        {{--<div class="column">--}}
                            {{--<img class="thumbnail" src="http://placehold.it/550x550">--}}
                            {{--<h5>My Site</h5>--}}
                        {{--</div>--}}
                        {{--<div class="column">--}}
                            {{--<img class="thumbnail" src="http://placehold.it/550x550">--}}
                            {{--<h5>My Site</h5>--}}
                        {{--</div>--}}
                        {{--<div class="column">--}}
                            {{--<img class="thumbnail" src="http://placehold.it/550x550">--}}
                            {{--<h5>My Site</h5>--}}
                        {{--</div>--}}
                        {{--<div class="column">--}}
                            {{--<img class="thumbnail" src="http://placehold.it/550x550">--}}
                            {{--<h5>My Site</h5>--}}
                        {{--</div>--}}
                        {{--<div class="column">--}}
                            {{--<img class="thumbnail" src="http://placehold.it/550x550">--}}
                            {{--<h5>My Site</h5>--}}
                        {{--</div>--}}
                        {{--<div class="column">--}}
                            {{--<img class="thumbnail" src="http://placehold.it/550x550">--}}
                            {{--<h5>My Site</h5>--}}
                        {{--</div>--}}
                        {{--<div class="column">--}}
                            {{--<img class="thumbnail" src="http://placehold.it/550x550">--}}
                            {{--<h5>My Site</h5>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <hr>

                {{--<div class="row">--}}
                    {{--<div class="medium-6 columns">--}}
                        {{--<h3>Contact Me</h3>--}}
                        {{--<p>Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor.</p>--}}
                        {{--<ul class="menu">--}}
                            {{--<li><a href="#">Dribbble</a></li>--}}
                            {{--<li><a href="#">Facebook</a></li>--}}
                            {{--<li><a href="#">Yo</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="medium-6 columns">--}}
                        {{--<label>Name--}}
                            {{--<input type="text" placeholder="Name">--}}
                        {{--</label>--}}
                        {{--<label>Email--}}
                            {{--<input type="text" placeholder="Email">--}}
                        {{--</label>--}}
                        {{--<label>--}}
                            {{--Message--}}
                            {{--<textarea placeholder="holla at a designerd"></textarea>--}}
                        {{--</label>--}}
                        {{--<input type="submit" class="button expanded" value="Submit">--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('foundation-sites/js/vendor/jquery.js') }}"></script>
<script src="{{ asset('foundation-sites/js/vendor/what-input.js') }}"></script>
<script src="{{ asset('foundation-sites/js/vendor/foundation.min.js') }}"></script>
{{--<script src="js/vendor/jquery.min.js"></script>--}}
{{--<script src="js/vendor/what-input.min.js"></script>--}}
{{--<script src="js/foundation.min.js"></script>--}}
<script>
    $(document).foundation();
</script>

</body>
</html>