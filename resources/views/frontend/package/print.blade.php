<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $package->name ?? 'The Nepal Holidays' }}</title>
</head>

<body>
    <div>
        <img style="height: 120px;" src="https://thenepalholidays.com/storage/setting/main_logo-20230314061330.png" alt="logo">

        <h2>{{ $package->name ?? '' }} - Overview</h2>

        @if($globalinfo->duration)
            <p>Duration : {{ $globalinfo->duration ?? '' }}</p>
        @endif
        @if($package->destination)
            <p>Destination : {{ $package->destination ?? '' }}</p>
        @endif
        @if($globalinfo->size)
            <p>Group Size : {{ $globalinfo->size ?? '' }}</p>
        @endif
        @if($globalinfo->transportation)
            <p>Transportation : {{ $globalinfo->transportation ?? '' }}</p>
        @endif
        @if($globalinfo->activity)
            <p>Activity : {{ $globalinfo->activity ?? '' }}</p>
        @endif
        @if($globalinfo->season)
            <p>Best Season : {{ $globalinfo->season ?? '' }}</p>
        @endif
        @if($globalinfo->accomod)
            <p>Accomodation : {{ $globalinfo->accomod ?? '' }}</p>
        @endif
        @if($globalinfo->meal)
            <p>Meals : {{ $globalinfo->meal ?? '' }}</p>
        @endif
        <br>

        <h2>{{ $package->name ?? '' }} - Itinerary</h2>
        @if ($itineraries->isNotEmpty())
            @foreach ($itineraries as $key => $item)
                <h3>Day {{ $key + 1 }}: {{ $item->title ?? '' }}</h3>
                {!! $item->description ?? '' !!}
            @endforeach
        @else
            <p>Itinerary Not Available Yet</p>
        @endif
        <br>
        <h2>{{ $package->name ?? '' }} - FAQs</h2>
        @if ($faqs->isNotEmpty())
            @foreach ($faqs as $key => $faq)
                <h3>{{ $key+1 }}. {{ $faq->question ?? '' }}</h3>
                {!! $faq->answer ?? '' !!}
            @endforeach
        @else
            <p>Faqs Not Available Yet</p>
        @endif
        <br>
        <p> <a href="{{ $url ?? '' }}">URL: {{ $url ?? '' }}</a></p>
    </div>
</body>

</html>
