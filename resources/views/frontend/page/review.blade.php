@extends('layouts.frontend.master')

@section('seo')

    @include('frontend.global.seo',['title'=>$content->seo_title??'','description'=>$content->seo_description??'','keyword'=>$content->seo_keywords??'','schema'=>$content->seo_schema??''])
    
@endsection

@section('content')            
    @include('frontend.global.banner', ['name' =>$content->name,'banner' =>$content->banner,'parentname'=> '','parentlink'=>''])
     
    @if($reviews->isNotEmpty())   
        <section class="testimonial-area pt-60 pb-60 p-relative fix" style="background: url({{asset('frontend')}}/img/bg/test-bg.png); background-position: center center; background-repeat: no-repeat;">
            <div class="container">
                <div class="row">                    
                    <div class="col-12">
                        <div class="testimonial row">
                            @foreach($reviews as $key => $rev)
                                <div class="col-md-4">
                                    <div class="single-testimonial">
                                        <div class="testi-author d-flex">
                                            <div class="media-wrapper">
                                                <img src="{{ asset($rev->image) }}" alt="img">
                                            </div>
                                            <div class="ta-info">
                                                <h6>{{ $rev->name ?? '' }}</h6>
                                                <span>{{ $rev->position ?? '' }}</span>
                                            </div>
                                        </div>
                                        {!! $rev->description ?? '' !!}
                                        
                                        <div class="qt-img">
                                            <img src="{{asset('frontend')}}/img/testimonial/qt-icon.png" alt="img">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection