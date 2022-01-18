<?php

use App\Models\StationsLine;
use Illuminate\Database\Seeder;

class StationsLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StationsLine::query()->delete();
        $data = new StationsLine();
        
        $data->insert(array (
            0 => 
            array (
                'id' => 1001,
                'code' => '1001',
                'display_name' => '中央新幹線',
            ),
            1 => 
            array (
                'id' => 1002,
                'code' => '1002',
                'display_name' => '東海道新幹線',
            ),
            2 => 
            array (
                'id' => 1003,
                'code' => '1003',
                'display_name' => '山陽新幹線',
            ),
            3 => 
            array (
                'id' => 1004,
                'code' => '1004',
                'display_name' => '東北新幹線',
            ),
            4 => 
            array (
                'id' => 1005,
                'code' => '1005',
                'display_name' => '上越新幹線',
            ),
            5 => 
            array (
                'id' => 1006,
                'code' => '1006',
            'display_name' => '上越新幹線(ガーラ湯沢支線)',
            ),
            6 => 
            array (
                'id' => 1007,
                'code' => '1007',
                'display_name' => '山形新幹線',
            ),
            7 => 
            array (
                'id' => 1008,
                'code' => '1008',
                'display_name' => '秋田新幹線',
            ),
            8 => 
            array (
                'id' => 1009,
                'code' => '1009',
                'display_name' => '北陸新幹線',
            ),
            9 => 
            array (
                'id' => 1010,
                'code' => '1010',
                'display_name' => '九州新幹線',
            ),
            10 => 
            array (
                'id' => 1011,
                'code' => '1011',
                'display_name' => '北海道新幹線',
            ),
            11 => 
            array (
                'id' => 11101,
                'code' => '11101',
            'display_name' => 'JR函館本線(函館～長万部)',
            ),
            12 => 
            array (
                'id' => 11102,
                'code' => '11102',
            'display_name' => 'JR函館本線(長万部～小樽)',
            ),
            13 => 
            array (
                'id' => 11103,
                'code' => '11103',
            'display_name' => 'JR函館本線(小樽～旭川)',
            ),
            14 => 
            array (
                'id' => 11104,
                'code' => '11104',
            'display_name' => 'JR室蘭本線(長万部・室蘭～苫小牧)',
            ),
            15 => 
            array (
                'id' => 11105,
                'code' => '11105',
            'display_name' => 'JR室蘭本線(苫小牧～岩見沢)',
            ),
            16 => 
            array (
                'id' => 11106,
                'code' => '11106',
            'display_name' => 'JR根室本線(滝川～新得)',
            ),
            17 => 
            array (
                'id' => 11107,
                'code' => '11107',
            'display_name' => 'JR根室本線(新得～釧路)',
            ),
            18 => 
            array (
                'id' => 11108,
                'code' => '11108',
                'display_name' => '花咲線',
            ),
            19 => 
            array (
                'id' => 11109,
                'code' => '11109',
                'display_name' => 'JR千歳線',
            ),
            20 => 
            array (
                'id' => 11110,
                'code' => '11110',
                'display_name' => 'JR石勝線',
            ),
            21 => 
            array (
                'id' => 11111,
                'code' => '11111',
                'display_name' => 'JR日高本線',
            ),
            22 => 
            array (
                'id' => 11112,
                'code' => '11112',
                'display_name' => 'JR札沼線',
            ),
            23 => 
            array (
                'id' => 11113,
                'code' => '11113',
                'display_name' => 'JR留萌本線',
            ),
            24 => 
            array (
                'id' => 11114,
                'code' => '11114',
                'display_name' => 'JR富良野線',
            ),
            25 => 
            array (
                'id' => 11115,
                'code' => '11115',
                'display_name' => 'JR宗谷本線',
            ),
            26 => 
            array (
                'id' => 11116,
                'code' => '11116',
                'display_name' => 'JR石北本線',
            ),
            27 => 
            array (
                'id' => 11117,
                'code' => '11117',
                'display_name' => 'JR釧網本線',
            ),
            28 => 
            array (
                'id' => 11118,
                'code' => '11118',
                'display_name' => 'JR海峡線',
            ),
            29 => 
            array (
                'id' => 11119,
                'code' => '11119',
                'display_name' => 'JR江差線',
            ),
            30 => 
            array (
                'id' => 11201,
                'code' => '11201',
            'display_name' => 'JR東北本線(八戸～青森)',
            ),
            31 => 
            array (
                'id' => 11202,
                'code' => '11202',
            'display_name' => 'JR奥羽本線(新庄～青森)',
            ),
            32 => 
            array (
                'id' => 11203,
                'code' => '11203',
                'display_name' => 'はまなすベイライン大湊線',
            ),
            33 => 
            array (
                'id' => 11204,
                'code' => '11204',
                'display_name' => 'JR五能線',
            ),
            34 => 
            array (
                'id' => 11205,
                'code' => '11205',
                'display_name' => 'JR津軽線',
            ),
            35 => 
            array (
                'id' => 11206,
                'code' => '11206',
                'display_name' => 'JR八戸線',
            ),
            36 => 
            array (
                'id' => 11207,
                'code' => '11207',
                'display_name' => 'JR岩泉線',
            ),
            37 => 
            array (
                'id' => 11208,
                'code' => '11208',
                'display_name' => 'ドラゴンレール大船渡線',
            ),
            38 => 
            array (
                'id' => 11209,
                'code' => '11209',
                'display_name' => '銀河ドリームライン釜石線',
            ),
            39 => 
            array (
                'id' => 11210,
                'code' => '11210',
                'display_name' => 'JR北上線',
            ),
            40 => 
            array (
                'id' => 11211,
                'code' => '11211',
                'display_name' => 'JR田沢湖線',
            ),
            41 => 
            array (
                'id' => 11212,
                'code' => '11212',
                'display_name' => '十和田八幡平四季彩ライン',
            ),
            42 => 
            array (
                'id' => 11213,
                'code' => '11213',
                'display_name' => 'JR山田線',
            ),
            43 => 
            array (
                'id' => 11214,
                'code' => '11214',
                'display_name' => 'JR羽越本線',
            ),
            44 => 
            array (
                'id' => 11215,
                'code' => '11215',
                'display_name' => 'JR男鹿線',
            ),
            45 => 
            array (
                'id' => 11216,
                'code' => '11216',
                'display_name' => '山形線',
            ),
            46 => 
            array (
                'id' => 11217,
                'code' => '11217',
                'display_name' => 'JR仙山線',
            ),
            47 => 
            array (
                'id' => 11218,
                'code' => '11218',
                'display_name' => 'フルーツライン左沢線',
            ),
            48 => 
            array (
                'id' => 11219,
                'code' => '11219',
                'display_name' => 'JR米坂線',
            ),
            49 => 
            array (
                'id' => 11220,
                'code' => '11220',
                'display_name' => '奥の細道最上川ライン',
            ),
            50 => 
            array (
                'id' => 11221,
                'code' => '11221',
                'display_name' => '奥の細道湯けむりライン',
            ),
            51 => 
            array (
                'id' => 11222,
                'code' => '11222',
                'display_name' => 'JR仙石線',
            ),
            52 => 
            array (
                'id' => 11223,
                'code' => '11223',
                'display_name' => 'JR石巻線',
            ),
            53 => 
            array (
                'id' => 11224,
                'code' => '11224',
                'display_name' => 'JR気仙沼線',
            ),
            54 => 
            array (
                'id' => 11225,
                'code' => '11225',
            'display_name' => 'JR磐越西線(郡山～会津若松)',
            ),
            55 => 
            array (
                'id' => 11226,
                'code' => '11226',
                'display_name' => '森と水とロマンの鉄道',
            ),
            56 => 
            array (
                'id' => 11227,
                'code' => '11227',
                'display_name' => 'JR只見線',
            ),
            57 => 
            array (
                'id' => 11228,
                'code' => '11228',
                'display_name' => 'ゆうゆうあぶくまライン',
            ),
            58 => 
            array (
                'id' => 11229,
                'code' => '11229',
            'display_name' => 'JR常磐線(取手～いわき)',
            ),
            59 => 
            array (
                'id' => 11230,
                'code' => '11230',
            'display_name' => 'JR常磐線(いわき～仙台)',
            ),
            60 => 
            array (
                'id' => 11231,
                'code' => '11231',
            'display_name' => 'JR東北本線(黒磯～利府・盛岡)',
            ),
            61 => 
            array (
                'id' => 11301,
                'code' => '11301',
            'display_name' => 'JR東海道本線(東京～熱海)',
            ),
            62 => 
            array (
                'id' => 11302,
                'code' => '11302',
                'display_name' => 'JR山手線',
            ),
            63 => 
            array (
                'id' => 11303,
                'code' => '11303',
                'display_name' => 'JR南武線',
            ),
            64 => 
            array (
                'id' => 11304,
                'code' => '11304',
                'display_name' => 'JR鶴見線',
            ),
            65 => 
            array (
                'id' => 11305,
                'code' => '11305',
                'display_name' => 'JR武蔵野線',
            ),
            66 => 
            array (
                'id' => 11306,
                'code' => '11306',
                'display_name' => 'JR横浜線',
            ),
            67 => 
            array (
                'id' => 11307,
                'code' => '11307',
                'display_name' => 'JR根岸線',
            ),
            68 => 
            array (
                'id' => 11308,
                'code' => '11308',
                'display_name' => 'JR横須賀線',
            ),
            69 => 
            array (
                'id' => 11309,
                'code' => '11309',
                'display_name' => 'JR相模線',
            ),
            70 => 
            array (
                'id' => 11311,
                'code' => '11311',
            'display_name' => 'JR中央本線(東京～塩尻)',
            ),
            71 => 
            array (
                'id' => 11312,
                'code' => '11312',
            'display_name' => 'JR中央線(快速)',
            ),
            72 => 
            array (
                'id' => 11313,
                'code' => '11313',
                'display_name' => 'JR中央・総武線',
            ),
            73 => 
            array (
                'id' => 11314,
                'code' => '11314',
                'display_name' => 'JR総武本線',
            ),
            74 => 
            array (
                'id' => 11315,
                'code' => '11315',
                'display_name' => 'JR青梅線',
            ),
            75 => 
            array (
                'id' => 11316,
                'code' => '11316',
                'display_name' => 'JR五日市線',
            ),
            76 => 
            array (
                'id' => 11317,
                'code' => '11317',
            'display_name' => 'JR八高線(八王子～高麗川)',
            ),
            77 => 
            array (
                'id' => 11318,
                'code' => '11318',
            'display_name' => 'JR八高線(高麗川～高崎)',
            ),
            78 => 
            array (
                'id' => 11319,
                'code' => '11319',
                'display_name' => '宇都宮線',
            ),
            79 => 
            array (
                'id' => 11320,
                'code' => '11320',
            'display_name' => 'JR常磐線(上野～取手)',
            ),
            80 => 
            array (
                'id' => 11321,
                'code' => '11321',
                'display_name' => 'JR埼京線',
            ),
            81 => 
            array (
                'id' => 11322,
                'code' => '11322',
                'display_name' => 'JR川越線',
            ),
            82 => 
            array (
                'id' => 11323,
                'code' => '11323',
                'display_name' => 'JR高崎線',
            ),
            83 => 
            array (
                'id' => 11324,
                'code' => '11324',
                'display_name' => 'JR外房線',
            ),
            84 => 
            array (
                'id' => 11325,
                'code' => '11325',
                'display_name' => 'JR内房線',
            ),
            85 => 
            array (
                'id' => 11326,
                'code' => '11326',
                'display_name' => 'JR京葉線',
            ),
            86 => 
            array (
                'id' => 11327,
                'code' => '11327',
                'display_name' => 'JR成田線',
            ),
            87 => 
            array (
                'id' => 11328,
                'code' => '11328',
                'display_name' => 'JR成田エクスプレス',
            ),
            88 => 
            array (
                'id' => 11329,
                'code' => '11329',
                'display_name' => 'JR鹿島線',
            ),
            89 => 
            array (
                'id' => 11330,
                'code' => '11330',
                'display_name' => 'JR久留里線',
            ),
            90 => 
            array (
                'id' => 11331,
                'code' => '11331',
                'display_name' => 'JR東金線',
            ),
            91 => 
            array (
                'id' => 11332,
                'code' => '11332',
                'display_name' => 'JR京浜東北線',
            ),
            92 => 
            array (
                'id' => 11333,
                'code' => '11333',
                'display_name' => 'JR湘南新宿ライン',
            ),
            93 => 
            array (
                'id' => 11334,
                'code' => '11334',
                'display_name' => 'JR烏山線',
            ),
            94 => 
            array (
                'id' => 11335,
                'code' => '11335',
                'display_name' => 'JR吾妻線',
            ),
            95 => 
            array (
                'id' => 11337,
                'code' => '11337',
                'display_name' => 'JR信越本線',
            ),
            96 => 
            array (
                'id' => 11338,
                'code' => '11338',
                'display_name' => 'JR水郡線',
            ),
            97 => 
            array (
                'id' => 11339,
                'code' => '11339',
                'display_name' => 'JR水戸線',
            ),
            98 => 
            array (
                'id' => 11340,
                'code' => '11340',
                'display_name' => 'JR日光線',
            ),
            99 => 
            array (
                'id' => 11341,
                'code' => '11341',
                'display_name' => 'JR両毛線',
            ),
            100 => 
            array (
                'id' => 11342,
                'code' => '11342',
                'display_name' => 'JR上越線',
            ),
            101 => 
            array (
                'id' => 11343,
                'code' => '11343',
                'display_name' => '上野東京ライン',
            ),
            102 => 
            array (
                'id' => 11401,
                'code' => '11401',
                'display_name' => '八ヶ岳高原線',
            ),
            103 => 
            array (
                'id' => 11402,
                'code' => '11402',
                'display_name' => 'JR身延線',
            ),
            104 => 
            array (
                'id' => 11403,
                'code' => '11403',
            'display_name' => 'JR信越本線(篠ノ井～長野)',
            ),
            105 => 
            array (
                'id' => 11404,
                'code' => '11404',
            'display_name' => 'JR信越本線(直江津～新潟)',
            ),
            106 => 
            array (
                'id' => 11405,
                'code' => '11405',
            'display_name' => 'JR北陸本線(富山～直江津)',
            ),
            107 => 
            array (
                'id' => 11406,
                'code' => '11406',
                'display_name' => 'JR白新線',
            ),
            108 => 
            array (
                'id' => 11407,
                'code' => '11407',
                'display_name' => 'JR飯山線',
            ),
            109 => 
            array (
                'id' => 11408,
                'code' => '11408',
                'display_name' => 'JR越後線',
            ),
            110 => 
            array (
                'id' => 11409,
                'code' => '11409',
                'display_name' => '北アルプス線',
            ),
            111 => 
            array (
                'id' => 11410,
                'code' => '11410',
                'display_name' => 'JR弥彦線',
            ),
            112 => 
            array (
                'id' => 11411,
                'code' => '11411',
            'display_name' => 'JR中央本線(名古屋～塩尻)',
            ),
            113 => 
            array (
                'id' => 11412,
                'code' => '11412',
                'display_name' => 'JR篠ノ井線',
            ),
            114 => 
            array (
                'id' => 11413,
                'code' => '11413',
            'display_name' => 'JR飯田線(豊橋～天竜峡)',
            ),
            115 => 
            array (
                'id' => 11414,
                'code' => '11414',
            'display_name' => 'JR飯田線(天竜峡～辰野)',
            ),
            116 => 
            array (
                'id' => 11415,
                'code' => '11415',
            'display_name' => 'JR北陸本線(米原～金沢)',
            ),
            117 => 
            array (
                'id' => 11416,
                'code' => '11416',
                'display_name' => 'JR高山本線',
            ),
            118 => 
            array (
                'id' => 11417,
                'code' => '11417',
                'display_name' => 'JR城端線',
            ),
            119 => 
            array (
                'id' => 11418,
                'code' => '11418',
                'display_name' => 'JR氷見線',
            ),
            120 => 
            array (
                'id' => 11419,
                'code' => '11419',
                'display_name' => 'JR七尾線',
            ),
            121 => 
            array (
                'id' => 11420,
                'code' => '11420',
                'display_name' => '敦賀港線',
            ),
            122 => 
            array (
                'id' => 11421,
                'code' => '11421',
                'display_name' => '九頭竜線',
            ),
            123 => 
            array (
                'id' => 11422,
                'code' => '11422',
                'display_name' => 'JR小浜線',
            ),
            124 => 
            array (
                'id' => 11501,
                'code' => '11501',
            'display_name' => 'JR東海道本線(熱海～浜松)',
            ),
            125 => 
            array (
                'id' => 11502,
                'code' => '11502',
            'display_name' => 'JR東海道本線(浜松～岐阜)',
            ),
            126 => 
            array (
                'id' => 11503,
                'code' => '11503',
            'display_name' => 'JR東海道本線(岐阜～美濃赤坂・米原)',
            ),
            127 => 
            array (
                'id' => 11504,
                'code' => '11504',
                'display_name' => 'JR伊東線',
            ),
            128 => 
            array (
                'id' => 11505,
                'code' => '11505',
                'display_name' => 'JR御殿場線',
            ),
            129 => 
            array (
                'id' => 11506,
                'code' => '11506',
                'display_name' => 'JR武豊線',
            ),
            130 => 
            array (
                'id' => 11507,
                'code' => '11507',
                'display_name' => 'JR太多線',
            ),
            131 => 
            array (
                'id' => 11508,
                'code' => '11508',
            'display_name' => 'JR関西本線(名古屋～亀山)',
            ),
            132 => 
            array (
                'id' => 11509,
                'code' => '11509',
            'display_name' => 'JR関西本線(亀山～加茂)',
            ),
            133 => 
            array (
                'id' => 11510,
                'code' => '11510',
                'display_name' => 'JR紀勢本線',
            ),
            134 => 
            array (
                'id' => 11511,
                'code' => '11511',
                'display_name' => 'JR草津線',
            ),
            135 => 
            array (
                'id' => 11512,
                'code' => '11512',
                'display_name' => 'JR参宮線',
            ),
            136 => 
            array (
                'id' => 11513,
                'code' => '11513',
                'display_name' => 'JR名松線',
            ),
            137 => 
            array (
                'id' => 11601,
                'code' => '11601',
                'display_name' => '琵琶湖線',
            ),
            138 => 
            array (
                'id' => 11602,
                'code' => '11602',
                'display_name' => '京都線',
            ),
            139 => 
            array (
                'id' => 11603,
                'code' => '11603',
            'display_name' => 'JR神戸線(大阪～神戸)',
            ),
            140 => 
            array (
                'id' => 11605,
                'code' => '11605',
                'display_name' => 'JR湖西線',
            ),
            141 => 
            array (
                'id' => 11607,
                'code' => '11607',
                'display_name' => '大和路線',
            ),
            142 => 
            array (
                'id' => 11608,
                'code' => '11608',
            'display_name' => 'JR神戸線(神戸～姫路)',
            ),
            143 => 
            array (
                'id' => 11609,
                'code' => '11609',
            'display_name' => 'JR山陽本線(姫路～岡山)',
            ),
            144 => 
            array (
                'id' => 11610,
                'code' => '11610',
            'display_name' => 'JR山陽本線(岡山～三原)',
            ),
            145 => 
            array (
                'id' => 11611,
                'code' => '11611',
            'display_name' => 'JR山陽本線(三原～岩国)',
            ),
            146 => 
            array (
                'id' => 11612,
                'code' => '11612',
            'display_name' => 'JR山陽本線(岩国～門司)',
            ),
            147 => 
            array (
                'id' => 11613,
                'code' => '11613',
            'display_name' => 'JR山陽本線(兵庫～和田岬)',
            ),
            148 => 
            array (
                'id' => 11614,
                'code' => '11614',
                'display_name' => '嵯峨野線',
            ),
            149 => 
            array (
                'id' => 11615,
                'code' => '11615',
            'display_name' => 'JR山陰本線(園部～豊岡)',
            ),
            150 => 
            array (
                'id' => 11616,
                'code' => '11616',
            'display_name' => 'JR山陰本線(豊岡～米子)',
            ),
            151 => 
            array (
                'id' => 11617,
                'code' => '11617',
                'display_name' => '学研都市線',
            ),
            152 => 
            array (
                'id' => 11618,
                'code' => '11618',
                'display_name' => '奈良線',
            ),
            153 => 
            array (
                'id' => 11622,
                'code' => '11622',
                'display_name' => 'JR舞鶴線',
            ),
            154 => 
            array (
                'id' => 11623,
                'code' => '11623',
                'display_name' => '大阪環状線',
            ),
            155 => 
            array (
                'id' => 11624,
                'code' => '11624',
                'display_name' => 'JRゆめ咲線',
            ),
            156 => 
            array (
                'id' => 11625,
                'code' => '11625',
                'display_name' => 'JR東西線',
            ),
            157 => 
            array (
                'id' => 11626,
                'code' => '11626',
            'display_name' => '阪和線(天王寺～和歌山)',
            ),
            158 => 
            array (
                'id' => 11627,
                'code' => '11627',
                'display_name' => '羽衣線',
            ),
            159 => 
            array (
                'id' => 11628,
                'code' => '11628',
                'display_name' => 'JR関西空港線',
            ),
            160 => 
            array (
                'id' => 11629,
                'code' => '11629',
                'display_name' => 'JR宝塚線',
            ),
            161 => 
            array (
                'id' => 11630,
                'code' => '11630',
            'display_name' => '福知山線(篠山口～福知山)',
            ),
            162 => 
            array (
                'id' => 11631,
                'code' => '11631',
                'display_name' => 'JR赤穂線',
            ),
            163 => 
            array (
                'id' => 11632,
                'code' => '11632',
                'display_name' => 'JR加古川線',
            ),
            164 => 
            array (
                'id' => 11633,
                'code' => '11633',
            'display_name' => 'JR姫新線(姫路～佐用)',
            ),
            165 => 
            array (
                'id' => 11634,
                'code' => '11634',
            'display_name' => 'JR姫新線(佐用～新見)',
            ),
            166 => 
            array (
                'id' => 11635,
                'code' => '11635',
                'display_name' => 'JR播但線',
            ),
            167 => 
            array (
                'id' => 11636,
                'code' => '11636',
                'display_name' => 'JR和歌山線',
            ),
            168 => 
            array (
                'id' => 11637,
                'code' => '11637',
                'display_name' => '万葉まほろば線',
            ),
            169 => 
            array (
                'id' => 11639,
                'code' => '11639',
                'display_name' => 'きのくに線',
            ),
            170 => 
            array (
                'id' => 11640,
                'code' => '11640',
            'display_name' => '紀勢本線(和歌山～和歌山市)',
            ),
            171 => 
            array (
                'id' => 11641,
                'code' => '11641',
                'display_name' => 'おおさか東線',
            ),
            172 => 
            array (
                'id' => 11701,
                'code' => '11701',
            'display_name' => 'JR山陰本線(米子～益田)',
            ),
            173 => 
            array (
                'id' => 11702,
                'code' => '11702',
            'display_name' => 'JR山陰本線(益田～下関)',
            ),
            174 => 
            array (
                'id' => 11703,
                'code' => '11703',
                'display_name' => 'JR伯備線',
            ),
            175 => 
            array (
                'id' => 11704,
                'code' => '11704',
                'display_name' => 'JR因美線',
            ),
            176 => 
            array (
                'id' => 11705,
                'code' => '11705',
                'display_name' => 'JR境線',
            ),
            177 => 
            array (
                'id' => 11706,
                'code' => '11706',
                'display_name' => 'JR木次線',
            ),
            178 => 
            array (
                'id' => 11707,
                'code' => '11707',
                'display_name' => 'JR三江線',
            ),
            179 => 
            array (
                'id' => 11708,
                'code' => '11708',
                'display_name' => 'JR山口線',
            ),
            180 => 
            array (
                'id' => 11709,
                'code' => '11709',
                'display_name' => 'JR宇野線',
            ),
            181 => 
            array (
                'id' => 11710,
                'code' => '11710',
                'display_name' => '瀬戸大橋線',
            ),
            182 => 
            array (
                'id' => 11713,
                'code' => '11713',
                'display_name' => 'JR吉備線',
            ),
            183 => 
            array (
                'id' => 11714,
                'code' => '11714',
                'display_name' => 'JR芸備線',
            ),
            184 => 
            array (
                'id' => 11715,
                'code' => '11715',
                'display_name' => 'JR津山線',
            ),
            185 => 
            array (
                'id' => 11716,
                'code' => '11716',
                'display_name' => 'JR呉線',
            ),
            186 => 
            array (
                'id' => 11717,
                'code' => '11717',
                'display_name' => 'JR可部線',
            ),
            187 => 
            array (
                'id' => 11720,
                'code' => '11720',
                'display_name' => 'JR福塩線',
            ),
            188 => 
            array (
                'id' => 11721,
                'code' => '11721',
                'display_name' => 'JR宇部線',
            ),
            189 => 
            array (
                'id' => 11722,
                'code' => '11722',
                'display_name' => 'JR美祢線',
            ),
            190 => 
            array (
                'id' => 11723,
                'code' => '11723',
                'display_name' => 'JR小野田線',
            ),
            191 => 
            array (
                'id' => 11724,
                'code' => '11724',
                'display_name' => 'JR岩徳線',
            ),
            192 => 
            array (
                'id' => 11801,
                'code' => '11801',
                'display_name' => 'JR土讃線',
            ),
            193 => 
            array (
                'id' => 11802,
                'code' => '11802',
                'display_name' => 'JR高徳線',
            ),
            194 => 
            array (
                'id' => 11803,
                'code' => '11803',
                'display_name' => 'よしの川ブルーライン',
            ),
            195 => 
            array (
                'id' => 11804,
                'code' => '11804',
                'display_name' => 'JR牟岐線',
            ),
            196 => 
            array (
                'id' => 11805,
                'code' => '11805',
                'display_name' => 'JR鳴門線',
            ),
            197 => 
            array (
                'id' => 11806,
                'code' => '11806',
                'display_name' => 'JR予讃線',
            ),
            198 => 
            array (
                'id' => 11807,
                'code' => '11807',
                'display_name' => 'JR予讃・内子線',
            ),
            199 => 
            array (
                'id' => 11808,
                'code' => '11808',
                'display_name' => 'しまんとグリーンライン',
            ),
            200 => 
            array (
                'id' => 11901,
                'code' => '11901',
                'display_name' => 'JR博多南線',
            ),
            201 => 
            array (
                'id' => 11902,
                'code' => '11902',
            'display_name' => 'JR鹿児島本線(下関・門司港～博多)',
            ),
            202 => 
            array (
                'id' => 11903,
                'code' => '11903',
            'display_name' => 'JR鹿児島本線(博多～八代)',
            ),
            203 => 
            array (
                'id' => 11904,
                'code' => '11904',
            'display_name' => 'JR鹿児島本線(川内～鹿児島)',
            ),
            204 => 
            array (
                'id' => 11905,
                'code' => '11905',
            'display_name' => 'JR長崎本線(鳥栖～長崎)',
            ),
            205 => 
            array (
                'id' => 11906,
                'code' => '11906',
            'display_name' => 'JR日豊本線(門司港～佐伯)',
            ),
            206 => 
            array (
                'id' => 11907,
                'code' => '11907',
            'display_name' => 'JR日豊本線(佐伯～鹿児島中央)',
            ),
            207 => 
            array (
                'id' => 11908,
                'code' => '11908',
                'display_name' => '福北ゆたか線',
            ),
            208 => 
            array (
                'id' => 11909,
                'code' => '11909',
            'display_name' => 'JR筑肥線(姪浜～西唐津)',
            ),
            209 => 
            array (
                'id' => 11910,
                'code' => '11910',
                'display_name' => '若松線',
            ),
            210 => 
            array (
                'id' => 11911,
                'code' => '11911',
            'display_name' => '福北ゆたか線(折尾～桂川)',
            ),
            211 => 
            array (
                'id' => 11912,
                'code' => '11912',
                'display_name' => '原田線',
            ),
            212 => 
            array (
                'id' => 11913,
                'code' => '11913',
                'display_name' => 'ゆふ高原線',
            ),
            213 => 
            array (
                'id' => 11914,
                'code' => '11914',
                'display_name' => 'JR日田彦山線',
            ),
            214 => 
            array (
                'id' => 11915,
                'code' => '11915',
                'display_name' => 'JR後藤寺線',
            ),
            215 => 
            array (
                'id' => 11916,
                'code' => '11916',
                'display_name' => '海の中道線',
            ),
            216 => 
            array (
                'id' => 11917,
                'code' => '11917',
            'display_name' => 'JR香椎線(香椎～宇美)',
            ),
            217 => 
            array (
                'id' => 11918,
                'code' => '11918',
                'display_name' => 'JR佐世保線',
            ),
            218 => 
            array (
                'id' => 11920,
                'code' => '11920',
            'display_name' => 'JR筑肥線(西唐津～伊万里)',
            ),
            219 => 
            array (
                'id' => 11921,
                'code' => '11921',
                'display_name' => 'JR唐津線',
            ),
            220 => 
            array (
                'id' => 11922,
                'code' => '11922',
                'display_name' => 'JR大村線',
            ),
            221 => 
            array (
                'id' => 11923,
                'code' => '11923',
                'display_name' => '阿蘇高原線',
            ),
            222 => 
            array (
                'id' => 11924,
                'code' => '11924',
                'display_name' => 'JR三角線',
            ),
            223 => 
            array (
                'id' => 11925,
                'code' => '11925',
            'display_name' => 'えびの高原線(八代～吉松)',
            ),
            224 => 
            array (
                'id' => 11926,
                'code' => '11926',
            'display_name' => 'JR肥薩線(吉松～隼人)',
            ),
            225 => 
            array (
                'id' => 11927,
                'code' => '11927',
                'display_name' => 'JR宮崎空港線',
            ),
            226 => 
            array (
                'id' => 11928,
                'code' => '11928',
                'display_name' => 'JR日南線',
            ),
            227 => 
            array (
                'id' => 11929,
                'code' => '11929',
                'display_name' => 'えびの高原線',
            ),
            228 => 
            array (
                'id' => 11930,
                'code' => '11930',
                'display_name' => 'JR指宿枕崎線',
            ),
            229 => 
            array (
                'id' => 21001,
                'code' => '21001',
                'display_name' => '東武東上線',
            ),
            230 => 
            array (
                'id' => 21002,
                'code' => '21002',
                'display_name' => '東武伊勢崎線',
            ),
            231 => 
            array (
                'id' => 21003,
                'code' => '21003',
                'display_name' => '東武日光線',
            ),
            232 => 
            array (
                'id' => 21004,
                'code' => '21004',
                'display_name' => '東武野田線',
            ),
            233 => 
            array (
                'id' => 21005,
                'code' => '21005',
                'display_name' => '東武亀戸線',
            ),
            234 => 
            array (
                'id' => 21006,
                'code' => '21006',
                'display_name' => '東武大師線',
            ),
            235 => 
            array (
                'id' => 21007,
                'code' => '21007',
                'display_name' => '東武越生線',
            ),
            236 => 
            array (
                'id' => 21008,
                'code' => '21008',
                'display_name' => '東武宇都宮線',
            ),
            237 => 
            array (
                'id' => 21009,
                'code' => '21009',
                'display_name' => '東武鬼怒川線',
            ),
            238 => 
            array (
                'id' => 21010,
                'code' => '21010',
                'display_name' => '東武佐野線',
            ),
            239 => 
            array (
                'id' => 21011,
                'code' => '21011',
                'display_name' => '東武桐生線',
            ),
            240 => 
            array (
                'id' => 21012,
                'code' => '21012',
                'display_name' => '東武小泉線',
            ),
            241 => 
            array (
                'id' => 22001,
                'code' => '22001',
                'display_name' => '西武池袋線',
            ),
            242 => 
            array (
                'id' => 22002,
                'code' => '22002',
                'display_name' => '西武秩父線',
            ),
            243 => 
            array (
                'id' => 22003,
                'code' => '22003',
                'display_name' => '西武有楽町線',
            ),
            244 => 
            array (
                'id' => 22004,
                'code' => '22004',
                'display_name' => '西武豊島線',
            ),
            245 => 
            array (
                'id' => 22005,
                'code' => '22005',
                'display_name' => '西武狭山線',
            ),
            246 => 
            array (
                'id' => 22006,
                'code' => '22006',
                'display_name' => 'レオライナー',
            ),
            247 => 
            array (
                'id' => 22007,
                'code' => '22007',
                'display_name' => '西武新宿線',
            ),
            248 => 
            array (
                'id' => 22008,
                'code' => '22008',
                'display_name' => '西武拝島線',
            ),
            249 => 
            array (
                'id' => 22009,
                'code' => '22009',
                'display_name' => '西武西武園線',
            ),
            250 => 
            array (
                'id' => 22010,
                'code' => '22010',
                'display_name' => '西武国分寺線',
            ),
            251 => 
            array (
                'id' => 22011,
                'code' => '22011',
                'display_name' => '西武多摩湖線',
            ),
            252 => 
            array (
                'id' => 22012,
                'code' => '22012',
                'display_name' => '西武多摩川線',
            ),
            253 => 
            array (
                'id' => 23001,
                'code' => '23001',
                'display_name' => '京成本線',
            ),
            254 => 
            array (
                'id' => 23002,
                'code' => '23002',
                'display_name' => '京成押上線',
            ),
            255 => 
            array (
                'id' => 23003,
                'code' => '23003',
                'display_name' => '京成金町線',
            ),
            256 => 
            array (
                'id' => 23004,
                'code' => '23004',
                'display_name' => '京成千葉線',
            ),
            257 => 
            array (
                'id' => 23005,
                'code' => '23005',
                'display_name' => '京成千原線',
            ),
            258 => 
            array (
                'id' => 23006,
                'code' => '23006',
                'display_name' => '成田スカイアクセス',
            ),
            259 => 
            array (
                'id' => 24001,
                'code' => '24001',
                'display_name' => '京王線',
            ),
            260 => 
            array (
                'id' => 24002,
                'code' => '24002',
                'display_name' => '京王相模原線',
            ),
            261 => 
            array (
                'id' => 24003,
                'code' => '24003',
                'display_name' => '京王高尾線',
            ),
            262 => 
            array (
                'id' => 24004,
                'code' => '24004',
                'display_name' => '京王競馬場線',
            ),
            263 => 
            array (
                'id' => 24005,
                'code' => '24005',
                'display_name' => '京王動物園線',
            ),
            264 => 
            array (
                'id' => 24006,
                'code' => '24006',
                'display_name' => '京王井の頭線',
            ),
            265 => 
            array (
                'id' => 24007,
                'code' => '24007',
                'display_name' => '京王新線',
            ),
            266 => 
            array (
                'id' => 25001,
                'code' => '25001',
                'display_name' => '小田急線',
            ),
            267 => 
            array (
                'id' => 25002,
                'code' => '25002',
                'display_name' => '小田急江ノ島線',
            ),
            268 => 
            array (
                'id' => 25003,
                'code' => '25003',
                'display_name' => '小田急多摩線',
            ),
            269 => 
            array (
                'id' => 26001,
                'code' => '26001',
                'display_name' => '東急東横線',
            ),
            270 => 
            array (
                'id' => 26002,
                'code' => '26002',
                'display_name' => '東急目黒線',
            ),
            271 => 
            array (
                'id' => 26003,
                'code' => '26003',
                'display_name' => '東急田園都市線',
            ),
            272 => 
            array (
                'id' => 26004,
                'code' => '26004',
                'display_name' => '東急大井町線',
            ),
            273 => 
            array (
                'id' => 26005,
                'code' => '26005',
                'display_name' => '東急池上線',
            ),
            274 => 
            array (
                'id' => 26006,
                'code' => '26006',
                'display_name' => '東急多摩川線',
            ),
            275 => 
            array (
                'id' => 26007,
                'code' => '26007',
                'display_name' => '東急世田谷線',
            ),
            276 => 
            array (
                'id' => 26008,
                'code' => '26008',
                'display_name' => '東急こどもの国線',
            ),
            277 => 
            array (
                'id' => 27001,
                'code' => '27001',
                'display_name' => '京急本線',
            ),
            278 => 
            array (
                'id' => 27002,
                'code' => '27002',
                'display_name' => '京急空港線',
            ),
            279 => 
            array (
                'id' => 27003,
                'code' => '27003',
                'display_name' => '京急大師線',
            ),
            280 => 
            array (
                'id' => 27004,
                'code' => '27004',
                'display_name' => '京急逗子線',
            ),
            281 => 
            array (
                'id' => 27005,
                'code' => '27005',
                'display_name' => '京急久里浜線',
            ),
            282 => 
            array (
                'id' => 28001,
                'code' => '28001',
                'display_name' => '東京メトロ銀座線',
            ),
            283 => 
            array (
                'id' => 28002,
                'code' => '28002',
                'display_name' => '東京メトロ丸ノ内線',
            ),
            284 => 
            array (
                'id' => 28003,
                'code' => '28003',
                'display_name' => '東京メトロ日比谷線',
            ),
            285 => 
            array (
                'id' => 28004,
                'code' => '28004',
                'display_name' => '東京メトロ東西線',
            ),
            286 => 
            array (
                'id' => 28005,
                'code' => '28005',
                'display_name' => '東京メトロ千代田線',
            ),
            287 => 
            array (
                'id' => 28006,
                'code' => '28006',
                'display_name' => '東京メトロ有楽町線',
            ),
            288 => 
            array (
                'id' => 28008,
                'code' => '28008',
                'display_name' => '東京メトロ半蔵門線',
            ),
            289 => 
            array (
                'id' => 28009,
                'code' => '28009',
                'display_name' => '東京メトロ南北線',
            ),
            290 => 
            array (
                'id' => 28010,
                'code' => '28010',
                'display_name' => '東京メトロ副都心線',
            ),
            291 => 
            array (
                'id' => 29001,
                'code' => '29001',
                'display_name' => '相鉄本線',
            ),
            292 => 
            array (
                'id' => 29002,
                'code' => '29002',
                'display_name' => '相鉄いずみ野線',
            ),
            293 => 
            array (
                'id' => 30001,
                'code' => '30001',
                'display_name' => '名鉄名古屋本線',
            ),
            294 => 
            array (
                'id' => 30002,
                'code' => '30002',
                'display_name' => '名鉄豊川線',
            ),
            295 => 
            array (
                'id' => 30003,
                'code' => '30003',
                'display_name' => '名鉄西尾線',
            ),
            296 => 
            array (
                'id' => 30004,
                'code' => '30004',
                'display_name' => '名鉄蒲郡線',
            ),
            297 => 
            array (
                'id' => 30005,
                'code' => '30005',
                'display_name' => '名鉄三河線',
            ),
            298 => 
            array (
                'id' => 30006,
                'code' => '30006',
                'display_name' => '名鉄豊田線',
            ),
            299 => 
            array (
                'id' => 30007,
                'code' => '30007',
                'display_name' => '名鉄空港線',
            ),
            300 => 
            array (
                'id' => 30008,
                'code' => '30008',
                'display_name' => '名鉄常滑線',
            ),
            301 => 
            array (
                'id' => 30009,
                'code' => '30009',
                'display_name' => '名鉄河和線',
            ),
            302 => 
            array (
                'id' => 30010,
                'code' => '30010',
                'display_name' => '名鉄知多新線',
            ),
            303 => 
            array (
                'id' => 30011,
                'code' => '30011',
                'display_name' => '名鉄築港線',
            ),
            304 => 
            array (
                'id' => 30012,
                'code' => '30012',
                'display_name' => '名鉄瀬戸線',
            ),
            305 => 
            array (
                'id' => 30013,
                'code' => '30013',
                'display_name' => '名鉄津島線',
            ),
            306 => 
            array (
                'id' => 30014,
                'code' => '30014',
                'display_name' => '名鉄尾西線',
            ),
            307 => 
            array (
                'id' => 30015,
                'code' => '30015',
                'display_name' => '名鉄犬山線',
            ),
            308 => 
            array (
                'id' => 30016,
                'code' => '30016',
                'display_name' => '名鉄各務原線',
            ),
            309 => 
            array (
                'id' => 30017,
                'code' => '30017',
                'display_name' => '名鉄広見線',
            ),
            310 => 
            array (
                'id' => 30018,
                'code' => '30018',
                'display_name' => '名鉄小牧線',
            ),
            311 => 
            array (
                'id' => 30019,
                'code' => '30019',
                'display_name' => '犬山モノレール',
            ),
            312 => 
            array (
                'id' => 30020,
                'code' => '30020',
                'display_name' => '名鉄竹鼻線',
            ),
            313 => 
            array (
                'id' => 30021,
                'code' => '30021',
                'display_name' => '名鉄羽島線',
            ),
            314 => 
            array (
                'id' => 31001,
                'code' => '31001',
                'display_name' => '近鉄難波線',
            ),
            315 => 
            array (
                'id' => 31002,
                'code' => '31002',
                'display_name' => '近鉄橿原線',
            ),
            316 => 
            array (
                'id' => 31003,
                'code' => '31003',
                'display_name' => '近鉄南大阪線',
            ),
            317 => 
            array (
                'id' => 31004,
                'code' => '31004',
                'display_name' => '近鉄養老線',
            ),
            318 => 
            array (
                'id' => 31005,
                'code' => '31005',
                'display_name' => '近鉄大阪線',
            ),
            319 => 
            array (
                'id' => 31006,
                'code' => '31006',
                'display_name' => '近鉄伊賀線',
            ),
            320 => 
            array (
                'id' => 31007,
                'code' => '31007',
                'display_name' => '近鉄吉野線',
            ),
            321 => 
            array (
                'id' => 31008,
                'code' => '31008',
                'display_name' => '近鉄湯の山線',
            ),
            322 => 
            array (
                'id' => 31009,
                'code' => '31009',
                'display_name' => '近鉄山田線',
            ),
            323 => 
            array (
                'id' => 31010,
                'code' => '31010',
                'display_name' => '近鉄鳥羽線',
            ),
            324 => 
            array (
                'id' => 31011,
                'code' => '31011',
                'display_name' => '近鉄天理線',
            ),
            325 => 
            array (
                'id' => 31012,
                'code' => '31012',
                'display_name' => '近鉄道明寺線',
            ),
            326 => 
            array (
                'id' => 31013,
                'code' => '31013',
                'display_name' => '内部線',
            ),
            327 => 
            array (
                'id' => 31014,
                'code' => '31014',
                'display_name' => '八王子線',
            ),
            328 => 
            array (
                'id' => 31015,
                'code' => '31015',
                'display_name' => '近鉄志摩線',
            ),
            329 => 
            array (
                'id' => 31016,
                'code' => '31016',
                'display_name' => '近鉄生駒線',
            ),
            330 => 
            array (
                'id' => 31017,
                'code' => '31017',
                'display_name' => '近鉄田原本線',
            ),
            331 => 
            array (
                'id' => 31018,
                'code' => '31018',
                'display_name' => '近鉄御所線',
            ),
            332 => 
            array (
                'id' => 31019,
                'code' => '31019',
                'display_name' => '近鉄鈴鹿線',
            ),
            333 => 
            array (
                'id' => 31020,
                'code' => '31020',
                'display_name' => '近鉄奈良線',
            ),
            334 => 
            array (
                'id' => 31021,
                'code' => '31021',
                'display_name' => '近鉄信貴線',
            ),
            335 => 
            array (
                'id' => 31022,
                'code' => '31022',
                'display_name' => '近鉄長野線',
            ),
            336 => 
            array (
                'id' => 31023,
                'code' => '31023',
                'display_name' => '近鉄けいはんな線',
            ),
            337 => 
            array (
                'id' => 31024,
                'code' => '31024',
                'display_name' => '西信貴ケーブル',
            ),
            338 => 
            array (
                'id' => 31025,
                'code' => '31025',
                'display_name' => '近鉄京都線',
            ),
            339 => 
            array (
                'id' => 31026,
                'code' => '31026',
                'display_name' => '生駒ケーブル',
            ),
            340 => 
            array (
                'id' => 31027,
                'code' => '31027',
                'display_name' => '近鉄名古屋線',
            ),
            341 => 
            array (
                'id' => 32001,
                'code' => '32001',
                'display_name' => '南海本線',
            ),
            342 => 
            array (
                'id' => 32002,
                'code' => '32002',
                'display_name' => '南海空港線',
            ),
            343 => 
            array (
                'id' => 32003,
                'code' => '32003',
                'display_name' => '南海和歌山港線',
            ),
            344 => 
            array (
                'id' => 32004,
                'code' => '32004',
                'display_name' => '南海高師浜線',
            ),
            345 => 
            array (
                'id' => 32005,
                'code' => '32005',
                'display_name' => '南海加太線',
            ),
            346 => 
            array (
                'id' => 32006,
                'code' => '32006',
                'display_name' => '南海多奈川線',
            ),
            347 => 
            array (
                'id' => 32007,
                'code' => '32007',
                'display_name' => '南海高野線',
            ),
            348 => 
            array (
                'id' => 32008,
                'code' => '32008',
                'display_name' => '南海高野山ケーブル',
            ),
            349 => 
            array (
                'id' => 32009,
                'code' => '32009',
                'display_name' => '南海汐見橋線',
            ),
            350 => 
            array (
                'id' => 33001,
                'code' => '33001',
                'display_name' => '京阪本線',
            ),
            351 => 
            array (
                'id' => 33002,
                'code' => '33002',
                'display_name' => '京阪宇治線',
            ),
            352 => 
            array (
                'id' => 33003,
                'code' => '33003',
                'display_name' => '京阪交野線',
            ),
            353 => 
            array (
                'id' => 33004,
                'code' => '33004',
                'display_name' => '京阪鴨東線',
            ),
            354 => 
            array (
                'id' => 33005,
                'code' => '33005',
                'display_name' => '男山ケーブル',
            ),
            355 => 
            array (
                'id' => 33006,
                'code' => '33006',
                'display_name' => '京阪石山坂本線',
            ),
            356 => 
            array (
                'id' => 33007,
                'code' => '33007',
                'display_name' => '京阪京津線',
            ),
            357 => 
            array (
                'id' => 33008,
                'code' => '33008',
                'display_name' => '京阪中之島線',
            ),
            358 => 
            array (
                'id' => 34001,
                'code' => '34001',
                'display_name' => '阪急神戸本線',
            ),
            359 => 
            array (
                'id' => 34002,
                'code' => '34002',
                'display_name' => '阪急宝塚本線',
            ),
            360 => 
            array (
                'id' => 34003,
                'code' => '34003',
                'display_name' => '阪急京都本線',
            ),
            361 => 
            array (
                'id' => 34004,
                'code' => '34004',
                'display_name' => '阪急今津線',
            ),
            362 => 
            array (
                'id' => 34005,
                'code' => '34005',
                'display_name' => '阪急甲陽線',
            ),
            363 => 
            array (
                'id' => 34006,
                'code' => '34006',
                'display_name' => '阪急伊丹線',
            ),
            364 => 
            array (
                'id' => 34007,
                'code' => '34007',
                'display_name' => '阪急箕面線',
            ),
            365 => 
            array (
                'id' => 34008,
                'code' => '34008',
                'display_name' => '阪急千里線',
            ),
            366 => 
            array (
                'id' => 34009,
                'code' => '34009',
                'display_name' => '阪急嵐山線',
            ),
            367 => 
            array (
                'id' => 35001,
                'code' => '35001',
                'display_name' => '阪神本線',
            ),
            368 => 
            array (
                'id' => 35002,
                'code' => '35002',
                'display_name' => '阪神なんば線',
            ),
            369 => 
            array (
                'id' => 35003,
                'code' => '35003',
                'display_name' => '阪神武庫川線',
            ),
            370 => 
            array (
                'id' => 36001,
                'code' => '36001',
                'display_name' => '西鉄天神大牟田線',
            ),
            371 => 
            array (
                'id' => 36002,
                'code' => '36002',
                'display_name' => '西鉄太宰府線',
            ),
            372 => 
            array (
                'id' => 36003,
                'code' => '36003',
                'display_name' => '西鉄甘木線',
            ),
            373 => 
            array (
                'id' => 36004,
                'code' => '36004',
                'display_name' => '西鉄貝塚線',
            ),
            374 => 
            array (
                'id' => 99101,
                'code' => '99101',
                'display_name' => '札幌市営地下鉄東西線',
            ),
            375 => 
            array (
                'id' => 99102,
                'code' => '99102',
                'display_name' => '札幌市営地下鉄南北線',
            ),
            376 => 
            array (
                'id' => 99103,
                'code' => '99103',
                'display_name' => '札幌市営地下鉄東豊線',
            ),
            377 => 
            array (
                'id' => 99104,
                'code' => '99104',
                'display_name' => '札幌市電山鼻線',
            ),
            378 => 
            array (
                'id' => 99105,
                'code' => '99105',
                'display_name' => '函館市電２系統',
            ),
            379 => 
            array (
                'id' => 99106,
                'code' => '99106',
                'display_name' => '函館市電５系統',
            ),
            380 => 
            array (
                'id' => 99107,
                'code' => '99107',
                'display_name' => 'ふるさと銀河線',
            ),
            381 => 
            array (
                'id' => 99108,
                'code' => '99108',
                'display_name' => '道南いさりび鉄道線',
            ),
            382 => 
            array (
                'id' => 99201,
                'code' => '99201',
                'display_name' => '津軽鉄道線',
            ),
            383 => 
            array (
                'id' => 99202,
                'code' => '99202',
                'display_name' => '弘南鉄道弘南線',
            ),
            384 => 
            array (
                'id' => 99203,
                'code' => '99203',
                'display_name' => '弘南鉄道大鰐線',
            ),
            385 => 
            array (
                'id' => 99204,
                'code' => '99204',
                'display_name' => '十和田観光電鉄',
            ),
            386 => 
            array (
                'id' => 99205,
                'code' => '99205',
                'display_name' => 'いわて銀河鉄道線',
            ),
            387 => 
            array (
                'id' => 99206,
                'code' => '99206',
                'display_name' => '青い森鉄道線',
            ),
            388 => 
            array (
                'id' => 99207,
                'code' => '99207',
                'display_name' => '三陸鉄道北リアス線',
            ),
            389 => 
            array (
                'id' => 99208,
                'code' => '99208',
                'display_name' => '三陸鉄道南リアス線',
            ),
            390 => 
            array (
                'id' => 99209,
                'code' => '99209',
                'display_name' => '秋田内陸線',
            ),
            391 => 
            array (
                'id' => 99210,
                'code' => '99210',
                'display_name' => '鳥海山ろく線',
            ),
            392 => 
            array (
                'id' => 99211,
                'code' => '99211',
                'display_name' => 'フラワー長井線',
            ),
            393 => 
            array (
                'id' => 99212,
                'code' => '99212',
                'display_name' => 'くりはら田園鉄道線',
            ),
            394 => 
            array (
                'id' => 99213,
                'code' => '99213',
                'display_name' => '阿武隈急行線',
            ),
            395 => 
            array (
                'id' => 99214,
                'code' => '99214',
                'display_name' => '仙台市営地下鉄南北線',
            ),
            396 => 
            array (
                'id' => 99215,
                'code' => '99215',
                'display_name' => '福島交通飯坂線',
            ),
            397 => 
            array (
                'id' => 99216,
                'code' => '99216',
                'display_name' => '会津鉄道会津線',
            ),
            398 => 
            array (
                'id' => 99217,
                'code' => '99217',
                'display_name' => '仙台空港線',
            ),
            399 => 
            array (
                'id' => 99218,
                'code' => '99218',
                'display_name' => '仙台市営地下鉄東西線',
            ),
            400 => 
            array (
                'id' => 99301,
                'code' => '99301',
                'display_name' => '都営大江戸線',
            ),
            401 => 
            array (
                'id' => 99302,
                'code' => '99302',
                'display_name' => '都営浅草線',
            ),
            402 => 
            array (
                'id' => 99303,
                'code' => '99303',
                'display_name' => '都営三田線',
            ),
            403 => 
            array (
                'id' => 99304,
                'code' => '99304',
                'display_name' => '都営新宿線',
            ),
            404 => 
            array (
                'id' => 99305,
                'code' => '99305',
                'display_name' => '都電荒川線',
            ),
            405 => 
            array (
                'id' => 99306,
                'code' => '99306',
                'display_name' => '秩父鉄道秩父本線',
            ),
            406 => 
            array (
                'id' => 99307,
                'code' => '99307',
                'display_name' => '埼玉高速鉄道線',
            ),
            407 => 
            array (
                'id' => 99308,
                'code' => '99308',
                'display_name' => 'いすみ線',
            ),
            408 => 
            array (
                'id' => 99309,
                'code' => '99309',
                'display_name' => 'つくばエクスプレス',
            ),
            409 => 
            array (
                'id' => 99310,
                'code' => '99310',
                'display_name' => 'みなとみらい線',
            ),
            410 => 
            array (
                'id' => 99311,
                'code' => '99311',
                'display_name' => 'ゆりかもめ',
            ),
            411 => 
            array (
                'id' => 99312,
                'code' => '99312',
                'display_name' => 'わたらせ渓谷線',
            ),
            412 => 
            array (
                'id' => 99313,
                'code' => '99313',
                'display_name' => 'ユーカリが丘線',
            ),
            413 => 
            array (
                'id' => 99314,
                'code' => '99314',
                'display_name' => '伊豆箱根鉄道大雄山線',
            ),
            414 => 
            array (
                'id' => 99315,
                'code' => '99315',
                'display_name' => 'ひたちなか海浜鉄道湊線',
            ),
            415 => 
            array (
                'id' => 99316,
                'code' => '99316',
                'display_name' => 'ブルーライン',
            ),
            416 => 
            array (
                'id' => 99317,
                'code' => '99317',
                'display_name' => '金沢シーサイドライン',
            ),
            417 => 
            array (
                'id' => 99318,
                'code' => '99318',
                'display_name' => '関東鉄道常総線',
            ),
            418 => 
            array (
                'id' => 99319,
                'code' => '99319',
                'display_name' => '関東鉄道竜ヶ崎線',
            ),
            419 => 
            array (
                'id' => 99320,
                'code' => '99320',
                'display_name' => '江ノ島電鉄線',
            ),
            420 => 
            array (
                'id' => 99321,
                'code' => '99321',
                'display_name' => 'ニューシャトル',
            ),
            421 => 
            array (
                'id' => 99322,
                'code' => '99322',
                'display_name' => '鹿島鉄道線',
            ),
            422 => 
            array (
                'id' => 99323,
                'code' => '99323',
                'display_name' => '鹿島臨海鉄道大洗鹿島線',
            ),
            423 => 
            array (
                'id' => 99324,
                'code' => '99324',
                'display_name' => '芝山鉄道線',
            ),
            424 => 
            array (
                'id' => 99325,
                'code' => '99325',
                'display_name' => '小湊鉄道線',
            ),
            425 => 
            array (
                'id' => 99326,
                'code' => '99326',
                'display_name' => '湘南モノレール',
            ),
            426 => 
            array (
                'id' => 99327,
                'code' => '99327',
                'display_name' => '上信電鉄',
            ),
            427 => 
            array (
                'id' => 99328,
                'code' => '99328',
                'display_name' => '上毛電気鉄道上毛線',
            ),
            428 => 
            array (
                'id' => 99329,
                'code' => '99329',
                'display_name' => '新京成線',
            ),
            429 => 
            array (
                'id' => 99330,
                'code' => '99330',
                'display_name' => '真岡鐵道真岡線',
            ),
            430 => 
            array (
                'id' => 99331,
                'code' => '99331',
                'display_name' => '千葉都市モノレール１号線',
            ),
            431 => 
            array (
                'id' => 99332,
                'code' => '99332',
                'display_name' => '千葉都市モノレール２号線',
            ),
            432 => 
            array (
                'id' => 99333,
                'code' => '99333',
                'display_name' => '流鉄流山線',
            ),
            433 => 
            array (
                'id' => 99334,
                'code' => '99334',
                'display_name' => '多摩モノレール',
            ),
            434 => 
            array (
                'id' => 99335,
                'code' => '99335',
                'display_name' => '銚子電鉄線',
            ),
            435 => 
            array (
                'id' => 99336,
                'code' => '99336',
                'display_name' => '東京モノレール',
            ),
            436 => 
            array (
                'id' => 99337,
                'code' => '99337',
                'display_name' => 'りんかい線',
            ),
            437 => 
            array (
                'id' => 99338,
                'code' => '99338',
                'display_name' => '東葉高速線',
            ),
            438 => 
            array (
                'id' => 99339,
                'code' => '99339',
                'display_name' => '箱根登山鉄道鉄道線',
            ),
            439 => 
            array (
                'id' => 99340,
                'code' => '99340',
                'display_name' => '北総鉄道北総線',
            ),
            440 => 
            array (
                'id' => 99341,
                'code' => '99341',
                'display_name' => 'ほっとスパ・ライン',
            ),
            441 => 
            array (
                'id' => 99342,
                'code' => '99342',
                'display_name' => '日暮里・舎人ライナー',
            ),
            442 => 
            array (
                'id' => 99343,
                'code' => '99343',
                'display_name' => 'グリーンライン',
            ),
            443 => 
            array (
                'id' => 99344,
                'code' => '99344',
                'display_name' => '箱根登山ケーブルカー',
            ),
            444 => 
            array (
                'id' => 99401,
                'code' => '99401',
                'display_name' => '富士急行線',
            ),
            445 => 
            array (
                'id' => 99402,
                'code' => '99402',
                'display_name' => '北越急行ほくほく線',
            ),
            446 => 
            array (
                'id' => 99403,
                'code' => '99403',
                'display_name' => 'しなの鉄道線',
            ),
            447 => 
            array (
                'id' => 99404,
                'code' => '99404',
                'display_name' => '上田電鉄別所線',
            ),
            448 => 
            array (
                'id' => 99405,
                'code' => '99405',
                'display_name' => '長野電鉄長野線',
            ),
            449 => 
            array (
                'id' => 99406,
                'code' => '99406',
                'display_name' => '長野電鉄屋代線',
            ),
            450 => 
            array (
                'id' => 99407,
                'code' => '99407',
                'display_name' => '上高地線',
            ),
            451 => 
            array (
                'id' => 99408,
                'code' => '99408',
                'display_name' => '富山地鉄本線',
            ),
            452 => 
            array (
                'id' => 99409,
                'code' => '99409',
                'display_name' => '富山地鉄立山線',
            ),
            453 => 
            array (
                'id' => 99410,
                'code' => '99410',
                'display_name' => '富山地鉄不二越・上滝線',
            ),
            454 => 
            array (
                'id' => 99411,
                'code' => '99411',
                'display_name' => '神岡鉄道神岡線',
            ),
            455 => 
            array (
                'id' => 99412,
                'code' => '99412',
                'display_name' => '黒部峡谷鉄道本線',
            ),
            456 => 
            array (
                'id' => 99413,
                'code' => '99413',
                'display_name' => '富山地鉄市内線【１・２系統】',
            ),
            457 => 
            array (
                'id' => 99414,
                'code' => '99414',
                'display_name' => '万葉線',
            ),
            458 => 
            array (
                'id' => 99415,
                'code' => '99415',
                'display_name' => '富山ライトレール',
            ),
            459 => 
            array (
                'id' => 99416,
                'code' => '99416',
                'display_name' => '北陸鉄道石川線',
            ),
            460 => 
            array (
                'id' => 99417,
                'code' => '99417',
                'display_name' => '北陸鉄道浅野川線',
            ),
            461 => 
            array (
                'id' => 99418,
                'code' => '99418',
                'display_name' => 'のと鉄道七尾線',
            ),
            462 => 
            array (
                'id' => 99419,
                'code' => '99419',
                'display_name' => 'えちぜん鉄道勝山永平寺線',
            ),
            463 => 
            array (
                'id' => 99420,
                'code' => '99420',
                'display_name' => 'えちぜん鉄道三国芦原線',
            ),
            464 => 
            array (
                'id' => 99421,
                'code' => '99421',
                'display_name' => '福井鉄道福武線',
            ),
            465 => 
            array (
                'id' => 99422,
                'code' => '99422',
            'display_name' => '富山地鉄富山都心線【３系統(環状線)】',
            ),
            466 => 
            array (
                'id' => 99423,
                'code' => '99423',
                'display_name' => '日本海ひすいライン',
            ),
            467 => 
            array (
                'id' => 99424,
                'code' => '99424',
                'display_name' => '妙高はねうまライン',
            ),
            468 => 
            array (
                'id' => 99425,
                'code' => '99425',
                'display_name' => 'あいの風とやま鉄道線',
            ),
            469 => 
            array (
                'id' => 99426,
                'code' => '99426',
                'display_name' => 'IRいしかわ鉄道線',
            ),
            470 => 
            array (
                'id' => 99427,
                'code' => '99427',
                'display_name' => '北しなの線',
            ),
            471 => 
            array (
                'id' => 99501,
                'code' => '99501',
                'display_name' => '伊豆急行線',
            ),
            472 => 
            array (
                'id' => 99502,
                'code' => '99502',
                'display_name' => '伊豆箱根鉄道駿豆線',
            ),
            473 => 
            array (
                'id' => 99503,
                'code' => '99503',
                'display_name' => '岳南鉄道線',
            ),
            474 => 
            array (
                'id' => 99504,
                'code' => '99504',
                'display_name' => '静岡鉄道静岡清水線',
            ),
            475 => 
            array (
                'id' => 99505,
                'code' => '99505',
                'display_name' => '天竜浜名湖線',
            ),
            476 => 
            array (
                'id' => 99506,
                'code' => '99506',
                'display_name' => '遠州鉄道鉄道線',
            ),
            477 => 
            array (
                'id' => 99507,
                'code' => '99507',
                'display_name' => '大井川鐵道大井川本線',
            ),
            478 => 
            array (
                'id' => 99508,
                'code' => '99508',
                'display_name' => '南アルプスあぷとライン',
            ),
            479 => 
            array (
                'id' => 99509,
                'code' => '99509',
                'display_name' => 'あおなみ線',
            ),
            480 => 
            array (
                'id' => 99510,
                'code' => '99510',
                'display_name' => '東海交通事業城北線',
            ),
            481 => 
            array (
                'id' => 99511,
                'code' => '99511',
                'display_name' => '愛知環状鉄道線',
            ),
            482 => 
            array (
                'id' => 99512,
                'code' => '99512',
                'display_name' => 'リニモ',
            ),
            483 => 
            array (
                'id' => 99513,
                'code' => '99513',
                'display_name' => '名古屋市営地下鉄東山線',
            ),
            484 => 
            array (
                'id' => 99514,
                'code' => '99514',
                'display_name' => '名古屋市営地下鉄名城線',
            ),
            485 => 
            array (
                'id' => 99515,
                'code' => '99515',
                'display_name' => '名古屋市営地下鉄名港線',
            ),
            486 => 
            array (
                'id' => 99516,
                'code' => '99516',
                'display_name' => '名古屋市営地下鉄鶴舞線',
            ),
            487 => 
            array (
                'id' => 99517,
                'code' => '99517',
                'display_name' => '名古屋市営地下鉄桜通線',
            ),
            488 => 
            array (
                'id' => 99518,
                'code' => '99518',
                'display_name' => '名古屋市営地下鉄上飯田線',
            ),
            489 => 
            array (
                'id' => 99519,
                'code' => '99519',
                'display_name' => 'ピーチライナー',
            ),
            490 => 
            array (
                'id' => 99520,
                'code' => '99520',
                'display_name' => '豊橋鉄道渥美線',
            ),
            491 => 
            array (
                'id' => 99521,
                'code' => '99521',
                'display_name' => '豊橋鉄道東田本線',
            ),
            492 => 
            array (
                'id' => 99522,
                'code' => '99522',
                'display_name' => '豊橋鉄道運動公園前線',
            ),
            493 => 
            array (
                'id' => 99523,
                'code' => '99523',
                'display_name' => 'ゆとりーとライン',
            ),
            494 => 
            array (
                'id' => 99524,
                'code' => '99524',
                'display_name' => '明知鉄道明知線',
            ),
            495 => 
            array (
                'id' => 99525,
                'code' => '99525',
                'display_name' => '長良川鉄道越美南線',
            ),
            496 => 
            array (
                'id' => 99526,
                'code' => '99526',
                'display_name' => '樽見鉄道樽見線',
            ),
            497 => 
            array (
                'id' => 99528,
                'code' => '99528',
                'display_name' => '三岐鉄道三岐線',
            ),
            498 => 
            array (
                'id' => 99529,
                'code' => '99529',
                'display_name' => '三岐鉄道北勢線',
            ),
            499 => 
            array (
                'id' => 99530,
                'code' => '99530',
                'display_name' => '伊勢鉄道伊勢線',
            ),
        ));
        $data->insert(array (
            0 => 
            array (
                'id' => 99531,
                'code' => '99531',
                'display_name' => '伊賀鉄道伊賀線',
            ),
            1 => 
            array (
                'id' => 99532,
                'code' => '99532',
                'display_name' => '養老鉄道養老線',
            ),
            2 => 
            array (
                'id' => 99601,
                'code' => '99601',
                'display_name' => '近江鉄道本線',
            ),
            3 => 
            array (
                'id' => 99602,
                'code' => '99602',
                'display_name' => '近江鉄道多賀線',
            ),
            4 => 
            array (
                'id' => 99603,
                'code' => '99603',
                'display_name' => '近江鉄道八日市線',
            ),
            5 => 
            array (
                'id' => 99604,
                'code' => '99604',
                'display_name' => '信楽高原鐵道信楽線',
            ),
            6 => 
            array (
                'id' => 99605,
                'code' => '99605',
                'display_name' => '嵯峨野観光線',
            ),
            7 => 
            array (
                'id' => 99606,
                'code' => '99606',
                'display_name' => '叡山電鉄叡山本線',
            ),
            8 => 
            array (
                'id' => 99607,
                'code' => '99607',
                'display_name' => '叡山電鉄鞍馬線',
            ),
            9 => 
            array (
                'id' => 99608,
                'code' => '99608',
                'display_name' => '宮福線',
            ),
            10 => 
            array (
                'id' => 99609,
                'code' => '99609',
                'display_name' => '宮豊線',
            ),
            11 => 
            array (
                'id' => 99610,
                'code' => '99610',
                'display_name' => '京都市営地下鉄烏丸線',
            ),
            12 => 
            array (
                'id' => 99611,
                'code' => '99611',
                'display_name' => '京都市営地下鉄東西線',
            ),
            13 => 
            array (
                'id' => 99612,
                'code' => '99612',
                'display_name' => '京福電鉄嵐山本線',
            ),
            14 => 
            array (
                'id' => 99613,
                'code' => '99613',
                'display_name' => '京福電鉄北野線',
            ),
            15 => 
            array (
                'id' => 99614,
                'code' => '99614',
                'display_name' => '北大阪急行電鉄',
            ),
            16 => 
            array (
                'id' => 99615,
                'code' => '99615',
                'display_name' => '能勢電鉄妙見線',
            ),
            17 => 
            array (
                'id' => 99616,
                'code' => '99616',
                'display_name' => '泉北高速鉄道線',
            ),
            18 => 
            array (
                'id' => 99617,
                'code' => '99617',
                'display_name' => '水間鉄道水間線',
            ),
            19 => 
            array (
                'id' => 99618,
                'code' => '99618',
                'display_name' => '大阪市営地下鉄御堂筋線',
            ),
            20 => 
            array (
                'id' => 99619,
                'code' => '99619',
                'display_name' => '大阪市営地下鉄谷町線',
            ),
            21 => 
            array (
                'id' => 99620,
                'code' => '99620',
                'display_name' => '大阪市営地下鉄四つ橋線',
            ),
            22 => 
            array (
                'id' => 99621,
                'code' => '99621',
                'display_name' => '大阪市営地下鉄中央線',
            ),
            23 => 
            array (
                'id' => 99622,
                'code' => '99622',
                'display_name' => '大阪市営地下鉄千日前線',
            ),
            24 => 
            array (
                'id' => 99623,
                'code' => '99623',
                'display_name' => '大阪市営地下鉄堺筋線',
            ),
            25 => 
            array (
                'id' => 99624,
                'code' => '99624',
                'display_name' => '大阪市営地下鉄長堀鶴見緑地線',
            ),
            26 => 
            array (
                'id' => 99625,
                'code' => '99625',
                'display_name' => 'ニュートラム',
            ),
            27 => 
            array (
                'id' => 99626,
                'code' => '99626',
                'display_name' => '大阪モノレール線',
            ),
            28 => 
            array (
                'id' => 99627,
                'code' => '99627',
                'display_name' => '大阪モノレール彩都線',
            ),
            29 => 
            array (
                'id' => 99628,
                'code' => '99628',
                'display_name' => '阪堺電軌上町線',
            ),
            30 => 
            array (
                'id' => 99629,
                'code' => '99629',
                'display_name' => '阪堺電軌阪堺線',
            ),
            31 => 
            array (
                'id' => 99630,
                'code' => '99630',
                'display_name' => '神戸高速東西線',
            ),
            32 => 
            array (
                'id' => 99631,
                'code' => '99631',
                'display_name' => '神戸高速南北線',
            ),
            33 => 
            array (
                'id' => 99632,
                'code' => '99632',
                'display_name' => '有馬線',
            ),
            34 => 
            array (
                'id' => 99633,
                'code' => '99633',
                'display_name' => '三田線',
            ),
            35 => 
            array (
                'id' => 99634,
                'code' => '99634',
                'display_name' => '公園都市線',
            ),
            36 => 
            array (
                'id' => 99635,
                'code' => '99635',
                'display_name' => '粟生線',
            ),
            37 => 
            array (
                'id' => 99636,
                'code' => '99636',
                'display_name' => '北神急行北神線',
            ),
            38 => 
            array (
                'id' => 99637,
                'code' => '99637',
                'display_name' => '山陽電鉄本線',
            ),
            39 => 
            array (
                'id' => 99638,
                'code' => '99638',
                'display_name' => '山陽電鉄網干線',
            ),
            40 => 
            array (
                'id' => 99640,
                'code' => '99640',
                'display_name' => '能勢電鉄日生線',
            ),
            41 => 
            array (
                'id' => 99642,
                'code' => '99642',
                'display_name' => '三木鉄道三木線',
            ),
            42 => 
            array (
                'id' => 99643,
                'code' => '99643',
                'display_name' => '北条鉄道北条線',
            ),
            43 => 
            array (
                'id' => 99644,
                'code' => '99644',
                'display_name' => '智頭急行智頭線',
            ),
            44 => 
            array (
                'id' => 99645,
                'code' => '99645',
                'display_name' => '神戸市営地下鉄西神線',
            ),
            45 => 
            array (
                'id' => 99646,
                'code' => '99646',
                'display_name' => '神戸市営地下鉄山手線',
            ),
            46 => 
            array (
                'id' => 99647,
                'code' => '99647',
                'display_name' => '夢かもめ',
            ),
            47 => 
            array (
                'id' => 99648,
                'code' => '99648',
                'display_name' => 'ポートライナー',
            ),
            48 => 
            array (
                'id' => 99649,
                'code' => '99649',
                'display_name' => '六甲ライナー',
            ),
            49 => 
            array (
                'id' => 99650,
                'code' => '99650',
                'display_name' => '紀州鉄道線',
            ),
            50 => 
            array (
                'id' => 99651,
                'code' => '99651',
                'display_name' => '貴志川線',
            ),
            51 => 
            array (
                'id' => 99652,
                'code' => '99652',
                'display_name' => '大阪市営地下鉄今里筋線',
            ),
            52 => 
            array (
                'id' => 99653,
                'code' => '99653',
                'display_name' => '宮舞線',
            ),
            53 => 
            array (
                'id' => 99701,
                'code' => '99701',
                'display_name' => '若桜線',
            ),
            54 => 
            array (
                'id' => 99702,
                'code' => '99702',
                'display_name' => '北松江線',
            ),
            55 => 
            array (
                'id' => 99703,
                'code' => '99703',
                'display_name' => '大社線',
            ),
            56 => 
            array (
                'id' => 99704,
                'code' => '99704',
                'display_name' => '水島本線',
            ),
            57 => 
            array (
                'id' => 99705,
                'code' => '99705',
                'display_name' => '井原線',
            ),
            58 => 
            array (
                'id' => 99706,
                'code' => '99706',
                'display_name' => '東山線',
            ),
            59 => 
            array (
                'id' => 99707,
                'code' => '99707',
                'display_name' => '清輝橋線',
            ),
            60 => 
            array (
                'id' => 99708,
                'code' => '99708',
                'display_name' => 'スカイレールみどり坂線',
            ),
            61 => 
            array (
                'id' => 99709,
                'code' => '99709',
                'display_name' => 'アストラムライン',
            ),
            62 => 
            array (
                'id' => 99710,
                'code' => '99710',
            'display_name' => '広電１号線(宇品線)',
            ),
            63 => 
            array (
                'id' => 99711,
                'code' => '99711',
            'display_name' => '広電２号線(宮島線)',
            ),
            64 => 
            array (
                'id' => 99712,
                'code' => '99712',
                'display_name' => '広電３号線',
            ),
            65 => 
            array (
                'id' => 99713,
                'code' => '99713',
            'display_name' => '広電５号線(皆実線)',
            ),
            66 => 
            array (
                'id' => 99714,
                'code' => '99714',
            'display_name' => '広電６号線(江波線)',
            ),
            67 => 
            array (
                'id' => 99715,
                'code' => '99715',
                'display_name' => '広電７号線',
            ),
            68 => 
            array (
                'id' => 99716,
                'code' => '99716',
            'display_name' => '広電８号線(横川線)',
            ),
            69 => 
            array (
                'id' => 99717,
                'code' => '99717',
            'display_name' => '広電９号線(白島線)',
            ),
            70 => 
            array (
                'id' => 99718,
                'code' => '99718',
                'display_name' => '錦川清流線',
            ),
            71 => 
            array (
                'id' => 99801,
                'code' => '99801',
                'display_name' => '阿波室戸シーサイドライン',
            ),
            72 => 
            array (
                'id' => 99802,
                'code' => '99802',
                'display_name' => '琴電琴平線',
            ),
            73 => 
            array (
                'id' => 99803,
                'code' => '99803',
                'display_name' => '琴電長尾線',
            ),
            74 => 
            array (
                'id' => 99804,
                'code' => '99804',
                'display_name' => '琴電志度線',
            ),
            75 => 
            array (
                'id' => 99805,
                'code' => '99805',
                'display_name' => '伊予鉄道郡中線',
            ),
            76 => 
            array (
                'id' => 99806,
                'code' => '99806',
                'display_name' => '伊予鉄道高浜線',
            ),
            77 => 
            array (
                'id' => 99807,
                'code' => '99807',
                'display_name' => '伊予鉄道横河原線',
            ),
            78 => 
            array (
                'id' => 99808,
                'code' => '99808',
                'display_name' => '伊予鉄道環状線',
            ),
            79 => 
            array (
                'id' => 99809,
                'code' => '99809',
                'display_name' => '伊予鉄道環状線',
            ),
            80 => 
            array (
                'id' => 99810,
                'code' => '99810',
                'display_name' => '伊予鉄道市駅線',
            ),
            81 => 
            array (
                'id' => 99811,
                'code' => '99811',
                'display_name' => '伊予鉄道松山駅前線',
            ),
            82 => 
            array (
                'id' => 99812,
                'code' => '99812',
                'display_name' => '伊予鉄道本町線',
            ),
            83 => 
            array (
                'id' => 99814,
                'code' => '99814',
                'display_name' => '中村線',
            ),
            84 => 
            array (
                'id' => 99815,
                'code' => '99815',
                'display_name' => '宿毛線',
            ),
            85 => 
            array (
                'id' => 99816,
                'code' => '99816',
                'display_name' => 'ごめん・なはり線',
            ),
            86 => 
            array (
                'id' => 99817,
                'code' => '99817',
                'display_name' => 'ごめん線',
            ),
            87 => 
            array (
                'id' => 99818,
                'code' => '99818',
                'display_name' => '伊野線',
            ),
            88 => 
            array (
                'id' => 99819,
                'code' => '99819',
                'display_name' => '桟橋線',
            ),
            89 => 
            array (
                'id' => 99901,
                'code' => '99901',
                'display_name' => '甘木鉄道',
            ),
            90 => 
            array (
                'id' => 99902,
                'code' => '99902',
                'display_name' => '伊田線',
            ),
            91 => 
            array (
                'id' => 99903,
                'code' => '99903',
                'display_name' => '糸田線',
            ),
            92 => 
            array (
                'id' => 99904,
                'code' => '99904',
                'display_name' => '田川線',
            ),
            93 => 
            array (
                'id' => 99905,
                'code' => '99905',
                'display_name' => '福岡市営地下鉄空港線',
            ),
            94 => 
            array (
                'id' => 99906,
                'code' => '99906',
                'display_name' => '福岡市営地下鉄箱崎線',
            ),
            95 => 
            array (
                'id' => 99907,
                'code' => '99907',
                'display_name' => '福岡市営地下鉄七隈線',
            ),
            96 => 
            array (
                'id' => 99908,
                'code' => '99908',
                'display_name' => '北九州モノレール',
            ),
            97 => 
            array (
                'id' => 99909,
                'code' => '99909',
                'display_name' => '筑豊電気鉄道線',
            ),
            98 => 
            array (
                'id' => 99910,
                'code' => '99910',
            'display_name' => '西九州線(有田～伊万里)',
            ),
            99 => 
            array (
                'id' => 99911,
                'code' => '99911',
            'display_name' => '西九州線(伊万里～佐世保)',
            ),
            100 => 
            array (
                'id' => 99912,
                'code' => '99912',
                'display_name' => '島原鉄道線',
            ),
            101 => 
            array (
                'id' => 99913,
                'code' => '99913',
                'display_name' => '長崎電軌１系統',
            ),
            102 => 
            array (
                'id' => 99914,
                'code' => '99914',
                'display_name' => '長崎電軌３系統',
            ),
            103 => 
            array (
                'id' => 99915,
                'code' => '99915',
                'display_name' => '長崎電軌４系統',
            ),
            104 => 
            array (
                'id' => 99916,
                'code' => '99916',
                'display_name' => '長崎電軌５系統',
            ),
            105 => 
            array (
                'id' => 99917,
                'code' => '99917',
                'display_name' => '熊本電鉄本線',
            ),
            106 => 
            array (
                'id' => 99918,
                'code' => '99918',
                'display_name' => '熊本電鉄上熊本線',
            ),
            107 => 
            array (
                'id' => 99919,
                'code' => '99919',
                'display_name' => '高森線',
            ),
            108 => 
            array (
                'id' => 99920,
                'code' => '99920',
                'display_name' => '湯前線',
            ),
            109 => 
            array (
                'id' => 99921,
                'code' => '99921',
                'display_name' => '肥薩おれんじ鉄道線',
            ),
            110 => 
            array (
                'id' => 99922,
                'code' => '99922',
                'display_name' => '熊本市電Ａ系統',
            ),
            111 => 
            array (
                'id' => 99923,
                'code' => '99923',
                'display_name' => '熊本市電Ｂ系統',
            ),
            112 => 
            array (
                'id' => 99925,
                'code' => '99925',
                'display_name' => '鹿児島市電１系統',
            ),
            113 => 
            array (
                'id' => 99926,
                'code' => '99926',
                'display_name' => '鹿児島市電２系統',
            ),
            114 => 
            array (
                'id' => 99927,
                'code' => '99927',
                'display_name' => 'ゆいレール',
            ),
            115 => 
            array (
                'id' => 99928,
                'code' => '99928',
                'display_name' => '門司港レトロ観光線',
            ),
        ));
    }
}
