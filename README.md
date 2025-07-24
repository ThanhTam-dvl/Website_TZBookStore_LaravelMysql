# 📚 TZBookStore - Hệ thống Quản lý Nhà sách

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)

Website quản lý nhà sách và bán sách trực tuyến, xây dựng bằng **Laravel** và **MySQL**.

![Giao diện TZBookStore](https://via.placeholder.com/800x400?text=Trang+Chủ+TZBookStore)
*(Lưu ý: Thay bằng ảnh chụp màn hình thực tế)*

---

## ✨ Tính năng chính

### 👤 Cho khách hàng
- Đăng ký và đăng nhập tài khoản
- Duyệt danh mục sách
- Tìm kiếm theo tên sách hoặc tác giả
- Xem chi tiết sản phẩm
- Thêm, sửa, xóa giỏ hàng
- Đặt hàng, thanh toán đơn hàng
- Theo dõi lịch sử đơn hàng
- Hủy đơn hàng

### 🛠 Cho quản trị viên
- Quản lý danh mục sách
- Thêm/sửa/xóa sách (CRUD)
- Duyệt và xử lý đơn hàng
- Quản lý tài khoản người dùng
- Phân quyền truy cập (Admin/User)

---

## ⚙️ Công nghệ sử dụng

- **Backend**: Laravel 11.x
- **Frontend**: Blade Template, Bootstrap 5
- **Cơ sở dữ liệu**: MySQL 5.7+
- **Xác thực**: Laravel Auth (Sanctum/Breeze)
- **Session Driver**: Database
- **Khác**: Composer, Artisan CLI, npm

---

## 🗂️ Cấu trúc cơ sở dữ liệu

![Sơ đồ ERD](https://via.placeholder.com/600x400?text=ERD+TZBookStore)
*(Lưu ý: Cập nhật ảnh sơ đồ CSDL thực tế)*

Các bảng chính:
- `books`: Thông tin sách
- `book_categories`: Danh mục sách
- `users`: Người dùng
- `orders`: Đơn hàng
- `order_items`: Chi tiết đơn hàng

---

## 🚀 Hướng dẫn cài đặt

### 🧰 Yêu cầu hệ thống

- PHP >= 8.2
- Composer >= 2.x
- MySQL >= 5.7
- Node.js >= 18.x
- npm >= 8.x

### ⚙️ Cài đặt từng bước

#### 1. Clone repository
```bash
git clone https://github.com/ThanhTam-dvl/Website_TZBookStore_LaravelMysql.git
cd Website_TZBookStore_LaravelMysql
2. Cài dependencies
composer install
npm install

3. Cấu hình môi trường
cp .env.example .env
php artisan key:generate

4. Cấu hình database trong .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tzbookstore
DB_USERNAME=root
DB_PASSWORD=your_password

5. Tạo CSDL
mysql -u root -p -e "CREATE DATABASE tzbookstore;"

6. Chạy migration & seed (nếu không có file SQL)
php artisan migrate --seed
(Hoặc dùng SQL thủ công nếu có file bookstoredb.sql)

7. Biên dịch frontend
npm run build

8. Khởi chạy ứng dụng
php artisan serve
👉 Truy cập: http://localhost:8000

👤 Tài khoản demo
Người dùng:
Email: customer1@bookstore.com.vn
Mật khẩu: 123456

Quản trị viên:
Email: adminthanhtam@bookstore.com.vn
Mật khẩu: 123456

📁 Cấu trúc thư mục chính
app/
├── Http/
│   ├── Controllers/
│   │   ├── Backend/       # Quản trị
│   │   ├── Frontend/      # Khách hàng
│   │   └── Auth/          # Đăng nhập, đăng ký
├── Models/
database/
├── migrations/
├── seeders/
resources/
├── views/
│   ├── backend/
│   └── frontend/
routes/
├── web.php
🌐 Các route chính
Frontend
/ – Trang chủ

/products/{category} – Danh mục

/product/{id} – Chi tiết sách

/cart – Giỏ hàng

/checkout – Thanh toán

/orders/history – Đơn hàng

Backend (Admin)
/admin – Dashboard

/admin/products – Quản lý sách

/admin/orders – Quản lý đơn hàng

/admin/accounts – Quản lý người dùng

✅ Kiểm thử
Chạy các unit test:

php artisan test
🤝 Đóng góp
Fork repo

Tạo branch mới:

git checkout -b feature/tinh-nang-moi
Commit & push

Tạo pull request

🐞 Báo lỗi
Nếu phát hiện lỗi, vui lòng tạo Issue với:

Mô tả lỗi

Các bước tái hiện

Ảnh chụp (nếu có)

📄 Giấy phép
Dự án được phát hành theo MIT License.

📧 Liên hệ
Tác giả: Nguyễn Thành Tâm

Email: thanhtam106@gmail.com

🖼️ Demo ảnh
(Cập nhật các ảnh thực tế nếu có)

Trang chủ

Danh mục sản phẩm

Giỏ hàng

Dashboard admin
