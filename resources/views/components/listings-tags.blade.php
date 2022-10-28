@props(['tagsCSV'])
@php
  $tags = explode(',', $tagsCSV);
@endphp
@endphp
<ul class="flex">
  @foreach ($tags as $tag)
    <li class="bg-black text-white rounded-xl px-3 py-1 mr-2 capitalize">
      <a href="/?tag={{ $tag }}">{{ $tag }}</a>
    </li>
  @endforeach
</ul>
