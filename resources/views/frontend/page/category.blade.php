@extends('layouts.frontend.master')

@section('seo')

    @include('frontend.global.seo',['title'=>$content->seo_title??'','description'=>$content->seo_description??'','keyword'=>$content->seo_keywords??'','schema'=>$content->seo_schema??''])
    
@endsection

@section('content')            
    @include('frontend.global.banner', ['name' =>$content->name,'banner' =>$content->banner,'parentname'=> '','parentlink'=>''])

    <section class="category mt-5">
        <div class="container">
            <div class="row">
                @foreach ($all_cats as $cats)
                    @php $packtwo = getpackbycats($cats->id, 6) @endphp
                    @if($packtwo->isNotEmpty())
                        <div class="col-md-4 col-sm-12 mb-4">
                            <div class="card-activities mt-1">
                                <a href="{{ route('categorysingle',$cats->slug) }}"><h2>{{ $cats->name ?? '' }}</h2></a>
                                @foreach ($packtwo as $pckto)
                                <div class="card-activities-list d-flex align-items-center gap-4 mt-1">
                                    <div class="media-wrapper d-flex mt-2">
                                    <img src="{{ asset($pckto->image) }}" alt="{{ $pckto->name ?? '' }}" />
                                    </div>
                                    <p>
                                    <a href="{{ route('packagesingle',$pckto->slug) }}" class="headlink d-flex mt-2 text-start">{{ $pckto->name ?? '' }}</a>
                                    <strong> Tour days :</strong> {{ $pckto->globalinfo->duration ?? '' }} <br />
                                    <strong> Destination :</strong> {{ $pckto->destination ?? '' }}<br />
                                    <a href="{{ route('packagesingle', $pckto->slug) }}" class="text-link">More Details</a> |
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#enquirenow" class="text-link">Send us Enquiry</a>
                                    </p>
                                </div>
                                @endforeach
                                <div class="d-flex w-100 mt-3 justify-content-center">
                                    <a class="btn px-3 py-1" href="{{ route('categorysingle',$cats->slug) }}" role="button">View all</a>
                                </div>
                            </div>
                        </div>
                    @endif                   
                @endforeach
            </div>
        </div>
    </section>
@endsection