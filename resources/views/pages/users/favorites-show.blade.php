@extends('layouts.app')

@section('content')
  <main class="user-page container">
    <div class="user-page__inner">
      <div class="user-page__links">
        <a class="button button--secondary">Все избранные</a>
        <a class="button button--gray" href="{{ route('favorites') }}">Мои избранные</a>
        <a class="button button--gray" href="{{ route('users.profile', session('user')->id) }}">Настройки профиля</a>
      </div>

      @if (count($data->quotes) == 0)
        <p>Список пуст</p>
      @else
        <section class="quotes">
          <h2 class="visually-hidden">Мысли автора</h2>

          <ul class="quotes__list">
            @foreach ($data->quotes as $quote)
              <li class="quotes__item">
                <x-quote-card :quote="$quote" />
              </li>
            @endforeach
          </ul>

          {{ $data->quotes->links('components.pagination') }}
        </section>
      @endif

    </div>

    <aside class="posts">
      <h2 class="visually-hidden">Картинки</h2>

      <ul class="posts__list">
        @foreach ($data->posts as $post)
          <li class="posts__item">
            <x-post-card :post="$post" />
          </li>
        @endforeach
      </ul>
    </aside>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/pages/user.min.js') }}" type="module"></script>
@endsection
