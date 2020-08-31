@extends ( 'layouts.app')

@section('title', 'Listado de tablas')

@section ( 'content') 
@foreach ($post as $postItem)
<article>
<h2>{{$postItem->title}}</h2>
</article>
@endforeach
@endsection
