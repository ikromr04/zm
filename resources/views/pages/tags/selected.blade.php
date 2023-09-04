@extends('layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ asset('css/pages/tags/selected.min.css') }}">
@endsection

@section('content')
  <main class="tag-selected container">
    <h1 class="visually-hidden">Философское творчество</h1>

    <aside class="tags">
      <h2 class="tags__title title">
        <button class="tags__button" type="button">
          Теги
          <svg class="tags__button-icon" width="9" height="12">
            <use xlink:href="{{ asset('images/stack.svg') }}#arrow" />
          </svg>
        </button>
      </h2>

      <ul class="tags__list">
        @foreach ($data->tags as $tag)
          @if (!$tag->group_id)
            @if ($tag->id !== $data->selectedTag->id)
              <li class="tags__item">
                <a class="tags__link" href="{{ route('tags.selected', $tag->slug) }}">
                  {{ $tag->title }}
                </a>
              </li>
            @else
              <li class="tags__item">
                <a class="tags__link tags__link--current">
                  {{ $data->selectedTag->title }}
                </a>
              </li>
            @endif
          @endif
        @endforeach
        @foreach ($data->groups as $group)
          <li class="tags__item">
            <h3 style="margin: 16px 0 0 0">
              {{ $group->title }}
            </h3>
          </li>
          @foreach ($group->tags as $tag)
            @if ($tag->id !== $data->selectedTag->id)
              <li class="tags__item">
                <a class="tags__link" href="{{ route('tags.selected', $tag->slug) }}">
                  {{ $tag->title }}
                </a>
              </li>
            @else
              <li class="tags__item">
                <a class="tags__link tags__link--current">
                  {{ $data->selectedTag->title }}
                </a>
              </li>
            @endif
          @endforeach
        @endforeach
      </ul>
    </aside>

    <section class="quotes">
      <h2 class="visually-hidden">Мысли автора</h2>

      <ul class="quotes__list">
        @foreach ($data->quotes as $quote)
          <li class="quotes__item">
            <x-quote-card :quote="$quote" :selectedTag="$data->selectedTag" />
          </li>
        @endforeach
      </ul>

      {{ $data->quotes->links('components.pagination') }}
    </section>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/pages/tags/selected.min.js') }}" type="module"></script>
@endsection
