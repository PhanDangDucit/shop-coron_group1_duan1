drop database if exists shopcoron;
create database shopcoron;
use shopcoron;


CREATE TABLE `supplier` (
	`supplier_id` int(11) NOT NULL auto_increment,
	`name` varchar(255),
    phone varchar(15),
    `address` varchar(255),
    primary key (supplier_id)
);

CREATE TABLE `product_supplier` (
	`supplier_id` int(11) NOT NULL,
    product_id int(11) not null
);

--
-- Cấu trúc bảng cho bảng `product`
--
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `thumbnail` varchar(200),
  `image_id` int(11),
  `import_date` datetime,
  PRIMARY KEY (`product_id`)
);

create table images (
	`image_id` int(11) NOT NULL AUTO_INCREMENT,
    `link` varchar(255),
    primary key (image_id)
);

create table banner (
	`banner_id` int(11) NOT NULL AUTO_INCREMENT,
	`product_id` int(11) not null,
    name_banner varchar(150),
    link varchar(250),
    posted_banner_date datetime default current_timestamp,
    primary key (banner_id)
);

--
-- Cấu trúc bảng cho bảng `danhmuc`
--
CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `product_id`  int(11) NOT NULL
);

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
);

-- --------------------------------------------------------

create table cart_item (
	`cart_item_id` int(11) NOT NULL AUTO_INCREMENT,
	`cart_id` int(11) NOT NULL,
	`product_id` int(11) NOT NULL,
	quantity int,
	primary key (cart_item_id)
);

create table cart (
	`cart_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    primary key (cart_id)
);

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `register_date` date NOT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`user_id`)
);

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200),
  PRIMARY KEY (`contact_id`)
);

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE orders (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment_method_id` int(11) default 1,
  `contact_id` int(11) NOT NULL,
  `order_date` datetime,
  `total_price` int,
  `payment_status_id` int(11) default 1,
  `ship_status_id` int(11) default 1,
  PRIMARY KEY (`order_id`)
);


-- --------------------------------------------------------
CREATE TABLE `payment_method` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `method_name` varchar(100) NOT NULL,
  link varchar(255),
  PRIMARY KEY (`payment_method_id`)
);



CREATE TABLE `payment_status` (
  `payment_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`payment_status_id`)
);

CREATE TABLE `ship_status` (
  `ship_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`ship_status_id`)
);

CREATE TABLE `order_item` (
  `product_id` int(11) NOT NULL,
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  quantity int not null,
  order_id int(11) not null,
  PRIMARY KEY (`order_item_id`)
);

INSERT INTO `cart` (`user_id`) VALUES
(1),
(2),
(3),
(4);

INSERT INTO `cart_item` (cart_id, product_id, quantity) VALUES
(1, 1, 4),
(1, 2, 3),
(2, 3, 2),
(3, 3, 2),
(4, 4, 1);

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`product_id`, link) VALUES
(1,'img/banners/banner1.jpg'),
(2, 'img/banners/banner2.jpg'),
(1,'img/banners/banner3.jpg'),
(2,'img/banners/banner4.jpg');


-- INSERT INTO `images` (`link`) VALUES
-- ('img/products/product1_1.jpg'),
-- ('img/products/product1.jpg');

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

-- INSERT INTO `chitiethoadon` (`order_id`, `product_id`, `quantity`, `price`) VALUES
-- (1, 56, 1, 8590000),
-- (1, 21, 1, 2290000),
-- (2, 44, 1, 39900000),
-- (2, 49, 1, 32000),
-- (3, 44, 1, 39900000),
-- (3, 49, 1, 32000),
-- (4, 44, 1, 39900000),
-- (4, 49, 1, 32000),
-- (6, 39, 1, 850000),
-- (6, 57, 1, 14490000),
-- (7, 39, 1, 850000),
-- (7, 56, 1, 8590000),
-- (8, 56, 1, 8590000),
-- (9, 12, 1, 6900000),
-- (11, 39, 1, 850000),
-- (11, 1, 2, 360000);


--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `category` (`name`) VALUES
('Cây cảnh'),
('Cây ăn quả'),
('Cây công nghiệp');

INSERT INTO `product_category` (`category_id`, product_id) VALUES
(1, 1),
(1, 3),
(2, 2),
(3, 2);



-- --
-- -- Đang đổ dữ liệu cho bảng `hoadon`
-- --
-- INSERT INTO `hoadon` (`MaHD`, `MaND`, `NgayLap`, `NguoiNhan`, `SDT`, `DiaChi`, `PhuongThucTT`, `TongTien`, `TrangThai`) VALUES
-- (1, 1, '2022-03-08 10:30:00', 'Nguyễn Văn A', '0987654321', '123 Đường ABC', 'Thanh toán khi nhận hàng', 1500000, 'Đã thanh toán'),
-- (2, 2, '2022-03-07 15:45:00', 'Trần Thị B', '0976543210', '456 Đường XYZ', 'Chuyển khoản', 2500000, 'Đã thanh toán'),
-- (3, 3, '2022-03-06 08:20:00', 'Lê Văn C', '0965432109', '789 Đường KLM', 'Thanh toán bằng thẻ', 1800000, 'Chưa thanh toán'),
-- (4, 4, '2022-03-05 11:10:00', 'Phạm Thị D', '0954321098', '234 Đường NOP', 'Thanh toán khi nhận hàng', 2100000, 'Chưa thanh toán'),
-- (5, 5, '2022-03-04 14:50:00', 'Hoàng Văn E', '0943210987', '567 Đường QRS', 'Chuyển khoản', 3000000, 'Chưa thanh toán'),
-- (6, 6, '2022-03-03 17:20:00', 'Trần Thị F', '0932109876', '890 Đường TUV', 'Thanh toán khi nhận hàng', 2200000, 'Đã thanh toán'),
-- (7, 7, '2022-03-02 09:15:00', 'Nguyễn Văn G', '0921098765', '901 Đường WXY', 'Chuyển khoản', 2600000, 'Chưa thanh toán'),
-- (8, 8, '2022-03-01 13:00:00', 'Lê Thị H', '0910987654', '234 Đường ZAB', 'Thanh toán khi nhận hàng', 1900000, 'Chưa thanh toán'),
-- (9, 9, '2022-02-28 16:40:00', 'Phạm Văn I', '0909876543', '345 Đường CDE', 'Chuyển khoản', 2800000, 'Đã thanh toán'),
-- (10, 10, '2022-02-27 20:55:00', 'Hoàng Thị K', '0898765432', '456 Đường EFG', 'Thanh toán khi nhận hàng', 3300000, 'Chưa thanh toán'),
-- (11, 11, '2022-02-26 22:25:00', 'Trần Văn L', '0887654321', '567 Đường GHI', 'Chuyển khoản', 2400000, 'Đã thanh toán'),
-- (12, 12, '2022-02-25 08:10:00', 'Lê Thị M', '0876543210', '678 Đường JKL', 'Thanh toán khi nhận hàng', 2700000, 'Chưa thanh toán'),
-- (13, 13, '2022-02-24 11:35:00', 'Nguyễn Văn N', '0865432109', '789 Đường MNO', 'Chuyển khoản', 3100000, 'Chưa thanh toán');


--
-- Đang đổ dữ liệu cho bảng `product`
--

-- INSERT INTO `product` (`name`, `thumnail`, `description`, `category_id`) VALUES
-- ('Cây Cam', 'cam.jpg', 'Cây Cam giúp tạo không gian xanh tươi trong nhà.', 1),
-- ('Cây Dừa', 'dua.jpg', 'Cây Dừa mang lại cảm giác nhiệt đới và tạo bóng mát.', 1),
-- ('Cây Xoài', 'xoai.jpg', 'Cây Xoài cho trái ngon và giàu dinh dưỡng.', 1),
-- ('Cây Bưởi', 'buoi.jpg', 'Cây Bưởi sản xuất trái ngon và giàu vitamin C.', 1),
-- (5, 'Cây Sầu Riêng', 'saurieng.jpg', 'Cây Sầu Riêng mang lại hương vị đặc trưng và thơm ngon.', 1),
-- (6, 'Cây Lúa Mì', 'luami.jpg', 'Cây Lúa Mì là nguồn cung cấp nguồn dinh dưỡng chính trong thực phẩm.', 1),
-- (7, 'Cây Cà Phê', 'caphe.jpg', 'Cây Cà Phê sản xuất hạt cà phê ngon và đậm đà.', 1),
-- (8, 'Cây Hoa Hồng', 'hoahong.jpg', 'Cây Hoa Hồng là biểu tượng của tình yêu và sự lãng mạn.', 1),
-- (9, 'Cây Cỏ May Mắn', 'comayman.jpg', 'Cây Cỏ May Mắn mang lại may mắn và tài lộc cho gia đình.', 1),
-- (10, 'Cây Lúa', 'lua.jpg', 'Cây Lúa là loại cây quan trọng cung cấp nguồn lương thực chính.', 1),
-- (11, 'Cây Hồng', 'hong.jpg', 'Cây Hồng cho trái ngọt và giàu vitamin C.', 1),
-- (12, 'Cây Ổi', 'oi.jpg', 'Cây Ổi mang lại trái ngọt và thơm.', 1),
-- (13, 'Cây Đu Đủ', 'dudu.jpg', 'Cây Đu Đủ cho trái giàu vitamin và dinh dưỡng.', 1),
-- (14, 'Cây Dừa Nước', 'duanuoc.jpg', 'Cây Dừa Nước tạo ra nước dừa ngon và bổ dưỡng.', 1),
-- (15, 'Cây Nho', 'nho.jpg', 'Cây Nho sản xuất trái ngon và là nguồn cung cấp chất chống oxi hóa.', 1),
-- (16, 'Cây Đào', 'dao.jpg', 'Cây Đào cho trái mọng và giàu vitamin.', 1),
-- (17, 'Cây Lúa Mạch', 'luamach.jpg', 'Cây Lúa Mạch cung cấp hạt mạch giàu protein và chất xơ.', 1),
-- (18, 'Cây Rau Mầm', 'raumam.jpg', 'Cây Rau Mầm là nguồn cung cấp vitamin và khoáng chất tốt cho sức khỏe.', 1),
-- (19, 'Cây Dâu Tây', 'dautay.jpg', 'Cây Dâu Tây cho trái ngọt và giàu vitamin C.', 1),
-- (20, 'Cây Bí Ngô', 'bingo.jpg', 'Cây Bí Ngô sản xuất trái ngon và giàu vitamin.', 1),
-- (21, 'Cây Dừa Cảnh', 'duacanh.jpg', 'Cây Dừa Cảnh tạo cảnh quan xanh mát và dễ thương.', 1);


--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--
-- Lấy `contact_id` từ bảng `user` để sử dụng khi chèn dữ liệu vào bảng `contact`
INSERT INTO `user` (`contact_id`, `username`, `password`, `register_date`, `role`)
VALUES
(1, 'quocbao', '7c90dee826557e9a536a59daf64bf87c', '2024-03-08', 2),
(2, 'trimen', 'e99a18c428cb38d5f260853678922e03', '2024-03-08', 1),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2024-03-08', 2),
(4, '123456', '040d9b33af7249502cd6ec06c422755a', '2024-03-08', 1),
(5, 'quocbao', 'fcea920f7412b5da7be0cf42b8c93759', '2024-03-08', 2),
(6, '1234567', '2f7f4bed2252e643280c377e52bb8fb2', '2024-03-08', 1);

-- Chèn dữ liệu vào bảng `contact`
INSERT INTO `contact` (`fullname`, `phone`, `email`, `address`)
VALUES
('Nguyen Quoc Bao', '0877787804', 'nqb2107@gmail.com', 'quan 1'),
('Nguyen Tri', '02354129852', 'tringuyendb@gmail.com', 'quan 2'),
('admin admin', '0283423678', 'admin@gmail.com', 'quan 3'),
('a c', '0123456789', 'a@gmail.com', 'quan 4'),
('Nguyen Quoc Bao', '0877787804', 'nguyenquocbao072004@gmail.com', 'quan 5'),
('Bao nguyen', '08766533134', 'bao1@gmail.com', 'quan 2');

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `product` (`name`, `description`, `price`, `thumbnail`, `import_date`) VALUES
('Cây Dừa', 'Cây dừa là một trong những loại cây trồng phổ biến ở nhiều quốc gia nhiệt đới. Cây dừa cung cấp rất nhiều sản phẩm hữu ích như nước dừa, dừa khô, và dầu dừa.', 360000, 'img/products/cay-dua.jpg', '2020-07-23 15:48:09'),
('Cây Xoài', 'Xoài là một loại cây ăn trái phổ biến trong nhiều vùng nhiệt đới và cung cấp trái ngọt, giàu dinh dưỡng. Cây xoài có thể được trồng dễ dàng và thu hoạch hàng năm.', 3490000, 'img/products/cay-xoai.jpg', '2020-07-21 19:19:36'),
('Cây Bưởi', 'Cây bưởi là loại cây ăn trái quen thuộc, mang lại trái bưởi ngọt, giàu vitamin và khoáng chất. Cây bưởi thích hợp cho việc trồng ở các vùng nhiệt đới và cận nhiệt đới.', 1250000, 'img/products/cay-buoi.jpg', '2020-07-21 19:23:16'),
('Cây Lúa Mạch', 'Lúa mạch là loại cây trồng cung cấp hạt giống được sử dụng cho việc sản xuất thực phẩm và chế biến. Lúa mạch cũng có thể được sử dụng làm thức ăn cho gia súc.', 8890000, 'img/products/cay-lua-mach.jpg', '2020-07-21 19:28:23'),
('Cây Dừa Cọ', 'Cây dừa cọ là một loại cây trồng phổ biến ở các vùng nhiệt đới và cung cấp nước dừa ngọt và hạt dừa giàu dinh dưỡng. Cây này thích hợp cho việc trồng ở khu vực ven biển.', 36000000, 'img/products/cay-dua-co.jpg', '2020-07-23 14:20:32'),
('Cây Cà Phê', 'Cây cà phê là loại cây trồng quan trọng trong ngành nông nghiệp, cung cấp hạt cà phê được sử dụng để pha chế đồ uống nổi tiếng khắp thế giới. Cây cà phê thích hợp cho việc trồng ở các vùng nhiệt đới.', 18990000, 'img/products/cay-ca-phe.jpg', '2020-07-21 19:33:15'),
('Cây Bắp', 'Bắp là một trong những loại cây lúa gạo quan trọng và được trồng rộng rãi trên toàn thế giới. Hạt bắp được sử dụng làm nguyên liệu chính cho nhiều món ăn và sản phẩm chế biến.', 4490000, 'img/products/cay-bap.jpg', '2020-07-23 15:52:57'),
('Cây Cải Bắp', 'Cải bắp là một loại cây rau cải được trồng phổ biến và cung cấp rất nhiều chất dinh dưỡng. Lá và cành của cây cải bắp thường được sử dụng trong ẩm thực và chế biến thực phẩm.', 4490000, 'img/products/cay-cai-bap.jpg', '2020-07-23 15:54:12'),
('Cây Dừa Nước', 'Cây dừa nước là loại cây phổ biến ở các vùng ven biển và cung cấp nước dừa mát lạnh cùng với thịt dừa giàu dinh dưỡng. Cây này thích hợp cho việc trồng ở vùng đất ngập nước.', 5990000, 'img/products/cay-dua-nuoc.jpg', '2020-07-23 15:55:13'),
('Cây Bí Đỏ', 'Bí đỏ là một loại cây rau củ được trồng để thu hoạch quả có màu đỏ vàng và thịt ngọt. Quả bí đỏ thường được sử dụng trong nhiều món ăn và đồ uống.', 6490000, 'img/products/cay-bi-do.jpg', '2020-07-23 15:56:28'),
('Cây Dứa', 'Dứa là một trong những loại cây ăn quả phổ biến ở các vùng nhiệt đới và cung cấp trái dứa ngọt, giàu vitamin và khoáng chất. Cây dứa thích hợp cho việc trồng ở khu vực có đất phù sa.', 21990000, 'img/products/cay-dua.jpg', '2020-07-23 15:57:44'),
('Cây Ổi', 'Ổi là loại cây ăn trái phổ biến ở nhiều quốc gia nhiệt đới và cung cấp trái ổi ngọt và thơm. Cây ổi thích hợp cho việc trồng ở các vùng đất phù sa và thoát nước tốt.', 6900000, 'img/products/cay-oi.jpg', '2020-07-23 15:58:14'),
('Cây Nho', 'Nho là một trong những loại cây ăn trái phổ biến trên thế giới và được sử dụng để làm nho khô, nho tươi và rượu vang. Cây nho thích hợp cho việc trồng ở các vùng nhiệt đới và ôn đới.', 11490000, 'img/products/cay-nho.jpg', '2020-07-23 15:59:28'),
('Cây Dừa Cây', 'Cây dừa cây là một loại cây trồng phổ biến ở các vùng ven biển và cung cấp nước dừa mát lạnh cùng với thịt dừa giàu dinh dưỡng. Cây này thích hợp cho việc trồng ở vùng đất phèn.', 3490000, 'img/products/cay-dua-cay.jpg', '2020-07-23 16:00:23'),
('Cây Dừa Xanh', 'Cây dừa xanh là loại cây trồng phổ biến ở các vùng ven biển và cung cấp nước dừa mát lạnh cùng với thịt dừa giàu dinh dưỡng. Cây này thích hợp cho việc trồng ở vùng đất phèn.', 5690000, 'img/products/cay-dua-xanh.jpg', '2020-07-23 16:01:26'),
('Cây Dừa Nước', 'Cây dừa nước là loại cây trồng phổ biến ở các vùng ven biển và cung cấp nước dừa mát lạnh cùng với thịt dừa giàu dinh dưỡng. Cây này thích hợp cho việc trồng ở vùng đất ngập nước.', 9990000, 'img/products/cay-dua-nuoc.jpg', '2020-07-23 16:03:30'),
('Cây Dừa Cây', 'Cây dừa cây là loại cây trồng phổ biến ở các vùng ven biển và cung cấp nước dừa mát lạnh cùng với thịt dừa giàu dinh dưỡng. Cây này thích hợp cho việc trồng ở vùng đất phèn.', 13900000, 'img/products/cay-dua-cay.jpg', '2020-07-22 09:30:01');

-- CREATE TABLE `khuyenmai` (
--   `MaKM` int(11) NOT NULL AUTO_INCREMENT,
--   `TenKM` varchar(100) NOT NULL,
--   `LoaiKM` varchar(20) NOT NULL,
--   `GiaTriKM` float NOT NULL,
--   `NgayBD` datetime NOT NULL,
--   `TrangThai` int(11) NOT NULL,
--   PRIMARY KEY (`MaKM`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

-- CREATE TABLE `hoadon` (
--   `MaHD` int(11) NOT NULL AUTO_INCREMENT,
--   `MaND` int(11) NOT NULL,
--   `NgayLap` datetime NOT NULL,
--   `NguoiNhan` varchar(50) NOT NULL,
--   `SDT` varchar(20) NOT NULL,
--   `DiaChi` varchar(100) NOT NULL,
--   `PhuongThucTT` varchar(20) NOT NULL,
--   `TongTien` float NOT NULL,
--   `TrangThai` varchar(70) NOT NULL,
--   PRIMARY KEY (`MaHD`),
--   FOREIGN KEY (`MaND`) REFERENCES `User`(`MaND`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Chèn dữ liệu vào bảng `payment_method`
INSERT INTO `payment_method` (`method_name`, link)
VALUES
('none', ''),
('Thanh toán bằng tiền mặt', ''),
('Thanh toán bằng thẻ ATM thông qua Momo', '');

INSERT INTO `payment_status` (`value`)
VALUES
('chưa thanh toán'),
('đã thanh toán');

INSERT INTO `ship_status` (`value`)
VALUES
('chưa giao hàng'),
('đang chờ'),
('đã giao hàng');


select * from user;
select * from payment_method;
select * from banner;
select * from cart;
select * from cart_item;
select * from orders;
select order_id from orders
where user_id = 2 and order_date is null;
select * from contact;
select * from order_item;
select * from payment_status;
select * from ship_status;
select * from supplier;
select * from product_supplier;
select * from category;
select * from product_category;
select * from images;

-- select cart.cart_id, sum(quantity * price) as "thanhtien"  from cart
-- inner join cart_item
-- on cart.cart_id = cart_item.cart_id
-- inner join product
-- on product.product_id = cart_item.product_id
-- where cart.cart_id = 1;

-- select cart.cart_id, quantity, price, cart_item.product_id  from cart
-- inner join cart_item
-- on cart.cart_id = cart_item.cart_id
-- inner join product
-- on product.product_id = cart_item.product_id
-- where cart.cart_id = 1;

-- select *  from cart
-- inner join cart_item
-- on cart.cart_id = cart_item.cart_id
-- inner join product
-- on product.product_id = cart_item.product_id;