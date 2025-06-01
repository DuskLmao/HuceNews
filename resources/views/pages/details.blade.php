@extends('layout.index2')
@section('content')
<section class="section__content__news">
            <section class="details__news">
                <h1>
                    <a href="" class="title__details blog__title blog__title--hover" style="font-size: 1em;">
                        {!! $news['title'] !!}
                    </a>
                </h1>
                
                <div class="details__news--time">
                    <div class="news__time--left">
                        <i class="fas fa-calendar-alt"></i>
                        <span>{{ $news['created_at']->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="news__time--right">
                        <i class="fas fa-user"></i>
                        <span>Đăng bởi Admin</span>
                    </div>
                </div>
                <div class="details__news--content">
                    <div class="news__content--sort">
                        {!! $news['summary'] !!}
                    </div>
                    <div class="news__content--img" style="text-align: center;">
                        @if ($news['type'] == 0)
                            @if ($news['link'] != '')
                            <iframe width="840" height="472" src="{{ $news['link'] }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin"
                                allowfullscreen></iframe>
                            @else
                            <img class="w-100" src="upload/news/{!! $news['image'] !!}" alt=""> 
                                
                            @endif
                            
                        @else
                            <img class="w-100" src="upload/news/{!! $news['image'] !!}" alt="{!! $news['image'] !!}"> 
                        @endif
                      
                    </div>
                    <div class="news__content--contents">
                        {!! $news['content'] !!}
                    </div>
                </div>
                <div class="social__network">

                </div>
                <div class="same__topic">
                    <div class="same__title">
                        Bài Viết Cùng chủ đề
                    </div>
                    <ul>
                        @foreach ($tinlienquan as $value)
                            @if ($value['id'] != $news['id'])
                                <li>
                                    <a class="blog__title blog__title--hover" href="/news/{{ $value['id'] }}_{{ $value['sort_title'] }}.html">{{ $value['title'] }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="box__comment">
                    <div class="box__comment--title">Bình luận</div>
                    <div class="list__comment">
                        @foreach ($news['comment'] as $value)
                        <div class="comment__item">
                            <div class="item__cmt--img">
                                <img src="upload/avatar/{!! $value['users']['image'] !!}">
                            </div>
                            <div class="item__cmt--content">
                                <div class="comment__author">{!! $value['users']['name'] !!}</div>
                                <div class="comment__time">{{ $value['created_at']->format('d/m/Y H:i') }}</div>
                                <div class="comment__contents">{!! $value['content'] !!}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form__comment">
                    @if (Auth::check())
                    <div class="form__comment--title">
                        Ý kiến của bạn
                    </div>
                    <form action="comment/{!! $news['id'] !!}" method="POST">
                        @csrf
                        <div class="form--comment">
                          <textarea name="content" id="" cols="30" rows="10"></textarea>
                           <button class="contract__input contract__button--search">Gửi bình luận</button>
                        </div>
                    </form>
                    @else
                    <div class="form__comment--title">
                        Vui lòng <a style="font-size: 1.5rem" href="/login">đăng nhập</a>  để bình luận
                    </div>
                    @endif
                   
                   
                </div>
            </section>
</section>
@endsection
@section('script')
    <script>    
        $(document).ready(function(){
        $('.fix__content').removeClass('content__news--flex');
        });
    </script>
@endsection