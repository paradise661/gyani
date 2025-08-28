<title>{{ $title ?? '' }}</title>
<meta name="description" content="{{ $description ?? '' }}">
<meta name="keywords" content="{{ $keyword ?? '' }}">
<link rel="canonical" href="{{ Request::url() }}">
@if (!empty($schema))
    {!! $schema ?? '' !!}
@endif
