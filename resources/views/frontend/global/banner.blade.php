@php
    $banner = $banner ? $banner : '/frontend/assets/images/top.png'
@endphp
<section class="about-image">
    <div class="media-wrapper">
        <img src="{{ asset($banner) }}" alt="{{ $name ?? 'banner-image' }}" />
    </div>

        <div class="text">
            <h1 class="h3">{{ $name ?? '' }}</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>

                @if($parentname&&$parentlink)
                    <li class="breadcrumb-item">
                        <a href="{{ $parentlink ?? '' }}">{{ $parentname ?? '' }}</a>
                    </li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ $name ?? '' }}</li>
            </ol>
     
    </div>
</section>