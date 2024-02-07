@extends('layouts.app')
<title>{{$data->page_title}}</title>

@section('content')
    <div id="page-wrapper">

        <!-- Header -->
        <div id="header">

            <!-- Logo -->
            <h1><a href="index.html" id="logo">Arcana <em>by HTML5 UP</em></a></h1>

            <!-- Nav -->
            <nav id="nav">
                <ul>
                    @foreach ($data->navbar as $navbar)
                        <li><a href="index.html">{{$navbar}}</a></li>
                    @endforeach
                </ul>
            </nav>

        </div>

        <!-- Banner -->
        <section id="banner">
            <header>
                <h2>{!!$data->slider_caption!!}</h2>
                <a href="#" class="button">Learn More</a>
            </header>
        </section>

        <!-- Highlights -->
        <section class="wrapper style1">
            <div class="container">
                <div class="row gtr-200">
{{--                    @foreach($data->poi as $poi)--}}
{{--                        <section class="col-4 col-12-narrower">--}}
{{--                            <div class="box highlight">--}}
{{--                                <i class="icon solid major fa-paper-plane"></i>--}}
{{--                                <h3>{{$poi->value}} SADAS</h3>--}}
{{--                                <p>{{$poi->items[0]}}</p>--}}
{{--                            </div>--}}
{{--                        </section>--}}
{{--                    @endforeach--}}
                    @foreach($verandaData->content['key.pagetemplate.homepage.thisisimportant'] as $thisisimportant)
                        <section class="col-4 col-12-narrower">
                            <div class="box highlight">
                                <img src="{{$thisisimportant->dataDetail->image}}" alt="" style="height: 120px; width: 120px; margin: auto"/>
                                <h3>{{$thisisimportant->dataDetail->text1}}</h3>
                                <p>{{$thisisimportant->dataDetail->text2}}</p>
                            </div>
                        </section>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Gigantic Heading -->
        <section class="wrapper style2">
            <div class="container">
                <header class="major">
{{--                    <h2>{{$data->heading}}</h2>--}}
{{--                    <p>{{$data->heading_subtitle}}</p>--}}
                    <h2>{{$verandaData->content['key.pagetemplate.homepage.heading1'][0]->dataDetail->text}}</h2>
                    <p>{{$verandaData->content['key.pagetemplate.homepage.heading2'][0]->dataDetail->text}}</p>
                </header>
            </div>
        </section>

        <!-- Posts -->
        <section class="wrapper style1">
            <div class="container">
                <div class="row">
{{--                    @foreach($data->thing as $thing)--}}
{{--                        <section class="col-6 col-12-narrower">--}}
{{--                            <div class="box post">--}}
{{--                                <a href="#" class="image left"><img src="images/pic01.jpg" alt=""/></a>--}}
{{--                                <div class="inner">--}}
{{--                                    <h3>{{$thing->value}}</h3>--}}
{{--                                    <p>{{$thing->items[0]}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </section>--}}
{{--                    @endforeach--}}
                    @foreach($verandaData->content['key.pagetemplate.homepage.thethings'] as $thing)
                        <section class="col-6 col-12-narrower">
                            <div class="box post">
                                <a href="#" class="image left">
                                    <img src="{{$thing->dataDetail->image}}" alt=""/>
                                </a>
                                <div class="inner">
                                    <h3>{{$thing->dataDetail->text1}}</h3>
                                    <p>{{$thing->dataDetail->text2}}</p>
                                </div>
                            </div>
                        </section>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section id="cta" class="wrapper style3">
            <div class="container">
                <header>
                    <h2>{{$verandaData->content['key.pagetemplate.homepage.footertext'][0]->dataDetail->text}}</h2>
                    <a href="#" class="button">
                        {{$verandaData->content['key.pagetemplate.homepage.footerheadingbuttontext'][0]->dataDetail->text}}
                    </a>
                </header>
            </div>
        </section>

        <!-- Footer -->
        <div id="footer">
            <div class="container">
                <div class="row">
                    <section class="col-3 col-6-narrower col-12-mobilep">
                        <h3>Links to Stuff</h3>
                        <ul class="links">
                            <li><a href="#">Mattis et quis rutrum</a></li>
                            <li><a href="#">Suspendisse amet varius</a></li>
                            <li><a href="#">Sed et dapibus quis</a></li>
                            <li><a href="#">Rutrum accumsan dolor</a></li>
                            <li><a href="#">Mattis rutrum accumsan</a></li>
                            <li><a href="#">Suspendisse varius nibh</a></li>
                            <li><a href="#">Sed et dapibus mattis</a></li>
                        </ul>
                    </section>
                    <section class="col-3 col-6-narrower col-12-mobilep">
                        <h3>More Links to Stuff</h3>
                        <ul class="links">
                            <li><a href="#">Duis neque nisi dapibus</a></li>
                            <li><a href="#">Sed et dapibus quis</a></li>
                            <li><a href="#">Rutrum accumsan sed</a></li>
                            <li><a href="#">Mattis et sed accumsan</a></li>
                            <li><a href="#">Duis neque nisi sed</a></li>
                            <li><a href="#">Sed et dapibus quis</a></li>
                            <li><a href="#">Rutrum amet varius</a></li>
                        </ul>
                    </section>
                    <section class="col-6 col-12-narrower">
                        <h3>Get In Touch</h3>
                        <form>
                            <div class="row gtr-50">
                                <div class="col-6 col-12-mobilep">
                                    <input type="text" name="name" id="name" placeholder="Name"/>
                                </div>
                                <div class="col-6 col-12-mobilep">
                                    <input type="email" name="email" id="email" placeholder="Email"/>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" id="message" placeholder="Message" rows="5"></textarea>
                                </div>
                                <div class="col-12">
                                    <ul class="actions">
                                        <li><input type="submit" class="button alt" value="Send Message"/></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <!-- Icons -->
            <ul class="icons">
                <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
                <li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
                <li><a href="#" class="icon brands fa-google-plus-g"><span class="label">Google+</span></a></li>
            </ul>

            <!-- Copyright -->
            <div class="copyright">
                <ul class="menu">
                    <li>&copy; Untitled. All rights reserved</li>
                    <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                </ul>
            </div>

        </div>

    </div>
@endsection
