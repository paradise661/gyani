@extends('layouts.frontend.master')

@section('seo')
    <title>{{ $setting['homepage_seo_title'] ?? 'Gyani Holidays' }}</title>
    <meta name="keywords" content="{{ $setting['homepage_seo_keywords'] ?? '' }}">
    <meta name="description" content="{{ $setting['homepage_seo_description'] ?? '' }}">
    <link rel="canonical" href="{{ Request::url() }}" />
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Gyani Holidays",
      "alternateName": "The Nepal Holidays",
      "url": "https://thenepalholidays.com/",
      "logo": "https://thenepalholidays.com/storage/setting/main_logo-20230314061330.png",
      "sameAs": [
        "https://thenepalholidays.com/",
        "https://www.facebook.com/theNepalHolidayss"
      ]
    }
</script>
@endsection
@section('content')
    <section class="home-slider">
        <div class="container">
            <div class="row align-items-center">
                @if ($firstcats)
                    <div class="col-md-5 col-sm-12">
                        <div class="home-slider-popularpackage mt-2 px-2 py-2">
                            @php $firstpack = getpackbycats($firstcats->id, 4) @endphp
                            @if ($firstpack)
                                <a href="{{ route('categorysingle', $firstcats->slug) }}">
                                    <h2>{{ $firstcats->name ?? '' }}</h2>
                                </a>
                                @foreach ($firstpack as $fstpack)
                                    <div class="home-slider-popularpackage-list1 d-flex align-items-center gap-4 mt-2">
                                        <div class="media-wrapper">
                                            <img src="{{ asset($fstpack->image) }}" alt="{{ $fstpack->name ?? '' }}" />
                                        </div>
                                        <p>
                                            <a class="headlink d-flex mt-2 text-start"
                                                href="{{ route('packagesingle', $fstpack->slug) }}">{{ $fstpack->name ?? '' }}</a>
                                            <strong> Tour days :</strong> {{ $fstpack->globalinfo->duration ?? '' }} <br />
                                            <strong> Destination :</strong> {{ $fstpack->destination ?? '' }}<br />
                                            <a class="text-link" href="{{ route('packagesingle', $fstpack->slug) }}">More
                                                Details</a> |
                                            <a class="text-link" data-bs-toggle="modal" data-bs-target="#enquirenow"
                                                href="#">Send us Enquiry</a>
                                        </p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endif

                @if ($sliders->isNotEmpty())
                    <div class="col-md-7 col-sm-12">
                        <div class="home-slider-slider1 single-item mt-3">
                            @foreach ($sliders as $key => $slide)
                                <div class="media-wrapper" style="width:100%; height:410px; overflow:hidden;">
                                    <img src="{{ asset($slide->image) }}" alt="slider-{{ $key }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="card-form">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <h1 class="h3">INTERESTED? Get Help from our TRAVEL EXPERTS</h1>
                    @include('frontend.includes.message')
                    <form class="Required-form" action="{{ route('book') }}" method="POST">
                        @csrf
                        <div class="Required-form mt-1">
                            <div class="heading">INTERESTED ? GET HELP FROM OUR EXPERTS</div>
                            <div class="Required-form-travel row align-items-center">
                                <div class="col-md-5 col-sm-12 p-0 ps-2">
                                    <label for="travel date">Travel Date:</label>
                                </div>
                                <div class="col-md-7 col-sm-12 px-1 py-1">
                                    <input class="form-control p-0 @error('name') is-invalid @enderror" id="travel-date"
                                        type="date" name="traveldate" />
                                </div>
                                @error('traveldate')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="Required-form-person row align-items-center">
                                <div class="col-md-5 col-sm-12 p-0 ps-2">
                                    <label for="person">Person Count:</label>
                                </div>
                                <div class="col-md-7 col-sm-12 px-2 py-1">
                                    <select class="@error('adults') is-invalid @enderror" name="adults">
                                        <option selected>Adults</option>
                                        @for ($i = 1; $i <= 20; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select class="@error('childs') is-invalid @enderror" name="childs">
                                        <option selected>Child</option>
                                        @for ($j = 1; $j <= 20; $j++)
                                            <option value="{{ $j }}">{{ $j }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="Required-form-city row align-items-center">
                                <div class="col-md-5 col-sm-12 p-0 ps-2">
                                    <label for="city">Departure City:</label>
                                </div>
                                <div class="col-md-7 col-sm-12 px-1 py-1">
                                    <input class="form-control p-0 @error('departure_city') is-invalid @enderror"
                                        id="departure-city" type="text" name="departure_city"
                                        placeholder="Departure city" />
                                </div>
                                @error('departure_city')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="Required-form-duration row align-items-center">
                                <div class="col-md-5 col-sm-12 p-0 ps-2">
                                    <label for="person">Duration:</label>
                                </div>
                                <div class="col-md-7 col-sm-12 px-2 py-1">
                                    <select class="box w-100 @error('duration') is-invalid @enderror" name="duration">
                                        <option selected>Duration</option>
                                        @for ($k = 1; $k <= 32; $k++)
                                            <option value="{{ $k }}">{{ $k }}</option>
                                        @endfor
                                    </select>
                                </div>
                                @error('duration')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="Required-form">
                            <div class="heading">Your Contact Information:</div>
                            <div class="Required-form-name row align-items-center">
                                <div class="col-md-5 col-sm-12 p-0 ps-2">
                                    <label for="name">Name:</label>
                                </div>
                                <div class="col-md-7 col-sm-12 px-1 py-1">
                                    <input class="form-control p-0 @error('name') is-invalid @enderror" id="name"
                                        type="text" name="name" placeholder="Name" />
                                </div>
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="Required-form-email row align-items-center">
                                <div class="col-md-5 col-sm-12 p-0 ps-2">
                                    <label for="name">Email:</label>
                                </div>
                                <div class="col-md-7 col-sm-12 px-1 py-1">
                                    <input class="form-control p-0 @error('email') is-invalid @enderror" id="email"
                                        type="email" name="email" placeholder="Email" />
                                </div>
                                @error('email')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="Required-form-phone row align-items-center">
                                <div class="col-md-5 col-sm-12 p-0 ps-2">
                                    <label for="name">Phone no:</label>
                                </div>
                                <div class="col-md-7 col-sm-12 px-1 py-1">
                                    <input class="form-control p-0 @error('phone') is-invalid @enderror" id="number"
                                        type="text" name="phone" placeholder="Phone no" />
                                </div>
                                @error('phone')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="Required-form-country row align-items-center">
                                <div class="col-md-5 col-sm-12 p-0 ps-2">
                                    <label for="country">Country:</label>
                                </div>
                                <div class="col-md-7 col-sm-12 px-1 py-1">
                                    <select class="w-100 @error('country') is-invalid @enderror"id="country"
                                        name="country">
                                        <option>Select Country</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Aland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, Democratic Republic of the Congo</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Cote D'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curacao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and Mcdonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="XK">Kosovo</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libyan Arab Jamahiriya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="AN">Netherlands Antilles</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Reunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthelemy</option>
                                        <option value="SH">Saint Helena</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="CS">Serbia and Montenegro</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.s.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                                @error('country')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="Required-form-message row align-items-center">
                                <div class="col-md-12 col-sm-12 p-0 ps-2">
                                    <label for="city">Convey Your Message:</label>
                                </div>
                                <div class="col-md-12 col-sm-12 px-1 py-1">
                                    <textarea class="form-control p-0 @error('name') is-invalid @enderror" id="exampleFormControlTextarea1"
                                        name="message" rows="3"></textarea>
                                </div>
                                @error('message')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" name="pageurl" value="{{ Request::url() }}">
                        </div>
                        <button class="btn w-100 text-center mt-2" type="submit">Submit <i
                                class="fa-regular fa-paper-plane"></i></button>
                    </form>
                </div>
                @if ($setting['homepagecategory'])
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($setting['homepagecategory'] as $key => $homecat)
                        @if ($key != 0)
                            @php
                                $cats = App\Models\PackageCategory::where('id', $homecat)->first();
                            @endphp

                            @if ($cats)
                                @php
                                    $count = $count > 5 ? 1 : $count;
                                @endphp

                                @if ($count == 1)
                                    @php $packone = getpackbycats($cats->id, 8) @endphp
                                    @if ($packone->isNotEmpty())
                                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                            <div class="card-hotdeals mt-1">
                                                <a href="{{ route('categorysingle', $cats->slug) }}">
                                                    <h2>{{ $cats->name ?? '' }}</h2>
                                                </a>
                                                <div class="card-hotdeals-list">
                                                    <ul>
                                                        @foreach ($packone as $pckone)
                                                            <li>
                                                                <a href="{{ route('packagesingle', $pckone->slug) }}">
                                                                    <h5>{{ $pckone->name ?? '' }}</h5>
                                                                </a>
                                                                <p>Available up to
                                                                    {{ $pckone->globalinfo->discount ?? '' }}%
                                                                    <a data-bs-target="#enquirenow" data-bs-toggle="modal"
                                                                        href="#">(Enquire now)</a>
                                                                </p>
                                                                <div class="hl"></div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="d-flex w-100 mt-3 justify-content-center">
                                                    <a class="btn px-3 py-1"
                                                        href="{{ route('categorysingle', $cats->slug) }}"
                                                        role="button">View all</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @elseif ($count == 3)
                                    @php $packthree = getpackbycats($cats->id, 6) @endphp
                                    @if ($packthree->isNotEmpty())
                                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                            <div class="card-places mt-1">
                                                <a href="{{ route('categorysingle', $cats->slug) }}">
                                                    <h2>{{ $cats->name ?? '' }}</h2>
                                                </a>
                                                <div class="card-places-list">
                                                    <ul>
                                                        @foreach ($packthree as $pckthree)
                                                            <li>
                                                                <a href="{{ route('packagesingle', $pckthree->slug) }}">
                                                                    <h5>{{ $pckthree->name ?? '' }}</h5>
                                                                </a>
                                                                <p>{{ stripLetters($pckthree->short_description, 64, '...') }}
                                                                    <a data-bs-toggle="modal" data-bs-target="#enquirenow"
                                                                        href="#">(Enquire now)</a>
                                                                </p>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="d-flex w-100 mt-3 justify-content-center">
                                                    <a class="btn px-3 py-1"
                                                        href="{{ route('categorysingle', $cats->slug) }}"
                                                        role="button">View all</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @elseif ($count == 4)
                                    @php $packfour = getpackbycats($cats->id, 8) @endphp
                                    @if ($packfour->isNotEmpty())
                                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                            <div class="card-activities mt-1">
                                                <a href="{{ route('categorysingle', $cats->slug) }}">
                                                    <h2>{{ $cats->name ?? '' }}</h2>
                                                </a>
                                                <div class="card-holiday-list">
                                                    <ul>
                                                        @foreach ($packfour as $pckfour)
                                                            <li>
                                                                <a class="head"
                                                                    href="{{ route('packagesingle', $pckfour->slug) }}">{{ $pckfour->name ?? '' }}</a>
                                                                <p>({{ $pckfour->globalinfo->duration ?? '' }}) <a
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#enquirenow"
                                                                        href="#">Enquire now</a></p>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="d-flex w-100 mt-3 justify-content-center">
                                                    <a class="btn px-3 py-1"
                                                        href="{{ route('categorysingle', $cats->slug) }}"
                                                        role="button">View all</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @elseif ($count == 5)
                                    @php $packfive = getpackbycats($cats->id, 11) @endphp
                                    @if ($packfive->isNotEmpty())
                                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                            <div class="card-tour mt-1">
                                                <a href="{{ route('categorysingle', $cats->slug) }}">
                                                    <h2>{{ $cats->name ?? '' }}</h2>
                                                </a>
                                                <div class="card-tour-list">
                                                    <ul class="px-3">
                                                        @foreach ($packfive as $pckfive)
                                                            <li class="d-flex justify-content-between">
                                                                <a
                                                                    href="{{ route('packagesingle', $pckfive->slug) }}">{{ $pckfive->name ?? '' }}</a>
                                                                <a data-bs-toggle="modal" data-bs-target="#enquirenow"
                                                                    href="#"><small>Enquire now</small></a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="d-flex w-100 mt-3 justify-content-center">
                                                    <a class="btn px-3 py-1"
                                                        href="{{ route('categorysingle', $cats->slug) }}"
                                                        role="button">View all</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    @php $packtwo = getpackbycats($cats->id, 6) @endphp
                                    @if ($packtwo->isNotEmpty())
                                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                            <div class="card-activities mt-1">
                                                <a href="{{ route('categorysingle', $cats->slug) }}">
                                                    <h2>{{ $cats->name ?? '' }}</h2>
                                                </a>
                                                @foreach ($packtwo as $pckto)
                                                    <div class="card-activities-list d-flex align-items-center gap-4 mt-1">
                                                        <div class="media-wrapper d-flex mt-2">
                                                            <img src="{{ asset($pckto->image) }}"
                                                                alt="{{ $pckto->name ?? '' }}" />
                                                        </div>
                                                        <p>
                                                            <a class="headlink d-flex mt-2 text-start"
                                                                href="{{ route('packagesingle', $pckto->slug) }}">{{ $pckto->name ?? '' }}</a>
                                                            <strong> Tour days :</strong>
                                                            {{ $pckto->globalinfo->duration ?? '' }} <br />
                                                            <strong> Destination :</strong>
                                                            {{ $pckto->destination ?? '' }}<br />
                                                            <a class="text-link"
                                                                href="{{ route('packagesingle', $pckto->slug) }}">More
                                                                Details</a> |
                                                            <a class="text-link" data-bs-toggle="modal"
                                                                data-bs-target="#enquirenow" href="#">Send us
                                                                Enquiry</a>
                                                        </p>
                                                    </div>
                                                @endforeach
                                                <div class="d-flex w-100 mt-3 justify-content-center">
                                                    <a class="btn px-3 py-1"
                                                        href="{{ route('categorysingle', $cats->slug) }}"
                                                        role="button">View all</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                @php $count++; @endphp
                            @endif
                        @endif
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    @if ($popups->isNotEmpty())
        @foreach ($popups as $key => $value)
            <div class="nepalpopup modal fade" id="nepal-{{ $key }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="nepal-{{ $key }}Label"
                aria-hidden="true" style="z-index: 999999999;">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header pb-0">
                            <h5 class="modal-title" id="nepal-{{ $key }}Label">{{ $value->name }}</h5>
                            <a class="btn-close" data-bs-target="#nepal-{{ $key++ }}" data-bs-dismiss="modal"
                                href="#nepal-{{ $key++ }}"data-bs-toggle="modal" aria-label="Close"></a>
                        </div>
                        <div class="modal-body">
                            @if ($value->image)
                                <div class="media-wrapper">
                                    <img src="{{ asset($value->image) }}" alt="{{ $value->name }}">
                                </div>
                            @endif
                            @if ($value->description)
                                <div class="modal-text pt-3">
                                    {!! $value->description !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
@section('script')
    @if ($popups->isNotEmpty())
        <script>
            function showModal() {
                $("#nepal-0").modal('show');
            }
            var is_modal_show = sessionStorage.getItem('alreadyShow');
            if (is_modal_show != 'notshown') {
                setTimeout(showModal, 5000);
                sessionStorage.setItem('alreadyShow', 'notshown');
            }
        </script>
    @endif
@endsection
