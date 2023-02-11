# Hướng dẫn cài đặt
## Môi trường
1. cài đặt XAMPP
- hướng dẫn cài đặt trên window: https://bom.so/e3Gwaq
- hướng dẫn cài đặt trên linux: https://bom.so/HKvE7v
- hướng dẫn cài đặt trên macOs: https://bom.so/KPykcK		
2. cài đặt composer
- link tải composer: https://getcomposer.org/
3. cài đặt Visual Studio Code
- hướng dẫn cài đặt: https://bom.so/zFUj8v

## Clone source code
- link : https://github.com/bachhoang0606/struct_programming_project.git
- git clone https://github.com/bachhoang0606/struct_programming_project.git
- cd struct_programming_project
- composer install
- cp .env.example .env
- php artisan key:generate

## Hướng dẫn chạy ứng dụng trên local
1. Bước 1: thêm thư mục vào Visual Studio Code: 
mở Visual Studio Code, sau đó chọn file > add folder to workspace rồi chọn thư mục đã clone ở trên
2. Bước 2: chọn terminal > new terminal sau đó sẽ hiện ra 1 terminal ở dưới
3. Bước 3: tạo database: 
chạy lần lượt từng lệnh trong terminal :
    php artisan migrate
    php artisan db:seed
    php artisan db:seed --class=CoinCardSeeder
    php artisan db:seed --class=ProductAttributeSeeder
    php artisan db:seed --class=UserVoucherSeeder
    php artisan db:seed --class=VoucherTypeSeeder
4. Bước 4: Reset database
Tiếp tục chạy các lệnh:
	php artisan migrate:fresh
	php artisan db:seed	
5. Bước 5: Bật XAMPP
6. Bước 6: chạy lệnh php artisan server. sau đó truy cập http://127.0.0.1:8000