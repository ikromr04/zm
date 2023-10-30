<div class="profile">
  <button class="account-link" type="button" onclick="window.toggleProfileModal()">
    {{ session('user')->name }}
  </button>

  <div class="profile__modal profile__modal--hidden">
    <div class="profile__avatar">
      <img class="profile__image" src="{{ session('user')->avatar ? session('user')->avatar : '/images/default-avatar.png' }}" alt="{{ session('user')->name }}" width="140" height="160">
      <label class="profile__avatar-change">
        <svg width="14" height="12">
          <use xlink:href="{{ asset('images/stack.svg') }}#camera" />
        </svg>
        <input class="visually-hidden" name="avatar" type="file" data-user-id="{{ session('user')->id }}" onchange="window.updateUserAvatar(this)">
      </label>
    </div>

    <h2 class="profile__name title">{{ session('user')->name }}</h2>
    <ul class="profile__navigation">
      <li class="profile__navigation-item">
        <a class="profile__navigation-link" href="">
          <span>
            <svg width="15" height="18">
              <use xlink:href="{{ asset('images/stack.svg') }}#favorite" />
            </svg>
          </span>
          Мои избранные
        </a>
      </li>
      <li class="profile__navigation-item">
        <a class="profile__navigation-link" href="">
          <span>
            <svg width="21" height="20">
              <use xlink:href="{{ asset('images/stack.svg') }}#profile-settings" />
            </svg>
          </span>
          Настройки профиля
        </a>
      </li>
    </ul>

    <a class="profile__logout button button--secondary" href="{{ route('auth.logout') }}">Выйти</a>

    <button class="profile__close" type="button" title="Закрыть окно" onclick="window.closeProfileModal()">
      <svg width="11" height="10">
        <use xlink:href="{{ asset('images/stack.svg') }}#close" />
      </svg>
    </button>
  </div>
</div>
