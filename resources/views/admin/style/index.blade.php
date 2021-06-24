@extends('admin.layouts.app')

@section('title', 'Welcome')

@section('pageTitle', 'Dashboard')

@section('contentHeader')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Styles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.style.create') }}">Create new style</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row tm-mb-90 tm-gallery">
            @foreach ($styles as $style)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        {{-- <img src="{{ Storage::url($style->image) }}" alt="Image" class="img-fluid" height="200px"> --}}
                        <img src="{{ $style->image }}" alt="Image" class="img-fluid" height="200px">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{ $style->name }}</h2>
                            <a href="{{ route('admin.style.show', $style) }}">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span
                            class="tm-text-gray-light {{ $style->subscription == 'premium' ? 'text-danger' : 'text-info' }} text-danger">
                            {{-- <i class="fa fa-heart" aria-hidden="true"></i> --}}
                            {{ ucfirst($style->subscription) }}</span>
                        <span>
                            <a href="{{ route('styleDownload', $style) }}" class="text-info"><i class="fa fa-download"
                                    aria-hidden="true"></i>
                                Try</span></a>
                            <a href="{{ route('admin.style.edit', $style) }}" class="text-warning"><i class="fa fa-pen-square"
                                    aria-hidden="true"></i>
                                Edit</span></a>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
