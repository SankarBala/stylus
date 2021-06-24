@extends('admin.layouts.app')




@section('content')
<br/>
    <div class="container-fluid">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary mb-3">Details about the style</h2>
            <hr />
        </div>
        <div class="row tm-mb-90">
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                {{-- <img src="/frontend/img/img-01.jpg" alt="Image" class="img-fluid" width="100%" height="100%"> --}}
                <img src="{{ $style->image }}" alt="Image" class="img-fluid" width="100%" height="100%">
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="tm-bg-gray tm-video-details">
                    <div class="mb-4">
                        <h3 class="tm-text-gray-dark mb-3">License</h3>
                        <h2 class="{{ $style->subscription == 'free' ? 'text-success' : 'text-info' }}">
                            {{ $style->subscription }}
                        </h2>
                        <p>Free and premium both are only for personal use. Do not share or sell.
                        </p>
                    </div>
                    <div class="text-center mb-5 d-flex justify-content-between">
                        <a href="{{ route('styleDownload', $style) }}" class="btn btn-info rounded px-3 py-2 d-inline">Download</a>
                        <a href="{{ route('admin.style.edit', $style) }}" class="btn btn-warning rounded px-3 py-2 d-inline">Edit</a>
                    </div>
                   
                    <div class="mb-4 d-flex flex-wrap justify-content-between">
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Size: </span><span
                                class="tm-text-primary">{{ ceil(strlen($style->content) / 1000) }} KB</span>
                        </div>
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary">CSS</span>
                        </div>
                    </div>
                    <div>
                        <h3 class="tm-text-gray-dark mb-3">Applied to</h3>
                        <ul>
                            @php
                                preg_match_all('/(domain|regexp|url-prefix|url)\(".+?"\)/', $style->content, $matches);
                            @endphp

                            @foreach ($matches[0] as $match)
                                <li>
                                    <p>{{ $match }}</p>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
