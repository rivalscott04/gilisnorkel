@extends('layouts.frontend')

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7"
             style="background-image: url({{ asset('assets/frontend/img/page-header/page-header-background-transparent.jpg') }});">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1>Tour <strong>Gallery</strong></h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="#">Home</a></li>
                        <li class="active">Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <div class="container py-2">

        <ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
            <li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active" href="#">Show All</a></li>
            @foreach($galleries as $gallery)
                <li class="nav-item" data-option-value=".{{ \Illuminate\Support\Str::slug($gallery->nama.' '.$gallery->id) }}">
                    <a class="nav-link text-1 text-uppercase" href="#">{{ $gallery->nama }}</a></li>
            @endforeach
        </ul>

        <div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
            <div class="row portfolio-list sort-destination" data-sort-id="portfolio">

                @foreach($galleries as $gallery)
                    @forelse($gallery->images as $image)
                    <div class="col-sm-6 col-lg-3 isotope-item {{ \Illuminate\Support\Str::slug($gallery->nama.' '.$gallery->id) }}">
                        <div class="portfolio-item">
                            <a href="#">
                            <span class="thumb-info thumb-info-lighten border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="{{ $image?->getFirstMedia()?->getUrl() }}" class="img-fluid border-radius-0" alt="">
                                </span>
                            </span>
                            </a>
                        </div>
                    </div>
                    @empty
                    @endforelse
                @endforeach

            </div>
        </div>

    </div>
    <br><br>





@endsection
