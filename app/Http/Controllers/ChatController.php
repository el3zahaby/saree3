<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\rooms;
use App\messages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{

    public $countries_ar = [
    "SA" => 'المملكة العربية السعودية',
    "ET" => 'إثيوبيا',
    "AZ" => 'أذربيجان',
    "AM" => 'أرمينيا',
    "AW" => 'أروبا',
    "ER" => 'إريتريا',
    "ES" => 'أسبانيا',
    "AU" => 'أستراليا',
    "EE" => 'إستونيا',
    "IL" => 'إسرائيل',
    "AF" => 'أفغانستان',
    "IO" => 'إقليم المحيط الهندي البريطاني',
    "EC" => 'إكوادور',
    "AR" => 'الأرجنتين',
    "JO" => 'الأردن',
    "AE" => 'الإمارات العربية المتحدة',
    "AL" => 'ألبانيا',
    "BR" => 'البرازيل',
    "PT" => 'البرتغال',
    "BA" => 'البوسنة والهرسك',
    "GA" => 'الجابون',
    "DZ" => 'الجزائر',
    "DK" => 'الدانمارك',
    "CV" => 'الرأس الأخضر',
    "PS" => 'السلطة الفلسطينية',
    "SV" => 'السلفادور',
    "SN" => 'السنغال',
    "SD" => 'السودان',
    "SE" => 'السويد',
    "SO" => 'الصومال',
    "CN" => 'الصين',
    "IQ" => 'العراق',
    "PH" => 'الفلبين',
    "CM" => 'الكاميرون',
    "CG" => 'الكونغو',
    "CD" => 'الكونغو (جمهورية الكونغو الديمقراطية)',
    "KW" => 'الكويت',
    "DE" => 'ألمانيا',
    "HU" => 'المجر',
    "MA" => 'المغرب',
    "MX" => 'المكسيك',
    "UK" => 'المملكة المتحدة',
    "TF" => 'المناطق الفرنسية الجنوبية ومناطق انتراكتيكا',
    "NO" => 'النرويج',
    "AT" => 'النمسا',
    "NE" => 'النيجر',
    "IN" => 'الهند',
    "US" => 'الولايات المتحدة',
    "JP" => 'اليابان',
    "YE" => 'اليمن',
    "GR" => 'اليونان',
    "AQ" => 'أنتاركتيكا',
    "AG" => 'أنتيغوا وبربودا',
    "AD" => 'أندورا',
    "ID" => 'إندونيسيا',
    "AO" => 'أنغولا',
    "AI" => 'أنغويلا',
    "UY" => 'أوروجواي',
    "UZ" => 'أوزبكستان',
    "UG" => 'أوغندا',
    "UA" => 'أوكرانيا',
    "IR" => 'إيران',
    "IE" => 'أيرلندا',
    "IS" => 'أيسلندا',
    "IT" => 'إيطاليا',
    "PG" => 'بابوا-غينيا الجديدة',
    "PY" => 'باراجواي',
    "BB" => 'باربادوس',
    "PK" => 'باكستان',
    "PW" => 'بالاو',
    "BM" => 'برمودا',
    "BN" => 'بروناي',
    "BE" => 'بلجيكا',
    "BG" => 'بلغاريا',
    "BD" => 'بنجلاديش',
    "PA" => 'بنما',
    "BJ" => 'بنين',
    "BT" => 'بوتان',
    "BW" => 'بوتسوانا',
    "PR" => 'بورتو ريكو',
    "BF" => 'بوركينا فاسو',
    "BI" => 'بوروندي',
    "PL" => 'بولندا',
    "BO" => 'بوليفيا',
    "PF" => 'بولينزيا الفرنسية',
    "PE" => 'بيرو',
    "BY" => 'بيلاروس',
    "BZ" => 'بيليز',
    "TH" => 'تايلاند',
    "TW" => 'تايوان',
    "TM" => 'تركمانستان',
    "TR" => 'تركيا',
    "TT" => 'ترينيداد وتوباجو',
    "TD" => 'تشاد',
    "CL" => 'تشيلي',
    "TZ" => 'تنزانيا',
    "TG" => 'توجو',
    "TV" => 'توفالو',
    "TK" => 'توكيلاو',
    "TO" => 'تونجا',
    "TN" => 'تونس',
    "TP" => 'تيمور الشرقية (تيمور الشرقية)',
    "JM" => 'جامايكا',
    "GM" => 'جامبيا',
    "GI" => 'جبل طارق',
    "GL" => 'جرينلاند',
    "AN" => 'جزر الأنتيل الهولندية',
    "PN" => 'جزر البتكارين',
    "BS" => 'جزر البهاما',
    "VG" => 'جزر العذراء البريطانية',
    "VI" => 'جزر العذراء، الولايات المتحدة',
    "KM" => 'جزر القمر',
    "CC" => 'جزر الكوكوس (كيلين)',
    "MV" => 'جزر المالديف',
    "TC" => 'جزر تركس وكايكوس',
    "AS" => 'جزر ساموا الأمريكية',
    "SB" => 'جزر سولومون',
    "FO" => 'جزر فايرو',
    "UM" => 'جزر فرعية تابعة للولايات المتحدة',
    "FK" => 'جزر فوكلاند (أيزلاس مالفيناس)',
    "FJ" => 'جزر فيجي',
    "KY" => 'جزر كايمان',
    "CK" => 'جزر كوك',
    "MH" => 'جزر مارشال',
    "MP" => 'جزر ماريانا الشمالية',
    "CX" => 'جزيرة الكريسماس',
    "BV" => 'جزيرة بوفيه',
    "IM" => 'جزيرة مان',
    "NF" => 'جزيرة نورفوك',
    "HM" => 'جزيرة هيرد وجزر ماكدونالد',
    "CF" => 'جمهورية أفريقيا الوسطى',
    "CZ" => 'جمهورية التشيك',
    "DO" => 'جمهورية الدومينيكان',
    "ZA" => 'جنوب أفريقيا',
    "GT" => 'جواتيمالا',
    "GP" => 'جواديلوب',
    "GU" => 'جوام',
    "GE" => 'جورجيا',
    "GS" => 'جورجيا الجنوبية وجزر ساندويتش الجنوبية',
    "GY" => 'جيانا',
    "GF" => 'جيانا الفرنسية',
    "DJ" => 'جيبوتي',
    "JE" => 'جيرسي',
    "GG" => 'جيرنزي',
    "VA" => 'دولة الفاتيكان',
    "DM" => 'دومينيكا',
    "RW" => 'رواندا',
    "RU" => 'روسيا',
    "RO" => 'رومانيا',
    "RE" => 'ريونيون',
    "ZM" => 'زامبيا',
    "ZW" => 'زيمبابوي',
    "WS" => 'ساموا',
    "SM" => 'سان مارينو',
    "PM" => 'سانت بيير وميكولون',
    "VC" => 'سانت فينسنت وجرينادينز',
    "KN" => 'سانت كيتس ونيفيس',
    "LC" => 'سانت لوشيا',
    "SH" => 'سانت هيلينا',
    "ST" => 'ساوتوماي وبرينسيبا',
    "SJ" => 'سفالبارد وجان ماين',
    "SK" => 'سلوفاكيا',
    "SI" => 'سلوفينيا',
    "SG" => 'سنغافورة',
    "SZ" => 'سوازيلاند',
    "SY" => 'سوريا',
    "SR" => 'سورينام',
    "CH" => 'سويسرا',
    "SL" => 'سيراليون',
    "LK" => 'سيريلانكا',
    "SC" => 'سيشل',
    "RS" => 'صربيا',
    "TJ" => 'طاجيكستان',
    "OM" => 'عمان',
    "GH" => 'غانا',
    "GD" => 'غرينادا',
    "GN" => 'غينيا',
    "GQ" => 'غينيا الاستوائية',
    "GW" => 'غينيا بيساو',
    "VU" => 'فانواتو',
    "FR" => 'فرنسا',
    "VE" => 'فنزويلا',
    "FI" => 'فنلندا',
    "VN" => 'فيتنام',
    "CY" => 'قبرص',
    "QA" => 'قطر',
    "KG" => 'قيرقيزستان',
    "KZ" => 'كازاخستان',
    "NC" => 'كاليدونيا الجديدة',
    "KH" => 'كامبوديا',
    "HR" => 'كرواتيا',
    "CA" => 'كندا',
    "CU" => 'كوبا',
    "CI" => 'كوت ديفوار (ساحل العاج)',
    "KR" => 'كوريا',
    "KP" => 'كوريا الشمالية',
    "CR" => 'كوستاريكا',
    "CO" => 'كولومبيا',
    "KI" => 'كيريباتي',
    "KE" => 'كينيا',
    "LV" => 'لاتفيا',
    "LA" => 'لاوس',
    "LB" => 'لبنان',
    "LI" => 'لختنشتاين',
    "LU" => 'لوكسمبورج',
    "LY" => 'ليبيا',
    "LR" => 'ليبيريا',
    "LT" => 'ليتوانيا',
    "LS" => 'ليسوتو',
    "MQ" => 'مارتينيك',
    "MO" => 'ماكاو',
    "FM" => 'ماكرونيزيا',
    "MW" => 'مالاوي',
    "MT" => 'مالطا',
    "ML" => 'مالي',
    "MY" => 'ماليزيا',
    "YT" => 'مايوت',
    "MG" => 'مدغشقر',
    "EG" => 'مصر',
    "MK" => 'مقدونيا، جمهورية يوغوسلافيا السابقة',
    "BH" => 'مملكة البحرين',
    "MN" => 'منغوليا',
    "MR" => 'موريتانيا',
    "MU" => 'موريشيوس',
    "MZ" => 'موزمبيق',
    "MD" => 'مولدوفا',
    "MC" => 'موناكو',
    "MS" => 'مونتسيرات',
    "ME" => 'مونتينيغرو',
    "MM" => 'ميانمار',
    "NA" => 'ناميبيا',
    "NR" => 'ناورو',
    "NP" => 'نيبال',
    "NG" => 'نيجيريا',
    "NI" => 'نيكاراجوا',
    "NU" => 'نيوا',
    "NZ" => 'نيوزيلندا',
    "HT" => 'هايتي',
    "HN" => 'هندوراس',
    "NL" => 'هولندا',
    "HK" => 'هونغ كونغ SAR',
    "WF" => 'واليس وفوتونا'
];
    public $countries_en = [
        "ALL" => 'Select your Country...',
        "SA" => 'Saudi Arabia',
        "ET" => 'Ethiopia',
        "AZ" => 'Azerbaijan',
        "AM" => 'ARM',
        "AW" => 'Aruba',
        "ER" => 'Eritrea',
        "ES" => 'Spain',
        "AU" => 'Australia',
        "EE" => 'Estonia',
        "IL" => 'Israel',
        "AF" => 'Afghanistan',
        "IO" => 'British Indian Ocean Territory',
        "EC" => 'Ecuador',
        "AR" => 'Argentina',
        "JO" => 'Jordan',
        "AE" => 'United Arab Emirates',
        "AL" => 'Albania',
        "BR" => 'Brazil',
        "PT" => 'Portugal',
        "BA" => 'Bosnia and Herzegovina',
        "GA" => 'Gabon',
        "DZ" => 'Algeria',
        "DK" => 'Denmark',
        "CV" => 'Cape Verde',
        "PS" => 'PA',
        "SV" => 'El Salvador',
        "SN" => 'Senegal',
        "SD" => 'Sudan',
        "SE" => 'Sweden',
        "SO" => 'Somalia',
        "CN =" > 'China',
        "IQ" => 'Iraq',
        "PH" => 'Philippines',
        "CM" => 'Cameroon',
        "CG" => 'Congo',
        "CD" => 'Congo (Democratic Republic of the Congo)',
        "KW" => 'Kuwait',
        "DE" => 'Germany',
        "HU" => 'Hungary',
        "MA" => 'Morocco',
        "MX" => 'Mexico',
        "UK" => 'United Kingdom',
        "TF" => 'Southern French regions and Interactica regions',
        "NO" => 'Norway',
        "AT" => 'Austria',
        "NE" => 'Niger',
        "IN" => 'India',
        "US" => 'United States',
        "JP" => 'Japan',
        "YE" => 'Yemen',
        "GR" => 'Greece',
        "AQ" => 'Antarctica',
        "AG" => 'Antigua and Barbuda',
        "AD" => 'Andorra',
        "ID" => 'Indonesia',
        "AO" => 'Angola',
        "AI" => 'Anguilla',
        "UY" => 'Uruguay',
        "UZ" => 'Uzbekistan',
        "UG" => 'Uganda',
        "UA" => 'Ukraine',
        "IR" => 'Iran',
        "IE" => 'Ireland',
        "IS" => 'Iceland',
        "IT" => 'Italy',
        "PG" => 'Papua New Guinea',
        "PY" => 'Paraguay',
        "BB" => 'Barbados',
        "PK" => 'Pakistan',
        "PW" => 'Palau',
        "BM" => 'Bermuda',
        "BN" => 'Brunei',
        "BE" => 'Belgium',
        "BG" => 'Bulgaria',
        "BD" => 'Bangladesh',
        "PA" => 'Panama',
        "BJ" => 'Boys',
        "BT" => 'Bhutan',
        "BW" => 'Botswana',
        "PR" => 'Puerto Rico',
        "BF" => 'Burkina Faso',
        "BI" => 'Burundi',
        "PL" => 'Poland',
        "BO" => 'Bolivia',
        "PF" => 'French Polynesia',
        "PE" => 'Peru',
        "BY" => 'Belarus',
        "BZ" => 'Belize',
        "TH" => 'Thailand',
        "TW" => 'Taiwan',
        "TM" => 'Turkmenistan',
        "TR" => 'Turkey',
        "TT" => 'Trinidad and Tobago',
        "TD" => 'Chad',
        "CL" => 'Chile',
        "TZ" => 'Tanzania',
        "TG" => 'Togo',
        "TV" => 'TUV',
        "TK" => 'Tokelau',
        "TO" => 'Tonga',
        "TN" => 'Tunisia',
        "TP" => 'East Timor (East Timor)',
        "JM" => 'Jamaica',
        "GM" => 'Gambia',
        "GI" => 'Gibraltar',
        "GL" => 'Greenland',
        "AN" => 'Netherlands Antilles',
        "PN" => 'Biscuit Islands',
        "BS" => 'Bahamas',
        "VG" => 'British Virgin Islands',
        "VI" => 'Virgin Islands, United States',
        "KM" => 'Comoros',
        "CC" => 'Cocos Islands (Killeen)',
        "MV" => 'Maldives',
        "TC" => 'Turks and Caicos Islands',
        "AS" => 'American Samoa',
        "SB" => 'Solomon Islands',
        "FO" => 'Fairo Islands',
        "UM" => 'United States Minorities',
        "FK" => 'Falkland Islands (Isalas Malvinas)',
        "FJ" => 'Fiji Islands',
        "KY" => 'Cayman Islands',
        "CK" => 'Cook Islands',
        "MH" => 'Marshall Islands',
        "MP" => 'Northern Mariana Islands',
        "CX" => 'Christmas Island',
        "BV" => 'Buffet Island',
        "IM" => 'Isle of Man',
        "NF" => 'Norfolk Island',
        "HM" => 'Heard Island and McDonald Islands',
        "CF" => 'Central African Republic',
        "CZ" => 'Czech Republic',
        "DO" => 'Dominican Republic',
        "ZA" => 'South Africa',
        "GT" => 'Guatemala',
        "GP" => 'Guadeloupe',
        "GU" => 'GUAM',
        "GE" => 'Georgia',
        "GS" => 'South Georgia and the South Sandwich Islands',
        "GY" => 'Gianna',
        "GF" => 'French Guiana',
        "DJ" => 'Djibouti',
        "JE" => 'jersey',
        "GG" => 'Guernsey',
        "VA" => 'Vatican State',
        "DM" => 'Dominica',
        "RW" => 'Rwanda',
        "RU" => 'Russia',
        "RO" => 'Romania',
        "RE" => 'Reunion',
        "ZM" => 'Zambia',
        "ZW" => 'Zimbabwe',
        "WS" => 'Samoa',
        "SM" => 'San Marino',
        "PM" => 'Saint Pierre and Miquelon',
        "VC" => 'Saint Vincent and Grenadines',
        "KN" => 'Saint Kitts and Nevis',
        "LC" => 'Saint Lucia',
        "SH" => 'St. Helena',
        "ST" => 'Sao Tome and Principe',
        "SJ" => 'Svalbard and Jan Mayn',
        "SK" => 'Slovakia',
        "SI" => 'Slovenia',
        "SG" => 'Singapore',
        "SZ" => 'Swaziland',
        "SY" => 'Syria',
        "SR" => 'Suriname',
        "CH" => 'Switzerland',
        "SL" => 'Sierra Leone',
        "LK" => 'Sri Lanka',
        "SC" => 'Seychelles',
        "RS" => 'Serbia',
        "TJ" => 'Tajikistan',
        "OM" => 'Oman',
        "GH" => 'Ghana',
        "GD" => 'Grenada',
        "GN" => 'Guinea',
        "GQ" => 'Equatorial Guinea',
        "GW" => 'Guinea-Bissau',
        "VU" => 'Vanuatu',
        "FR" => 'France',
        "VE" => 'Venezuela',
        "FI" => 'Finland',
        "VN" => 'Vietnam',
        "CY" => 'Cyprus',
        "QA" => 'Qatar',
        "KG" => 'Kyrgyzstan',
        "KZ" => 'Kazakhstan',
        "NC" => 'New Caledonia',
        "KH" => 'Cambodia',
        "HR" => 'Croatia',
        "CA" => 'Canada',
        "CU" => 'Cuba',
        "CI" => 'Côte d Ivoire (Ivory Coast)',
        "KR" => 'Korea',
        "KP" => 'North Korea',
        "CR" => 'Costa Rica',
        "CO" => 'Columbia',
        "KI" => 'Kiribati',
        "KE" => 'Kenya',
        "LV" => 'Latvia',
        "LA" => 'Laos',
        "LB" => 'Lebanon',
        "LI" => 'Liechtenstein',
        "LU" => 'Luxembourg',
        "LY" => 'Libya',
        "LR" => 'Liberia',
        "LT" => 'Lithuania',
        "LS" => 'Lesotho',
        "MQ" => 'Martinique',
        "MO" => 'Macau',
        "FM" => 'Micronesia',
        "MW" => 'Malawi',
        "MT" => 'Malta',
        "ML" => 'Male',
        "MY" => 'Malaysia',
        "YT" => 'Mayotte',
        "MG" => 'Madagascar',
        "EG" => 'Egypt',
        "MK" => 'Macedonia, the former Yugoslavia',
        "BH" => 'Kingdom of Bahrain',
        "MN" => 'Mongolia',
        "MR" => 'Mauritania',
        "MU" => 'Mauritius',
        "MZ" => 'Mozambique',
        "MD" => 'Moldova',
        "MC" => 'Monaco',
        "MS" => 'Montserrat',
        "ME" => 'Montenegro',
        "MM" => 'Myanmar',
        "NA" => 'Namibia',
        "NR" => 'Nauru',
        "NP" => 'Nepal',
        "NG" => 'Nigeria',
        "NI" => 'Nicaragua',
        "NU" => 'Niwa',
        "NZ" => 'New Zealand',
        "HT" => 'Haiti',
        "HN" => 'Honduras',
        "NL" => 'Netherlands',
        "HK" => 'Hong Kong SAR',
        "WF" => 'Wallis and Futuna'
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function  chat_start($with,$idofserv){
//        $rooms =rooms::where(['parent'=>Auth::id(),'child'=>$with]);
////            ->orWhere(['parent'=>$with,'child'=>Auth::id()])
//        if($rooms->count() == 0):
        $serv = S
        dd($idofserv);
            $room = new rooms();
            $room->parent = Auth::id();
            $room->child = $with;
            $room->parentblock = false;
            $room->childblock = false;
            $room->save();
//        else:
            $room =$rooms->first();
//        endif;
        return redirect()->to(route('chat.view',$room->id));

    }
    public function send($mobile, $message)
    {
        $smsconfig = DB::table('smsapiconfigs')->first();
        $url = 'http://www.smsapril.com/api.php?' . http_build_query(array(
                'comm' => "sendsms",
                'user' => $smsconfig->user,
                'pass' => $smsconfig->pass,
                'to' => $mobile,
                'message' => $message,
                'sender' => $smsconfig->sender,
            ));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $content = curl_exec($ch);
        return $content;

    }


    public function chat_view($id)
    {

        $get_friends = rooms::where(function ($q) {
            $q->where([['parent', Auth::user()->id]])
                ->orWhere([['child', Auth::user()->id]]);
        })->get();

        $room = rooms::find($id);
        if ($room && ($room->parent == Auth::user()->id | $room->child == Auth::user()->id)) {
            $rooms_messages = messages::where([['roomid', $id]])->get();
            return view('chat_files.chat')->with('friends', $get_friends)->with('rooms_messages', $rooms_messages)->with('room', $room);
        } else {
            return abort(404);
        }


    }

    public function insert_messages(Request $re)
    {
        if ($re->ajax()) {

            $check_belong_room = rooms::where(function ($q) {

                $q->where([['parent', Auth::user()->id]])
                    ->orWhere([['child', Auth::user()->id]]);
            })->where([['id', $re->room]])->first();

            if ($check_belong_room != null) {
                if ($check_belong_room->parentblock == 0 && $check_belong_room->childblock == 0) {



                    $insert_message = DB::table('messages')
                        ->insert([
                            "message" => messages::valid_url($re->message),
                            "roomid" => $re->room,
                            "parent" => Auth::user()->id,
                            'file'   => (($re->file)? $re->file :null),
                            "created_at" => Carbon::now()
                        ]);
                    if ($insert_message) {
                        return response()->json(["success" => "true"]);
                    } else {
                        return response()->json(["success" => "again"]);
                    }

                } else {
                    return response()->json(["success" => "please try again"]);
                }

            } else {
                return response()->json(["success" => "why!!"]);
            }

        }

    }

    public function rooms_block($room_id)
    {
        $check_belong_room = rooms::where(function ($q) {
            $q->where([['parent', Auth::user()->id]])
                ->orWhere([['child', Auth::user()->id]]);
        })->where([['id', $room_id]])->first();
        if ($check_belong_room != null) {
            if ($check_belong_room->parent == Auth::user()->id) {
                if ($check_belong_room->childblock == 0) {
                    if ($check_belong_room->parentblock == 0) {
                        $value = 1;
                        $res = "block";
                    } else {
                        $value = 0;
                        $res = "unblock";
                    }
                    $update_block = DB::table('rooms')
                        ->where([['id', $room_id]])
                        ->update([
                            "parentblock" => $value,
                            "updated_at" => Carbon::now(),
                        ]);
                    return response()->json(["success" => $res, "element" => $check_belong_room->child]);
                } else {
                    return response()->json(["fail" => "sorry"]);
                }

            } elseif ($check_belong_room->child == Auth::user()->id) {
                if ($check_belong_room->parentblock == 0) {
                    if ($check_belong_room->childblock == 0) {
                        $value = 1;
                        $res = "block";
                    } else {
                        $value = 0;
                        $res = "unblock";
                    }
                    $update_block = DB::table('rooms')
                        ->where([['id', $room_id]])
                        ->update([
                            "childblock" => $value,
                            "updated_at" => Carbon::now(),
                        ]);
                    return response()->json(["success" => $res, "element" => $check_belong_room->parent]);
                } else {
                    return response()->json(["fail" => "sorry"]);
                }
            }
        } else {
            return response()->json(["success" => "why!!"]);
        }
    }

    public function room_upload(Request $re)
    {
        if ($re->ajax()) {
            $check_belong_room = rooms::where(function ($q) {
                $q->where([['parent', Auth::user()->id]])
                    ->orWhere([['child', Auth::user()->id]]);
            })->where([['id', $re->room]])->first();

            if ($check_belong_room != null) {
                if ($check_belong_room->parentblock == 0 && $check_belong_room->childblock == 0) {

                    if ($re->hasFile('image')) {

                        $theFile = $re->file('image');
                        $theType = ftype(getMimeType($theFile));

                        $extension = $theFile->getClientOriginalExtension();
                        $name = $theFile->getClientOriginalName() . time() . rand(19, 2002) . "." . $extension;
                        $path = ('uploads/users/' . Auth::id() . '/images/');
                        $theFile->move(public_path($path), $name);

                        $insert_message = DB::table('messages')
                            ->insert([
                                "message" => url($path . $name),
                                "file" => $theType,
                                "roomid" => $re->room,
                                "parent" => Auth::user()->id,
                                "created_at" => Carbon::now()
                            ]);


                        if ($insert_message) {
                            return response()->json(
                                [
                                    "success" => url($path . $name),
                                    'type'=>$theType
                                ]);
                        } else {
                            return response()->json(["error" => "again"]);
                        }
                    }elseif ($re->hasFile('color')){

                    } else{

                        $theFile = $re->file('doc');
                        $theType = ftype(getMimeType($theFile));

                        $extension = $theFile->getClientOriginalName();
                        $name =   time() . rand(19, 2002) . "." . $extension;
                        $path = ('uploads/users/' . Auth::id() . '/files/');
                        $theFile->move(public_path($path), $name);

                        $insert_message = DB::table('messages')
                            ->insert([
                                "message" => url($path . $name),
                                "file" => $theType,
                                "roomid" => $re->room,
                                "parent" => Auth::user()->id,
                                "created_at" => Carbon::now()
                            ]);


                        if ($insert_message) {
                            return response()->json(
                                [
                                    "success" => url($path . $name),
                                    'type'=>$theType
                                ]);
                        } else {
                            return response()->json(["error" => "again"]);
                        }
                    }

                } else {
                    return response()->json(["error" => "please try again"]);
                }

            } else {
                return response()->json(["success" => "why!!"]);
            }
        }
    }

    public function room_voice_upload(Request $re)
    {
        if ($re->ajax()) {
            $check_belong_room = rooms::where(function ($q) {
                $q->where([['parent', Auth::user()->id]])
                    ->orWhere([['child', Auth::user()->id]]);
            })->where([['id', $re->room]])->first();
            if ($check_belong_room != null) {
                if ($check_belong_room->parentblock == 0 && $check_belong_room->childblock == 0) {
                    $extension = $re->audio_data->getClientOriginalExtension().'.wav';
                    $name = "voices_attachment_" . time() . rand(19, 2002) . "." . $extension;
                    $path ='uploads/voices/';
                    $file = $re->audio_data->move(public_path($path), $name);

                    $insert_message = DB::table('messages')
                        ->insert([
                            "message" => url($path.$name),
                            "file" => 'audio',
                            "roomid" => $re->room,
                            "parent" => Auth::user()->id,
                            "created_at" => Carbon::now()
                        ]);
                    if ($insert_message) {
                        return response()->json(["success" => url($path.$name)]);
                    } else {
                        return response()->json(["success" => "again"]);
                    }

                } else {
                    return response()->json(["error" => "please try again"]);
                }

            } else {
                return response()->json(["success" => "why!!"]);
            }
        }
    }
}
