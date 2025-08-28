@extends('layouts.frontend.master')

@section('seo')

    @include('frontend.global.seo',['title'=>$content->seo_title??'','description'=>$content->seo_description??'','keyword'=>$content->seo_keywords??'','schema'=>$content->seo_schema??''])
    
@endsection

@section('content')            
    @include('frontend.global.banner', ['name' =>$content->name,'banner' =>$content->banner,'parentname'=> '','parentlink'=>''])
            
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="s-about-img p-relative  wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                        <div class="media-wrapper">
                            <img class="w-100" src="{{ asset($content->image) }}" alt="{{ $content->name }}">
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="about-content s-about-content  wow fadeInRight  animated" data-animation="fadeInRight" data-delay=".4s">
                        {!! $content->description ?? '' !!}
                    </div>
                </div>                
            </div>
        </div>
    </section>    
@endsection