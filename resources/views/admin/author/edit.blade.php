
{{-- extend natáhne layout který chces použít v něj použijs tuto section --}}
@extends('admin/layout')

{{-- section je kus codu, kterej chces nkam poslat pomocí @yield('content')--}}
@section('content') 

@if (Session::has('success_message'))
    
<div class="alert alert-success">
    {{ Session::get('success_message') }}
</div>

@endif


@if ($author->id) 
  <form action="/author/{{ $author->id }}/edit" method="post">
    @method('PUT')

@else
  <form action="/author" method="post">
@endif

    @csrf

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Name of new Author" value="{{$authorName}}">
{{-- blade vecicka automaticky hodí chybovou hlasku z validate v controlloru --}}
    @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <label for="name">Age:</label>
    <input type="text" id="age" name="age" placeholder="Age of new Author" value="{{$authorAge}}">
    @error('age')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <input type="submit" value="{{$submit}}">

  </form>

@endsection
