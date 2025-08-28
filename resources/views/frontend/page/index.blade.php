@extends('layouts.frontend.master')

@section('seo')

    @include('frontend.global.seo',['title'=>$content->seo_title??'','description'=>$content->seo_description??'','keyword'=>$content->seo_keywords??'','schema'=>$content->seo_schema??''])
    
@endsection

@section('content')            
    @include('frontend.global.banner', ['name' =>$content->name,'banner' =>$content->banner,'parentname'=> '','parentlink'=>''])
    

    @if($content->isNotEmpty())
        <section id="blog" class="blog-area p-relative fix pt-90 pb-90" style="background: url({{asset('frontend')}}/img/bg/blog-bg.png); background-position: center center; background-repeat: no-repeat;">
            <div class="container">
                <div class="row">
                    @foreach($content as $key => $blog)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-post2 mb-30 hover-zoomin wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                <div class="blog-thumb2">
                                    <a href="{{ route('pagesingle', $blog->slug) }}" class="media-wrapper">
                                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->name ?? '' }}">
                                    </a>
                                </div>
                                <div class="blog-content2 w-100">
                                    <div class="b-meta">
                                            <div class="meta-info">
                                            <ul>                                                   
                                                <li><i class="fal fa-calendar-alt"></i> {{ date('d, F Y', strtotime($blog->created_at)) ?? '' }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h4><a href="{{ route('pagesingle', $blog->slug) }}">{{ $blog->name ?? '' }}</a></h4> 
                                    <div class="blog-btn"><a href="{{ route('blogsingle', $blog->slug) }}">Read More <i class="far fa-long-arrow-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection