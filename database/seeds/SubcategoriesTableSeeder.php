<?php

use Book\Subcategory;
use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Sách trong nước
        Subcategory::create([
            'name'        => 'Nuôi dạy con',
            'category_id' => 1,
        ]);
        Subcategory::create([
            'name'        => 'Khoa học kỹ thuật',
            'category_id' => 1,
        ]);
        Subcategory::create([
            'name'        => 'Sách thiếu nhi',
            'category_id' => 1,
        ]);

        //Sách nước ngoài
        Subcategory::create([
            'name'        => 'Popular books',
            'category_id' => 2,
        ]);
        Subcategory::create([
            'name'        => 'Books by Subcategory',
            'category_id' => 2,
        ]);

        //Sách học ngoại ngữ
        Subcategory::create([
            'name'        => 'Sách ngoại ngữ',
            'category_id' => 3,
        ]);
        Subcategory::create([
            'name'        => 'Từ điển',
            'category_id' => 3,
        ]);

        //Nuôi dạy con
        Subcategory::create([
            'name'      => 'Dành cho mẹ bầu',
            'parent_id' => 1,
        ]);
        Subcategory::create([
            'name'      => 'Dinh dưỡng cho trẻ',
            'parent_id' => 1,
        ]);
        Subcategory::create([
            'name'      => 'Cẩm nang làm cha mẹ',
            'parent_id' => 1,
        ]);
        Subcategory::create([
            'name'      => 'Phát triển trí tuệ cho trẻ',
            'parent_id' => 1,
        ]);
        Subcategory::create([
            'name'      => 'Phát triển kỹ năng cho trẻ',
            'parent_id' => 1,
        ]);
        Subcategory::create([
            'name'      => 'Giáo dục trẻ tuổi teen',
            'parent_id' => 1,
        ]);

        //Khoa học kỹ thuật
        Subcategory::create([
            'name'      => 'Tin học',
            'parent_id' => 2,
        ]);
        Subcategory::create([
            'name'      => 'Y học',
            'parent_id' => 2,
        ]);
        Subcategory::create([
            'name'      => 'Điện - Điện tử',
            'parent_id' => 2,
        ]);
        Subcategory::create([
            'name'      => 'Cơ khí',
            'parent_id' => 2,
        ]);
        Subcategory::create([
            'name'      => 'Kiến trúc - Xây dựng',
            'parent_id' => 2,
        ]);
        Subcategory::create([
            'name'      => 'Nông - Lâm - Ngư nghiệp',
            'parent_id' => 2,
        ]);
        Subcategory::create([
            'name'      => 'Khoa học - Vũ trụ',
            'parent_id' => 2,
        ]);
        Subcategory::create([
            'name'      => 'Khoa học khác',
            'parent_id' => 2,
        ]);

        //Sách thiếu nhi
        Subcategory::create([
            'name'      => 'Truyện tranh',
            'parent_id' => 3,
        ]);
        Subcategory::create([
            'name'      => 'Truyện đọc',
            'parent_id' => 3,
        ]);
        Subcategory::create([
            'name'      => 'Tô màu - Luyện chữ',
            'parent_id' => 3,
        ]);
        Subcategory::create([
            'name'      => 'Kiến thức bách khoa',
            'parent_id' => 3,
        ]);
        Subcategory::create([
            'name'      => 'Manga - Comic',
            'parent_id' => 3,
        ]);

        //Popular books
        Subcategory::create([
            'name'      => 'New Arrivals',
            'parent_id' => 4,
        ]);
        Subcategory::create([
            'name'      => 'Best Sellers',
            'parent_id' => 4,
        ]);
        Subcategory::create([
            'name'      => 'The New York Times Best Sellers',
            'parent_id' => 4,
        ]);
        Subcategory::create([
            'name'      => 'English Language Teaching - ELT',
            'parent_id' => 4,
        ]);
        Subcategory::create([
            'name'      => 'Dictionary & Thesarus',
            'parent_id' => 4,
        ]);
        Subcategory::create([
            'name'      => 'Japanese Books',
            'parent_id' => 4,
        ]);
        Subcategory::create([
            'name'      => 'German Books',
            'parent_id' => 4,
        ]);
        Subcategory::create([
            'name'      => 'Others',
            'parent_id' => 4,
        ]);

        //Books by Subcategory
        Subcategory::create([
            'name'      => 'Business, Finance & Law',
            'parent_id' => 5,
        ]);
        Subcategory::create([
            'name'      => 'Self-help',
            'parent_id' => 5,
        ]);
        Subcategory::create([
            'name'      => 'Fiction',
            'parent_id' => 5,
        ]);
        Subcategory::create([
            'name'      => 'Biographies & Memoirs',
            'parent_id' => 5,
        ]);
        Subcategory::create([
            'name'      => 'Young Adult Books',
            'parent_id' => 5,
        ]);
        Subcategory::create([
            'name'      => 'Children\'s Books',
            'parent_id' => 5,
        ]);
        Subcategory::create([
            'name'      => 'Food & Drink',
            'parent_id' => 5,
        ]);
        Subcategory::create([
            'name'      => 'Crafts & Hobbies',
            'parent_id' => 5,
        ]);
        Subcategory::create([
            'name'      => 'Other Languages',
            'parent_id' => 5,
        ]);
        Subcategory::create([
            'name'      => 'Others',
            'parent_id' => 5,
        ]);

        //Sách ngoại ngữ
        Subcategory::create([
            'name'      => 'Tiếng Anh',
            'parent_id' => 6,
        ]);
        Subcategory::create([
            'name'      => 'Tiếng Pháp',
            'parent_id' => 6,
        ]);
        Subcategory::create([
            'name'      => 'Tiếng Hàn',
            'parent_id' => 6,
        ]);
        Subcategory::create([
            'name'      => 'Tiếng Nhật',
            'parent_id' => 6,
        ]);
        Subcategory::create([
            'name'      => 'Tiếng Hoa',
            'parent_id' => 6,
        ]);
        Subcategory::create([
            'name'      => 'Tiếng Đức',
            'parent_id' => 6,
        ]);
        Subcategory::create([
            'name'      => 'Tiếng Việt cho người nước ngoài',
            'parent_id' => 6,
        ]);

        //Từ điển
        Subcategory::create([
            'name'      => 'Từ Điển Tiếng Việt',
            'parent_id' => 7,
        ]);
        Subcategory::create([
            'name'      => 'Từ Điển Tiếng Anh-Anh, Anh-Việt, Việt-Anh',
            'parent_id' => 7,
        ]);
        Subcategory::create([
            'name'      => 'Từ Điển Tiếng Pháp - Việt, Việt - Pháp',
            'parent_id' => 7,
        ]);
        Subcategory::create([
            'name'      => 'Từ Điển Tiếng Đức-Việt, Việt-Đức',
            'parent_id' => 7,
        ]);
        Subcategory::create([
            'name'      => 'Từ Điển Tiếng Nhật-Việt, Việt-Nhật',
            'parent_id' => 7,
        ]);
        Subcategory::create([
            'name'      => 'Từ Điển Tiếng Hàn-Việt, Việt-Hàn',
            'parent_id' => 7,
        ]);
        Subcategory::create([
            'name'      => 'Từ Điển Hán-Việt',
            'parent_id' => 7,
        ]);
        Subcategory::create([
            'name'      => 'Từ Điển Chuyên Ngành',
            'parent_id' => 7,
        ]);
    }
}
