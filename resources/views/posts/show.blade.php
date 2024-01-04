@extends('layouts.app')

@section('content')
    <div id="page-wrapper">
        <!-- Nav -->
        <x-navbar/>

        <section id="banner" class="pb-8" style="height: unset">
            <div class="container">
                <div class="row" style="margin-top: 0">
                    <section class="col-12">
                        <div class="row">
                            <div class="flex items-center space-x-2">
                                <a href="javascript:history.go(-1)" class="border-0 text-3xl"><</a>
                                <h2 class="text-white text-left font-medium mb-0">Post Detail</h2>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 0">
                            <section class="col-6 col-12-narrower py-2">
                                <div class="box post">
                                    <div class="image left">
                                        <img src="/storage/images/{{$post['image']}}" alt=""
                                             class="object-cover"
                                             style="height: 384px; width: 384px;"/>
                                    </div>
                                    <div class="inner text-white">
                                        <h3>Title: {{$post['title']}}</h3>
                                        <a class="border-0 text-white" href="/topics/{{$post->topic['id']}}">
                                            <span>Topic: {{$post->topic['title']}}</span>
                                        </a>
                                        <p>Description: {{$post['description']}}</p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </section>
                </div>
            </div>
        </section>

        <!-- Highlights -->
        <section class="wrapper style1">
            <div class="container">
                <div class="row gtr-200">
                    <section class="col-4 col-12-narrower">
                        <div class="box highlight">
                            <i class="icon solid major fa-paper-plane"></i>
                            <h3>This Is Important</h3>
                            <p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a
                                rutrum accumsan sed. Suspendisse eu.</p>
                        </div>
                    </section>
                    <section class="col-4 col-12-narrower">
                        <div class="box highlight">
                            <i class="icon solid major fa-pencil-alt"></i>
                            <h3>Also Important</h3>
                            <p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a
                                rutrum accumsan sed. Suspendisse eu.</p>
                        </div>
                    </section>
                    <section class="col-4 col-12-narrower">
                        <div class="box highlight">
                            <i class="icon solid major fa-wrench"></i>
                            <h3>Probably Important</h3>
                            <p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a
                                rutrum accumsan sed. Suspendisse eu.</p>
                        </div>
                    </section>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section id="cta" class="wrapper style3">
            <div class="container">
                <header>
                    <h2>Are you ready to continue your quest?</h2>
                    <a href="#" class="button">Insert Coin</a>
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
