<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>RaagamaInstitute - Student</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="icon" href="images/v3_66.png" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- Left Side Navbar -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <?php
            require "sidenav.php";
            ?>
        </nav>

        <!-- Upper Navbar -->
        <!-- Upper Navbar -->
        <?php
        require "studentheader.php";
        ?>

        <!-- Inside The Dashboard -->
        <div class="main-panel">
            <div class="content-wrapper">
                <!-- Pink Background -->

                <!-- Transactions and Project -->
                <div class="row">


                    <div class="col-md-12 grid-margin stretch-card card">
                        <div class="row">
                            <!-- my cources -->
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">My Account</h4>
                                    </div>
                                    <hr>

                                    <form>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Full Name</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="Enter email"
                                                            style="color: white;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Timezone</label>
                                                        <div class="">

                                                            <select class="w-100 dropdown form-control"
                                                                style="color: white;">
                                                                <option value="Pacific/Midway">(GMT-11:00) Midway
                                                                    Island, Samoa</option>
                                                                <option value="America/Adak">(GMT-10:00) Hawaii-Aleutian
                                                                </option>
                                                                <option value="Etc/GMT+10">(GMT-10:00) Hawaii</option>
                                                                <option value="Pacific/Marquesas">(GMT-09:30) Marquesas
                                                                    Islands</option>
                                                                <option value="Pacific/Gambier">(GMT-09:00) Gambier
                                                                    Islands</option>
                                                                <option value="America/Anchorage">(GMT-09:00) Alaska
                                                                </option>
                                                                <option value="America/Ensenada">(GMT-08:00) Tijuana,
                                                                    Baja California</option>
                                                                <option value="Etc/GMT+8">(GMT-08:00) Pitcairn Islands
                                                                </option>
                                                                <option value="America/Los_Angeles">(GMT-08:00) Pacific
                                                                    Time (US & Canada)</option>
                                                                <option value="America/Denver">(GMT-07:00) Mountain Time
                                                                    (US & Canada)</option>
                                                                <option value="America/Chihuahua">(GMT-07:00) Chihuahua,
                                                                    La Paz, Mazatlan</option>
                                                                <option value="America/Dawson_Creek">(GMT-07:00) Arizona
                                                                </option>
                                                                <option value="America/Belize">(GMT-06:00) Saskatchewan,
                                                                    Central America</option>
                                                                <option value="America/Cancun">(GMT-06:00) Guadalajara,
                                                                    Mexico City, Monterrey</option>
                                                                <option value="Chile/EasterIsland">(GMT-06:00) Easter
                                                                    Island</option>
                                                                <option value="America/Chicago">(GMT-06:00) Central Time
                                                                    (US & Canada)</option>
                                                                <option value="America/New_York">(GMT-05:00) Eastern
                                                                    Time (US & Canada)</option>
                                                                <option value="America/Havana">(GMT-05:00) Cuba</option>
                                                                <option value="America/Bogota">(GMT-05:00) Bogota, Lima,
                                                                    Quito, Rio Branco</option>
                                                                <option value="America/Caracas">(GMT-04:30) Caracas
                                                                </option>
                                                                <option value="America/Santiago">(GMT-04:00) Santiago
                                                                </option>
                                                                <option value="America/La_Paz">(GMT-04:00) La Paz
                                                                </option>
                                                                <option value="Atlantic/Stanley">(GMT-04:00) Faukland
                                                                    Islands</option>
                                                                <option value="America/Campo_Grande">(GMT-04:00) Brazil
                                                                </option>
                                                                <option value="America/Goose_Bay">(GMT-04:00) Atlantic
                                                                    Time (Goose Bay)</option>
                                                                <option value="America/Glace_Bay">(GMT-04:00) Atlantic
                                                                    Time (Canada)</option>
                                                                <option value="America/St_Johns">(GMT-03:30)
                                                                    Newfoundland</option>
                                                                <option value="America/Araguaina">(GMT-03:00) UTC-3
                                                                </option>
                                                                <option value="America/Montevideo">(GMT-03:00)
                                                                    Montevideo</option>
                                                                <option value="America/Miquelon">(GMT-03:00) Miquelon,
                                                                    St. Pierre</option>
                                                                <option value="America/Godthab">(GMT-03:00) Greenland
                                                                </option>
                                                                <option value="America/Argentina/Buenos_Aires">
                                                                    (GMT-03:00) Buenos Aires</option>
                                                                <option value="America/Sao_Paulo">(GMT-03:00) Brasilia
                                                                </option>
                                                                <option value="America/Noronha">(GMT-02:00) Mid-Atlantic
                                                                </option>
                                                                <option value="Atlantic/Cape_Verde">(GMT-01:00) Cape
                                                                    Verde Is.</option>
                                                                <option value="Atlantic/Azores">(GMT-01:00) Azores
                                                                </option>
                                                                <option value="Europe/Belfast">(GMT) Greenwich Mean Time
                                                                    : Belfast</option>
                                                                <option value="Europe/Dublin">(GMT) Greenwich Mean Time
                                                                    : Dublin</option>
                                                                <option value="Europe/Lisbon">(GMT) Greenwich Mean Time
                                                                    : Lisbon</option>
                                                                <option value="Europe/London">(GMT) Greenwich Mean Time
                                                                    : London</option>
                                                                <option value="Africa/Abidjan">(GMT) Monrovia, Reykjavik
                                                                </option>
                                                                <option value="Europe/Amsterdam">(GMT+01:00) Amsterdam,
                                                                    Berlin, Bern, Rome, Stockholm, Vienna</option>
                                                                <option value="Europe/Belgrade">(GMT+01:00) Belgrade,
                                                                    Bratislava, Budapest, Ljubljana, Prague</option>
                                                                <option value="Europe/Brussels">(GMT+01:00) Brussels,
                                                                    Copenhagen, Madrid, Paris</option>
                                                                <option value="Africa/Algiers">(GMT+01:00) West Central
                                                                    Africa</option>
                                                                <option value="Africa/Windhoek">(GMT+01:00) Windhoek
                                                                </option>
                                                                <option value="Asia/Beirut">(GMT+02:00) Beirut</option>
                                                                <option value="Africa/Cairo">(GMT+02:00) Cairo</option>
                                                                <option value="Asia/Gaza">(GMT+02:00) Gaza</option>
                                                                <option value="Africa/Blantyre">(GMT+02:00) Harare,
                                                                    Pretoria</option>
                                                                <option value="Asia/Jerusalem">(GMT+02:00) Jerusalem
                                                                </option>
                                                                <option value="Europe/Minsk">(GMT+02:00) Minsk</option>
                                                                <option value="Asia/Damascus">(GMT+02:00) Syria</option>
                                                                <option value="Europe/Moscow">(GMT+03:00) Moscow, St.
                                                                    Petersburg, Volgograd</option>
                                                                <option value="Africa/Addis_Ababa">(GMT+03:00) Nairobi
                                                                </option>
                                                                <option value="Asia/Tehran">(GMT+03:30) Tehran</option>
                                                                <option value="Asia/Dubai">(GMT+04:00) Abu Dhabi, Muscat
                                                                </option>
                                                                <option value="Asia/Yerevan">(GMT+04:00) Yerevan
                                                                </option>
                                                                <option value="Asia/Kabul">(GMT+04:30) Kabul</option>
                                                                <option value="Asia/Yekaterinburg">(GMT+05:00)
                                                                    Ekaterinburg</option>
                                                                <option value="Asia/Tashkent">(GMT+05:00) Tashkent
                                                                </option>
                                                                <option value="Asia/Kolkata">(GMT+05:30) Chennai,
                                                                    Kolkata, Mumbai, New Delhi</option>
                                                                <option value="Asia/Katmandu">(GMT+05:45) Kathmandu
                                                                </option>
                                                                <option value="Asia/Dhaka">(GMT+06:00) Astana, Dhaka
                                                                </option>
                                                                <option value="Asia/Novosibirsk">(GMT+06:00) Novosibirsk
                                                                </option>
                                                                <option value="Asia/Rangoon">(GMT+06:30) Yangon
                                                                    (Rangoon)</option>
                                                                <option value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi,
                                                                    Jakarta</option>
                                                                <option value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk
                                                                </option>
                                                                <option value="Asia/Hong_Kong">(GMT+08:00) Beijing,
                                                                    Chongqing, Hong Kong, Urumqi</option>
                                                                <option value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan
                                                                    Bataar</option>
                                                                <option value="Australia/Perth">(GMT+08:00) Perth
                                                                </option>
                                                                <option value="Australia/Eucla">(GMT+08:45) Eucla
                                                                </option>
                                                                <option value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo,
                                                                    Tokyo</option>
                                                                <option value="Asia/Seoul">(GMT+09:00) Seoul</option>
                                                                <option value="Asia/Yakutsk">(GMT+09:00) Yakutsk
                                                                </option>
                                                                <option value="Australia/Adelaide">(GMT+09:30) Adelaide
                                                                </option>
                                                                <option value="Australia/Darwin">(GMT+09:30) Darwin
                                                                </option>
                                                                <option value="Australia/Brisbane">(GMT+10:00) Brisbane
                                                                </option>
                                                                <option value="Australia/Hobart">(GMT+10:00) Hobart
                                                                </option>
                                                                <option value="Asia/Vladivostok">(GMT+10:00) Vladivostok
                                                                </option>
                                                                <option value="Australia/Lord_Howe">(GMT+10:30) Lord
                                                                    Howe Island</option>
                                                                <option value="Etc/GMT-11">(GMT+11:00) Solomon Is., New
                                                                    Caledonia</option>
                                                                <option value="Asia/Magadan">(GMT+11:00) Magadan
                                                                </option>
                                                                <option value="Pacific/Norfolk">(GMT+11:30) Norfolk
                                                                    Island</option>
                                                                <option value="Asia/Anadyr">(GMT+12:00) Anadyr,
                                                                    Kamchatka</option>
                                                                <option value="Pacific/Auckland">(GMT+12:00) Auckland,
                                                                    Wellington</option>
                                                                <option value="Etc/GMT-12">(GMT+12:00) Fiji, Kamchatka,
                                                                    Marshall Is.</option>
                                                                <option value="Pacific/Chatham">(GMT+12:45) Chatham
                                                                    Islands</option>
                                                                <option value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa
                                                                </option>
                                                                <option value="Pacific/Kiritimati">(GMT+14:00)
                                                                    Kiritimati</option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-primary p-2 w-50">Submit</button>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email address</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="Enter email"
                                                            style="color: white;">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Language</label>
                                                        <div class="">
                                                            <select class="w-100 dropdown form-control"
                                                                style="color: white;" id="languages" name="languages">
                                                                <option>language</option>
                                                                <option value="af">Afrikaans</option>
                                                                <option value="sq">Albanian - shqip</option>
                                                                <option value="am">Amharic - አማርኛ</option>
                                                                <option value="ar">Arabic - العربية</option>
                                                                <option value="an">Aragonese - aragonés</option>
                                                                <option value="hy">Armenian - հայերեն</option>
                                                                <option value="ast">Asturian - asturianu</option>
                                                                <option value="az">Azerbaijani - azərbaycan dili
                                                                </option>
                                                                <option value="eu">Basque - euskara</option>
                                                                <option value="be">Belarusian - беларуская</option>
                                                                <option value="bn">Bengali - বাংলা</option>
                                                                <option value="bs">Bosnian - bosanski</option>
                                                                <option value="br">Breton - brezhoneg</option>
                                                                <option value="bg">Bulgarian - български</option>
                                                                <option value="ca">Catalan - català</option>
                                                                <option value="ckb">Central Kurdish - کوردی (دەستنوسی
                                                                    عەرەبی)</option>
                                                                <option value="zh">Chinese - 中文</option>
                                                                <option value="zh-HK">Chinese (Hong Kong) - 中文（香港）
                                                                </option>
                                                                <option value="zh-CN">Chinese (Simplified) - 中文（简体）
                                                                </option>
                                                                <option value="zh-TW">Chinese (Traditional) - 中文（繁體）
                                                                </option>
                                                                <option value="co">Corsican</option>
                                                                <option value="hr">Croatian - hrvatski</option>
                                                                <option value="cs">Czech - čeština</option>
                                                                <option value="da">Danish - dansk</option>
                                                                <option value="nl">Dutch - Nederlands</option>
                                                                <option value="en">English</option>
                                                                <option value="en-AU">English (Australia)</option>
                                                                <option value="en-CA">English (Canada)</option>
                                                                <option value="en-IN">English (India)</option>
                                                                <option value="en-NZ">English (New Zealand)</option>
                                                                <option value="en-ZA">English (South Africa)</option>
                                                                <option value="en-GB">English (United Kingdom)</option>
                                                                <option value="en-US">English (United States)</option>
                                                                <option value="eo">Esperanto - esperanto</option>
                                                                <option value="et">Estonian - eesti</option>
                                                                <option value="fo">Faroese - føroyskt</option>
                                                                <option value="fil">Filipino</option>
                                                                <option value="fi">Finnish - suomi</option>
                                                                <option value="fr">French - français</option>
                                                                <option value="fr-CA">French (Canada) - français
                                                                    (Canada)</option>
                                                                <option value="fr-FR">French (France) - français
                                                                    (France)</option>
                                                                <option value="fr-CH">French (Switzerland) - français
                                                                    (Suisse)</option>
                                                                <option value="gl">Galician - galego</option>
                                                                <option value="ka">Georgian - ქართული</option>
                                                                <option value="de">German - Deutsch</option>
                                                                <option value="de-AT">German (Austria) - Deutsch
                                                                    (Österreich)</option>
                                                                <option value="de-DE">German (Germany) - Deutsch
                                                                    (Deutschland)</option>
                                                                <option value="de-LI">German (Liechtenstein) - Deutsch
                                                                    (Liechtenstein)</option>
                                                                <option value="de-CH">German (Switzerland) - Deutsch
                                                                    (Schweiz)</option>
                                                                <option value="el">Greek - Ελληνικά</option>
                                                                <option value="gn">Guarani</option>
                                                                <option value="gu">Gujarati - ગુજરાતી</option>
                                                                <option value="ha">Hausa</option>
                                                                <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option>
                                                                <option value="he">Hebrew - עברית</option>
                                                                <option value="hi">Hindi - हिन्दी</option>
                                                                <option value="hu">Hungarian - magyar</option>
                                                                <option value="is">Icelandic - íslenska</option>
                                                                <option value="id">Indonesian - Indonesia</option>
                                                                <option value="ia">Interlingua</option>
                                                                <option value="ga">Irish - Gaeilge</option>
                                                                <option value="it">Italian - italiano</option>
                                                                <option value="it-IT">Italian (Italy) - italiano
                                                                    (Italia)</option>
                                                                <option value="it-CH">Italian (Switzerland) - italiano
                                                                    (Svizzera)</option>
                                                                <option value="ja">Japanese - 日本語</option>
                                                                <option value="kn">Kannada - ಕನ್ನಡ</option>
                                                                <option value="kk">Kazakh - қазақ тілі</option>
                                                                <option value="km">Khmer - ខ្មែរ</option>
                                                                <option value="ko">Korean - 한국어</option>
                                                                <option value="ku">Kurdish - Kurdî</option>
                                                                <option value="ky">Kyrgyz - кыргызча</option>
                                                                <option value="lo">Lao - ລາວ</option>
                                                                <option value="la">Latin</option>
                                                                <option value="lv">Latvian - latviešu</option>
                                                                <option value="ln">Lingala - lingála</option>
                                                                <option value="lt">Lithuanian - lietuvių</option>
                                                                <option value="mk">Macedonian - македонски</option>
                                                                <option value="ms">Malay - Bahasa Melayu</option>
                                                                <option value="ml">Malayalam - മലയാളം</option>
                                                                <option value="mt">Maltese - Malti</option>
                                                                <option value="mr">Marathi - मराठी</option>
                                                                <option value="mn">Mongolian - монгол</option>
                                                                <option value="ne">Nepali - नेपाली</option>
                                                                <option value="no">Norwegian - norsk</option>
                                                                <option value="nb">Norwegian Bokmål - norsk bokmål
                                                                </option>
                                                                <option value="nn">Norwegian Nynorsk - nynorsk</option>
                                                                <option value="oc">Occitan</option>
                                                                <option value="or">Oriya - ଓଡ଼ିଆ</option>
                                                                <option value="om">Oromo - Oromoo</option>
                                                                <option value="ps">Pashto - پښتو</option>
                                                                <option value="fa">Persian - فارسی</option>
                                                                <option value="pl">Polish - polski</option>
                                                                <option value="pt">Portuguese - português</option>
                                                                <option value="pt-BR">Portuguese (Brazil) - português
                                                                    (Brasil)</option>
                                                                <option value="pt-PT">Portuguese (Portugal) - português
                                                                    (Portugal)</option>
                                                                <option value="pa">Punjabi - ਪੰਜਾਬੀ</option>
                                                                <option value="qu">Quechua</option>
                                                                <option value="ro">Romanian - română</option>
                                                                <option value="mo">Romanian (Moldova) - română (Moldova)
                                                                </option>
                                                                <option value="rm">Romansh - rumantsch</option>
                                                                <option value="ru">Russian - русский</option>
                                                                <option value="gd">Scottish Gaelic</option>
                                                                <option value="sr">Serbian - српски</option>
                                                                <option value="sh">Serbo-Croatian - Srpskohrvatski
                                                                </option>
                                                                <option value="sn">Shona - chiShona</option>
                                                                <option value="sd">Sindhi</option>
                                                                <option value="si">Sinhala - සිංහල</option>
                                                                <option value="sk">Slovak - slovenčina</option>
                                                                <option value="sl">Slovenian - slovenščina</option>
                                                                <option value="so">Somali - Soomaali</option>
                                                                <option value="st">Southern Sotho</option>
                                                                <option value="es">Spanish - español</option>
                                                                <option value="es-AR">Spanish (Argentina) - español
                                                                    (Argentina)</option>
                                                                <option value="es-419">Spanish (Latin America) - español
                                                                    (Latinoamérica)</option>
                                                                <option value="es-MX">Spanish (Mexico) - español
                                                                    (México)</option>
                                                                <option value="es-ES">Spanish (Spain) - español (España)
                                                                </option>
                                                                <option value="es-US">Spanish (United States) - español
                                                                    (Estados Unidos)</option>
                                                                <option value="su">Sundanese</option>
                                                                <option value="sw">Swahili - Kiswahili</option>
                                                                <option value="sv">Swedish - svenska</option>
                                                                <option value="tg">Tajik - тоҷикӣ</option>
                                                                <option value="ta">Tamil - தமிழ்</option>
                                                                <option value="tt">Tatar</option>
                                                                <option value="te">Telugu - తెలుగు</option>
                                                                <option value="th">Thai - ไทย</option>
                                                                <option value="ti">Tigrinya - ትግርኛ</option>
                                                                <option value="to">Tongan - lea fakatonga</option>
                                                                <option value="tr">Turkish - Türkçe</option>
                                                                <option value="tk">Turkmen</option>
                                                                <option value="tw">Twi</option>
                                                                <option value="uk">Ukrainian - українська</option>
                                                                <option value="ur">Urdu - اردو</option>
                                                                <option value="ug">Uyghur</option>
                                                                <option value="uz">Uzbek - o‘zbek</option>
                                                                <option value="vi">Vietnamese - Tiếng Việt</option>
                                                                <option value="wa">Walloon - wa</option>
                                                                <option value="cy">Welsh - Cymraeg</option>
                                                                <option value="fy">Western Frisian</option>
                                                                <option value="xh">Xhosa</option>
                                                                <option value="yi">Yiddish</option>
                                                                <option value="yo">Yoruba - Èdè Yorùbá</option>
                                                                <option value="zu">Zulu - isiZulu</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                    <hr>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5>Name Verification</h5>
                                            </div>
                                            <div class="col-12">
                                                <p>Verify your real name to make sure you’re able to receive a
                                                    certificate when you complete a course or Specialization</p>
                                            </div>
                                            <div class="col-6"><button class="btn btn-primary p-2 w-50">Verify My
                                                    Name</button></div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5>Teo Factor Authentication (BETA)</h5>
                                            </div>
                                            <div class="col-12">
                                                <p>Two-Factor Authentication adds an additional layer of security to
                                                    your RaagamaInstitute account.
                                                    Each time you log in to RaagamaInstitute, you will be asked to enter
                                                    a
                                                    unique code that is only available on your mobile phone.
                                                    This extra protection ensures that you are the only one who will
                                                    have access to your RaagamaInstitute account and courses.</p>
                                            </div>
                                            <div class="col-6"><button class="btn btn-primary p-2 w-50">Enable
                                                    Two-factor Authentication</button></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5>Delete Account</h5>
                                            </div>
                                            <div class="col-12">
                                                <p>Two-Factor Authentication adds an additional layer of security to
                                                    your RaagamaInstitute account.
                                                    Each time you log in to RaagamaInstitute, you will be asked to enter
                                                    a
                                                    unique code that is only available on your mobile phone.
                                                    This extra protection ensures that you are the only one who will
                                                    have access to your RaagamaInstitute account and courses.</p>
                                            </div>
                                            <div class="col-6"><button class="btn btn-primary p-2 w-50">Delete
                                                    Account</button></div>
                                        </div>
                                    </div>

                                </div>


                            </div>


                        </div>

                    </div>



                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php
                require "studentfooter.php";
                ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>

        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>