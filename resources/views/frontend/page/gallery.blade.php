@extends('layouts.frontend.master')

@section('seo')

    @include('frontend.global.seo',['title'=>$content->seo_title??'','description'=>$content->seo_description??'','keyword'=>$content->seo_keywords??'','schema'=>$content->seo_schema??''])
    
@endsection

@section('content')            
    @include('frontend.global.banner', ['name' =>$content->name,'banner' =>$content->banner,'parentname'=> '','parentlink'=>''])

    @if($gallerys->isNotEmpty())
        <section class="gallery my-5">
            <div class="container">
                <div class="row">                    
                    @foreach($gallerys as $key => $galls)
                        <div class="col-md-4 mb-4">
                            <div class="shadow">
                              <div class="media-wrapper">
                                <a href="{{ asset($galls->image) }}" data-fancybox="demo" class="fancybox">
                                    <img src="{{ asset($galls->image) }}" alt="gallery-{{ $key }}">
                                </a>
                              </div>
                            </div>                          
                        </div>                                  
                    @endforeach
                </div>                
            </div>
        </section>
    @endif
@endsection