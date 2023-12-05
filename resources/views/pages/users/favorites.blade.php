@extends('layouts.app')

@section('content')
  <main class="user-page container">
    <div class="user-page__inner">
      <h1 class="visually-hidden">@lang('Избранные')</h1>

      <ul class="users-navigation">
        <li class="users-navigation__item">
          <a class="users-navigation__link button button--secondary">
            @lang('Избранные')
          </a>
        </li>
        <li class="users-navigation__item">
          <a
            class="users-navigation__link button button--gray"
            href="{{ route('users.profile', session('user')->id) }}"
          >
            @lang('Настройки профиля')
          </a>
        </li>
        <li class="users-navigation__item users-navigation__item--wide">
          <button
            class="users-navigation__link button button--secondary"
            type="button"
            onclick="window.createFolder()"
            data-action="create-folder"
          >
            @lang('Создать новую папку')
          </button>
        </li>
      </ul>

      <ul class="favorites">
        <li class="favorites__item favorites__item--main">
          <a class="favorites__card" href="{{ route('favorites.show', 'all') }}">
            <svg width="24" height="24">
              <use xlink:href="{{ asset('images/stack.svg') }}#folder-star" />
            </svg>
            ({{ count($data->user->quotes) }}) @lang('Избранные')
          </a>
        </li>

        @foreach ($data->favorites as $favorite)
          @php
            $count = count($favorite->quotes);
            foreach ($favorite->children as $children) {
              $count = $count + count($children->quotes);
            }
          @endphp
          <li class="favorites__item">
            <div class="favorites__card">
              <a class="favorites__link" href="{{ route('favorites.show', $favorite->id) }}">
                <svg width="20" height="17">
                  <use xlink:href="{{ asset('images/stack.svg') }}#folder" />
                </svg>
                ({{ count($data->user->quotes) }})
                <span class="favorites__link-label">{{ $favorite->title }}</span>
              </a>
              <input
                class="favorites__card-edit"
                type="text"
                data-id="{{ $favorite->id }}"
                value="{{ $favorite->title }}"
                onblur="window.updateFolder(event)">
              <ul class="favorites__action-list">
                <li class="favorites__action-item">
                  <button
                    class="favorites__action-button favorites__action-button--edit"
                    type="button"
                    onclick="window.handleRenameButtonClick(event)"
                  >
                    <span class="favorites__action-label">@lang('Переименовать')</span>
                    <svg width="24" height="24">
                      <use xlink:href="{{ asset('images/stack.svg') }}#rename" />
                    </svg>
                  </button>
                </li>
                <li class="favorites__action-item">
                  <button
                    class="favorites__action-button"
                    type="button"
                    data-id="{{ $favorite->id }}"
                    onclick="window.showDeleteModal(event)"
                  >
                    <span class="favorites__action-label">@lang('Удалить папку')</span>
                    <svg width="24" height="24">
                      <use xlink:href="{{ asset('images/stack.svg') }}#delete" />
                    </svg>
                  </button>
                </li>
                <li class="favorites__action-item">
                  <button
                    class="button button--secondary"
                    type="button"
                  >
                    @lang('Создать новую подпапку')
                  </button>
                </li>
              </ul>
            </div>
            @if (count($favorite->children) != 0)
              <ul class="favorites__children">
                @foreach ($favorite->children as $favorite)
                  <div class="favorites__item-inner">
                    <a class="favorites__link" href="{{ route('favorites.show', 'all') }}">
                      <svg width="20" height="17">
                        <use xlink:href="{{ asset('images/stack.svg') }}#folder" />
                      </svg>
                      ({{ count($data->user->quotes) }}) {{ $favorite->title }}
                    </a>
                    <ul class="favorites__action-list">
                      <li class="favorites__action-item">
                        <button class="favorites__action-button" type="button">
                          <span class="favorites__action-label">@lang('Переименовать')</span>
                          <svg width="20" height="17">
                            <use xlink:href="{{ asset('images/stack.svg') }}#edit" />
                          </svg>
                        </button>
                      </li>
                      <li class="favorites__action-item">
                        <button class="favorites__action-button" type="button">
                          <span class="favorites__action--label">@lang('Удалить папку')</span>
                          <svg width="20" height="17">
                            <use xlink:href="{{ asset('images/stack.svg') }}#trash" />
                          </svg>
                        </button>
                      </li>
                      <li class="favorites__action-item">
                        <button class="button" type="button">
                          @lang('Создать новую подпапку')
                        </button>
                      </li>
                    </ul>
                  </div>
                @endforeach
              </ul>
            @endif
          </li>
        @endforeach
      </ul>
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
  <template id="create-new-folder">
    <li class="favorites__item favorites__item--new">
      <form class="favorites__card" onsubmit="window.storeFolder(event)">
        <svg width="24" height="24">
          <use xlink:href="{{ asset('images/stack.svg') }}#folder" />
        </svg>
        <input
          class="favorites__new"
          name="foldername"
          type="text"
          placeholder="@lang('Наименование')">
        <ul class="favorites__action-list">
          <li class="favorites__action-item">
            <button
              class="favorites__action-button favorites__action-button--success"
              type="submit"
            >
              <span class="favorites__action-label">@lang('Создать')</span>
              <svg width="24" height="24">
                <use xlink:href="{{ asset('images/stack.svg') }}#plus" />
              </svg>
            </button>
          </li>
          <li class="favorites__action-item">
            <button
              class="favorites__action-button favorites__action-button--error"
              type="button"
              onclick="window.cancelCreateFolder()"
            >
              <span class="favorites__action-label">@lang('Отмена')</span>
              <svg width="24" height="24">
                <use xlink:href="{{ asset('images/stack.svg') }}#cancel" />
              </svg>
            </button>
          </li>
        </ul>
      </form>
    </li>
  </template>
@endsection

@section('scripts')
  <script src="{{ asset('js/pages/user.min.js') }}" type="module"></script>
@endsection
