@extends('layouts.app')
@section('content')

<!-- app -->
<div id="app">
    <!-- 404-Page -->
    <div class="page-404 mt-5">
        <div class="vertical-center">
            <div class="text-center">
                <h1>404!</h1>
                <h5>We can't seem to find the page you're looking for.</h5>
                <div class="redirect-link-wrapper u-s-p-t-25">
{{--                    <a class="redirect-link" href="{{route('posts')}}">--}}
                        <span>Home</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404-Page /- -->
</div>
<!-- app /- -->
<!--[if lte IE 9]>
<div class="app-issue">
    <div class="vertical-center">
        <div class="text-center">
            <h1>You are using an outdated browser.</h1>
            <span>This web app is not compatible with following browser. Please upgrade your browser to improve your security and experience.</span>
        </div>
    </div>
</div>
<style> #app {
    display: none;
} </style>
<![endif]-->
<!-- NoScript -->
<noscript>
    <div class="app-issue">
        <div class="vertical-center">
            <div class="text-center">
                <h1>JavaScript is disabled in your browser.</h1>
                <span>Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser to register for Groover.</span>
            </div>
        </div>
    </div>
    <style>
    #app {
        display: none;
    }
    </style>
</noscript>
<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
window.ga = function() {
    ga.q.push(arguments)
};
ga.q = [];
ga.l = +new Date;
ga('create', 'UA-XXXXX-Y', 'auto');
ga('send', 'pageview')
</script>
@endsection
