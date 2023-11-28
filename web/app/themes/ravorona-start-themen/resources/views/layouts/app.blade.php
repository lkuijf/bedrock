<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>

@include('sections.header')

<div class="contentWrapper">

  <main id="main" class="main">
    @yield('content')
  </main>

  @hasSection('sidebar')
    <aside class="sidebar">
      @yield('sidebar')
    </aside>
  @endif

</div>

@include('sections.footer')
@php
// get the field value
$copyright = carbon_get_theme_option( 'crb_text' );
$copyright2 = carbon_get_theme_option( 'crb_text2' );

// output the field value
echo $copyright;
echo $copyright2;
@endphp