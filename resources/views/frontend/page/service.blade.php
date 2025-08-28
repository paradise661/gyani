@extends('layouts.frontend.master')

@section('seo')

    @include('frontend.global.seo',['title'=>$content->seo_title??'','description'=>$content->seo_description??'','keyword'=>$content->seo_keywords??'','schema'=>$content->seo_schema??''])
    
@endsection

@section('content')            
    @include('frontend.global.banner', ['name' =>$content->name,'banner' =>$content->banner,'parentname'=> '','parentlink'=>''])
    
    @if($allservices->isNotEmpty())        
        <section class="category my-5">
            <div class="container">
                <div class="row">
                    @foreach ($allservices as $pck)
                        <div class="col-md-4 mb-3">
                            <div class="shadow py-2 ">
                                <div class="card-activities-list d-flex align-items-center gap-4">
                                    <div class="media-wrapper d-flex">
                                        <img src="{{ asset($pck->image) }}" alt="{{ $pck->name ?? '' }}" />
                                    </div>
                                    <p>
                                        <a href="{{ route('servicesingle',$pck->slug) }}" class="headlink d-flex mt-2 text-start">{{ $pck->name ?? '' }}</a>
                                        <a href="{{ route('servicesingle', $pck->slug) }}" class="text-link">Read More</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection