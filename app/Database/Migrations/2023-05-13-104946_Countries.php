<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Countries extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('countries');

        $data = [
            [
                "id" => 1,
                "code" => "AF",
                "name" => "Afghanistan",
                "phone" => 93
            ],
            [
                "id" => 2,
                "code" => "AX",
                "name" => "Aland Islands",
                "phone" => 358
            ],
            [
                "id" => 3,
                "code" => "AL",
                "name" => "Albania",
                "phone" => 355
            ],
            [
                "id" => 4,
                "code" => "DZ",
                "name" => "Algeria",
                "phone" => 213
            ],
            [
                "id" => 5,
                "code" => "AS",
                "name" => "American Samoa",
                "phone" => 1684
            ],
            [
                "id" => 6,
                "code" => "AD",
                "name" => "Andorra",
                "phone" => 376
            ],
            [
                "id" => 7,
                "code" => "AO",
                "name" => "Angola",
                "phone" => 244
            ],
            [
                "id" => 8,
                "code" => "AI",
                "name" => "Anguilla",
                "phone" => 1264
            ],
            [
                "id" => 9,
                "code" => "AQ",
                "name" => "Antarctica",
                "phone" => 672
            ],
            [
                "id" => 10,
                "code" => "AG",
                "name" => "Antigua and Barbuda",
                "phone" => 1268
            ],
            [
                "id" => 11,
                "code" => "AR",
                "name" => "Argentina",
                "phone" => 54
            ],
            [
                "id" => 12,
                "code" => "AM",
                "name" => "Armenia",
                "phone" => 374
            ],
            [
                "id" => 13,
                "code" => "AW",
                "name" => "Aruba",
                "phone" => 297
            ],
            [
                "id" => 14,
                "code" => "AU",
                "name" => "Australia",
                "phone" => 61
            ],
            [
                "id" => 15,
                "code" => "AT",
                "name" => "Austria",
                "phone" => 43
            ],
            [
                "id" => 16,
                "code" => "AZ",
                "name" => "Azerbaijan",
                "phone" => 994
            ],
            [
                "id" => 17,
                "code" => "BS",
                "name" => "Bahamas",
                "phone" => 1242
            ],
            [
                "id" => 18,
                "code" => "BH",
                "name" => "Bahrain",
                "phone" => 973
            ],
            [
                "id" => 19,
                "code" => "BD",
                "name" => "Bangladesh",
                "phone" => 880
            ],
            [
                "id" => 20,
                "code" => "BB",
                "name" => "Barbados",
                "phone" => 1246
            ],
            [
                "id" => 21,
                "code" => "BY",
                "name" => "Belarus",
                "phone" => 375
            ],
            [
                "id" => 22,
                "code" => "BE",
                "name" => "Belgium",
                "phone" => 32
            ],
            [
                "id" => 23,
                "code" => "BZ",
                "name" => "Belize",
                "phone" => 501
            ],
            [
                "id" => 24,
                "code" => "BJ",
                "name" => "Benin",
                "phone" => 229
            ],
            [
                "id" => 25,
                "code" => "BM",
                "name" => "Bermuda",
                "phone" => 1441
            ],
            [
                "id" => 26,
                "code" => "BT",
                "name" => "Bhutan",
                "phone" => 975
            ],
            [
                "id" => 27,
                "code" => "BO",
                "name" => "Bolivia",
                "phone" => 591
            ],
            [
                "id" => 28,
                "code" => "BQ",
                "name" => "Bonaire, Sint Eustatius and Saba",
                "phone" => 599
            ],
            [
                "id" => 29,
                "code" => "BA",
                "name" => "Bosnia and Herzegovina",
                "phone" => 387
            ],
            [
                "id" => 30,
                "code" => "BW",
                "name" => "Botswana",
                "phone" => 267
            ],
            [
                "id" => 31,
                "code" => "BV",
                "name" => "Bouvet Island",
                "phone" => 55
            ],
            [
                "id" => 32,
                "code" => "BR",
                "name" => "Brazil",
                "phone" => 55
            ],
            [
                "id" => 33,
                "code" => "IO",
                "name" => "British Indian Ocean Territory",
                "phone" => 246
            ],
            [
                "id" => 34,
                "code" => "BN",
                "name" => "Brunei Darussalam",
                "phone" => 673
            ],
            [
                "id" => 35,
                "code" => "BG",
                "name" => "Bulgaria",
                "phone" => 359
            ],
            [
                "id" => 36,
                "code" => "BF",
                "name" => "Burkina Faso",
                "phone" => 226
            ],
            [
                "id" => 37,
                "code" => "BI",
                "name" => "Burundi",
                "phone" => 257
            ],
            [
                "id" => 38,
                "code" => "KH",
                "name" => "Cambodia",
                "phone" => 855
            ],
            [
                "id" => 39,
                "code" => "CM",
                "name" => "Cameroon",
                "phone" => 237
            ],
            [
                "id" => 40,
                "code" => "CA",
                "name" => "Canada",
                "phone" => 1
            ],
            [
                "id" => 41,
                "code" => "CV",
                "name" => "Cape Verde",
                "phone" => 238
            ],
            [
                "id" => 42,
                "code" => "KY",
                "name" => "Cayman Islands",
                "phone" => 1345
            ],
            [
                "id" => 43,
                "code" => "CF",
                "name" => "Central African Republic",
                "phone" => 236
            ],
            [
                "id" => 44,
                "code" => "TD",
                "name" => "Chad",
                "phone" => 235
            ],
            [
                "id" => 45,
                "code" => "CL",
                "name" => "Chile",
                "phone" => 56
            ],
            [
                "id" => 46,
                "code" => "CN",
                "name" => "China",
                "phone" => 86
            ],
            [
                "id" => 47,
                "code" => "CX",
                "name" => "Christmas Island",
                "phone" => 61
            ],
            [
                "id" => 48,
                "code" => "CC",
                "name" => "Cocos (Keeling) Islands",
                "phone" => 672
            ],
            [
                "id" => 49,
                "code" => "CO",
                "name" => "Colombia",
                "phone" => 57
            ],
            [
                "id" => 50,
                "code" => "KM",
                "name" => "Comoros",
                "phone" => 269
            ],
            [
                "id" => 51,
                "code" => "CG",
                "name" => "Congo",
                "phone" => 242
            ],
            [
                "id" => 52,
                "code" => "CD",
                "name" => "Congo, Democratic Republic of the Congo",
                "phone" => 242
            ],
            [
                "id" => 53,
                "code" => "CK",
                "name" => "Cook Islands",
                "phone" => 682
            ],
            [
                "id" => 54,
                "code" => "CR",
                "name" => "Costa Rica",
                "phone" => 506
            ],
            [
                "id" => 55,
                "code" => "CI",
                "name" => "Cote D'Ivoire",
                "phone" => 225
            ],
            [
                "id" => 56,
                "code" => "HR",
                "name" => "Croatia",
                "phone" => 385
            ],
            [
                "id" => 57,
                "code" => "CU",
                "name" => "Cuba",
                "phone" => 53
            ],
            [
                "id" => 58,
                "code" => "CW",
                "name" => "Curacao",
                "phone" => 599
            ],
            [
                "id" => 59,
                "code" => "CY",
                "name" => "Cyprus",
                "phone" => 357
            ],
            [
                "id" => 60,
                "code" => "CZ",
                "name" => "Czech Republic",
                "phone" => 420
            ],
            [
                "id" => 61,
                "code" => "DK",
                "name" => "Denmark",
                "phone" => 45
            ],
            [
                "id" => 62,
                "code" => "DJ",
                "name" => "Djibouti",
                "phone" => 253
            ],
            [
                "id" => 63,
                "code" => "DM",
                "name" => "Dominica",
                "phone" => 1767
            ],
            [
                "id" => 64,
                "code" => "DO",
                "name" => "Dominican Republic",
                "phone" => 1809
            ],
            [
                "id" => 65,
                "code" => "EC",
                "name" => "Ecuador",
                "phone" => 593
            ],
            [
                "id" => 66,
                "code" => "EG",
                "name" => "Egypt",
                "phone" => 20
            ],
            [
                "id" => 67,
                "code" => "SV",
                "name" => "El Salvador",
                "phone" => 503
            ],
            [
                "id" => 68,
                "code" => "GQ",
                "name" => "Equatorial Guinea",
                "phone" => 240
            ],
            [
                "id" => 69,
                "code" => "ER",
                "name" => "Eritrea",
                "phone" => 291
            ],
            [
                "id" => 70,
                "code" => "EE",
                "name" => "Estonia",
                "phone" => 372
            ],
            [
                "id" => 71,
                "code" => "ET",
                "name" => "Ethiopia",
                "phone" => 251
            ],
            [
                "id" => 72,
                "code" => "FK",
                "name" => "Falkland Islands (Malvinas)",
                "phone" => 500
            ],
            [
                "id" => 73,
                "code" => "FO",
                "name" => "Faroe Islands",
                "phone" => 298
            ],
            [
                "id" => 74,
                "code" => "FJ",
                "name" => "Fiji",
                "phone" => 679
            ],
            [
                "id" => 75,
                "code" => "FI",
                "name" => "Finland",
                "phone" => 358
            ],
            [
                "id" => 76,
                "code" => "FR",
                "name" => "France",
                "phone" => 33
            ],
            [
                "id" => 77,
                "code" => "GF",
                "name" => "French Guiana",
                "phone" => 594
            ],
            [
                "id" => 78,
                "code" => "PF",
                "name" => "French Polynesia",
                "phone" => 689
            ],
            [
                "id" => 79,
                "code" => "TF",
                "name" => "French Southern Territories",
                "phone" => 262
            ],
            [
                "id" => 80,
                "code" => "GA",
                "name" => "Gabon",
                "phone" => 241
            ],
            [
                "id" => 81,
                "code" => "GM",
                "name" => "Gambia",
                "phone" => 220
            ],
            [
                "id" => 82,
                "code" => "GE",
                "name" => "Georgia",
                "phone" => 995
            ],
            [
                "id" => 83,
                "code" => "DE",
                "name" => "Germany",
                "phone" => 49
            ],
            [
                "id" => 84,
                "code" => "GH",
                "name" => "Ghana",
                "phone" => 233
            ],
            [
                "id" => 85,
                "code" => "GI",
                "name" => "Gibraltar",
                "phone" => 350
            ],
            [
                "id" => 86,
                "code" => "GR",
                "name" => "Greece",
                "phone" => 30
            ],
            [
                "id" => 87,
                "code" => "GL",
                "name" => "Greenland",
                "phone" => 299
            ],
            [
                "id" => 88,
                "code" => "GD",
                "name" => "Grenada",
                "phone" => 1473
            ],
            [
                "id" => 89,
                "code" => "GP",
                "name" => "Guadeloupe",
                "phone" => 590
            ],
            [
                "id" => 90,
                "code" => "GU",
                "name" => "Guam",
                "phone" => 1671
            ],
            [
                "id" => 91,
                "code" => "GT",
                "name" => "Guatemala",
                "phone" => 502
            ],
            [
                "id" => 92,
                "code" => "GG",
                "name" => "Guernsey",
                "phone" => 44
            ],
            [
                "id" => 93,
                "code" => "GN",
                "name" => "Guinea",
                "phone" => 224
            ],
            [
                "id" => 94,
                "code" => "GW",
                "name" => "Guinea-Bissau",
                "phone" => 245
            ],
            [
                "id" => 95,
                "code" => "GY",
                "name" => "Guyana",
                "phone" => 592
            ],
            [
                "id" => 96,
                "code" => "HT",
                "name" => "Haiti",
                "phone" => 509
            ],
            [
                "id" => 97,
                "code" => "HM",
                "name" => "Heard Island and McDonald Islands",
                "phone" => 0
            ],
            [
                "id" => 98,
                "code" => "VA",
                "name" => "Holy See (Vatican City State)",
                "phone" => 39
            ],
            [
                "id" => 99,
                "code" => "HN",
                "name" => "Honduras",
                "phone" => 504
            ],
            [
                "id" => 100,
                "code" => "HK",
                "name" => "Hong Kong",
                "phone" => 852
            ],
            [
                "id" => 101,
                "code" => "HU",
                "name" => "Hungary",
                "phone" => 36
            ],
            [
                "id" => 102,
                "code" => "IS",
                "name" => "Iceland",
                "phone" => 354
            ],
            [
                "id" => 103,
                "code" => "IN",
                "name" => "India",
                "phone" => 91
            ],
            [
                "id" => 104,
                "code" => "ID",
                "name" => "Indonesia",
                "phone" => 62
            ],
            [
                "id" => 105,
                "code" => "IR",
                "name" => "Iran, Islamic Republic of",
                "phone" => 98
            ],
            [
                "id" => 106,
                "code" => "IQ",
                "name" => "Iraq",
                "phone" => 964
            ],
            [
                "id" => 107,
                "code" => "IE",
                "name" => "Ireland",
                "phone" => 353
            ],
            [
                "id" => 108,
                "code" => "IM",
                "name" => "Isle of Man",
                "phone" => 44
            ],
            [
                "id" => 109,
                "code" => "IL",
                "name" => "Israel",
                "phone" => 972
            ],
            [
                "id" => 110,
                "code" => "IT",
                "name" => "Italy",
                "phone" => 39
            ],
            [
                "id" => 111,
                "code" => "JM",
                "name" => "Jamaica",
                "phone" => 1876
            ],
            [
                "id" => 112,
                "code" => "JP",
                "name" => "Japan",
                "phone" => 81
            ],
            [
                "id" => 113,
                "code" => "JE",
                "name" => "Jersey",
                "phone" => 44
            ],
            [
                "id" => 114,
                "code" => "JO",
                "name" => "Jordan",
                "phone" => 962
            ],
            [
                "id" => 115,
                "code" => "KZ",
                "name" => "Kazakhstan",
                "phone" => 7
            ],
            [
                "id" => 116,
                "code" => "KE",
                "name" => "Kenya",
                "phone" => 254
            ],
            [
                "id" => 117,
                "code" => "KI",
                "name" => "Kiribati",
                "phone" => 686
            ],
            [
                "id" => 118,
                "code" => "KP",
                "name" => "Korea, Democratic People's Republic of",
                "phone" => 850
            ],
            [
                "id" => 119,
                "code" => "KR",
                "name" => "Korea, Republic of",
                "phone" => 82
            ],
            [
                "id" => 120,
                "code" => "XK",
                "name" => "Kosovo",
                "phone" => 383
            ],
            [
                "id" => 121,
                "code" => "KW",
                "name" => "Kuwait",
                "phone" => 965
            ],
            [
                "id" => 122,
                "code" => "KG",
                "name" => "Kyrgyzstan",
                "phone" => 996
            ],
            [
                "id" => 123,
                "code" => "LA",
                "name" => "Lao People's Democratic Republic",
                "phone" => 856
            ],
            [
                "id" => 124,
                "code" => "LV",
                "name" => "Latvia",
                "phone" => 371
            ],
            [
                "id" => 125,
                "code" => "LB",
                "name" => "Lebanon",
                "phone" => 961
            ],
            [
                "id" => 126,
                "code" => "LS",
                "name" => "Lesotho",
                "phone" => 266
            ],
            [
                "id" => 127,
                "code" => "LR",
                "name" => "Liberia",
                "phone" => 231
            ],
            [
                "id" => 128,
                "code" => "LY",
                "name" => "Libyan Arab Jamahiriya",
                "phone" => 218
            ],
            [
                "id" => 129,
                "code" => "LI",
                "name" => "Liechtenstein",
                "phone" => 423
            ],
            [
                "id" => 130,
                "code" => "LT",
                "name" => "Lithuania",
                "phone" => 370
            ],
            [
                "id" => 131,
                "code" => "LU",
                "name" => "Luxembourg",
                "phone" => 352
            ],
            [
                "id" => 132,
                "code" => "MO",
                "name" => "Macao",
                "phone" => 853
            ],
            [
                "id" => 133,
                "code" => "MK",
                "name" => "Macedonia, the Former Yugoslav Republic of",
                "phone" => 389
            ],
            [
                "id" => 134,
                "code" => "MG",
                "name" => "Madagascar",
                "phone" => 261
            ],
            [
                "id" => 135,
                "code" => "MW",
                "name" => "Malawi",
                "phone" => 265
            ],
            [
                "id" => 136,
                "code" => "MY",
                "name" => "Malaysia",
                "phone" => 60
            ],
            [
                "id" => 137,
                "code" => "MV",
                "name" => "Maldives",
                "phone" => 960
            ],
            [
                "id" => 138,
                "code" => "ML",
                "name" => "Mali",
                "phone" => 223
            ],
            [
                "id" => 139,
                "code" => "MT",
                "name" => "Malta",
                "phone" => 356
            ],
            [
                "id" => 140,
                "code" => "MH",
                "name" => "Marshall Islands",
                "phone" => 692
            ],
            [
                "id" => 141,
                "code" => "MQ",
                "name" => "Martinique",
                "phone" => 596
            ],
            [
                "id" => 142,
                "code" => "MR",
                "name" => "Mauritania",
                "phone" => 222
            ],
            [
                "id" => 143,
                "code" => "MU",
                "name" => "Mauritius",
                "phone" => 230
            ],
            [
                "id" => 144,
                "code" => "YT",
                "name" => "Mayotte",
                "phone" => 262
            ],
            [
                "id" => 145,
                "code" => "MX",
                "name" => "Mexico",
                "phone" => 52
            ],
            [
                "id" => 146,
                "code" => "FM",
                "name" => "Micronesia, Federated States of",
                "phone" => 691
            ],
            [
                "id" => 147,
                "code" => "MD",
                "name" => "Moldova, Republic of",
                "phone" => 373
            ],
            [
                "id" => 148,
                "code" => "MC",
                "name" => "Monaco",
                "phone" => 377
            ],
            [
                "id" => 149,
                "code" => "MN",
                "name" => "Mongolia",
                "phone" => 976
            ],
            [
                "id" => 150,
                "code" => "ME",
                "name" => "Montenegro",
                "phone" => 382
            ],
            [
                "id" => 151,
                "code" => "MS",
                "name" => "Montserrat",
                "phone" => 1664
            ],
            [
                "id" => 152,
                "code" => "MA",
                "name" => "Morocco",
                "phone" => 212
            ],
            [
                "id" => 153,
                "code" => "MZ",
                "name" => "Mozambique",
                "phone" => 258
            ],
            [
                "id" => 154,
                "code" => "MM",
                "name" => "Myanmar",
                "phone" => 95
            ],
            [
                "id" => 155,
                "code" => "NA",
                "name" => "Namibia",
                "phone" => 264
            ],
            [
                "id" => 156,
                "code" => "NR",
                "name" => "Nauru",
                "phone" => 674
            ],
            [
                "id" => 157,
                "code" => "NP",
                "name" => "Nepal",
                "phone" => 977
            ],
            [
                "id" => 158,
                "code" => "NL",
                "name" => "Netherlands",
                "phone" => 31
            ],
            [
                "id" => 159,
                "code" => "AN",
                "name" => "Netherlands Antilles",
                "phone" => 599
            ],
            [
                "id" => 160,
                "code" => "NC",
                "name" => "New Caledonia",
                "phone" => 687
            ],
            [
                "id" => 161,
                "code" => "NZ",
                "name" => "New Zealand",
                "phone" => 64
            ],
            [
                "id" => 162,
                "code" => "NI",
                "name" => "Nicaragua",
                "phone" => 505
            ],
            [
                "id" => 163,
                "code" => "NE",
                "name" => "Niger",
                "phone" => 227
            ],
            [
                "id" => 164,
                "code" => "NG",
                "name" => "Nigeria",
                "phone" => 234
            ],
            [
                "id" => 165,
                "code" => "NU",
                "name" => "Niue",
                "phone" => 683
            ],
            [
                "id" => 166,
                "code" => "NF",
                "name" => "Norfolk Island",
                "phone" => 672
            ],
            [
                "id" => 167,
                "code" => "MP",
                "name" => "Northern Mariana Islands",
                "phone" => 1670
            ],
            [
                "id" => 168,
                "code" => "NO",
                "name" => "Norway",
                "phone" => 47
            ],
            [
                "id" => 169,
                "code" => "OM",
                "name" => "Oman",
                "phone" => 968
            ],
            [
                "id" => 170,
                "code" => "PK",
                "name" => "Pakistan",
                "phone" => 92
            ],
            [
                "id" => 171,
                "code" => "PW",
                "name" => "Palau",
                "phone" => 680
            ],
            [
                "id" => 172,
                "code" => "PS",
                "name" => "Palestinian Territory, Occupied",
                "phone" => 970
            ],
            [
                "id" => 173,
                "code" => "PA",
                "name" => "Panama",
                "phone" => 507
            ],
            [
                "id" => 174,
                "code" => "PG",
                "name" => "Papua New Guinea",
                "phone" => 675
            ],
            [
                "id" => 175,
                "code" => "PY",
                "name" => "Paraguay",
                "phone" => 595
            ],
            [
                "id" => 176,
                "code" => "PE",
                "name" => "Peru",
                "phone" => 51
            ],
            [
                "id" => 177,
                "code" => "PH",
                "name" => "Philippines",
                "phone" => 63
            ],
            [
                "id" => 178,
                "code" => "PN",
                "name" => "Pitcairn",
                "phone" => 64
            ],
            [
                "id" => 179,
                "code" => "PL",
                "name" => "Poland",
                "phone" => 48
            ],
            [
                "id" => 180,
                "code" => "PT",
                "name" => "Portugal",
                "phone" => 351
            ],
            [
                "id" => 181,
                "code" => "PR",
                "name" => "Puerto Rico",
                "phone" => 1787
            ],
            [
                "id" => 182,
                "code" => "QA",
                "name" => "Qatar",
                "phone" => 974
            ],
            [
                "id" => 183,
                "code" => "RE",
                "name" => "Reunion",
                "phone" => 262
            ],
            [
                "id" => 184,
                "code" => "RO",
                "name" => "Romania",
                "phone" => 40
            ],
            [
                "id" => 185,
                "code" => "RU",
                "name" => "Russian Federation",
                "phone" => 7
            ],
            [
                "id" => 186,
                "code" => "RW",
                "name" => "Rwanda",
                "phone" => 250
            ],
            [
                "id" => 187,
                "code" => "BL",
                "name" => "Saint Barthelemy",
                "phone" => 590
            ],
            [
                "id" => 188,
                "code" => "SH",
                "name" => "Saint Helena",
                "phone" => 290
            ],
            [
                "id" => 189,
                "code" => "KN",
                "name" => "Saint Kitts and Nevis",
                "phone" => 1869
            ],
            [
                "id" => 190,
                "code" => "LC",
                "name" => "Saint Lucia",
                "phone" => 1758
            ],
            [
                "id" => 191,
                "code" => "MF",
                "name" => "Saint Martin",
                "phone" => 590
            ],
            [
                "id" => 192,
                "code" => "PM",
                "name" => "Saint Pierre and Miquelon",
                "phone" => 508
            ],
            [
                "id" => 193,
                "code" => "VC",
                "name" => "Saint Vincent and the Grenadines",
                "phone" => 1784
            ],
            [
                "id" => 194,
                "code" => "WS",
                "name" => "Samoa",
                "phone" => 684
            ],
            [
                "id" => 195,
                "code" => "SM",
                "name" => "San Marino",
                "phone" => 378
            ],
            [
                "id" => 196,
                "code" => "ST",
                "name" => "Sao Tome and Principe",
                "phone" => 239
            ],
            [
                "id" => 197,
                "code" => "SA",
                "name" => "Saudi Arabia",
                "phone" => 966
            ],
            [
                "id" => 198,
                "code" => "SN",
                "name" => "Senegal",
                "phone" => 221
            ],
            [
                "id" => 199,
                "code" => "RS",
                "name" => "Serbia",
                "phone" => 381
            ],
            [
                "id" => 200,
                "code" => "CS",
                "name" => "Serbia and Montenegro",
                "phone" => 381
            ],
            [
                "id" => 201,
                "code" => "SC",
                "name" => "Seychelles",
                "phone" => 248
            ],
            [
                "id" => 202,
                "code" => "SL",
                "name" => "Sierra Leone",
                "phone" => 232
            ],
            [
                "id" => 203,
                "code" => "SG",
                "name" => "Singapore",
                "phone" => 65
            ],
            [
                "id" => 204,
                "code" => "SX",
                "name" => "St Martin",
                "phone" => 721
            ],
            [
                "id" => 205,
                "code" => "SK",
                "name" => "Slovakia",
                "phone" => 421
            ],
            [
                "id" => 206,
                "code" => "SI",
                "name" => "Slovenia",
                "phone" => 386
            ],
            [
                "id" => 207,
                "code" => "SB",
                "name" => "Solomon Islands",
                "phone" => 677
            ],
            [
                "id" => 208,
                "code" => "SO",
                "name" => "Somalia",
                "phone" => 252
            ],
            [
                "id" => 209,
                "code" => "ZA",
                "name" => "South Africa",
                "phone" => 27
            ],
            [
                "id" => 210,
                "code" => "GS",
                "name" => "South Georgia and the South Sandwich Islands",
                "phone" => 500
            ],
            [
                "id" => 211,
                "code" => "SS",
                "name" => "South Sudan",
                "phone" => 211
            ],
            [
                "id" => 212,
                "code" => "ES",
                "name" => "Spain",
                "phone" => 34
            ],
            [
                "id" => 213,
                "code" => "LK",
                "name" => "Sri Lanka",
                "phone" => 94
            ],
            [
                "id" => 214,
                "code" => "SD",
                "name" => "Sudan",
                "phone" => 249
            ],
            [
                "id" => 215,
                "code" => "SR",
                "name" => "Suriname",
                "phone" => 597
            ],
            [
                "id" => 216,
                "code" => "SJ",
                "name" => "Svalbard and Jan Mayen",
                "phone" => 47
            ],
            [
                "id" => 217,
                "code" => "SZ",
                "name" => "Swaziland",
                "phone" => 268
            ],
            [
                "id" => 218,
                "code" => "SE",
                "name" => "Sweden",
                "phone" => 46
            ],
            [
                "id" => 219,
                "code" => "CH",
                "name" => "Switzerland",
                "phone" => 41
            ],
            [
                "id" => 220,
                "code" => "SY",
                "name" => "Syrian Arab Republic",
                "phone" => 963
            ],
            [
                "id" => 221,
                "code" => "TW",
                "name" => "Taiwan, Province of China",
                "phone" => 886
            ],
            [
                "id" => 222,
                "code" => "TJ",
                "name" => "Tajikistan",
                "phone" => 992
            ],
            [
                "id" => 223,
                "code" => "TZ",
                "name" => "Tanzania, United Republic of",
                "phone" => 255
            ],
            [
                "id" => 224,
                "code" => "TH",
                "name" => "Thailand",
                "phone" => 66
            ],
            [
                "id" => 225,
                "code" => "TL",
                "name" => "Timor-Leste",
                "phone" => 670
            ],
            [
                "id" => 226,
                "code" => "TG",
                "name" => "Togo",
                "phone" => 228
            ],
            [
                "id" => 227,
                "code" => "TK",
                "name" => "Tokelau",
                "phone" => 690
            ],
            [
                "id" => 228,
                "code" => "TO",
                "name" => "Tonga",
                "phone" => 676
            ],
            [
                "id" => 229,
                "code" => "TT",
                "name" => "Trinidad and Tobago",
                "phone" => 1868
            ],
            [
                "id" => 230,
                "code" => "TN",
                "name" => "Tunisia",
                "phone" => 216
            ],
            [
                "id" => 231,
                "code" => "TR",
                "name" => "Turkey",
                "phone" => 90
            ],
            [
                "id" => 232,
                "code" => "TM",
                "name" => "Turkmenistan",
                "phone" => 7370
            ],
            [
                "id" => 233,
                "code" => "TC",
                "name" => "Turks and Caicos Islands",
                "phone" => 1649
            ],
            [
                "id" => 234,
                "code" => "TV",
                "name" => "Tuvalu",
                "phone" => 688
            ],
            [
                "id" => 235,
                "code" => "UG",
                "name" => "Uganda",
                "phone" => 256
            ],
            [
                "id" => 236,
                "code" => "UA",
                "name" => "Ukraine",
                "phone" => 380
            ],
            [
                "id" => 237,
                "code" => "AE",
                "name" => "United Arab Emirates",
                "phone" => 971
            ],
            [
                "id" => 238,
                "code" => "GB",
                "name" => "United Kingdom",
                "phone" => 44
            ],
            [
                "id" => 239,
                "code" => "US",
                "name" => "United States",
                "phone" => 1
            ],
            [
                "id" => 240,
                "code" => "UM",
                "name" => "United States Minor Outlying Islands",
                "phone" => 1
            ],
            [
                "id" => 241,
                "code" => "UY",
                "name" => "Uruguay",
                "phone" => 598
            ],
            [
                "id" => 242,
                "code" => "UZ",
                "name" => "Uzbekistan",
                "phone" => 998
            ],
            [
                "id" => 243,
                "code" => "VU",
                "name" => "Vanuatu",
                "phone" => 678
            ],
            [
                "id" => 244,
                "code" => "VE",
                "name" => "Venezuela",
                "phone" => 58
            ],
            [
                "id" => 245,
                "code" => "VN",
                "name" => "Viet Nam",
                "phone" => 84
            ],
            [
                "id" => 246,
                "code" => "VG",
                "name" => "Virgin Islands, British",
                "phone" => 1284
            ],
            [
                "id" => 247,
                "code" => "VI",
                "name" => "Virgin Islands, U.s.",
                "phone" => 1340
            ],
            [
                "id" => 248,
                "code" => "WF",
                "name" => "Wallis and Futuna",
                "phone" => 681
            ],
            [
                "id" => 249,
                "code" => "EH",
                "name" => "Western Sahara",
                "phone" => 212
            ],
            [
                "id" => 250,
                "code" => "YE",
                "name" => "Yemen",
                "phone" => 967
            ],
            [
                "id" => 251,
                "code" => "ZM",
                "name" => "Zambia",
                "phone" => 260
            ],
            [
                "id" => 252,
                "code" => "ZW",
                "name" => "Zimbabwe",
                "phone" => 263
            ]
        ];
        $this->db->table('countries')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('countries');
    }
}