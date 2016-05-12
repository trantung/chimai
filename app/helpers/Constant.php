<?php
//permission role
define('ADMIN', 1);
define('EDITOR', 2);
define('SEO', 3);
define('SERVICE', 4);
define('WRITER', 5);
//define attach, detach, sync
define('ATTACH', 1);
define('DETACH', 2);
define('SYNC', 3);
//disable or enable
define('ENABLED', 1);
define('DISABLED', 2);
define('ACTIVE', 1);
define('INACTIVE', 2);
define('ACTIVEUSER', 'Kích hoạt');
define('INACTIVEUSER', 'Chưa kích hoạt');
//user type
define('TYPESYSTEM', 'Hệ thống');
define('TYPEFACEBOOK', 'Facebook');
define('TYPEGOOGLE', 'Google');
//device
define('MOBILE', 1);
define('COMPUTER', 2);
//pagination manager admin
define('PAGINATE', 20);
//pagination frontend
define('FRONENDPAGINATE', 16);
define('FRONENDPAGINATE_NEWS', 7);
//url upload img
define('UPLOADIMG', '/images');
define('UPLOADPDF', '/pdf');
//url upload boxtype, boxcollection, boxproduct, boxpromotion
define('BOXTYPE', '/box_type');
define('BOXCOLLECTION', '/box_collection');
define('BOXPRODUCT', '/box_product');
define('BOXPROMOTION', '/box_promotion');

define('MENU', 1);
define('CONTENT', 2);
define('FOOTER', 3);
define('VI', 'vi');
define('EN', 'en');
define('FR', 'fr');
define('CN', 'cn');

//products size image to width & height
define('IMAGE_WIDTH', 600);
define('IMAGE_HEIGHT', 450);
//product detail slide color
define('IMAGE_PRODUCT_WIDTH', 600);
define('IMAGE_PRODUCT_HEIGHT', 450);
//product detail slide color
define('IMAGE_PRODUCT_COLOR_WIDTH', 900);
define('IMAGE_PRODUCT_COLOR_HEIGHT', 900);
//product picture
define('IMAGE_PRODUCT_PICTURE_WIDTH', 1000);
define('IMAGE_PRODUCT_PICTURE_HEIGHT', 800);
//banner slider
define('IMAGE_SLIDE_WIDTH', 1350);
define('IMAGE_SLIDE_HEIGHT', 540);
//home box size
define('IMAGE_HOME_WIDTH', 420);
define('IMAGE_HOME_HEIGHT', 300);
//partner size
define('IMAGE_PARTNER_WIDTH', 140);
define('IMAGE_PARTNER_HEIGHT', 70);
//catalogue size
define('IMAGE_CATALOG_WIDTH', 400);
define('IMAGE_CATALOG_HEIGHT', 550);
//gallery size
define('IMAGE_GALLERY_WIDTH', 800);
define('IMAGE_GALLERY_HEIGHT', 600);

//mode image
define('IMAGE_MODE_FIT', 'fit');
define('IMAGE_MODE_FILL', 'fill');

//default lat long
define('DEFAULT_LAT', '21.045384');
define('DEFAULT_LONG', '105.805123');

//define type config code
define('LAT', 1);
define('LONG', 2);
define('LOGO', 3);
define('CHAT_SCRIPT', 4);
define('HOTLINE_PHONE', 5);
define('FOOTER_TEXT', 6);
define('SOCIAL_URL_FACEBOOK',7);
define('SOCIAL_URL_GOOGLE', 8);
define('SOCIAL_URL_INSTAGRAM', 9);
define('CONTACT_ADDRESS', 10);
define('CONTACT_PHONE', 11);
define('CONTACT_EMAIL', 12);
define('CONTACT_WORKING_TIME', 13);

// type of slide
define('SLIDE_BANNER', 'Banner trang chủ');
define('SLIDE_PARTNER', 'Logo đối tác');
define('SLIDE_BANNER_VALUE', 1);
define('SLIDE_PARTNER_VALUE', 2);

// type contact
define('CONTACT_TYPE_NORMAL', 1);
define('CONTACT_TYPE_PRODUCT', 2);
define('CONTACT_TYPE_NEWSLETTER', 3);
define('CONTACT_TYPE_RECRUITMENT', 4);

//define seo default (Script+meta):
define('SEO_DEFAULT', 'Seo_Default');

//cache time
define('CACHETIME', 1);

//unique_salt for ajax upload images
define('UNIQUE_SALT', '1458397504');

//product images type: color + picture
define('PRODUCT_COLOR', 1);
define('PRODUCT_PICTURE', 2);
//product images folder: color + picture
define('UPLOAD_FOLDER_COLOR', 'ProductColor');
define('UPLOAD_FOLDER_PICTURE', 'ProductPicture');
//lấy 5 tin trang giói thiêu(box type)
define('TAKE_NUMBER_BOX_TYPE', 5);
//so luong tin sidebar
define('NUMBER_NEWS_SIDEBAR', 5);

// don vi tien te
define('PRICE_UNIT', 'vnđ');

//payment value
//Thanh toán trực tiếp khi giao hàng
define('PAYMENT1', 1);
//Thanh toán qua ngân hàng
define('PAYMENT2', 2);
//Thanh toán bằng thẻ
define('PAYMENT3', 3);

//order status
//cho xu ly
define('ORDER_STATUS_1', 1);
//cho giao hang
define('ORDER_STATUS_2', 2);
//cho giao hang lan 2
define('ORDER_STATUS_3', 3);
//da thanh toan
define('ORDER_STATUS_4', 4);
//huy hoa don
define('ORDER_STATUS_5', 5);

//company
define('COMPANY_NAME', 'Công ty cổ phần thương mại đầu tư Toàn Cầu');
