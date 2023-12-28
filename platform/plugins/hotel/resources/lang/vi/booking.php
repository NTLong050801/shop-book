<?php

return [
    'name' => 'Đặt phòng',
    'create' => 'Đặt phòng mới',
    'edit' => 'Chỉnh sửa đặt phòng',
    'statuses' => [
        'pending' => 'Chờ xử lý',
        'processing' => 'Đang xử lý',
        'completed' => 'Hoàn thành',
        'cancelled' => 'Hủy bỏ',
    ],
    'amount' => 'Số tiền',
    'customer' => 'Khách hàng',
    'room' => 'Phòng',
    'booking_information' => 'Thông tin đặt phòng',
    'time' => 'Thời gian',
    'full_name' => 'Họ và tên',
    'email' => 'Email',
    'phone' => 'Điện thoại',
    'address' => 'Địa chỉ',
    'arrival_time' => 'Thời gian đến',
    'start_date' => 'Ngày bắt đầu',
    'end_date' => 'Ngày kết thúc',
    'settings' => [
        'email' => [
            'title' => 'Đặt phòng',
            'description' => 'Cấu hình email đặt phòng',
            'templates' => [
                'notice_title' => 'Gửi thông báo cho quản trị viên',
                'notice_description' => 'Mẫu email để gửi thông báo cho quản trị viên khi hệ thống có đặt phòng mới',
                'booking_success_title' => 'Gửi email cho khách hàng',
                'booking_success_description' => 'Mẫu email để gửi email cho khách hàng xác nhận đặt phòng',
            ],
        ],
    ],
    'new_booking_notice' => 'Bạn có <span class="bold">:count</span> đặt phòng mới',
    'view_all' => 'Xem tất cả',
    'payment_method' => 'Phương thức thanh toán',
    'payment_status_label' => 'Trạng thái thanh toán',
    'booking_period' => 'Thời gian đặt phòng',
];
