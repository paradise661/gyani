@extends('layouts.frontend.master')

@section('seo')

    @include('frontend.global.seo',['title'=>$content->seo_title??'','description'=>$content->seo_description??'','keyword'=>$content->seo_keywords??'','schema'=>$content->seo_schema??''])
    
@endsection

@section('content')            
    @include('frontend.global.banner', ['name' =>$content->name,'banner' =>$content->banner,'parentname'=> '','parentlink'=>''])
    <section class="inner-blog b-details-p py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-details-wrap">
                        <div class="details__content pb-30">
                            @if($content->image)
                                <div class="media-wrapper">
                                    <img src="{{ asset($content->image) }}" alt="{{ $content->name }}">
                                </div>
                            @endif
                            <div class="content">
                                {!! $content->description ?? '' !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection