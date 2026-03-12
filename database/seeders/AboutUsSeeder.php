<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\AboutUsTimeline;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::truncate();

        AboutUs::create([
            'vision_title' => [
                'ar' => 'رؤيـتـنـا',
                'en' => 'Our Vision',
            ],
            'vision_description' => [
                'ar' => 'نطمح في "نقاط" أن نكون المنصة الأولى والرائدة في الشرق الأوسط التي تعيد تعريف مفهوم السفر الفاخر والميسر في آن واحد. رؤيتنا تتجاوز الحجوزات التقليدية؛ نحن نسعى لخلق عالم يكون فيه السفر تجربة ثقافية وإنسانية غنية، متاحة لكل من يبحث عن التميز.',
                'en' => 'At "Noqat," we aspire to be the premier platform in the Middle East, redefining both luxury and accessible travel. Our vision goes beyond traditional bookings; we strive to create a world where travel is a rich cultural and human experience, available to everyone seeking excellence.',
            ],
            'vision_list' => [
                'ar' => ['الريادة في الابتكار السياحي', 'بناء أكبر شبكة شركاء عالميين'],
                'en' => ['Pioneering Tourism Innovation', 'Building the largest global partner network'],
            ],
            'vision_image' => 'assets/uploads/about/vision.png',

            'mission_title' => [
                'ar' => 'رسـالـتـنـا',
                'en' => 'Our Mission',
            ],
            'mission_description' => [
                'ar' => 'رسالتنا هي تقديم حلول سياحية متكاملة تبدأ من الفكرة وتنتهي بذكريات لا تُنسى. نحن نلتزم بتوفير أعلى معايير الجودة، الأمان، والرفاهية لعملائنا، مع ضمان أفضل قيمة مقابل الاستثمار، لنجعل من كل رحلة مع "نقاط" استثماراً في السعادة.',
                'en' => 'Our mission is to provide integrated tourism solutions starting from a spark of an idea to unforgettable memories. We are committed to providing the highest standards of quality, safety, and luxury, ensuring the best value for investment, making every journey with "Noqat" an investment in happiness.',
            ],
            'mission_image' => 'assets/uploads/about/mission.png',
            'stat_1_value' => '+24K',
            'stat_1_label' => [
                'ar' => 'مسافر سعيد',
                'en' => 'Happy Travelers',
            ],
            'stat_2_value' => '100%',
            'stat_2_label' => [
                'ar' => 'التزام بالجودة',
                'en' => 'Quality Commitment',
            ],

            'why_us_title' => [
                'ar' => 'لـمـاذا "نـقـاط"؟',
                'en' => 'Why Noqat?',
            ],
            'why_us_description' => [
                'ar' => 'نحن لا ننافس على السعر فحسب، بل ننافس على أدق التفاصيل التي قد لا يلاحظها الآخرون ولكن يشعر بها المسافر في كل خطوة.',
                'en' => "We don't just compete on price; we compete on the finest details that others might overlook, but every traveler feels at every step.",
            ],
            'why_us_image' => 'assets/uploads/about/why-us.png',
            'feature_1_title' => [
                'ar' => 'تخصيص كامل',
                'en' => 'Full Customization',
            ],
            'feature_1_description' => [
                'ar' => 'رحلات مصممة خصيصاً لتناسب شخصيتك.',
                'en' => 'Journeys tailored specifically to match your personality.',
            ],
            'feature_1_icon' => 'bi-stars',
            'feature_2_title' => [
                'ar' => 'أمان ومصداقية',
                'en' => 'Safety & Reliability',
            ],
            'feature_2_description' => [
                'ar' => 'تأمين شامل ودعم فني على مدار الساعة.',
                'en' => 'Comprehensive insurance and 24/7 technical support.',
            ],
            'feature_2_icon' => 'bi-shield-check',
        ]);

        AboutUsTimeline::truncate();

        $timelines = [
            [
                'year' => '2015',
                'title' => ['ar' => 'الانطلاقة', 'en' => 'The Beginning'],
                'text' => ['ar' => 'تأسيس نقاط برؤية طموحة في المملكة.', 'en' => 'Establishment of Noqat with an ambitious vision in the Kingdom.'],
                'sort_order' => 1
            ],
            [
                'year' => '2018',
                'title' => ['ar' => 'الانتشار', 'en' => 'Expansion'],
                'text' => ['ar' => 'الوصول إلى **120 وجهة** عالمية رائدة.', 'en' => 'Reaching over 120 leading global destinations.'],
                'sort_order' => 2
            ],
            [
                'year' => '2022',
                'title' => ['ar' => 'التمكين التقني', 'en' => 'Tech Empowerment'],
                'text' => ['ar' => 'دمج أنظمة دفع عالمية وحلول ذكية للمسافرين.', 'en' => 'Integrating global payment systems and smart solutions for travelers.'],
                'sort_order' => 3
            ],
            [
                'year' => '2026',
                'title' => ['ar' => 'الريادة المستمرة', 'en' => 'Continued Leadership'],
                'text' => ['ar' => 'أكثر من **10 سنوات** من الخبرة السياحية.', 'en' => 'Over 10 years of tourism expertise.'],
                'sort_order' => 4
            ],
        ];

        foreach ($timelines as $timeline) {
            AboutUsTimeline::create($timeline);
        }
    }
}
