@extends('layouts.frontend.master')


@section('seo')

    @include('frontend.global.seo',['title'=> $content->seo_title ?? $content->name, 'description' => $content->seo_description ?? '','keyword' => $content->seo_keywords ?? '', 'schema'=> $content->seo_schema ?? ''])
    
@endsection
            
@section('content')       
    @include('frontend.global.banner', ['name' =>$content->name,'banner' =>$content->banner,'parentname'=> 'Category','parentlink'=>'/category'])
    @if($content->image || $content->description)        
        <section class="about-area my-5" >
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="s-about-img p-relative">
                            <img src="{{ asset($content->image) }}" alt="{{ $content->name ?? '' }}">
                        </div>                    
                    </div>                
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-content s-about-content">
                            {!! $content->description ?? '' !!}
                        </div>
                    </div>                
                </div>
            </div>
        </section>
    @endif
    
    @if($packages->isNotEmpty())                
        <section class="category my-5">
            <div class="container">
                <div class="row">
                    @foreach ($packages as $pck)
                        <div class="col-md-4 mb-3">
                            <div class="shadow py-3 px-2">
                                <div class="card-activities-list d-flex align-items-center gap-4 mt-1">
                                    <div class="media-wrapper d-flex mt-2">
                                        <img src="{{ asset($pck->image) }}" alt="{{ $pck->name ?? '' }}" />
                                    </div>
                                    <p>
                                        <a href="{{ route('packagesingle',$pck->slug) }}" class="headlink d-flex mt-2 text-start">{{ $pck->name ?? '' }}</a>
                                        <strong> Tour days :</strong> {{ $pck->globalinfo->duration ?? '' }} <br />
                                        <strong> Destination :</strong> {{ $pck->destination ?? '' }}<br />
                                        <a href="{{ route('packagesingle', $pck->slug) }}" class="text-link">More Details</a> |
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#enquirenow" class="text-link">Send us Enquiry</a>
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