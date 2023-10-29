@extends('layouts.app')

@section('content')
  <main class="quote-selected container">
    <h1 class="visually-hidden">Из философского творчества</h1>

    <x-quote-card :quote="$data->quote" />

    <x-tags-sidebar :tags="$data->tags" />
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/pages/quotes/selected.min.js') }}" type="module"></script>
@endsection
