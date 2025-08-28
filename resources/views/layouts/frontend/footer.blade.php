<!--contact start-->
<section class="card-contact">
    <div class="container">
        <h3>Ways To Contact Us</h3>
        <div class="row mt-2">
            <div class="inside d-flex flex-wrap">
                <div class="d-flex gap-2 border-end border-grey flex-fill align-items-center info  shadow">
                    <div class="icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="content">
                        <p>
                            Talk to us <br />24x7 days<br /><a
                                href="tel:+977{{ preg_replace('/\D/', '', $setting['site_phone']) }}">+977-{{ $setting['site_phone'] }}</a>
                        </p>
                    </div>
                </div>
                <div class="d-flex gap-2 flex-fill border-end border-grey align-items-center info  shadow">
                    <div class="icon">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <div class="content">
                        <p>Chat with us<br />10am-7pm<br /><a
                                href="https://api.whatsapp.com/send/?phone=9779857015300&text&app_absent=0"
                                target="_blank">Chat Live</a></p>
                    </div>
                </div>
                <div class="d-flex gap-2 flex-fill border-end border-grey align-items-center info  shadow">
                    <div class="icon">
                        <i class="fa-solid fa-file-lines"></i>
                    </div>
                    <div class="content">
                        <p> Available for Queries<br />(Get reply in 24 hrs)<br /><a data-bs-toggle="modal"
                                data-bs-target="#popcontactus" href="#">Send Query </a></p>
                    </div>
                </div>
                <div class="d-flex gap-2 flex-fill align-items-center info  shadow">
                    <div class="icon">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <div class="content">
                        <p>Visit us<br />10am-7pm<br /><a href="/contact-us">Contact Us</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--contact end-->
@if ($setting['homepage_title'] || $setting['homepage_description'])
    <!--intro start-->
    <section class="card-intro mb-3">
        <div class="container">
            <h2>{{ $setting['homepage_title'] ?? '' }}</h2>
            {!! $setting['homepage_description'] ?? '' !!}
        </div>
    </section>
    <!--intro end-->
@endif
<!--Deals start-->

@if ($setting['footercategory'])
    <section class="home-deals">
        <div class="container">
            <div class="row">
                <div class="accordion py-2" id="accordionExample">
                    <div class="d-flex flex-wrap gap-3">
                        @foreach ($setting['footercategory'] as $key => $heading)
                            @php
                                $cats = App\Models\PackageCategory::where('id', $heading)->first();
                            @endphp
                            <h2 class="accordion-header" id="heading{{ $key }}">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $key }}" type="button" aria-expanded="true"
                                    aria-controls="collapse{{ $key }}">
                                    {{ $cats->name ?? '' }}
                                </button>
                            </h2>
                        @endforeach
                    </div>
                    @foreach ($setting['footercategory'] as $tab => $footercat)
                        @php
                            $cats = App\Models\PackageCategory::where('id', $footercat)->first();
                            $packages = getpackbycats($cats->id, 27);
                        @endphp
                        @if ($packages->isNotEmpty())
                            <div class="accordion-item">
                                <div class="accordion-collapse collapse" id="collapse{{ $tab }}"
                                    data-bs-parent="#accordionExample" aria-labelledby="heading{{ $tab }}">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul>
                                                    @foreach ($packages as $pckg)
                                                        <li>
                                                            <a
                                                                href="{{ route('packagesingle', $pckg->slug) }}">{{ $pckg->name ?? '' }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
<!-- Deals end-->
<footer>
    <section class="footer pt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="media-wrapper">
                        <a href="/">
                            <img src="{{ asset($setting['site_footer_logo'] ?? $setting['site_main_logo']) }}"
                                alt="Nepal Holidays">
                        </a>
                    </div>
                    <p>{{ $setting['site_information'] }}</p>
                    <div class="social d-flex align-items-center gap-3 mt-3">
                        Follow us on:
                        <a href="{{ $setting['site_facebook'] ?? 'javascript:void(0)' }}"
                            target="{{ $setting['site_facebook'] ? '_blank' : '_self' }}"><i
                                class="fa-brands fa-square-facebook"></i></a>
                        <a href="{{ $setting['site_youtube'] ?? 'javascript:void(0)' }}"
                            target="{{ $setting['site_youtube'] ? '_blank' : '_self' }}"><i
                                class="fa-brands fa-square-twitter"></i></a>
                        <a href="{{ $setting['site_instagram'] ?? 'javascript:void(0)' }}"
                            target="{{ $setting['site_instagram'] ? '_blank' : '_self' }}"><i
                                class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="footerlist mt-0">
                        @php
                            $menus = getMenus(2);
                        @endphp
                        @if ($menus)
                            <ul class="user-links">
                                @foreach ($menus as $key => $value)
                                    <li>
                                        <a href="{{ $value->slug }}"
                                            target="{{ $value->target ?? '_self' }}">{{ $value->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="footerlist mt-0">
                        @php
                            $menus = getMenus(3);
                        @endphp
                        @if ($menus)
                            <ul class="user-links">
                                @foreach ($menus as $key => $value)
                                    <li>
                                        <a href="{{ $value->slug }}"
                                            target="{{ $value->target ?? '_self' }}">{{ $value->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="footerlist mt-0">
                        @php
                            $menus = getMenus(4);
                        @endphp
                        @if ($menus)
                            <ul class="user-links">
                                @foreach ($menus as $key => $value)
                                    <li>
                                        <a href="{{ $value->slug }}"
                                            target="{{ $value->target ?? '_self' }}">{{ $value->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<!--footer end-->

<!--copyright start-->
<section class="copyright">
    <div class="container">
        <div class="d-flex justify-content-center w-100">
            <p>Copyright &copy {{ date('Y') }} The Nepal Holidays. All Rights Reserved | Made with <i
                    class="fa fa-heart"></i> by <a class="text-secondary" href="https://paradiseit.com.np/"
                    target="_blank"> Paradise InfoTech</a></p>
        </div>
    </div>
</section>
<!--copyright end-->

<div class="modal fade" id="enquirenow" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="staticBackdropLabel">INTERESTED ? GET HELP FROM OUR EXPERTS</h2>
                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="booking">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-12 row align-items-center">
                                    <div class="col-md-4 col-sm-12 p-0 ps-2">
                                        <label for="travel date">Travel Date:</label>
                                    </div>
                                    <div class="col-md-8 col-sm-12 px-1 py-1">
                                        <input class="form-control" name="traveldate" type="date">
                                        <span class="text-primary">
                                            <strong id="traveldate-error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 row align-items-center">
                                    <div class="col-md-4 col-sm-12 p-0 ps-2">
                                        <label for="person">Person Count:</label>
                                    </div>
                                    <div class="col-md-8 col-sm-12 px-1 py-1 d-flex">
                                        <div class="col-6">
                                            <select class="form-select" name="adults"
                                                aria-label="Default select example">
                                                <option selected>Adults</option>
                                                @for ($i = 1; $i <= 20; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <span class="text-primary">
                                                <strong id="adults-error"></strong>
                                            </span>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select" name="childs"
                                                aria-label="Default select example">
                                                <option selected>Children</option>
                                                @for ($j = 1; $j <= 20; $j++)
                                                    <option value="{{ $j }}">{{ $j }}</option>
                                                @endfor
                                            </select>
                                            <span class="text-primary">
                                                <strong id="childs-error"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 row align-items-center">
                                    <div class="col-md-4 col-sm-12 p-0 ps-2">
                                        <label for="city">Departure City:</label>
                                    </div>
                                    <div class="col-md-8 col-sm-12 px-1 py-1">
                                        <input class="form-control" name="departure_city" type="text"
                                            placeholder="Departure City">
                                        <span class="text-primary">
                                            <strong id="departure_city-error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 row align-items-center">
                                    <div class="col-md-4 col-sm-12 p-0 ps-2">
                                        <label for="person">Duration:</label>
                                    </div>
                                    <div class="col-md-8 col-sm-12 px-2 py-1">
                                        <select class="form-select" name="duration"
                                            aria-label="Default select example">
                                            <option selected>Duration</option>
                                            @for ($k = 1; $k <= 32; $k++)
                                                <option value="{{ $k }}">{{ $k }}</option>
                                            @endfor
                                        </select>
                                        <span class="text-primary">
                                            <strong id="duration-error"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-12 row align-items-center">
                                    <div class="col-md-4 col-sm-12 p-0 ps-2">
                                        <label for="name">Name:</label>
                                    </div>
                                    <div class="col-md-8 col-sm-12 px-1 py-1">
                                        <input class="form-control" name="name" type="text"
                                            placeholder="John Doe">
                                        <span class="text-primary">
                                            <strong id="name-error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 row align-items-center">
                                    <div class="col-md-4 col-sm-12 p-0 ps-2">
                                        <label for="email">Email:</label>
                                    </div>
                                    <div class="col-md-8 col-sm-12 px-1 py-1">
                                        <input class="form-control" name="email" type="email"
                                            placeholder="john@doe.com">
                                        <span class="text-primary">
                                            <strong id="email-error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 row align-items-center">
                                    <div class="col-md-4 col-sm-12 p-0 ps-2">
                                        <label for="phone no">Phone No:</label>
                                    </div>
                                    <div class="col-md-8 col-sm-12 px-1 py-1">
                                        <input class="form-control" type="text" name="phone"
                                            placeholder="989 989 9898">
                                        <span class="text-primary">
                                            <strong id="phone-error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 row align-items-center">
                                    <div class="col-md-4 col-sm-12 p-0 ps-2">
                                        <label for="country">Country:</label>
                                    </div>
                                    <div class="col-md-8 col-sm-12 px-1 py-1">
                                        <select class="w-100 form-select" id="country" name="country">
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
                                            <option value="GS">South Georgia and the South Sandwich Islands
                                            </option>
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
                                        <span class="text-primary">
                                            <strong id="country-error"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 row">
                            <div class="col-md-12 col-sm-12 p-0 ps-2">
                                <label for="city">Convey Your Message:</label>
                            </div>
                            <div class="col-md-12 col-sm-12 px-1 py-1">
                                <textarea class="form-control p-2" name="message" rows="6" placeholder="Write Your Message..."></textarea>
                                <span class="text-primary">
                                    <strong id="message-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-3">
                            <input type="hidden" name="pageurl" value="{{ Request::url() }}">
                            <input id="g-recaptcha-response" type="hidden" name="g-recaptcha-response">
                            <button class="btn btn-primary-200 text-white px-4 py-2" id="bookingsubmit"
                                type="submit">Submit <span class="d-none" id="loader"><i
                                        class="fas fa-sync fa-spin"></i></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popcontactus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="staticBackdropLabel">GET IN CONTACT</h2>
                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @include('frontend.includes.message')
                <form class="contact-form" id="contactus">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-lg-12">
                            <div class="contact-field p-relative c-name mb-20">
                                <input class="form-control @error('name') is-invalid @enderror" id="name"
                                    type="text" name="name" placeholder="Enter Your Name">
                                <span class="text-primary">
                                    <strong id="contact-name-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <div class="contact-field p-relative c-subject mb-20">
                                <input id="email"class="form-control @error('email') is-invalid @enderror"
                                    type="email" name="email" placeholder="Enter Your Email">
                                <span class="text-primary">
                                    <strong id="contact-email-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <div class="contact-field p-relative c-subject mb-20">
                                <input id="phone"class="form-control @error('phone') is-invalid @enderror"
                                    type="text" name="phone" placeholder="Enter Your Phone">
                                <span class="text-primary">
                                    <strong id="contact-phone-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="contact-field p-relative c-message">
                                <textarea id="message"class="form-control @error('message') is-invalid @enderror" name="message" cols="30"
                                    rows="10" placeholder="Write comments"></textarea>
                                <span class="text-primary">
                                    <strong id="contact-message-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <input id="response" type="hidden" name="g-recaptcha-response">
                            <button class="btn btn-primary-200 text-white px-4 py-2" id="contact-submit"
                                type="submit">Submit <span class="d-none" id="loader"><i
                                        class="fas fa-sync fa-spin"></i></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
