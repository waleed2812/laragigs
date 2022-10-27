<h1>{{ $heading }}</h1>

@if (!$listing)
  <p>Listing Not Found</p>
@else
  <h1>{{ $listing['id'] . ' - ' . $listing['title'] }}</h1>
  <p>{{ $listing['description'] }}</p>
@endif
