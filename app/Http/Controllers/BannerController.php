<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /* =====================  LIST  ===================== */
    public function list()
    {
        $banner = Banner::all();
        return view('admin.banner.list', ['banner' => $banner]);
    }

    /* =====================  CREATE  ===================== */
    public function getCreate()
    {
        return view('admin.banner.create');
    }

    public function postCreate(Request $request)
    {
        try {
            $request->validate([
                'image'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'active' => 'required|boolean',
            ]);

            /* upload file */
            $file     = $request->file('image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            // lưu vào storage/app/upload/banners
            $file->move(public_path('upload/banner'), $filename);

            /* create record */
            Banner::create([
                'image'  => $filename,
                'active' => $request->active,
            ]);

            return redirect()->route('admin.banner.list')
                             ->with('thongbao', 'Thêm banner thành công');
        } catch (\Throwable $e) {
            Log::error('Banner upload error: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra! ' . $e->getMessage());
        }
    }

    /* =====================  EDIT  ===================== */
    public function getEdit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function postEdit(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'image'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'active' => 'required|boolean',
        ]);

        $data = $request->only('active');

        /* nếu đổi ảnh */
        if ($request->hasFile('image')) {
            // xóa ảnh cũ (nếu có)
            if ($banner->image && file_exists(public_path('upload/banner/' . $banner->image))) {
                unlink(public_path('upload/banner/' . $banner->image));
            }

            $file     = $request->file('image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/banner'), $filename);

            $data['image'] = $filename;
        }

        $banner->update($data);

        return redirect()->route('admin.banner.list')
                         ->with('thongbao', 'Cập nhật banner thành công');
    }

    /* =====================  ACTIVE / INACTIVE  ===================== */
    public function postActive($id)
    {
        Banner::findOrFail($id)->update(['active' => 1]);
        return back()->with('thongbao', 'Đã bật banner');
    }

    public function postNoActive($id)
    {
        Banner::findOrFail($id)->update(['active' => 0]);
        return back()->with('thongbao', 'Đã tắt banner');
    }

    /* =====================  DELETE  ===================== */
    public function getDelete($id)
    {
        $banner = Banner::findOrFail($id);
        // xóa file vật lý
        if ($banner->image && Storage::exists('upload/banner/' . $banner->image)) {
            Storage::delete('upload/banner/' . $banner->image);
        }
        $banner->delete();

        return redirect()->route('admin.banner.list')
                         ->with('thongbao', 'Xóa banner thành công');
    }
}
