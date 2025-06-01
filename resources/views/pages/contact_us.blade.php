
@extends('layout.index')

@section('content')
<section class="content__contact">
    <div class="ct_container">
        <div class="form-section">
            <label>Địa chỉ email của bạn</label>
            <input type="text" name="email">
            <label>Chọn tình huống cần hỗ trợ</label>
            <select name="subject">
                <option>Vui lòng chọn một chủ đề</option>
                <option>Quảng cáo</option>
                <option>Lỗi hệ thống</option>
                <option>Nhận xét, gợi ý</option>
                <option>Khác</option>
            </select>

            <label>Hãy viết lời nhắn của bạn vào đây:</label>
            <textarea name="message"></textarea>

            <button type="submit">Gửi</button>
        </div>

        <div class="info-section">
            <h2>Liên hệ với chung tôi</h2>
            <strong>Địa chỉ</strong>
            <p>
                Hanoi University of Civil Engineering:  55 Giải Phóng, Hai Bà Trưng, Hà Nội<br>
                Tel: +84 12 3456 789 - văn phòng.
            </p>
            <p>
                Hanoi University of Civil Engineering:  55 Giai Phong street, Hai Ba Trung, Ha Noi<br>
                Tel: +84 12 3456 789 - office.
            </p>
            <strong>Quảng cáo với chúng tôi:</strong> 📞 012 3456 789
            Email: huce@huce.edu.vn
        </div>
    </div>
</section>
@endsection