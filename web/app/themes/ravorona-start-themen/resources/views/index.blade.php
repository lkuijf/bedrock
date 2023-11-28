@php
$blog_args = array(  
    'post_type' => 'blog',
    'post_status' => 'publish',
);
$blog = new WP_Query($blog_args);
@endphp

@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  @while(have_posts())
    @php(the_post())
    @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
  @endwhile

  {!! get_the_posts_navigation() !!}

  @while($blog->have_posts())
    @php($blog->the_post())
    @includeFirst(['partials.content-' . $blog->get_post_type(), 'partials.content'])
  @endwhile


@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
