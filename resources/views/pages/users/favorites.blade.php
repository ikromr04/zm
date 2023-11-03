@extends('layouts.app')

@section('content')
  <main class="user-page container">
    <div class="user-page__inner">
      <div class="user-page__links">
        <a class="button button--secondary">Мои избранные</a>
        <a class="button button--gray" href="{{ route('users.profile', session('user')->id) }}">Настройки профиля</a>
      </div>

      @if (count($data->user->quotes) == 0)
        <p>Список пуст</p>
      @else
        <ol class="favorites">
          <li>
            <div>
              <a class="user-page__all-favorites" href="{{ route('favorites.show', 'all') }}">
                <svg width="20" height="17">
                  <use xlink:href="{{ asset('images/stack.svg') }}#folder-star" />
                </svg>
                Все избранное ({{ count($data->user->quotes) }})
              </a>
            </div>
          </li>

          @foreach ($data->favorites as $item)
            <li>
              <div>Some content</div>
              {{-- <ol>
                <li><div>Some sub-item content</div></li>
                <li><div>Some sub-item content</div></li>
              </ol> --}}
            </li>
          @endforeach
        </ol>

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
