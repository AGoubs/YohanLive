<div>
    <i wire:click="logout"
        class="fa fa-user me-sm-1 {{ in_array(
    request()->route()->getName(),
    ['profile', 'my-profile'],
)
    ? 'text-white'
    : '' }}"></i>
    <span
        class="d-sm-inline d-none {{ in_array(
    request()->route()->getName(),
    ['profile', 'my-profile'],
)
    ? 'text-white'
    : '' }}"
        wire:click="logout">Bienvenue {{ $user }}</span>
</div>
