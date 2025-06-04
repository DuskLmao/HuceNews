<div class="wrapper__header header">
    <div class="container">
        <div class="row header__flex">
            <div class="header_left col-lg-3 col-sm-12 col-md-12 col-xl-3">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('upload/logo/Logo_dung.png') }}" alt="Logo" class="logo__img">
                        <!-- <img src="{{ asset('upload/logo/Logo_dung.png') }}" alt="Logo phụ" class="logo__img" style="margin-left:10px;max-height:60px;"> -->
                    </a>
                </div>
                <div class="toggle_theme">
                    <button id="toggle-theme" style="position:fixed;top:20px;right:20px;z-index:999;font-size:22px;transition:color 0.3s;">🌙</button>
                </div>
                <!-- <div class="form-md-header">
                    <form action="/search" method="post">
                        @csrf
                        <span class="btn display__form display__form__mobile text-white">
                            <i class="fas fa-search"></i>
                        </span>
                        <div class="input__search">
                            <input type="text" name="keyword" placeholder="Tìm kiếm...">
                            <button class="btn" type="submit">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div> -->
            </div>
            <div class="header_right col-lg-9">
                <div class="support hidden-sm ">
                    <p class="support--title">
                        Email liên hệ
                    </p>
                    <a href="/contact_us">
                        <p class="support--content">
                            {{ ($about != null) ? $about['email'] : '' }}
                        </p>
                    </a>
                </div>
                <div class="support hidden-sm">
                    <p class="support--title">
                        Tư vấn
                    </p>
                    <a href="">
                        <p class="support--content">
                            HOTLINE {{ ($about != null) ? $about['phone'] : '' }}
                        </p>
                    </a>
                </div>
                <div class="support hidden-sm support--clock">
                    <p class="support--title">
                        Thời gian làm việc
                    </p>
                    <a href="">
                        <p class="support--content">
                            7:00 - 18:00
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/main.js') }}"></script>