@extends('frontend.layouts.app')

@section('content')

    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            Latest Styles
        </h2>
        <div class="col-6 d-flex justify-content-end align-items-center">
            <form action="" method="GET" class="tm-text-primary">
                Page <input type="number" value="{{ $styles->currentPage() }}" name="page" size="1"
                    class="tm-input-paging tm-text-primary"> of
                {{ $styles->lastPage() }}
            </form>
        </div>
    </div>
    <div class="row tm-mb-90 tm-gallery">

        @foreach ($styles as $style)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    {{-- <img src="{{ asset('frontend/img/img-03.jpg') }}" alt="Image" class="img-fluid"> --}}
                    <img src="{{ $style->image }}" alt="Image" class="img-fluid" width="100%" height="100px">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>{{ $style->name }}</h2>
                        <a href="{{ route('styleDetails', $style) }}">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light text-danger">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        {{ $style->subscription }}</span>
                    <span>
                        <a href="{{ route('styleDownload', $style) }}" class="text-info"><i class="fa fa-download"
                                aria-hidden="true"></i>
                            Download</span></a>
                </div>
            </div>

        @endforeach

    </div> <!-- row -->

    {{ $styles->links('pagination') }}

    </div>


@endsection
