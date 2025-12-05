<section class="section section-default border-0 my-5">
    <div class="container py-4">

        <div class="row">
            <div class="col pb-4 text-center">
                <h2 class="text-color-dark font-weight-normal text-5 mb-0 pt-2">Meet <strong class="font-weight-extra-bold">Our Profesional Guide</strong></h2>
                <p>Our team will invite you to see the natural beauty of the Gili Islands and enjoy swimming with turtles and taking underwater photos</p>
            </div>
        </div>
        <div class="row pb-4 mb-2">
            @foreach($guides as $guide)
                <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
                    <span class="thumb-info thumb-info-hide-wrapper-bg bg-transparent border-radius-0">
                        <span class="thumb-info-wrapper border-radius-0">
                            <a href="#">
                                <img src="{{ $guide->image?->getFirstMedia()?->getUrl('frontend') }}" class="img-fluid border-radius-0" alt="">
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner">{{ $guide->nama }}</span>
                                    <span class="thumb-info-type">Tour Guide</span>
                                </span>
                            </a>
                        </span>

                    </span>
                </div>
            @endforeach
        </div>
    </div>
</section>
