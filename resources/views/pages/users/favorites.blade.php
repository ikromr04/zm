@extends('layouts.app')

@section('content')
  <main class="user-page container">
    <div class="user-page__inner">
      <div class="user-page__links">
        <a class="button button--secondary">@lang('Мои избранные')</a>
        <a class="button button--gray" href="{{ route('users.profile', session('user')->id) }}">@lang('Настройки профиля')</a>
      </div>

      <ol class="nested-favorites">
        <li class="nested-favorites__item">
          <div class="nested-favorites__draggable">
            <svg width="20" height="17">
              <use xlink:href="{{ asset('images/stack.svg') }}#folder-star" />
            </svg>
            ({{ count($data->user->quotes) }}) <span>@lang('Все избранное')</span>
            <div class="nested-favorites__dropdown">
              <button class="nested-favorites__dropdown-button" type="button">
                <svg width="24" height="24">
                  <use xlink:href="{{ asset('images/stack.svg') }}#more" />
                </svg>
              </button>
              <div class="nested-favorites__dropdown-actions">
                <a class="nested-favorites__dropdown-action" href="{{ route('favorites.show', 'all') }}">
                  @lang('Посмотреть')
                </a>
                <button class="nested-favorites__dropdown-action" type="button" onclick="window.createNewFolder(event)">
                  @lang('Создать новую папку')
                </button>
              </div>
            </div>
          </div>
        </li>

        @foreach ($data->favorites as $favorite)
          <li class="nested-favorites__item">
            <div class="nested-favorites__draggable">
              <svg width="20" height="17" style="color: #e2b65c;">
                <use xlink:href="{{ asset('images/stack.svg') }}#folder" />
              </svg>
              @php
                $count = count($favorite->quotes);

                foreach ($favorite->children as $children) {
                    $count = $count + count($children->quotes);
                }
              @endphp
              ({{ count($favorite->quotes) }})
              <input class="nested-favorites__input" value="{{ $favorite->title }}" readonly onblur="window.updateFavorite(event)" data-id="{{ $favorite->id }}">
              <div class="nested-favorites__dropdown">
                <button class="nested-favorites__dropdown-button" type="button">
                  <svg width="24" height="24">
                    <use xlink:href="{{ asset('images/stack.svg') }}#more" />
                  </svg>
                </button>
                <div class="nested-favorites__dropdown-actions">
                  <a class="nested-favorites__dropdown-action" href="{{ route('favorites.show', $favorite->id) }}">
                    @lang('Посмотреть')
                  </a>
                  <button class="nested-favorites__dropdown-action" type="button" onclick="window.renameFolder(event)">
                    @lang('Переименовать')
                  </button>
                  <button class="nested-favorites__dropdown-action" type="button" onclick="window.showDeleteModal(event)" data-id="{{ $favorite->id }}">
                    @lang('Удалить эту папку')
                  </button>
                  <button class="nested-favorites__dropdown-action" type="button" onclick="window.createNewSubFolder(event)" data-id="{{ $favorite->id }}">
                    @lang('Создать новую подпапку')
                  </button>
                </div>
              </div>
            </div>

            @if (count($favorite->children) != 0)
              <ol>
                @foreach ($favorite->children as $favorite)
                  <li class="nested-favorites__item">
                    <div class="nested-favorites__draggable">
                      <svg width="20" height="17" style="color: #B2B2B2;">
                        <use xlink:href="{{ asset('images/stack.svg') }}#folder" />
                      </svg>
                      ({{ count($favorite->quotes) }})
                      <input class="nested-favorites__input" value="{{ $favorite->title }}" readonly onblur="window.updateFavorite(event)" data-id="{{ $favorite->id }}">
                      <div class="nested-favorites__dropdown">
                        <button class="nested-favorites__dropdown-button" type="button">
                          <svg width="24" height="24">
                            <use xlink:href="{{ asset('images/stack.svg') }}#more" />
                          </svg>
                        </button>
                        <div class="nested-favorites__dropdown-actions">
                          <a class="nested-favorites__dropdown-action" href="{{ route('favorites.show', $favorite->id) }}">
                            @lang('Посмотреть')
                          </a>
                          <button class="nested-favorites__dropdown-action" type="button" onclick="window.renameFolder(event)">
                            @lang('Переименовать')
                          </button>
                          <button class="nested-favorites__dropdown-action" type="button" onclick="window.showDeleteModal(event)" data-id="{{ $favorite->id }}">
                            @lang('Удалить эту папку')
                          </button>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach
              </ol>
            @endif
          </li>
        @endforeach
      </ol>
    </div>

    <aside class="posts">
      <h2 class="visually-hidden">@lang('Картинки')</h2>

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
