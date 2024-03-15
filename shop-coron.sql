drop database if exists shopcoron;
create database shopcoron;
use shopcoron;

--
-- Cấu trúc bảng cho bảng `product`
-- 
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) default 0,
  `thumbnail` varchar(200),
  views int default 0,
  price_sale int default 0,
  `post_date` datetime default current_timestamp,
  `category_id` int(11) not null,
  PRIMARY KEY (`product_id`)
);

create table images (
	`image_id` int(11) NOT NULL AUTO_INCREMENT,
    `link` varchar(255),
    product_id int(11) not null,
    primary key (image_id)
);

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
);

-- --------------------------------------------------------

create table cart_item (
	`cart_item_id` int(11) NOT NULL AUTO_INCREMENT,
	`product_id` int(11) NOT NULL,
	quantity int default 1,
    user_id int(11) not null,
	primary key (cart_item_id)
);

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `register_date` date NOT NULL,
  `role` tinyint NOT NULL,
  PRIMARY KEY (`user_id`)
);

-- is_default:
-- 0: Thông tin dự phòng --> 1: Thông tin chính sử dụng để đặt hàng
CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200),
  is_default tinyint default 0,
  PRIMARY KEY (`contact_id`)
);

--
-- Cấu trúc bảng cho bảng `order`
	-- payment_status: 0 (Chưa thanh toán), 1 (Đã Thanh toán)
    -- order_status_id: 0 (chưa có bất kỳ trạng thái nào)
    -- payment_method_id: 0 (Chưa có bất kỳ phương thức thanh toán nào)
--

CREATE TABLE orders (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment_method_id` int(11) default 0,
  `contact_id` int(11) NOT NULL,
  `order_date` datetime,
  `payment_status` tinyint default 0,
  `order_status_id` int(11) default 0,
  PRIMARY KEY (`order_id`)
);


-- --------------------------------------------------------
CREATE TABLE `payment_method` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `method_name` varchar(100) NOT NULL,
  image varchar(255),
  PRIMARY KEY (`payment_method_id`)
);

CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`order_status_id`)
);

CREATE TABLE order_item (
  product_id int(11) NOT NULL,
  order_item_id int(11) NOT NULL AUTO_INCREMENT,
  price int not null,
  quantity int not null,
  order_id int(11) not null,
  PRIMARY KEY (`order_item_id`)
);

use shopcoron;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `product` (`name`, `description`, `price`, `thumbnail`, views, price_sale, `post_date`, category_id) VALUES
('Cây Dừa', 'Cây dừa là một trong những loại cây trồng phổ biến ở nhiều quốc gia nhiệt đới. Cây dừa cung cấp rất nhiều sản phẩm hữu ích như nước dừa, dừa khô, và dầu dừa.', 360000, 'img/products/cay-dua.jpg', 12, 300000, '2020-07-23 15:48:09', 2),
('Cây Xoài', 'Xoài là một loại cây ăn trái phổ biến trong nhiều vùng nhiệt đới và cung cấp trái ngọt, giàu dinh dưỡng. Cây xoài có thể được trồng dễ dàng và thu hoạch hàng năm.', 3490000, 'img/products/cay-xoai.jpg', 30, 3000000,'2020-07-21 19:19:36', 2),
('Cây Bưởi', 'Cây bưởi là loại cây ăn trái quen thuộc, mang lại trái bưởi ngọt, giàu vitamin và khoáng chất. Cây bưởi thích hợp cho việc trồng ở các vùng nhiệt đới và cận nhiệt đới.', 1250000, 'img/products/cay-buoi.jpg', 40, 1000000, '2020-07-21 19:23:16', 1),
('Cây Lúa Mạch', 'Lúa mạch là loại cây trồng cung cấp hạt giống được sử dụng cho việc sản xuất thực phẩm và chế biến. Lúa mạch cũng có thể được sử dụng làm thức ăn cho gia súc.', 8890000, 'img/products/cay-lua-mach.jpg', 35, 8500000,'2020-07-21 19:28:23', 2),
('Cây Dừa Cọ', 'Cây dừa cọ là một loại cây trồng phổ biến ở các vùng nhiệt đới và cung cấp nước dừa ngọt và hạt dừa giàu dinh dưỡng. Cây này thích hợp cho việc trồng ở khu vực ven biển.', 36000000, 'img/products/cay-dua-co.jpg', 55, 30000000, '2020-07-23 14:20:32', 1),
('Cây Cà Phê', 'Cây cà phê là loại cây trồng quan trọng trong ngành nông nghiệp, cung cấp hạt cà phê được sử dụng để pha chế đồ uống nổi tiếng khắp thế giới. Cây cà phê thích hợp cho việc trồng ở các vùng nhiệt đới.', 18990000, 'img/products/cay-ca-phe.jpg', 66, 18000000, '2020-07-21 19:33:15', 3),
('Cây Bắp', 'Bắp là một trong những loại cây lúa gạo quan trọng và được trồng rộng rãi trên toàn thế giới. Hạt bắp được sử dụng làm nguyên liệu chính cho nhiều món ăn và sản phẩm chế biến.', 4490000, 'img/products/cay-bap.jpg', 77, 4400000, '2020-07-23 15:52:57', 1),
('Cây Cải Bắp', 'Cải bắp là một loại cây rau cải được trồng phổ biến và cung cấp rất nhiều chất dinh dưỡng. Lá và cành của cây cải bắp thường được sử dụng trong ẩm thực và chế biến thực phẩm.', 4490000, 'img/products/cay-cai-bap.jpg', 80, 4400000, '2020-07-23 15:54:12', 3),
('Cây Dừa Nước', 'Cây dừa nước là loại cây phổ biến ở các vùng ven biển và cung cấp nước dừa mát lạnh cùng với thịt dừa giàu dinh dưỡng. Cây này thích hợp cho việc trồng ở vùng đất ngập nước.', 5990000, 'img/products/cay-dua-nuoc.jpg', 80, 4800000, '2020-07-23 15:55:13', 2),
('Cây Bí Đỏ', 'Bí đỏ là một loại cây rau củ được trồng để thu hoạch quả có màu đỏ vàng và thịt ngọt. Quả bí đỏ thường được sử dụng trong nhiều món ăn và đồ uống.', 6490000, 'img/products/cay-bi-do.jpg', 90, 5500000, '2020-07-23 15:56:28', 2),
('Cây Dứa', 'Dứa là một trong những loại cây ăn quả phổ biến ở các vùng nhiệt đới và cung cấp trái dứa ngọt, giàu vitamin và khoáng chất. Cây dứa thích hợp cho việc trồng ở khu vực có đất phù sa.', 21990000, 'img/products/cay-dua.jpg', 40, 15000000, '2020-07-23 15:57:44', 3),
('Cây Ổi', 'Ổi là loại cây ăn trái phổ biến ở nhiều quốc gia nhiệt đới và cung cấp trái ổi ngọt và thơm. Cây ổi thích hợp cho việc trồng ở các vùng đất phù sa và thoát nước tốt.', 6900000, 'img/products/cay-oi.jpg', 66, 6500000, '2020-07-23 15:58:14', 1),
('Cây Nho', 'Nho là một trong những loại cây ăn trái phổ biến trên thế giới và được sử dụng để làm nho khô, nho tươi và rượu vang. Cây nho thích hợp cho việc trồng ở các vùng nhiệt đới và ôn đới.', 11490000, 'img/products/cay-nho.jpg', 37, 10000000, '2020-07-23 15:59:28', 3),
('Cây Dừa Cây', 'Cây dừa cây là một loại cây trồng phổ biến ở các vùng ven biển và cung cấp nước dừa mát lạnh cùng với thịt dừa giàu dinh dưỡng. Cây này thích hợp cho việc trồng ở vùng đất phèn.', 3490000, 'img/products/cay-dua-cay.jpg', 49, 3000000, '2020-07-23 16:00:23', 1),
('Cây Dừa Xanh', 'Cây dừa xanh là loại cây trồng phổ biến ở các vùng ven biển và cung cấp nước dừa mát lạnh cùng với thịt dừa giàu dinh dưỡng. Cây này thích hợp cho việc trồng ở vùng đất phèn.', 5690000, 'img/products/cay-dua-xanh.jpg', 53, 3000000, '2020-07-23 16:01:26', 3),
('Cây Dừa Nước', 'Cây dừa nước là loại cây trồng phổ biến ở các vùng ven biển và cung cấp nước dừa mát lạnh cùng với thịt dừa giàu dinh dưỡng. Cây này thích hợp cho việc trồng ở vùng đất ngập nước.', 9990000, 'img/products/cay-dua-nuoc.jpg', 89, 9460000, '2020-07-23 16:03:30', 3),
('Cây Dừa Cây', 'Cây dừa cây là loại cây trồng phổ biến ở các vùng ven biển và cung cấp nước dừa mát lạnh cùng với thịt dừa giàu dinh dưỡng. Cây này thích hợp cho việc trồng ở vùng đất phèn.', 13900000, 'img/products/cay-dua-cay.jpg', 89, 12678000, '2020-07-22 09:30:01', 3);


INSERT INTO cart_item (product_id, quantity, user_id) VALUES
(1, 4, 2),
(2, 3, 2),
(3, 2, 2),
(3, 2, 5),
(4, 1, 4);

INSERT INTO category (name) VALUES
('Cây cảnh'),
('Cây ăn quả'),
('Cây công nghiệp');

-- Lấy `contact_id` từ bảng `user` để sử dụng khi chèn dữ liệu vào bảng `contact`
INSERT INTO `user` (`username`, fullname, `password`, `register_date`, `role`)
VALUES
('quocbao', "Nguyễn Quốc Bảo", '7c90dee826557e9a536a59daf64bf87c', '2024-03-08', 2),
('trimen', "Lê Văn Trí", 'e99a18c428cb38d5f260853678922e03', '2024-01-22', 1),
('admin', "Trần Thị Anh",'21232f297a57a5a743894a0e4a801fc3', '2023-03-11', 2),
('popop', "Đinh Thị Bông",'040d9b33af7249502cd6ec06c422755a', '2023-07-18', 1),
('hiphip', "Đinh Thị Bình",'040d9b33af7249502cd6ec06c422755a', '2023-09-15', 1),
('huejk', "Hoàng Thị Huê",'040d9b33af7249502cd6ec06c422755a', '2022-02-15', 1),
('khano', "Trịnh Xuân Khá",'040d9b33af7249502cd6ec06c422755a', '2023-04-19', 1),
('khoinghia', "Phạm Ngô Khởi",'040d9b33af7249502cd6ec06c422755a', '2024-01-15', 1),
('vankhoi', "Mạc Văn",'040d9b33af7249502cd6ec06c422755a', '2024-02-15', 1),
('chieutinh', "Lý Chiêu",'2f7f4bed2252e643280c377e52bb8fb2', '2023-01-08', 1);

-- Chèn dữ liệu vào bảng `contact`
INSERT INTO `contact` (`phone`, `email`, `address`, is_default, user_id)
VALUES
('0877787804', 'nqb2107@gmail.com', 'quan 1', 0, 1),
('0235412985', 'tringuyendb@gmail.com', 'quan 2', 0, 2),
('0984756574', 'tringuyendb@gmail.com', 'quan 5', 1, 2),
('0283423678', 'admin@gmail.com', 'quan 3', 1, 3),
('0123456789', 'anh@gmail.com', 'quan 4', 0, 3),
('0877787804', 'nguyenb072004@gmail.com', 'quan 5', 0, 4),
('0877787804', 'bvipvip@gmail.com', 'quan 3', 1, 4),
('0876653313', 'binhnguyen@gmail.com', 'quan 3', 1, 5),
('0876653313', 'hue123@gmail.com', 'quan 7', 1, 6),
('0889128797', 'khasd@gmail.com', 'quan 10', 1, 7);

-- Chèn dữ liệu vào bảng `payment_method`
INSERT INTO `payment_method` (`method_name`, image)
VALUES
('Thanh toán bằng tiền mặt', ''),
('Thanh toán bằng thẻ ATM thông qua Momo', '/img/payment/momo.png');

INSERT INTO `order_status` (`value`)
VALUES
('chờ xác nhận'),
('chưa giao hàng'),
('đang chờ giao hàng'),
('đã giao hàng'),
('hủy');

-- Payment

insert into orders (user_id, contact_id) values
(2, 3),
(4, 7),
(5, 8),
(6, 9),
(7, 10);

insert into order_item (product_id, quantity, order_id, price) values
(2, 3, 1, 3490000),
(7, 1, 3, 4400000),
(7, 3, 5, 4400000),
(2, 1, 3, 3490000),
(8, 2, 3, 4400000),
(2, 3, 5, 3490000),
(2, 5, 2, 3490000),
(7, 3, 1, 4400000),
(6, 4, 4, 18000000),
(5, 1, 4, 36000000),
(3, 2, 1, 1250000);


select * from user;
select * from payment_method;
select * from cart_item;
select * from orders;
-- select order_id from orders
-- where user_id = 2 and order_date is null;

select * from contact;
select * from order_item;
select * from orders;
select * from order_status;
select * from category;
select * from images;

-- select cart_item.product_id, quantity, price_sale from cart_item
--             inner join product 
--             on cart_item.product_id = product.product_id
--             where user_id = 2;
-- select thumbnail, name, order_item.price, quantity, order_id
--         from order_item inner join product
--         on order_item.product_id = product.product_id
--         where order_id = 2;
        