<?php

namespace App\Libs\Config;

class StatusCodeConfig {

    //STATUS VALIDATE
    const CONST_VALIDATE_EMAIL = 'Email không được bỏ trống';
    const CONST_VALIDATE_PHONE = 'Điện thoại không được bỏ trống';
    const CONST_VALIDATE_NAME = 'Họ tên không được bỏ trống';
    const CONST_VALIDATE_EMAIL_DUPLICATE = 'Email đã tồn tại';
    const CONST_VALIDATE_PASSWORD = 'Mật khẩu không được bỏ trống';
    const CONST_VALIDATE_ERRORS = 'Xảy ra lỗi hệ thống';
    const CONST_VALIDATE_LOGIN_ERRORS = 'Sai tài khoản hoặc mật khẩu';

    const CONST_STATUS_USER_NOT_EXISTS = 'Người dùng không tồn tại';
    const CONST_STATUS_NEW_PASSWORD_NOT_EMPTY = 'Mật khẩu mới không được để trống';
}