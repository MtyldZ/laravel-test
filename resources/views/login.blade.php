@extends('layouts.app')

@section('content')
    <div id="page-wrapper">
        <!-- Nav -->
        <x-navbar/>

        <!-- Banner -->
        <section id="banner" class="pb-8" style="height: unset">
            <div class="container">
                <div class="row" style="margin-top: 0">
                    <section class="col-12">
                        <div class="flex items-center">
                            <a href="javascript:history.go(-1)" class="border-0 text-3xl pr-4 h-full"><</a>
                            <span class="text-2xl text-white text-left font-medium mb-0">Login</span>
                        </div>
                        <form action="/login" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="margin-top: 0">
                                <div class="col-4 space-y-3">
                                    <div class="col-12 text-left">
                                        <label class="text-white text-md">Email</label>
                                        <input type="email" name="email" placeholder="Your email"/>
                                    </div>
                                    @if($errors->has('email'))
                                        <div class="text-red-700 alert alert-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                    <div class="col-12 text-left">
                                        <label class="text-white text-md">Password</label>
                                        <input type="password" name="password" placeholder="******"/>
                                    </div>
                                    @if($errors->has('password'))
                                        <div class="text-red-700 alert alert-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                    <ul class="actions">
                                        <li><input type="submit" class="button alt" value="Submit"/></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </section>

        <x-footer/>
    </div>
@endsection
