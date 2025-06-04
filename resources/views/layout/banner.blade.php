<div class="banner__carousel owl-carousel">
    @foreach ($banner as $value)
        @if ($value['active'] == 1)
        <div class="item__banner">
            <a href="#">
                <img class="banner_web" src="{{ asset('upload/banner/' . $value['image']) }}" alt="Banner Image">
            </a>
        </div>
        @endif
    @endforeach
</div>