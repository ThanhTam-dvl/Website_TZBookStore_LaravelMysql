# 📚 TZBookStore - Hệ thống Quản lý Nhà sách

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)

Website quản lý nhà sách và bán sách trực tuyến xây dựng bằng Laravel và MySQL.

![Giao diện TZBookStore](https://via.placeholder.com/800x400?text=Trang+Chủ+TZBookStore) *(Thay bằng ảnh thực tế)*

## ✨ Tính năng chính

### Cho khách hàng
- Đăng ký/Đăng nhập tài khoản
- Duyệt danh sách sách theo danh mục
- Tìm kiếm sách theo tên/tác giả
- Xem chi tiết sách
- Quản lý giỏ hàng
- Thanh toán và đặt hàng
- Theo dõi lịch sử đơn hàng
- Hủy đơn hàng

### Cho quản trị viên
- Quản lý danh mục sách
- CRUD sản phẩm (thêm/sửa/xóa sách)
- Quản lý đơn hàng (xác nhận/hủy)
- Quản lý người dùng
- Quản lý tài khoản

## ⚙️ Công nghệ sử dụng
- **Backend**: Laravel 11.x
- **Frontend**: Blade Templates, Bootstrap
- **Database**: MySQL
- **Xác thực**: Laravel Authentication
- **Quản lý phiên**: Database Session Driver
- **Khác**: Composer, Artisan CLI

## 🗂️ Cấu trúc cơ sở dữ liệu
![Sơ đồ Database](https://via.placeholder.com/600x400?text=ERD+TZBookStore) *(Thay bằng ảnh thực tế)*

Các bảng chính:
- `books`: Quản lý thông tin sách
- `book_categories`: Danh mục sách
- `users`: Thông tin người dùng
- `orders`: Đơn hàng
- `order_items`: Chi tiết đơn hàng

## 🚀 Cài đặt dự án

### Yêu cầu hệ thống
- PHP >= 8.2
- Composer 2.x
- MySQL >= 5.7
- Node.js >= 18.x

### Bước 1: Clone dự án
```bash
git clone https://github.com/ThanhTam-dvl/Website_TZBookStore_LaravelMysql.git
cd Website_TZBookStore_LaravelMysql

Bước 2: Cài đặt dependencies
