<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Hotel\Models\Booking;
use Botble\Hotel\Models\BookingAddress;
use Botble\Hotel\Models\BookingRoom;
use Botble\Hotel\Models\Place;
use Botble\Hotel\Models\Room;
use Botble\Hotel\Models\RoomCategory;
use Botble\Hotel\Models\RoomOption;
use Botble\Hotel\Models\RoomOptionCategory;
use Botble\Hotel\Models\Voucher;
use Botble\Slug\Models\Slug;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Botble\Slug\Facades\SlugHelper;

class RoomSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('products');

        Room::query()->truncate();
        RoomOptionCategory::query()->truncate();
        RoomOption::query()->truncate();
        Voucher::query()->truncate();

        $rooms = [
            [
                'name' => 'FLC Hạ Long Bay Golf Club',
                'description' => 'Tận hưởng dịch vụ đỉnh cao, đẳng cấp thế giới tại FLC Halong Bay Golf Club & Luxury Resort',
                'content' => 'Tọa lạc ở thành phố Hạ Long, FLC Halong Bay Golf Club & Luxury Resort có khu vườn, sân hiên, nhà hàng và quầy bar. Khách sạn 5 sao này có WiFi miễn phí, CLB trẻ em và dịch vụ phòng. Chỗ nghỉ cấm hút thuốc và nằm cách Bảo tàng Quảng Ninh 1,9 km.',
                'is_featured' => true,
                'room_category_id' => RoomCategory::first()->value('id'),
                'place_id' => Place::first()->value('id'),
                'images' => json_encode([
                    'products/pro-1.png',
                    'products/pro-2.png',
                    'products/pro-3.png',
                    'products/pro-4.png',
                    'products/pro-5.png',
                    'products/pro-6.png',
                ]),
                'price' => 14000000,
                'rating' => rand(1, 5),
                'address' => 'Đảo Rều, Bãi Cháy',
                'map' => '<iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.964361829725!2d107.10965241151415!3d20.953946280596124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a5743d857234b%3A0xf6120745cdb839f1!2sFLC%20Ha%20Long%20Bay!5e0!3m2!1svi!2s!4v1697911130720!5m2!1svi!2s"
              width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'check_in_time' => '14:00',
                'check_out_time' => '12:00',
                'children_policies' => '- Miễn phí 1 trẻ dưới 5 tuổi ngủ chung, trẻ thứ 2 phụ thu 550,000 VNĐ/đêm
- Trẻ từ 5 - 11 tuổi phụ thu ngủ chung 2,585,000 VNĐ/trẻ/đêm
- Trẻ từ 5 - 11 tuổi phụ thu giường phụ 3.218,000 VNĐ/trẻ/đêm
- Từ 12 tuổi trở lên tính như người lớn phụ thu giường phụ 50% cabin
*** Giai đoạn Lễ Tết có phụ thu thêm',
                'directions' => '
Tại Hạ Long có nhiều sân bay dễ dàng di chuyển đến:
- Sân Bay Nội Bài: 183km khoảng 2 tiếng 30 di chuyển
- Sân Bay Cát Bi Hải Phòng: 56km khoảng 1 tiếng di chuyển
- Sân Bay Vân Đồn: 56km khoảng 1 tiếng di chuyển (hiện tại đang có tuyến xe bus miễn phí di chuyển vào trung tâm thành phố Hạ Long)
Ngoài ra khách hàng có thể di chuyển bằng xe khách chỉ mất khoảng hơn 2 tiếng di chuyển từ Hà Nội',
                'check_in_instructions' => ' phòng
Quý khách vui lòng xuất trình giấy tờ tùy thân trùng tên với người đại diện trong Phiếu xác nhận đặt phòng của Vintravel JSC để thủ tục nhận phòng được nhanh chóng.
Khách sạn sẽ yêu cầu khoản tiền đặt cọc là 1.000.000 VNĐ/phòng/đêm tại thời điểm nhận phòng, khuyến khích sử dụng tiền mặt hoặc thẻ tín dụng (Credit Card).',
            ],
            [
                'name' => 'Vinpearl Hạ Long',
                'description' => 'Tận hưởng dịch vụ đỉnh cao, đẳng cấp thế giới tại FLC Halong Bay Golf Club & Luxury Resort',
                'content' => 'Tọa lạc ở thành phố Hạ Long, FLC Halong Bay Golf Club & Luxury Resort có khu vườn, sân hiên, nhà hàng và quầy bar. Khách sạn 5 sao này có WiFi miễn phí, CLB trẻ em và dịch vụ phòng. Chỗ nghỉ cấm hút thuốc và nằm cách Bảo tàng Quảng Ninh 1,9 km.',
                'is_featured' => true,
                'room_category_id' => RoomCategory::first()->value('id'),
                'place_id' => Place::first()->value('id'),
                'images' => json_encode([
                    'products/pro-1.png',
                    'products/pro-2.png',
                    'products/pro-3.png',
                    'products/pro-4.png',
                    'products/pro-5.png',
                    'products/pro-6.png',
                ]),
                'price' => 14000000,
                'rating' => rand(1, 5),
                'address' => 'Đảo Rều, Bãi Cháy',
                'map' => '<iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.964361829725!2d107.10965241151415!3d20.953946280596124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a5743d857234b%3A0xf6120745cdb839f1!2sFLC%20Ha%20Long%20Bay!5e0!3m2!1svi!2s!4v1697911130720!5m2!1svi!2s"
              width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'check_in_time' => '14:00',
                'check_out_time' => '12:00',
                'children_policies' => '- Miễn phí 1 trẻ dưới 5 tuổi ngủ chung, trẻ thứ 2 phụ thu 550,000 VNĐ/đêm
- Trẻ từ 5 - 11 tuổi phụ thu ngủ chung 2,585,000 VNĐ/trẻ/đêm
- Trẻ từ 5 - 11 tuổi phụ thu giường phụ 3.218,000 VNĐ/trẻ/đêm
- Từ 12 tuổi trở lên tính như người lớn phụ thu giường phụ 50% cabin
*** Giai đoạn Lễ Tết có phụ thu thêm',
                'directions' => '
Tại Hạ Long có nhiều sân bay dễ dàng di chuyển đến:
- Sân Bay Nội Bài: 183km khoảng 2 tiếng 30 di chuyển
- Sân Bay Cát Bi Hải Phòng: 56km khoảng 1 tiếng di chuyển
- Sân Bay Vân Đồn: 56km khoảng 1 tiếng di chuyển (hiện tại đang có tuyến xe bus miễn phí di chuyển vào trung tâm thành phố Hạ Long)
Ngoài ra khách hàng có thể di chuyển bằng xe khách chỉ mất khoảng hơn 2 tiếng di chuyển từ Hà Nội',
                'check_in_instructions' => ' phòng
Quý khách vui lòng xuất trình giấy tờ tùy thân trùng tên với người đại diện trong Phiếu xác nhận đặt phòng của Vintravel JSC để thủ tục nhận phòng được nhanh chóng.
Khách sạn sẽ yêu cầu khoản tiền đặt cọc là 1.000.000 VNĐ/phòng/đêm tại thời điểm nhận phòng, khuyến khích sử dụng tiền mặt hoặc thẻ tín dụng (Credit Card).',
            ],
            [
                'name' => 'KHÁCH SẠN HẠ LONG',
                'description' => 'Tận hưởng dịch vụ đỉnh cao, đẳng cấp thế giới tại FLC Halong Bay Golf Club & Luxury Resort',
                'content' => 'Tọa lạc ở thành phố Hạ Long, FLC Halong Bay Golf Club & Luxury Resort có khu vườn, sân hiên, nhà hàng và quầy bar. Khách sạn 5 sao này có WiFi miễn phí, CLB trẻ em và dịch vụ phòng. Chỗ nghỉ cấm hút thuốc và nằm cách Bảo tàng Quảng Ninh 1,9 km.',
                'is_featured' => true,
                'room_category_id' => RoomCategory::first()->value('id'),
                'place_id' => Place::first()->value('id'),
                'images' => json_encode([
                    'products/pro-1.png',
                    'products/pro-2.png',
                    'products/pro-3.png',
                    'products/pro-4.png',
                    'products/pro-5.png',
                    'products/pro-6.png',
                ]),
                'price' => 14000000,
                'rating' => rand(1, 5),
                'address' => 'Đảo Rều, Bãi Cháy',
                'map' => '<iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.964361829725!2d107.10965241151415!3d20.953946280596124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a5743d857234b%3A0xf6120745cdb839f1!2sFLC%20Ha%20Long%20Bay!5e0!3m2!1svi!2s!4v1697911130720!5m2!1svi!2s"
              width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'check_in_time' => '14:00',
                'check_out_time' => '12:00',
                'children_policies' => '- Miễn phí 1 trẻ dưới 5 tuổi ngủ chung, trẻ thứ 2 phụ thu 550,000 VNĐ/đêm
- Trẻ từ 5 - 11 tuổi phụ thu ngủ chung 2,585,000 VNĐ/trẻ/đêm
- Trẻ từ 5 - 11 tuổi phụ thu giường phụ 3.218,000 VNĐ/trẻ/đêm
- Từ 12 tuổi trở lên tính như người lớn phụ thu giường phụ 50% cabin
*** Giai đoạn Lễ Tết có phụ thu thêm',
                'directions' => '
Tại Hạ Long có nhiều sân bay dễ dàng di chuyển đến:
- Sân Bay Nội Bài: 183km khoảng 2 tiếng 30 di chuyển
- Sân Bay Cát Bi Hải Phòng: 56km khoảng 1 tiếng di chuyển
- Sân Bay Vân Đồn: 56km khoảng 1 tiếng di chuyển (hiện tại đang có tuyến xe bus miễn phí di chuyển vào trung tâm thành phố Hạ Long)
Ngoài ra khách hàng có thể di chuyển bằng xe khách chỉ mất khoảng hơn 2 tiếng di chuyển từ Hà Nội',
                'check_in_instructions' => 'Quý khách vui lòng xuất trình giấy tờ tùy thân trùng tên với người đại diện trong Phiếu xác nhận đặt phòng của Vintravel JSC để thủ tục nhận phòng được nhanh chóng.
Khách sạn sẽ yêu cầu khoản tiền đặt cọc là 1.000.000 VNĐ/phòng/đêm tại thời điểm nhận phòng, khuyến khích sử dụng tiền mặt hoặc thẻ tín dụng (Credit Card).',
            ],
        ];

        Slug::query()->where(['reference_type' => Room::class])->delete();
        Booking::query()->truncate();
        BookingAddress::query()->truncate();
        BookingRoom::query()->truncate();
        DB::table('ht_booking_services')->truncate();

        foreach ($rooms as $room) {
            $room['tax_id'] = 1;
            $room['is_featured'] = rand(0, 1);

            $roomModel = Room::query()->create($room);

            $roomModel->amenities()->sync([1, 2, 3, 4, 6, 7, 9, 11]);

            $roomModel->features()->sync([1, 2, 3]);

            Slug::query()->create([
                'reference_type' => Room::class,
                'reference_id' => $roomModel->id,
                'key' => Str::slug($roomModel->name),
                'prefix' => SlugHelper::getPrefix(Room::class),
            ]);

            $roomOptionCategoryArray = [
                [
                    'name' => 'Deluxe Golf View',
                    'images' => json_encode([
                        'products/pro-1.png',
                        'products/pro-2.png',
                        'products/pro-3.png',
                        'products/pro-4.png',
                        'products/pro-5.png',
                        'products/pro-6.png',
                    ]),
                    'beds' => '1 giường King',
                    'size' => '42 - 48',
                    'max_adults' => 2,
                    'max_children' => 1,
                ],
                [
                    'name' => 'Grand Suite Golf View',
                    'images' => json_encode([
                        'products/pro-1.png',
                        'products/pro-2.png',
                        'products/pro-3.png',
                        'products/pro-4.png',
                        'products/pro-5.png',
                        'products/pro-6.png',
                    ]),
                    'beds' => '1 giường King',
                    'size' => '42 - 48',
                    'max_adults' => 2,
                    'max_children' => 1,
                ],
                [
                    'name' => 'Grand Suite Golf Lake View',
                    'images' => json_encode([
                        'products/pro-1.png',
                        'products/pro-2.png',
                        'products/pro-3.png',
                        'products/pro-4.png',
                        'products/pro-5.png',
                        'products/pro-6.png',
                    ]),
                    'beds' => '1 giường King',
                    'size' => '42 - 48',
                    'max_adults' => 2,
                    'max_children' => 1,
                ],
            ];

            foreach ($roomOptionCategoryArray as $category) {
                $category['room_id'] = $roomModel->id;

                $roomOptionCategory = RoomOptionCategory::query()->create($category);

                $roomOptionArray = [
                    [
                        'name' => 'Gồm ăn sáng',
                        'content' => 'Đã bao gồm thuế và phí dịch vụ
Không hoàn hủy và thay đổi',
                        'price' => 998000,
                        'price_child' => 98000,
                        'price_description' => 'Giá 1 đêm cho 2 người lớn',
                    ],
                    [
                        'name' => 'Gồm ăn sáng & Golf',
                        'content' => 'Đã bao gồm thuế và phí dịch vụ
Không hoàn hủy và thay đổi
Không áp dụng dịch vụ golf vào Thứ 7 - Chủ Nhật
Dịch vụ golf dành cho 1 golfer gồm 1 vòng golf 18 hố, phí sân, caddy, buggy chung
Ưu đãi 10% dịch vụ ẩm thực tại khách sạn (không bao gồm minibar & gọi món tại phòng)
Ưu đãi 20% dịch vụ spa tại khách sạn (không áp dụng với các CTKM khác)',
                        'price' => 2998000,
                        'price_child' => 98000,
                        'price_baby' => 12000,
                        'price_description' => 'Giá 1 đêm cho 2 người lớn',
                    ],
                ];

                foreach ($roomOptionArray as $option) {
                    $option['room_option_category_id'] = $roomOptionCategory->id;

                    $roomOption = RoomOption::query()->create($option);
                }
            }

            $voucher = [
                'room_id' => $roomModel->id,
                'tag' => 'Combo 2N1D + Ăn Sáng',
                'name' => 'Voucher 2N1D + Bữa sáng',
                'content' => 'Áp dụng cho toàn bộ hệ thống của FLC: Quy Nhơn, Hạ Long, Sầm Sơn
2N1D nghỉ dưỡng tại các khách sạn & resort
Ăn sáng theo tiêu chuẩn quốc tế
Miễn phí sử dụng các tiện ích: bể bơi và phòng Gym',
                'price' => 499000,
                'price_child' => 234000,
                'price_baby' => 12000,
            ];

            Voucher::query()->create($voucher);
        }
    }
}
