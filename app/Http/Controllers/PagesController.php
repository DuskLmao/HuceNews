<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    //* khởi tạo dữ liệu ban đầu
    function __construct() {
        $category = Category::all();
        $banner = Banner::all();
        $subcategory = Subcategory::all();
        $about = About::find(1);
        $baivietmoinhat = News::get()->where('type', 1)->where('active', 1)->sortByDesc('created_at')->take(15);
        $baivietnoibat = News::get()->where('type', 1)->where('index', 1)->where('active', 1)->sortByDesc('created_at')->take(15);
        view()->share('baivietnoibat', $baivietnoibat);
        view()->share('baivietmoinhat', $baivietmoinhat);
        view()->share('banner', $banner);
        view()->share('category', $category);
        view()->share('subcategory', $subcategory);
        view()->share('about', $about);
    }
    
    // load thêm tin tức
    // public function loadMoreNews(Request $request)
    // {
    //     $page = $request->input('page', 1);
    //     $perPage = 5;
    //     $skip = ($page - 1) * $perPage;

    //     $news = News::where('type', 1)
    //         ->where('active', 1)
    //         ->orderBy('created_at', 'desc')
    //         ->skip($skip)
    //         ->take($perPage)
    //         ->get();

    //     $html = '';
    //     foreach ($news as $value) {
    //         $html .= view('pages.partials.item_news', compact('value'))->render();
    //     }

    //     // Kiểm tra còn tin không
    //     $hasMore = News::where('type', 1)
    //         ->where('active', 1)
    //         ->count() > $skip + $perPage;

    //     return response()->json([
    //         'html' => $html,
    //         'hasMore' => $hasMore,
    //         'nextPage' => $page + 1
    //     ]);
    // }
    // hiển thị danh sách tin video (take)
    public function trangchu() {
        $videomoinhat = News::get()->where('type', 0)->where('active', 1)->sortByDesc('created_at')->take(4);
        $videonoibat = News::get()->where('type', 0)->where('index', 1)->where('active', 1)->sortByDesc('created_at')->take(4);

        $name = 'Trang chủ';

        return view('pages.trangchu', [
            'name' => $name,
            'videomoinhat' => $videomoinhat,
            'videonoibat' => $videonoibat
        ]);
    }

    //* trang blog
    public function blog() {
        $news = News::where('type', 1)->where('active', 1)->orderby('created_at', 'DESC')->simplePaginate(5);
        $name = 'Blog';
        return view('pages.blog', [
            'name' => $name,
            'news' => $news
        ]);
    }

    //* trang contact_us
    public function contact_us() {
        $name = 'Contact Us';
        return view('pages.contact_us', [
            'name' => $name
        ]);
    }

    //* trang video
    public function video() {
        $news = News::where('type', 0)->where('active', 1)->orderby('created_at', 'DESC')->paginate(5);
        $name = '';
        return view('pages.blog', [
            'name' => $name,
            'news' => $news
        ]);
    }

    //* trang chi tiết
    public function detailsNews($id) {
        $news = News::find($id);
        if ($news['type'] == 1) {
            $name = 'Tin tức';
        } else {
            $name = '';
        }
        // $_SESSION['view'] ='news/'.$id.'_'.$news->Sort_Title;

        $title = $news['title'];

        $tinlienquan = News::where('subcategory_id', $news['subcategory_id'])->take(4)->get();
        return view('pages.details', [
            'news' => $news,
            'name' => $name,
            'title' => $title,
            'tinlienquan' => $tinlienquan
        ]);
    }

    //* trang đăng nhập
    public function getLogin() {
        return view('auth.login');
    }

    //* xử lý đăng nhập
    public function postLogin(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:5|max:32',
        ], [
            'username.required' => 'Chưa nhập tài khoản',
            'password.required' => 'Chưa nhập password',
            'password.min' => 'từ 5-32 kí tự',
            'password.max' => 'từ 5-32 kí tự',
        ]);
        if (Auth::attempt(['email' => $request['username'], 'password' => $request['password']])
            || Auth::attempt(['username' => $request['username'], 'password' => $request['password']])
        ) {
            return redirect('/');
        } else {
            return redirect('/login')->with('thongbao', 'đăng nhập không thành công');
        }
    }

    //* trang đăng ký
    public function getSignup() {
        return view('pages.signup');
    }

    //* xử lý đăng ký
    public function postSignup(Request $request) {
        $request->validate([
            'name' => 'required|min:1',
            'email' => 'required|unique:users,email',
            'username' => 'required|min:1|max:255|unique:users,username',
            'password' => 'required|min:6|max:32',
            'passwordagain' => 'required|same:password'
        ], [
            'name.required' => 'Nhập tên',
            'name.min' => 'Tên ít nhất 1 kí tự',
            'email.required' => 'Nhập email',
            'email.unique' => 'email đã tồn tại',
            'username.required' => 'Nhập username',
            'username.min' => 'username hợp lệ từ 1-255 kí tự',
            'username.max' => 'username hợp lệ từ 1-255 kí tự',
            'username.unique' => 'username đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu hợp lệ từ 5-32 kí tự',
            'password.max' => 'Mật khẩu hợp lệ từ 5-32 kí tự',
            'passwordagain.required' => 'Vui lòng nhập lại mật khẩu',
            'passwordagain.same' => 'Mật khẩu không trùng nhau'
        ]);
        // Mã hóa mật khẩu trước khi lưu
        $request['password'] = bcrypt($request['password']);
        $request['role'] = 0;  // Mặc định Normal user
        $request['active'] = 1;
        $request['image'] = 'avatar.jpg';
        User::create($request->all());

        return redirect('/login')->with('thongbao', 'đăng kí thành công');
    }

    //* xử lý đăng xuất
    public function getLogout() {
        Auth::logout();
        
        return redirect('/');
    }

    //* trang thông tin user
    public function userDetails() {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            return redirect('/login');
        }

        $name = "Trang cá nhân";

        return view('pages.user', [
            'user' => $user,
            'name' => $name
        ]);
    }

    //* trang ảnh avatar
    public function getEditImg()
    {
        $name = 'Sửa ảnh';

        return view('pages.user.editimg', [
            'name' => $name
        ]);
    }

    //* xử lý đổi ảnh avatar
    public function postEditImg(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'jpg' && $format != 'png' && $format != 'jpeg') {
                return redirect('/trangcanhan/editimg')->with('thongbao', 'Không hỗ trợ' . $format);
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4) . '-' . $name;
            while (file_exists('upload/avatar/' . $img)) {
                $img = Str::random(4) . '-' . $name;
            }
            $file->move('upload/avatar', $img);
            if ($user['image'] != '') {
                if ($user['image'] != 'avatar.jpg') {
                    unlink('upload/avatar/' . $user->image);
                }
            }
            User::where('id', Auth::user()->id)->update(['image' => $img]);
        }
        return redirect('/trangcanhan')->with('thongbao', 'Bạn đã sửa thành công');
    }

    //* xử lý tìm kiếm
    public function search(Request $request) {
        $keyword = $request['keyword'];
        // $news = News::where('title', 'like', "%$keyword%")->Where('active', 1)->orWhere('summary', 'like', "%$keyword%")->orWhere('content', 'like', "%$keyword%")->take(10)->paginate(5);
        $news = News::where('title', 'like', "%$keyword%")->Where('active', 1)->paginate(5);
        $name = 'Tìm kiếm';

        return view('pages.search', [
            'name' => $name,
            'news' => $news,
            'keyword' => $keyword
        ]);
    }

    //* trang báo theo danh mục con (subcategory)
    public function subcategory($id) {
        $subcategory = SubCategory::find($id);
        $category = Category::find($subcategory->category_id);
        $news = News::where('subcategory_id', $id)->paginate(5);

        return view('pages.subcategory', [
            'name' => $category['name'],
            'title' => $subcategory['name'],
            'news' => $news,
            'parent_category' => $category,
            'is_subcategory' => true
        ]);
    }

    //* trang báo theo danh mục (category)
    public function category($id) {
        $category = Category::find($id);
        $news = News::where('category_id', $id)->paginate(5);
        
        return view('pages.category', [
            'name' => $category['name'],
            'title' => $category['name'],
            'news' => $news,
            'is_subcategory' => false
        ]);
    }

    public function getEditProfile() {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $user = Auth::user();
        $name = "Chỉnh sửa thông tin";
        
        return view('pages.user.edit', [
            'user' => $user,
            'name' => $name
        ]);
    }

    public function postEditProfile(Request $request) {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $request->validate([
            'name' => 'required|min:1',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ], [
            'name.required' => 'Chưa nhập tên',
            'email.required' => 'Chưa nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
        ]);
        
        User::where('id', Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        
        return redirect('/trangcanhan')->with('thongbao', 'Cập nhật thông tin thành công');
    }

    public function getChangePassword() {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $name = "Đổi mật khẩu";
        
        return view('pages.user.changepassword', [
            'name' => $name
        ]);
    }

    public function postChangePassword(Request $request) {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|max:32',
            'confirm_password' => 'required|same:new_password'
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự',
            'new_password.max' => 'Mật khẩu mới không được quá 32 ký tự',
            'confirm_password.required' => 'Vui lòng nhập lại mật khẩu mới',
            'confirm_password.same' => 'Mật khẩu nhập lại không khớp'
        ]);

        $user = Auth::user();
        
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect('/trangcanhan/changepassword')->with('thongbao', 'Mật khẩu hiện tại không đúng');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect('/trangcanhan')->with('thongbao', 'Đổi mật khẩu thành công');
    }
}
