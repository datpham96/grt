<?php

namespace App\Libs\Config;

class StatusCodeConfig {

    //STATUS VALIDATE
    const CONST_VALIDATE_EMAIL = 'Email không được bỏ trống';
    const CONST_VALIDATE_ACCOUNT = 'Tài khoản không được bỏ trống';
    const CONST_VALIDATE_ACCOUNT_DUPPLICATE = 'Tài khoản đã tồn tại';
    const CONST_VALIDATE_CAPTCHA = 'Mã captcha không được bỏ trống';
    const CONST_VALIDATE_CHECK_CAPTCHA = 'Mã captcha không đúng';
    const CONST_VALIDATE_TITLE = 'Tiêu đề không được để trống';
    const CONST_VALIDATE_PHONE = 'Điện thoại không được bỏ trống';
    const CONST_VALIDATE_NAME = 'Họ tên không được bỏ trống';
    const CONST_VALIDATE_LINK = 'Link liên kết không được bỏ trống';
    const CONST_VALIDATE_CONTENT = 'Nội dung không được bỏ trống';
    const CONST_VALIDATE_PARENT_ID = 'Chuyên mục không được bỏ trống';
    const CONST_VALIDATE_DESCRIPTION = 'Mô tả không được bỏ trống';
    const CONST_VALIDATE_EMAIL_DUPLICATE = 'Email đã tồn tại';
    const CONST_VALIDATE_PASSWORD = 'Mật khẩu không được bỏ trống';
    const CONST_VALIDATE_ERRORS = 'Xảy ra lỗi hệ thống';
    const CONST_VALIDATE_LOGIN_ERRORS = 'Sai tài khoản hoặc mật khẩu';

    const CONST_STATUS_USER_NOT_EXISTS = 'Người dùng không tồn tại';
    const CONST_STATUS_NEW_PASSWORD_NOT_EMPTY = 'Mật khẩu mới không được để trống';

    const CONST_STATUS_ID_NOT_EMPTY = 'Id không được bỏ trống';
    const CONST_STATUS_ID_NOT_EXISTS = 'Id không tồn tại';

    const CONST_STATUS_PAGE_NOT_EMPTY = 'Số trang không được để trống';
    const CONST_STATUS_PAGE_FORMAT_ERR = 'Số trang phải là số';

    const CONST_STATUS_CHECK_ID_CATEGORY_EXISTS = "Không thể xóa chuyên mục";
    const CONST_STATUS_CHECK_ID_POST_EXISTS = "Không thể xóa bài viết";
}