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
                                <h2 class="text-white text-left font-medium mb-0">
                                    Posts {{$postCount ? "($postCount)" : ""}}
                                </h2>
                                <a href="/posts/create"
                                   class="text-white hover:text-white border-0 bg-blue-400 rounded-md px-3 py-2">
                                    New Post
                                </a>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 0">
                            @foreach($posts as $post)
                                <section class="col-6 col-12-narrower py-2">
                                    <a href="/posts/{{$post['id']}}">
                                        <div class="box post">
                                            <div class="image left">
                                                <img src="/storage/images/{{$post['image']}}" alt=""
                                                     class="object-cover"
                                                     style="height: 256px; width: 256px;"/>
                                            </div>
                                            <div class="inner text-white">
                                                <h3>Title: {{$post['title']}}</h3>
                                                <span>Topic: {{$post->topic['title']}}</span>
                                                <p>Description: {{$post['description']}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </section>
                            @endforeach
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

        <x-footer/>
    </div>
@endsection
