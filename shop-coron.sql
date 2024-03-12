drop database if exists shopcoron;
create database shopcoron;
use shopcoron;

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) default 0,
  `thumbnail` varchar(200),
  `image_id` int(11),
  `import_date` datetime,
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
  `role` int NOT NULL,
  PRIMARY KEY (`user_id`)
);

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200),
  is_default bool default 0,
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
  `payment_status_id` int(11) default 1,
  `order_status_id` int(11) default 1,
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

CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`order_status_id`)
);

CREATE TABLE order_item (
  product_id int(11) NOT NULL,
  order_item_id int(11) NOT NULL AUTO_INCREMENT,
  price int,
  quantity int not null,
  order_id int(11) not null,
  PRIMARY KEY (`order_item_id`)
);


select * from user;
select * from payment_method;
select * from cart_item;
select * from orders;
select order_id from orders
where user_id = 2 and order_date is null;

select * from contact;
select * from order_item;
select * from payment_status;
select * from order_status;
select * from category;
select * from images;
