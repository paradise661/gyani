@extends('layouts.frontend.master')
@section('seo')

    @include('frontend.global.seo',['title'=>'404'??'','description'=>'Ooops! This Page Does Not Exist'??'','keyword'=>'404, Not found'??''])
    
@endsection
@section('content')
    <div class="error-wrapper pt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="error-content text-center">
                        <div class="error-text">
                            <h2>Ooops! This Page Does Not Exist</h2>
                            <p>We're sorry, but it appears the website address you entered was incorrect, or is temporarily unavailable.</p>
                            <div class="error-btn">
                                <a href="/"><i class="bi bi-house-door"></i> GO TO HOME</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
