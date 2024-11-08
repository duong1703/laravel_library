@component('mail::message')
{{-- Header --}}
# Thông tin đăng nhập thư viện của bạn

{{-- Nội dung chính --}}
Chào mừng, **{{ $Email }}**

Tài khoản của bạn đã được tạo thành công. Dưới đây là thông tin đăng nhập của bạn:

- **Email**: {{ $Email }}
- **Mật khẩu**: {{ $password }}

{{-- Button --}}
@component('mail::button', ['url' => route('user_login')])
Đăng nhập ngay
@endcomponent

Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!

{{-- Footer --}}
Thanks,<br>
{{ config('app.name') }}
@endcomponent