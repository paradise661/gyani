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
            /* adjust to fit content inside letterhead */
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
    </style>
</head>

<body>
    <!-- Letterhead as image behind content -->
    <img class="letterhead-bg" src="{{ public_path('letterhead.png') }}" alt="Letterhead">

    <div>

        <h2>{{ $package->name ?? '' }} - Overview</h2>
        @if ($globalinfo->duration)
            <p>Duration : {{ $globalinfo->duration }}</p>
        @endif
        @if ($package->destination)
            <p>Destination : {{ $package->destination }}</p>
        @endif
        @if ($globalinfo->size)
            <p>Group Size : {{ $globalinfo->size }}</p>
        @endif
        @if ($globalinfo->transportation)
            <p>Transportation : {{ $globalinfo->transportation }}</p>
        @endif
        @if ($globalinfo->activity)
            <p>Activity : {{ $globalinfo->activity }}</p>
        @endif
        @if ($globalinfo->season)
            <p>Best Season : {{ $globalinfo->season }}</p>
        @endif
        @if ($globalinfo->accomod)
            <p>Accommodation : {{ $globalinfo->accomod }}</p>
        @endif
        @if ($globalinfo->meal)
            <p>Meals : {{ $globalinfo->meal }}</p>
        @endif

        <br>
        <h2>{{ $package->name ?? '' }} - Itinerary</h2>
        @if ($itineraries->isNotEmpty())
            @foreach ($itineraries as $key => $item)
                <h3>Day {{ $key + 1 }}: {{ $item->title }}</h3>
                {!! $item->description !!}
            @endforeach
        @else
            <p>Itinerary Not Available Yet</p>
        @endif

        <br>
        <h2>{{ $package->name ?? '' }} - FAQs</h2>
        @if ($faqs->isNotEmpty())
            @foreach ($faqs as $key => $faq)
                <h3>{{ $key + 1 }}. {{ $faq->question }}</h3>
                {!! $faq->answer !!}
            @endforeach
        @else
            <p>Faqs Not Available Yet</p>
        @endif

        <br>
        <p><a href="{{ $url ?? '' }}">URL: {{ $url ?? '' }}</a></p>
    </div>
</body>

</html>
