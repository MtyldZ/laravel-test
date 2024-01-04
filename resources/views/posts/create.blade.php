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
                            <span class="text-2xl text-white text-left font-medium mb-0">Create Post</span>
                        </div>
                        <form action="/posts" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="margin-top: 0">
                                <div class="col-4 space-y-3">
                                    <div class="col-12 text-left">
                                        <label class="text-white text-md">Title</label>
                                        <input type="text" name="title" placeholder="Name"/>
                                    </div>
                                    <div class="col-12 text-left">
                                        <label class="text-white text-md">Topic</label>
                                        <select class="p-3 rounded-md" type="text" name="topic">
                                            @foreach($topics as $topic)
                                                <option value="{{$topic['title']}}">{{$topic['title']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 text-left">
                                        <label class="text-white text-md">Description</label>
                                        <textarea name="description" placeholder="Description" rows="5"></textarea>
                                    </div>
                                    <div class="col-12 text-left">
                                        <input type="file" name="image" accept="image/*" id="upload"/>
                                    </div>
                                    <div class="col-12">
                                        <ul class="actions">
                                            <li><input type="submit" class="button alt" value="Submit"/></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <img src="#" class="object-cover" alt="" id="upload-preview"
                                         style="height: 560px;width: 560px;display: none">
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </section>

        <x-footer/>

        <script type="text/javascript">
            const fileInput = document.getElementById('upload');
            const img = document.getElementById('upload-preview');

            fileInput.addEventListener('change', event => {
                if (event.target.files.length > 0) {
                    img.style.display = 'block';
                    img.src = URL.createObjectURL(event.target.files[0]);
                } else {
                    img.style.display = 'none';
                }
            });
        </script>
    </div>
@endsection
