@extends('layouts.frontend.master')

@section('seo')
    @include('frontend.global.seo', [
        'title' => $content->seo_title ?? $content->name,
        'description' => $content->meta_description ?? '',
        'keyword' => $content->meta_keywords ?? '',
        'schema' => $content->seo_schema ?? '',
    ])
@endsection

@section('content')

    @include('frontend.global.banner', [
        'name' => $content->name,
        'banner' => $content->banner,
        'parentname' => 'Packages',
        'parentlink' => '/packages',
    ])
    <!--content start-->
    <section class="single-content mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <h3 class="h2">Overview</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="time d-flex align-items-center gap-3">
                                <i class="fa-regular fa-clock"></i>
                                Duration : {{ $globalinfo->duration ?? '' }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="location d-flex align-items-center gap-3">
                                <i class="fa-solid fa-location-dot"></i>
                                Destination : {{ $content->destination ?? '' }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="time d-flex align-items-center gap-3">
                                <i class="fa-solid fa-people-group"></i>
                                Group Size : {{ $globalinfo->size ?? '' }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="location d-flex align-items-center gap-3">
                                <i class="fa-solid fa-van-shuttle"></i>
                                Transportation : {{ $globalinfo->transportation ?? '' }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="time d-flex align-items-center gap-3">
                                <i class="fa-solid fa-person-snowboarding"></i>
                                Activity : {{ $globalinfo->activity ?? '' }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="location d-flex align-items-center gap-3">
                                <i class="fa-solid fa-cloud-meatball"></i>
                                Best Season : {{ $globalinfo->season ?? '' }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="time d-flex align-items-center gap-3">
                                <i class="fa-solid fa-bed-pulse"></i>
                                Accomodation : {{ $globalinfo->accomod ?? '' }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="location d-flex align-items-center gap-3">
                                <i class="fa-solid fa-burger"></i>
                                Meals : {{ $globalinfo->meal ?? '' }}
                            </div>
                        </div>
                    </div>
                    @if ($content->short_description)
                        <div class="texts ms-0">
                            {!! $content->short_description ?? '' !!}
                        </div>
                    @endif
                    <div class="buttons row align-items-center ms-0">
                        <div class="col-lg-3 col-sm-6">

                            <a class=" text-center btn btn1  w-100 mb-2" data-bs-toggle="modal" data-bs-target="#enquirenow"
                                href="#">BOOK NOW <i class="fa-regular fa-address-book"></i></a>
                        </div>
                        <div class="col-lg-3 col-sm-6">

                            <a class=" text-center btn btn2 w-100 mb-2" data-bs-toggle="modal" data-bs-target="#enquirenow"
                                href="#">Customize This Package <i class="fa-brands fa-intercom"></i></a>
                        </div>
                        <div class="col-lg-3 col-sm-6">

                            <a class=" text-center btn btn3 w-100 mb-2" data-bs-toggle="modal"
                                data-bs-target="#popcontactus" href="#">Enquire Now <i
                                    class="fa-solid fa-headset"></i></a>
                        </div>
                        <div class="col-lg-3 col-sm-6">

                            <a class=" text-center btn btn1 w-100 mb-2" href="{{ route('print', $content->id) }}">Print Now
                                <i class="fa fa-print"></i></a>
                        </div>
                    </div>
                    <div class="maincontent mt-5">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                    data-bs-target="#overview-tab-pane" type="button" role="tab"
                                    aria-controls="overview-tab-pane" aria-selected="true">Overview</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="itinerary-tab" data-bs-toggle="tab"
                                    data-bs-target="#itinerary-tab-pane" type="button" role="tab"
                                    aria-controls="itinerary-tab-pane" aria-selected="true">Itinerary</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="inclusion-tab" data-bs-toggle="tab"
                                    data-bs-target="#inclusion-tab-pane" type="button" role="tab"
                                    aria-controls="inclusion-tab-pane" aria-selected="false">Inclusion</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="visa-tab" data-bs-toggle="tab" data-bs-target="#visa-tab-pane"
                                    type="button" role="tab" aria-controls="visa-tab-pane"
                                    aria-selected="false">Details</button>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="gallery-tab" data-bs-toggle="tab"
                                    data-bs-target="#gallery-tab-pane" type="button" role="tab"
                                    aria-controls="gallery-tab-pane" aria-selected="false">Gallery</button>
                            </li> --}}
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="faqs-tab" data-bs-toggle="tab"
                                    data-bs-target="#faqs-tab-pane" type="button" role="tab"
                                    aria-controls="faqs-tab-pane" aria-selected="false">Faqs</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel"
                                aria-labelledby="overview-tab" tabindex="0">
                                <div class="mt-4">
                                    @if ($content->description)
                                        <div class="texts ms-0">
                                            {!! $content->description ?? '' !!}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="itinerary-tab-pane" role="tabpanel"
                                aria-labelledby="itinerary-tab" tabindex="0">
                                <div class="mt-4">
                                    @if ($itineraries)
                                        @foreach ($itineraries as $key => $itin)
                                            <h4>Day {{ $key + 1 }} : {{ $itin->title ?? '' }}</h4>
                                            {!! $itin->description ?? '' !!}
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="faqs-tab-pane" role="tabpanel" aria-labelledby="faqs-tab"
                                tabindex="0">
                                <div class="mt-4">
                                    @if ($faqs)
                                        @foreach ($faqs as $key => $faq)
                                            <h4>{{ $key + 1 }}. {{ $faq->question ?? '' }}</h4>
                                            {!! $faq->answer ?? '' !!}
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="visa-tab-pane" role="tabpanel" aria-labelledby="visa-tab"
                                tabindex="0">
                                <div class="mt-4">
                                    @if ($visa && $visa->isNotEmpty())
                                        @foreach ($visa as $key => $v)
                                            <h4>{{ $key + 1 }}. {{ $v->question ?? '' }}</h4>
                                            {!! $v->answer ?? '' !!}
                                        @endforeach
                                    @else
                                        <p>No information available. <a href="/contact-us">(Contact us)</a>
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="tab-pane fade" id="inclusion-tab-pane" role="tabpanel"
                                aria-labelledby="inclusion-tab" tabindex="0">
                                <div class="text mt-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Inclusion</h3>
                                            {!! $content->inclusion ?? '' !!}
                                        </div>
                                        <div class="col-md-6">
                                            <h3>Exclusion</h3>
                                            {!! $content->exclusion !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="gallery-tab-pane" role="tabpanel"
                                aria-labelledby="gallery-tab" tabindex="0">
                                <div class="gallery mt-4">
                                    <div class="row">
                                        @if ($content->image)
                                            <div class="col-md-4 mb-4">
                                                <div class="shadow">
                                                    <div class="media-wrapper">
                                                        <a class="fancybox" data-fancybox="demo"
                                                            href="{{ asset($content->image) }}">
                                                            <img src="{{ asset($content->image) }}"
                                                                alt="{{ $content->name ?? '' }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($content->galleries->isNotEmpty())
                                            @foreach ($content->galleries as $key => $galss)
                                                <div class="col-md-4 mb-4">
                                                    <div class="shadow">
                                                        <div class="media-wrapper">
                                                            <a class="fancybox" data-fancybox="demo"
                                                                href="{{ asset($galss->image) }}">
                                                                <img src="{{ asset($galss->image) }}"
                                                                    alt="{{ $content->name . $key ?? '' }}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="card-form blog-sticky">
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
                                        <input class="form-control p-0 @error('name') is-invalid @enderror"
                                            id="travel-date" type="date" name="traveldate" />
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
                                        <input class="form-control p-0 @error('email') is-invalid @enderror"
                                            id="email" type="email" name="email" placeholder="Email" />
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
                                        <input class="form-control p-0 @error('phone') is-invalid @enderror"
                                            id="number" type="text" name="phone" placeholder="Phone no" />
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
                </div>
            </div>
        </div>
    </section>
    <!--content end-->
@endsection
