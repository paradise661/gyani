@extends('layouts.frontend.master')

@section('seo')

    @include('frontend.global.seo',['title'=>$content->seo_title??'','description'=>$content->seo_description??'','keyword'=>$content->seo_keywords??'','schema'=>$content->seo_schema??''])
    
@endsection

@section('content')            
    @include('frontend.global.banner', ['name' =>$content->name,'banner' =>$content->banner,'parentname'=> '','parentlink'=>''])
     
    @if ($faqs)
        @php
            $countser = (int) count($faqs);
            $firstfaqs = array_slice($faqs, 0, $countser / 2);
            $secondfaqs = array_slice($faqs, $countser / 2);
        @endphp
        @if($firstfaqs || $secondfaqs)
            <section id="faq" class="faq-area pt-120 pb-120">             
                <div class="container">   
                    <div class="row">
                        @if($firstfaqs)
                            <div class="col-lg-6 col-md-6">
                                <div class="faq-wrap">
                                    <div class="accordion" id="accordionExample">
                                        @foreach($firstfaqs as $fkey => $ffaqs)
                                            <div class="card">
                                                <div class="card-header" id="heading{{ $fkey }}">
                                                    <h2 class="mb-0">
                                                        <button class="faq-btn{{ $fkey == 0 ? '' : ' collapsed' }}" type="button" data-bs-toggle="collapse"  data-bs-target="#collapse{{ $fkey }}" aria-bs-expanded="true" aria-bs-controls="collapse{{ $fkey }}">
                                                        {{ $ffaqs['question'] }}
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapse{{ $fkey }}" class="collapse{{ $fkey == 0 ? ' show' : '' }}" aria-labelledby="heading{{ $fkey }}" data-bs-parent="#accordionExample" style="">
                                                    <div class="card-body">
                                                        {!! $ffaqs['answer'] !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($secondfaqs)
                            <div class="col-lg-6 col-md-6">
                                <div class="faq-wrap">
                                    <div class="accordion" id="accordionExample2">
                                        @foreach($secondfaqs as $skey => $sfaqs)
                                            <div class="card">
                                                <div class="card-header" id="heading2{{ $skey }}">
                                                    <h2 class="mb-0">
                                                        <button class="faq-btn{{ $skey == 0 ? '' : ' collapsed' }}" type="button" data-bs-toggle="collapse"  data-bs-target="#collapse2{{ $skey }}" aria-bs-expanded="true" aria-bs-controls="collapse2{{ $skey }}">
                                                        {{ $sfaqs['question'] }}
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapse2{{ $skey }}" class="collapse{{ $skey == 0 ? ' show' : '' }}" aria-labelledby="heading2{{ $skey }}" data-bs-parent="#accordionExample2" style="">
                                                    <div class="card-body">
                                                        {!! $sfaqs['answer'] !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif
    @endif
@endsection