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
                            <span class="text-2xl text-white text-left font-medium mb-0">Create Topic</span>
                        </div>
                        <form action="/topics" method="post">
                            @csrf
                            <div class="row" style="margin-top: 0">
                                <div class="col-4 space-y-3">
                                    <div class="col-12 text-left">
                                        <label class="text-white text-md">Title</label>
                                        <input type="text" name="title" placeholder="Name"/>
                                    </div>
                                    <div class="col-12 text-left">
                                        <label class="text-white text-md">Info</label>
                                        <textarea name="info" placeholder="Description" rows="5"></textarea>
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


        <!-- Footer -->
        <div id="footer">


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
