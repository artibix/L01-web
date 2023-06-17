
<div class="list-group-item">
  用户头像，暂未施工
  {{--          <img class="mr-3" src="{{ $user->gravatar() }}" alt="{{ $user->name }}" width=32>--}}
  <a href="{{ route('users.show', $user) }}">
    {{ $user->name }}
  </a>
</div>
