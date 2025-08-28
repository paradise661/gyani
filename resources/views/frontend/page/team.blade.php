@extends('layouts.frontend.master')

@section('seo')

    @include('frontend.global.seo',['title'=>$content->seo_title??'','description'=>$content->seo_description??'','keyword'=>$content->seo_keywords??'','schema'=>$content->seo_schema??''])
    
@endsection

@section('content')            
    @include('frontend.global.banner', ['name' =>$content->name,'banner' =>$content->banner,'parentname'=> '','parentlink'=>''])
    
    @if($teams->isNotEmpty())   
        <section class="team-area fix p-relative pt-120 pb-90" >    
            <div class="container">  
                <div class="row">  
                    @foreach($teams as $key => $team)
                        <div class="col-xl-3">
                            <div class="single-team mb-45" >
                                <div class="team-thumb">
                                    <div class="brd">
                                            <img src="{{ asset($team->image) }}" alt="img">
                                    </div>                                   
                                </div>
                                <div class="team-info">
                                    <h4><a href="team-single.html">{{ $team->name ?? '' }}</a></h4>
                                    <p>{{ $team->position ?? '' }}</p>
                                    <div class="team-social">
                                        <ul>
                                            <li><a href="tel:{{ preg_replace('/\D/', '', $team->phone) }}"><i class="fa fa-phone-alt"></i></a></li> 
                                            <li> <a href="mailto:{{ $team->email }}"><i class="fa fa-envelope"></i></a></li>  
                                        </ul>       
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection