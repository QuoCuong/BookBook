<?php

use Book\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Sách trong nước']);
        Category::create(['name' => 'Foreign books']);
        Category::create(['name' => 'Sách học ngoại ngữ']);

        //Sách trong nước
        Category::create([
            'name'      => 'Nuôi dạy con',
            'parent_id' => 1,
        ]);
        Category::create([
            'name'      => 'Khoa học kỹ thuật',
            'parent_id' => 1,
        ]);
        Category::create([
            'name'      => 'Sách thiếu nhi',
            'parent_id' => 1,
        ]);

        //Sách nước ngoài
        Category::create([
            'name'      => 'Popular books',
            'parent_id' => 2,
        ]);
        Category::create([
            'name'      => 'Books by Category',
            'parent_id' => 2,
        ]);

        //Sách học ngoại ngữ
        Category::create([
            'name'      => 'Sách ngoại ngữ',
            'parent_id' => 3,
        ]);
        Category::create([
            'name'      => 'Từ điển',
            'parent_id' => 3,
        ]);

        //Nuôi dạy con
        Category::create([
            'name'      => 'Dành cho mẹ bầu',
            'parent_id' => 4,
        ]);
        Category::create([
            'name'      => 'Dinh dưỡng cho trẻ',
            'parent_id' => 4,
        ]);
        Category::create([
            'name'      => 'Cẩm nang làm cha mẹ',
            'parent_id' => 4,
        ]);
        Category::create([
            'name'      => 'Phát triển trí tuệ cho trẻ',
            'parent_id' => 4,
        ]);
        Category::create([
            'name'      => 'Phát triển kỹ năng cho trẻ',
            'parent_id' => 4,
        ]);
        Category::create([
            'name'      => 'Giáo dục trẻ tuổi teen',
            'parent_id' => 4,
        ]);

        //Khoa học kỹ thuật
        Category::create([
            'name'      => 'Tin học',
            'parent_id' => 5,
        ]);
        Category::create([
            'name'      => 'Y học',
            'parent_id' => 5,
        ]);
        Category::create([
            'name'      => 'Điện - Điện tử',
            'parent_id' => 5,
        ]);
        Category::create([
            'name'      => 'Cơ khí',
            'parent_id' => 5,
        ]);
        Category::create([
            'name'      => 'Kiến trúc - Xây dựng',
            'parent_id' => 5,
        ]);
        Category::create([
            'name'      => 'Nông - Lâm - Ngư nghiệp',
            'parent_id' => 5,
        ]);
        Category::create([
            'name'      => 'Khoa học - Vũ trụ',
            'parent_id' => 5,
        ]);
        Category::create([
            'name'      => 'Khoa học khác',
            'parent_id' => 5,
        ]);

        //Sách thiếu nhi
        Category::create([
            'name'      => 'Truyện tranh',
            'parent_id' => 6,
        ]);
        Category::create([
            'name'      => 'Truyện đọc',
            'parent_id' => 6,
        ]);
        Category::create([
            'name'      => 'Tô màu - Luyện chữ',
            'parent_id' => 6,
        ]);
        Category::create([
            'name'      => 'Kiến thức bách khoa',
            'parent_id' => 6,
        ]);
        Category::create([
            'name'      => 'Manga - Comic',
            'parent_id' => 6,
        ]);

        //Popular books
        Category::create([
            'name'      => 'New Arrivals',
            'parent_id' => 7,
        ]);
        Category::create([
            'name'      => 'Best Sellers',
            'parent_id' => 7,
        ]);
        Category::create([
            'name'      => 'The New York Times Best Sellers',
            'parent_id' => 7,
        ]);
        Category::create([
            'name'      => 'English Language Teaching - ELT',
            'parent_id' => 7,
        ]);
        Category::create([
            'name'      => 'Dictionary & Thesarus',
            'parent_id' => 7,
        ]);
        Category::create([
            'name'      => 'Japanese Books',
            'parent_id' => 7,
        ]);
        Category::create([
            'name'      => 'German Books',
            'parent_id' => 7,
        ]);
        Category::create([
            'name'      => 'Others',
            'parent_id' => 7,
        ]);

        //Books by Category
        Category::create([
            'name'      => 'Business, Finance & Law',
            'parent_id' => 8,
        ]);
        Category::create([
            'name'      => 'Self-help',
            'parent_id' => 8,
        ]);
        Category::create([
            'name'      => 'Fiction',
            'parent_id' => 8,
        ]);
        Category::create([
            'name'      => 'Biographies & Memoirs',
            'parent_id' => 8,
        ]);
        Category::create([
            'name'      => 'Young Adult Books',
            'parent_id' => 8,
        ]);
        Category::create([
            'name'      => 'Children\'s Books',
            'parent_id' => 8,
        ]);
        Category::create([
            'name'      => 'Food & Drink',
            'parent_id' => 8,
        ]);
        Category::create([
            'name'      => 'Crafts & Hobbies',
            'parent_id' => 8,
        ]);
        Category::create([
            'name'      => 'Other Languages',
            'parent_id' => 8,
        ]);
        Category::create([
            'name'      => 'Others',
            'parent_id' => 8,
        ]);

        //Sách ngoại ngữ
        Category::create([
            'name'      => 'Tiếng Anh',
            'parent_id' => 9,
        ]);
        Category::create([
            'name'      => 'Tiếng Pháp',
            'parent_id' => 9,
        ]);
        Category::create([
            'name'      => 'Tiếng Hàn',
            'parent_id' => 9,
        ]);
        Category::create([
            'name'      => 'Tiếng Nhật',
            'parent_id' => 9,
        ]);
        Category::create([
            'name'      => 'Tiếng Hoa',
            'parent_id' => 9,
        ]);
        Category::create([
            'name'      => 'Tiếng Đức',
            'parent_id' => 9,
        ]);
        Category::create([
            'name'      => 'Tiếng Việt cho người nước ngoài',
            'parent_id' => 9,
        ]);

        //Từ điển
        Category::create([
            'name'      => 'Từ Điển Tiếng Việt',
            'parent_id' => 10,
        ]);
        Category::create([
            'name'      => 'Từ Điển Tiếng Anh-Anh, Anh-Việt, Việt-Anh',
            'parent_id' => 10,
        ]);
        Category::create([
            'name'      => 'Từ Điển Tiếng Pháp - Việt, Việt - Pháp',
            'parent_id' => 10,
        ]);
        Category::create([
            'name'      => 'Từ Điển Tiếng Đức-Việt, Việt-Đức',
            'parent_id' => 10,
        ]);
        Category::create([
            'name'      => 'Từ Điển Tiếng Nhật-Việt, Việt-Nhật',
            'parent_id' => 10,
        ]);
        Category::create([
            'name'      => 'Từ Điển Tiếng Hàn-Việt, Việt-Hàn',
            'parent_id' => 10,
        ]);
        Category::create([
            'name'      => 'Từ Điển Hán-Việt',
            'parent_id' => 10,
        ]);
        Category::create([
            'name'      => 'Từ Điển Chuyên Ngành',
            'parent_id' => 10,
        ]);
    }
}
