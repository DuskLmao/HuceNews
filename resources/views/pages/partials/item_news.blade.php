
    <div class="item__news">
        <div class="image__news">
            <img class="" src="upload/news/{{ $value['image'] }}" alt="">
        </div>
        <div class="content__news">
            <a class="item__news--title blog__title blog__title--hover" href="/news/{{ $value['id'] }}_{{ $value['sort_title'] }}.html">
                {{ $value['title'] }}
            </a>
            <span class="news__time">{{ $value['created_at']->format('d/m/Y H:i') }}</span>
        </div>
    </div>
