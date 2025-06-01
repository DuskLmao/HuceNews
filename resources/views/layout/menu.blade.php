<div class="container menu">
    <nav class="nav_menu" style="display: flex; justify-content: space-between; align-items: center; gap: 20px;">
        
        <!-- Left: Menu items -->
        <ul style="display: flex; gap: 20px; list-style: none; padding: 0; margin: 0;">
            <li><a href="/">Trang chủ</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/video">Video</a></li>
            <li><a href="/contact_us">Contact Us</a></li>
        </ul>

        <!-- Center: Search -->
        <form action="/search" method="post" style="display: flex; align-items: center; gap: 8px; margin-left: 20px;">
            @csrf
            <input type="text" name="keyword" placeholder="Tìm kiếm..." style="padding: 6px 10px; border: 1px solid #ccc; border-radius: 20px; width: 400px;">
                <button type="submit" style="padding: 6px 10px; background-color: #2daaff; color: white; border: none; border-radius: 40px;">
            <i class="fas fa-search"></i>
            </button>
        </form>


        <!-- Right: User Info -->
        <div>
            @if (Auth::check())
                <a href="/trangcanhan" class="text-white" style="display: flex; align-items: center;">
                    <i class="fas fa-user mr-2"></i> {!! Auth::user()->name !!}
                </a>
            @else
                <a href="/login" class="text-white">
                    <i class="fas fa-user mr-2"></i>
                </a>
            @endif
        </div>

    </nav>
</div>
