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
                                    Topics {{$topicCount ? "($topicCount)" : ''}}</h2>
                                <a href="/topics/create"
                                   class="text-white hover:text-white border-0 bg-blue-400 rounded-md py-2 px-3">
                                    New Topic
                                </a>
                            </div>
                        </div>

                        <ul class="row" style="margin-top: 0">
                            @foreach($topics as $topic)
                                <li class="col-4 flex flex-col text-white">
                                    <span class="text-xl font-bold">{{$topic['title']}}</span>
                                    <span class="text-base">{{$topic['info']}}</span>
                                </li>
                            @endforeach
                        </ul>
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
