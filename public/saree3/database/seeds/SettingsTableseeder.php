<?php

use Illuminate\Database\Seeder;

class SettingsTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'set_slug' => 'site title ar',
                'set_name' => 'site_title_ar',
                'value'    => 'سريع',
                'type'     => 1,
                'sec'     => 'General',
            ],
            [
                'set_slug' => 'site title en',
                'set_name' => 'site_title_en',
                'value'    => 'Sareeea',
                'type'     => 1,
                'sec'     => 'General',
            ],
            [
                'set_slug' => 'وصف الموقع',
                'set_name' => 'description',
                'value'    => 'وصف للموقع',
                'type'     => 2,
                'sec'     => 'General',
            ],
            [
                'set_slug' => 'نص الحقوق',
                'set_name' => 'copyright',
                'value'    => 'جميع الحقوق محفوظة - الرياض 2016',
                'type'     => 1,
                'sec'     => 'Website',
            ],
            [
                'set_slug' => 'كود إحصائيات جوجل',
                'set_name' => 'analytics',
                'value'    => 'code',
                'type'     => 2,
                'sec'     => 'Website',
            ],
            [
                'set_slug' => 'وصف الميتا تاج',
                'set_name' => 'site_meta_description',
                'value'    => 'الوصف الذى سوف يظهر فى محركات البحث إسفل إسم الموقع',
                'type'     => 2,
                'sec'     => 'Website',
            ],
            [
                'set_slug' => 'حالة الموقع',
                'set_name' => 'statue',
                'value'    => 'online',
                'type'     => 0,
                'sec'     => 'Website',
            ],
            [
                'set_slug' => 'شعار الموقع',
                'set_name' => 'logo',
                'value'    => '#',
                'type'     => 0,
                'sec'     => 'General',
            ],
            [
                'set_slug' => 'ايقونة التفضيل',
                'set_name' => 'fav_icon',
                'value'    => '#',
                'type'     => 0,
                'sec'     => 'General',
            ],
            [
                'set_slug' => 'البريد الإلكتروني',
                'set_name' => 'email',
                'value'    => '#',
                'type'     => 1,
                'sec'     => 'Website',
            ],
            [
                'set_slug' => 'رابط الأدمن',
                'set_name' => 'admin_url',
                'value'    => 'admin/',
                'type'     => 1,
                'sec'     => 'General',
            ],
            [
                'set_slug' => 'ارقام هواتف',
                'set_name' => 'phone',
                'value'    => '#',
                'type'     => 1,
                'sec'     => 'Website',
            ],
            [
                'set_slug' => 'العنوان',
                'set_name' => 'address',
                'value'    => '#',
                'type'     => 1,
                'sec'     => 'Website',
            ],
            [
                'set_slug' => 'الرقم البريدي',
                'set_name' => 'postal',
                'value'    => '#',
                'type'     => 1,
                'sec'     => 'Website',
            ],
            [
                'set_slug' => 'خط العرض',
                'set_name' => 'lat',
                'value'    => '#',
                'type'     => 1,
                'sec'     => 'Website',
            ],
            [
                'set_slug' => 'خط الطول',
                'set_name' => 'lng',
                'value'    => '#',
                'type'     => 1,
                'sec'     => 'Website',
            ],
            [
                'set_slug' => 'صفحة تويتر',
                'set_name' => 'twitter',
                'value'    => str_random(10),
                'type'     => 1,
                'sec'     => 'Website',
            ],
            [
                'set_slug' => 'صفحة الفيس بوك',
                'set_name' => 'facebook',
                'value'    => str_random(10),
                'type'     => 1,
                'sec'     => 'Website',
            ],
        ]);
    }
}
