@props(['type'])

<div class="container alert alert-{{$type}}" role="alert">
   {{$slot}}
</div>