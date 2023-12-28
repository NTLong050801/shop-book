<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Hotel\Models\Tour;
use Botble\Slug\Models\Slug;
use Illuminate\Support\Str;
use Botble\Slug\Facades\SlugHelper;

class TourSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('products');

        Tour::query()->truncate();

        $tours = [
            [
                'code' => 'VTV-HQ1',
                'name' => 'Tour Hàn Quốc 5N4D: Seoul - Nami - Busan',
                'description' => 'Hàn Quốc Mùa Thu',
                'content' => 'Tour du lịch Hàn Quốc là một lựa chọn được yêu thích nhất hiện nay, trong suốt hành trình tour, du khách sẽ được tham quan những địa điểm hấp dẫn như Gyeongbokgung, công Viên Everland, núi Nam San, thưởng thức Painter Hero Show, đặc biệt nhất là hành trình khám phá Đảo Nami mùa thu với những con đường lá đỏ vô cùng lãng mạn.',
                'more_content' => 'Áp dụng cho toàn bộ hệ thống của FLC: Quy Nhơn, Hạ Long, Sầm Sơn.
2N1D nghỉ dưỡng tại các khách sạn & resort
Ăn sáng theo tiêu chuẩn quốc tế
Miễn phí sử dụng các tiện ích: bể bơi và phòng Gym',
                'is_featured' => true,
                'images' => json_encode([
                    'products/pro-1.png',
                    'products/pro-2.png',
                    'products/pro-3.png',
                    'products/pro-4.png',
                    'products/pro-5.png',
                    'products/pro-6.png',
                ]),
                'tag' => '5N4D | Bay VNA',
                'address' => 'Hàn Quốc',
                'trip' => 'Seoul - Nami - Busan',
                'duration' => '5N4D',
                'schedule' => 'Hàng tuần',
                'vehicle' => 'Bay Vietnam Airlines',
                'departure_location' => 'Hà Nội',
                'price' => 2345000,
                'price_child' => 1345000,
                'price_baby' => 12000,
                'plan' => json_encode([
                    [
                        'title' => 'Ngày 1 - TP. HỒ CHÍ MINH – GAPYEONG – SEOUL (Ăn trưa, ăn tối)',
                        'content' => 'Đêm trước ngày 1: Hướng dẫn viên Vietravel đón Quý khách tại Ga đi quốc tế để làm thủ tục đáp chuyến bay Incheon – thành phố lịch sử của Hàn Quốc. Quý khách ăn sáng nhẹ trên máy bay (theo sắp xếp của hàng không)
Đến sân bay Quốc tế Incheon, đoàn làm thủ tục nhập cảnh. Quý khách di chuyển đến huyện Gapyeong - tỉnh Gyeonggi - Đây là tỉnh đông dân và lớn nhất của Đại Hàn Dân Quốc. Nơi đây quy tụ vô vàn những điểm du lịch hấp dẫn: Phim trường MBC, Công viên giải trí Everland, Làng dân tộc Yogin, Công viên Quốc gia Bukhansan,... Là trung tâm kinh tế, văn hóa, chính trị Hàn Quốc.',
                    ],
                    [
                        'title' => 'Ngày 2 - TP. HỒ CHÍ MINH – GAPYEONG – SEOUL (Ăn trưa, ăn tối)',
                        'content' => 'Đêm trước ngày 1: Hướng dẫn viên Vietravel đón Quý khách tại Ga đi quốc tế để làm thủ tục đáp chuyến bay Incheon – thành phố lịch sử của Hàn Quốc. Quý khách ăn sáng nhẹ trên máy bay (theo sắp xếp của hàng không)
Đến sân bay Quốc tế Incheon, đoàn làm thủ tục nhập cảnh. Quý khách di chuyển đến huyện Gapyeong - tỉnh Gyeonggi - Đây là tỉnh đông dân và lớn nhất của Đại Hàn Dân Quốc. Nơi đây quy tụ vô vàn những điểm du lịch hấp dẫn: Phim trường MBC, Công viên giải trí Everland, Làng dân tộc Yogin, Công viên Quốc gia Bukhansan,... Là trung tâm kinh tế, văn hóa, chính trị Hàn Quốc.',
                    ],
                    [
                        'title' => 'Ngày 3 - TP. HỒ CHÍ MINH – GAPYEONG – SEOUL (Ăn trưa, ăn tối)',
                        'content' => 'Đêm trước ngày 1: Hướng dẫn viên Vietravel đón Quý khách tại Ga đi quốc tế để làm thủ tục đáp chuyến bay Incheon – thành phố lịch sử của Hàn Quốc. Quý khách ăn sáng nhẹ trên máy bay (theo sắp xếp của hàng không)
Đến sân bay Quốc tế Incheon, đoàn làm thủ tục nhập cảnh. Quý khách di chuyển đến huyện Gapyeong - tỉnh Gyeonggi - Đây là tỉnh đông dân và lớn nhất của Đại Hàn Dân Quốc. Nơi đây quy tụ vô vàn những điểm du lịch hấp dẫn: Phim trường MBC, Công viên giải trí Everland, Làng dân tộc Yogin, Công viên Quốc gia Bukhansan,... Là trung tâm kinh tế, văn hóa, chính trị Hàn Quốc.',
                    ],
                ]),
                'services_include' => '- Visa nhập cảnh Hàn Quốc.
- Vé máy bay khứ hồi Sài Gòn – Incheon// Incheon - Sài Gòn , thuế phi trường & phụ thu xăng dầu
- Khách sạn 3 * tiêu chuẩn địa phương (2 người lớn/ phòng 2 giường đơn)
- Ăn uống, tham quan và vận chuyển như chương trình.
- Hướng dẫn viên của Vietravel nói tiếng Việt và đi theo suốt tuyến.',
                'services_exclude' => '- Xe máy lạnh sử dụng theo chương trình.
- Đặc biệt, Vietravel tặng thêm cho tất cả du khách (đến dưới 80 tuổi) phí Bảo hiểm du lịch với mức bồi thường tối đa là 460.000.000 VNĐ cho nhân mạng và 30.000.000 VNĐ cho hành lý.,',
                'registration_conditions' => '- Khi đăng ký tour du lịch, Quý khách vui lòng đọc kỹ chương trình, giá tour, các khoản bao gồm cũng như không bao gồm trong chương trình, các điều kiện hủy tour trên biên nhận đóng tiền. Trong trường hợp Quý khách không trực tiếp đến đăng ký tour mà do người khác đến đăng ký thì Quý khách vui lòng tìm hiểu kỹ chương trình từ người đăng ký cho mình.
- Quý khách vui lòng không tách đoàn và đi theo đúng chương trình.
- Khách nữ từ 55 tuổi trở lên và khách nam từ 60 trở lên: nên có người thân dưới 55 tuổi (đầy đủ sức khỏe) đi cùng. Riêng khách từ 70 tuổi trở lên: bắt buộc phải có người thân dưới 55 tuổi (đầy đủ sức khỏe) đi cùng. Ngoài ra, khách từ 75 tuổi trở lên khuyến khích đóng thêm phí bảo hiểm cao cấp (phí thay đổi tùy theo tour). Hạn chế không nhận khách từ 80 tuổi trở lên. Khách từ 80 tuổi không có chế độ bảo hiểm..',
                'cancel_conditions' => '- Khi đăng ký tour du lịch, Quý khách vui lòng đọc kỹ chương trình, giá tour, các khoản bao gồm cũng như không bao gồm trong chương trình, các điều kiện hủy tour trên biên nhận đóng tiền. Trong trường hợp Quý khách không trực tiếp đến đăng ký tour mà do người khác đến đăng ký thì Quý khách vui lòng tìm hiểu kỹ chương trình từ người đăng ký cho mình.
- Quý khách vui lòng không tách đoàn và đi theo đúng chương trình.
- Khách nữ từ 55 tuổi trở lên và khách nam từ 60 trở lên: nên có người thân dưới 55 tuổi (đầy đủ sức khỏe) đi cùng. Riêng khách từ 70 tuổi trở lên: bắt buộc phải có người thân dưới 55 tuổi (đầy đủ sức khỏe) đi cùng. Ngoài ra, khách từ 75 tuổi trở lên khuyến khích đóng thêm phí bảo hiểm cao cấp (phí thay đổi tùy theo tour). Hạn chế không nhận khách từ 80 tuổi trở lên. Khách từ 80 tuổi không có chế độ bảo hiểm..',
                'checkout_description' => '- Khi đăng ký tour du lịch, Quý khách vui lòng đọc kỹ chương trình, giá tour, các khoản bao gồm cũng như không bao gồm trong chương trình, các điều kiện hủy tour trên biên nhận đóng tiền. Trong trường hợp Quý khách không trực tiếp đến đăng ký tour mà do người khác đến đăng ký thì Quý khách vui lòng tìm hiểu kỹ chương trình từ người đăng ký cho mình.
- Quý khách vui lòng không tách đoàn và đi theo đúng chương trình.
- Khách nữ từ 55 tuổi trở lên và khách nam từ 60 trở lên: nên có người thân dưới 55 tuổi (đầy đủ sức khỏe) đi cùng. Riêng khách từ 70 tuổi trở lên: bắt buộc phải có người thân dưới 55 tuổi (đầy đủ sức khỏe) đi cùng. Ngoài ra, khách từ 75 tuổi trở lên khuyến khích đóng thêm phí bảo hiểm cao cấp (phí thay đổi tùy theo tour). Hạn chế không nhận khách từ 80 tuổi trở lên. Khách từ 80 tuổi không có chế độ bảo hiểm..',
            ],
        ];

        Slug::query()->where(['reference_type' => Tour::class])->delete();

        foreach ($tours as $tour) {
            $tour['is_featured'] = rand(0, 1);

            $tourModel = Tour::query()->create($tour);

            $tourModel->features()->sync([1, 2, 3]);

            Slug::query()->create([
                'reference_type' => Tour::class,
                'reference_id' => $tourModel->id,
                'key' => Str::slug($tourModel->code),
                'prefix' => SlugHelper::getPrefix(Tour::class),
            ]);
        }
    }
}
