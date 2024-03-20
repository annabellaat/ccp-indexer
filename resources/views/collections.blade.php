@extends('layouts.app', ['class' => 'bg-white'])

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
    <style>
        #searchResults > .card {
            position: inherit;
        }
        .slick-prev:before, .slick-next:before {
            color: #A9A9A9 !important;
        }
        .slick-track
        {
            display: flex !important;
        }

        .slick-slide
        {
            height: inherit !important;
        }
        .collection-cards {
            max-height:220px;
            object-fit:cover;
            min-height:220px;
            width:100%;
        }
    </style>
@endpush

@section('content')
    <div class="container py-5">
        <div class="row align-items-stretch justify-content-start" id="accordion">
            {{-- <div class="col-sm-12 col-md-7">
                <div class="d-block">
                    <a href="{{url('/search')}}" class="d-inline-block"><h1 class="font-weight-bold">{{ __($title ?? 'Featured') }}</h1></a>
                    <br><br>
                    <p style="width: 90%;">
                        Enjoy these downloadable resources from the CCP Collections for free! Here we feature a suite of materials coinciding with the virtual edition of 
                        <a href="https://dreamlist360.com/share/collection/7lQkr?fs=1&vr=0&thumbs=-1&chromeless=1&logo=-1&fbclid=IwAR3pSD4M9HxtM-xjUgww3xnForOuj63dxxzgWx20pYDxPToNpnXJtwj10f0" class="text-ccp-gold" target="_blank">Allegories & Realities</a>, 
                        Ofelia Gelvezon-Tequi’s retrospective, first exhibited onsite last February 22, 2020 and organized by the CCP Visual Arts and Museum Division. 
                        We are also showcasing a sundry of folios and catalogues from the CCP Library and Archives.
                    </p>
                </div>
            </div> --}}
            <div class="col-sm-12 col-md-5 d-flex justify-content-center flex-column">
                {{-- <form action="{{route('search')}}" method="get" id="searchForm">
                    <div class="form-group mt-2">
                        <input class="form-control rounded-0" name="q" placeholder="Search the Open Collection" id="searchbox" type="text" value="{{Request::get('q')}}">
                    </div>
                </form> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-none">
                    <div class="card-body px-0">
                        <h2 style="color:#d9d2e8 !important;" class="font-weight-bold mb-0">Allegories & Realities: Ofelia Gelvezon-Tequi: In Retrospect</h2>
                        <p class="text-muted">Visual Arts and Museum Division Collection</p>
                        <div class="row">
                        {{-- <div class="multiple-items mt-3 mb-3 vamd" data-page="1" data-type="vamd"> --}}
                            @forelse ($results2 as $key => $result)
                            <div class="col-md-4">
                                <div class="item-card rounded-0 bg-white mb-0 px-3 h-100">
                                    <div class="item">
                                        <div class="bg-white text-center">
                                            @if ($result->thumbnail)
                                                <img src="{{$result->thumbnail}}" alt="" class="img-fluid card-img-left collection-cards">
                                            @else
                                                <i class="fas fa-file-image fa-7x p-4 {{$result->item_code}}"></i>
                                            @endif
                                        </div>
                                        <div class="card-body bg-white">
                                            <a href="{{route('entities.show', $result->slug)}}" class="text-ccp-gold"><p class="card-title p-0 mb-0">{{$result->title}}</p></a>
                                            <span class="ccp-black">{{$result->date->format('Y')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        {{-- </div> --}}
                        </div>
                        <hr>

                        <h2 style="color:#cadaf7 !important;" class="font-weight-bold mb-0">Artist folios and catalogues</h2>
                        <p class="text-muted">Lbrary and Archives Division Collection</p>
                        {{-- <div class="multiple-items mt-3" data-page="1" data-type="lad"> --}}
                        <div class="row">
                            @forelse ($results1 as $key => $result)
                            <div class="col-md-4">
                                <div class="item-card rounded-0 bg-white mb-0 px-3 h-100">
                                    <div class="item">
                                        <div class="bg-white text-center">
                                            @if ($result->thumbnail)
                                                <img src="{{$result->thumbnail}}" alt="" class="img-fluid card-img-left collection-cards">
                                            @else
                                                <i class="fas fa-file-image fa-7x p-4 {{$result->item_code}}"></i>
                                            @endif
                                        </div>
                                        <div class="card-body bg-white">
                                            <a href="{{route('entities.show', $result->slug)}}" class="text-ccp-gold"><p class="card-title p-0 mb-0">{{$result->title}}</p></a>
                                            <span class="ccp-black">{{$result->date->format('Y')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        {{-- </div> --}}
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/html" id="itemTemplate">
        <div class="item-card rounded-0 bg-white mb-0 px-3 h-100">
            <div class="item">
                <div class="bg-white text-center">
                    [[IMAGE]]
                </div>
                <div class="card-body bg-white">
                    <a href="[[ROUTE]]" class="text-ccp-gold"><p class="card-title p-0 mb-0">[[TITLE]]</p></a>
                    <span class="ccp-black">[[YEAR]]</span>
                </div>
            </div>
        </div>
    </script>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        let isRequesting = false
        const defaultSkip = 12
        const defaultTake = 3


        const getSlide = (page, div) => {
            $('#infinite-scroll-loading').removeClass('d-none');
            if (isRequesting) return
            isRequesting = true
            const skip = 6 + ((page-1) * defaultTake)
            const type = $(div).data('type');
            const generateImage = (thumb) => {
                if (!thumb) return '<i class="fas fa-file-image fa-7x p-4"></i>'
                return `<img src="${thumb}" alt="" class="img-fluid card-img-left collection-cards">`
            }

            $.get(`/api/collections/pagination?skip=${skip}&type=${type}&take=${defaultTake}`).then((e) => {
                if (e.data.length == 0) {
                    $("#loadMore").addClass('d-none')
                    isRequesting = false
                    return
                }

                var newItems = e.data.map((data) => {
                    let template = $("#itemTemplate").html();
                    return $(template.replace('[[YEAR]]', new Date(data.date).getFullYear())
                        .replace('[[TITLE]]', data.title)
                        .replace('[[ROUTE]]', `/entities/${data.slug}`)
                        .replace('[[IMAGE]]', generateImage(data.thumbnail)))[0];
                });

                $(div).data("page", page + 1)
                var $elems = $(newItems);
                $(div).slick('slickAdd', $(newItems));
                
                isRequesting = false
            }).then(() => {

            })
        }
        // $("img").lazyload();
        $(document).on('click', '.slick-next', function(e){
            if($(e.target).hasClass('slick-disabled')) {
                return
            }
            var div = $(this).closest('.multiple-items');
            const page = div.data("page")
            getSlide(page, div[0])
        });
    });
    $('.multiple-items').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: true,
        speed: 300,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
            breakpoint: 580,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
</script>
@endpush