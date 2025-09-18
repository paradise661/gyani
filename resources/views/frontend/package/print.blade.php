<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $package->name ?? 'The Nepal Holidays' }}</title>
    <style>
        @page {
            margin: 0;
        }

        body {
            margin: 150px 60px 100px 60px;
            /* fit inside letterhead */
            font-family: Arial, sans-serif;
            font-size: 14px;
            position: relative;
        }

        .letterhead-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -100;
        }

        h2,
        h3,
        h4 {
            margin-top: 20px;
        }

        p {
            margin: 5px 0;
        }

        .section {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <!-- Letterhead background -->
    <img class="letterhead-bg" src="{{ public_path('letterhead.png') }}" alt="Letterhead">

    <div class="section">
        <h2>{{ $package->name ?? '' }} - Overview</h2>

        @if ($globalinfo)
            @if ($globalinfo->duration)
                <p><strong>Duration:</strong> {{ $globalinfo->duration }}</p>
            @endif
            @if ($package->destination)
                <p><strong>Destination:</strong> {{ $package->destination }}</p>
            @endif
            @if ($globalinfo->size)
                <p><strong>Group Size:</strong> {{ $globalinfo->size }}</p>
            @endif
            @if ($globalinfo->transportation)
                <p><strong>Transportation:</strong> {{ $globalinfo->transportation }}</p>
            @endif
            @if ($globalinfo->activity)
                <p><strong>Activity:</strong> {{ $globalinfo->activity }}</p>
            @endif
            @if ($globalinfo->season)
                <p><strong>Best Season:</strong> {{ $globalinfo->season }}</p>
            @endif
            @if ($globalinfo->accomod)
                <p><strong>Accommodation:</strong> {{ $globalinfo->accomod }}</p>
            @endif
            @if ($globalinfo->meal)
                <p><strong>Meals:</strong> {{ $globalinfo->meal }}</p>
            @endif
        @endif

        {{-- @if ($content->short_description)
            <div class="texts ms-0">
                {!! $content->short_description !!}
            </div>
        @endif --}}

        @if ($content->description)
            <div>
                {!! $content->description !!}
            </div>
        @endif

    </div>

    <div class="section">
        <h2>Itinerary</h2>
        @if ($itineraries && $itineraries->isNotEmpty())
            @foreach ($itineraries as $key => $itin)
                <h4>Day {{ $key + 1 }}: {{ $itin->title ?? '' }}</h4>
                {!! $itin->description !!}
            @endforeach
        @else
            <p>No itinerary available.</p>
        @endif
    </div>

    <div class="section">
        <h2>Inclusion & Exclusion</h2>
        @if ($content->inclusion)
            <h4>Inclusion</h4>
            {!! $content->inclusion !!}
        @endif
        @if ($content->exclusion)
            <h4>Exclusion</h4>
            {!! $content->exclusion !!}
        @endif
    </div>

    <div class="section">
        <h2>Visa Documents</h2>
        @if ($visa && $visa->isNotEmpty())
            @foreach ($visa as $key => $v)
                <h4>{{ $key + 1 }}. {{ $v->question ?? '' }}</h4>
                {!! $v->answer !!}
            @endforeach
        @else
            <p>No visa information available. <a href="/contact-us">(Contact us)</a></p>
        @endif
    </div>

    <div class="section">
        <h2>FAQs</h2>
        @if ($faqs && $faqs->isNotEmpty())
            @foreach ($faqs as $key => $faq)
                <h4>{{ $key + 1 }}. {{ $faq->question ?? '' }}</h4>
                {!! $faq->answer !!}
            @endforeach
        @else
            <p>No FAQs available.</p>
        @endif
    </div>

    <div class="section">
        <p><a href="{{ $url ?? '' }}">URL: {{ $url ?? '' }}</a></p>
    </div>

</body>

</html>
