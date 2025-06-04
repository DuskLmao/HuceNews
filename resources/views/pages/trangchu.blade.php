@extends('layout.index')

@section('content')
<div class="container-fluid" style="width:90%;">
    
<div class="row">
        <!-- Hiển thị phần danh mục bên trái -->
        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
            <div class="section__news--left w-100">
                <!-- <h2 class="section__title">Các danh mục chính</h2>
                <ul class="list__news--left">
                    @foreach ($category as $value)
                    <li class="list__news--left--item">
                        <a class="blog__title blog__title--hover" href="/category/{!! $value['id'] !!}_{!! $value['sort_name'] !!}.html">
                            {!! $value['name'] !!}
                        </a>
                    </li>
                    @endforeach
                </ul> -->
                @include('layout.menuleft')
            </div>
        </div>

        <!-- Hiển thị phần nội dung website -->
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 row">
            <!-- Hiển thị phần tin tức mới nhất -->
            <section class="section__news">
                <div class="row">
                    <!-- Bài viết mới nhất -->
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <h2 class="section__title align-items-center" style="text-align: center;">Bài viết mới nhất</h2>
                        <div class="news__box">
                            <?php $baiviet = $baivietmoinhat->shift() ?>
                            @if ($baiviet != null)
                            <img style="height: 100" class="w-100 p-3 " src="upload/news/{!! $baiviet['image'] !!}" alt="">
                            <div class="news__box--border">
                                <a class="news__title blog__title blog__title--hover" href="/news/{!! $baiviet['id'] !!}_{!! $baiviet['sort_title'] !!}.html">{!! $baiviet['title'] !!}</a>
                                <span class="news__time">{{ $baiviet['created_at']->format('d/m/Y H:i') }}</span>
                                <p class="news__content">{{ $baiviet['summary'] }}
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- Các bài viết mới nhất -->
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <div class="list__news mt-5">
                            @if($baivietmoinhat != null)    
                            @foreach ($baivietmoinhat->take(5)  as $value) 
                            <div class="item__news">
                                <div class="image__news">
                                    <img class="" src="upload/news/{!! $value['image'] !!}" alt="">
                                </div>
                                <div class="content__news">
                                    <a class="item__news--title blog__title blog__title--hover" href="/news/{!! $value['id'] !!}_{!! $value['sort_title'] !!}.html">
                                        {!! $value['title'] !!}
                                    </a>
                                    <span class="news__time">{{ $value['created_at']->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                            @endforeach
                            @endif   
                        </div>
                    </div>
                </div>
            </section>
            <!-- Hiển thị phần tin video mới nhất -->
            <section class="section__video">
                <div class="container ">
                    <div class="section__video--bg">
                        <a href="" class="blog__title blog__title--white  blog__title--hover">
                            <h2 class="section__title">Video mới nhất</h2>
                        </a>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8 ">
                                <div class="row">
                                    <?php $video = $videomoinhat->shift() ?>
                                    @if ($video != null)
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        <a class="blog__title--video blog__title--white blog__title--hover" href="/news/{!! $video['id'] !!}_{!! $video['sort_title'] !!}.html">
                                            {!! $video['title'] !!}</a>
                                        <span class="news__time--white mt-1 mb-1 blog__title--white">{{ $video['created_at']->format('d/m/Y H:i') }}</span>
                                        <p class="news__content--video blog__title--white col-hidden-md">{!! $video['summary'] !!}
                                        </p>
                                    </div>
                                    <div class="mt-2 mb-3 col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                                        <div class="icon--video">
                                            <a href="/news/{!! $video['id'] !!}_{!! $video['sort_title'] !!}.html">
                                                <img class="w-100" src="upload/news/{!! $video['image'] !!}" >
                                            </a>
                                            <a href="/news/{!! $video['id'] !!}_{!! $video['sort_title'] !!}.html">
                                                <div class="icon__play--video">
                                                    <i class="fas fa-play"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                <div class="list__video">
                                    @foreach ($videomoinhat as $value)
                                    <div class="item__video">
                                        <div class="img__item">
                                            <img class="w-100" src="upload/news/{!! $value['image'] !!}" alt="">
                                            <a href="/news/{!! $value['id'] !!}_{!! $value['sort_title'] !!}.html">
                                            <div class="icon__play--video">
                                                <i class="fas fa-play"></i> 
                                            </div>
                                        </a>
                                        </div>
                                        <div class="content__item">
                                            <a class="blog__title--item blog__title--white blog__title--hover" href="/news/{!! $value['id'] !!}_{!! $value['sort_title'] !!}.html">
                                                {!! $value['title'] !!}
                                            </a>
                                            <span class="news__time--white mt-1 mb-1 blog__title--white">{{ $value['created_at']->format('d/m/Y H:i') }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Hiển thị phần tin tức theo danh mục con -->
            <section class="section__content__news ">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-xl-9 col-lg-9 col-md-12 col-sm-12">
                            @foreach ($subcategory -> sortByDesc('id') as $value)
                            @if (count($value->news->where('type',1)) > 0)
                            <section class="content__news section__content__news_2">
                                <h2 class="introduce__title text-left mb-0 " style="font-size: 2em;">{!! $value['name'] !!}</h2>
                                <div class="list__items--contents" >
                                    @foreach ($value['news']->where('type',1)->take(3) -> sortByDesc('id')  as $news)
                                    <div class="item__news">
                                        <div class="image__news">
                                            <a href="/news/{!! $news['id'] !!}_{!! $news['sort_title'] !!}.html">
                                                <img class="" src="upload/news/{!! $news['image'] !!}" alt="">
                                            </a>
                                        </div>
                                        <div class="content__news">
                                            <a class="blog__title blog__title--hover" style="font-size: 1.7em;" href="/news/{!! $news['id'] !!}_{!! $news['sort_title'] !!}.html">
                                                {!! $news['title'] !!}
                                            </a>
                                            <p class="content__news--details news__content">
                                                {!! $news['summary'] !!}
                                            </p>
                                            <span class="news__time">{{ $news['created_at']->format('d/m/Y H:i') }}</span>

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </section>
                            @endif 
                            @endforeach
                        </div>
                        <div class="col-12 col-xl-3 col-lg-3 col-md-12 col-sm-12 mt-5">
                            @include('layout.news')
                        </div>
                    </div>
                </div>
            </section>

            <!-- Hiển thị phần video nổi bật -->
            <section>
                <div class="container">
                    <h2 class="section__title section__title--about">Video nổi bật</h2>
                    <div class="owlcousel__partner owl-carousel">
                        @foreach ($videonoibat -> sortByDesc('id') as $value)
                        <div class="item__partner">
                            <div class="item__video">
                                <div class="img__item">
                                    <img class="" src="upload/news/{!! $value['image'] !!}" alt="">
                                    <a href="/news/{!! $value['id'] !!}_{!! $value['sort_title'] !!}.html">
                                        <div class="icon__play--video">
                                            <i class="fas fa-play"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="content__item">
                                    <a class="blog__title--item blog__title--white blog__title--hover" style="font-size: 1.2em;" href="/news/{!! $value['id'] !!}_{!! $value['sort_title'] !!}.html">
                                        {!! $value['title'] !!}
                                    </a>
                                    <span class="news__time--white mt-1 mb-1 blog__title--white">{{ $value['created_at']->format('d/m/Y H:i') }}</span>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

        </div>
            <!-- aa -->
        <!-- Hiển thị phần tin tức bên phải -->
        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mt-5">
            @include('layout.news')
        </div>
    </div>
</div>
@endsection