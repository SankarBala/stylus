@extends('frontend.layouts.app')




@section('content')
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
                <div class="text-center mb-5">
                    <a href="{{ route('styleDownload', $style) }}" class="btn btn-primary tm-btn-big">Download</a>
                </div>
                <div class="mb-4 d-flex flex-wrap justify-content-between">
                    <div class="mr-4 mb-2">
                        <span class="tm-text-gray-dark">Size: </span><span class="tm-text-primary">{{ceil(strlen($style->content)/1000)}} KB</span>
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
    <div class="row mb-4">
        <h2 class="col-12 tm-text-primary">
            Suggested styles
        </h2>
    </div>
    <div class="row mb-3 tm-gallery">

       @foreach ($suggestion as $suggested)
       <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
        <figure class="effect-ming tm-video-item">
            {{-- <img src="{{ asset('frontend/img/img-03.jpg') }}" alt="Image" class="img-fluid"> --}}
            <img src="{{ $suggested->image }}" alt="Image" class="img-fluid">
            <figcaption class="d-flex align-items-center justify-content-center">
                <h2>{{$suggested->name}}</h2>
                <a href="{{ route('styleDetails', $suggested) }}">View more</a>
            </figcaption>
        </figure>
        <div class="d-flex justify-content-between tm-text-gray">
            <span class="tm-text-gray-light text-danger">
                <i class="fa fa-heart" aria-hidden="true"></i>
                {{$suggested->subscription}}</span>
            <span>
                <a href="{{ route('styleDownload', $suggested) }}" class="text-info"><i class="fa fa-download" aria-hidden="true"></i>
                     Download</span></a>
        </div>
    </div>
       @endforeach
       

    </div> <!-- row -->

@endsection
