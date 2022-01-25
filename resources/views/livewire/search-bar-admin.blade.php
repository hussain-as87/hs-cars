@push('styles')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endpush
<div class="relative">

    <input type="text" class="form-control" placeholder="{{ __('Search Here') }}" wire:model="query" wire:keydown.escape="resetQuery" wire:keydown.tab="resetQuery" wire:keydown.ArrowUp="decrementHighlight" wire:keydown.ArrowDown="incrementHighlight" wire:keydown.enter="selectContact" />
    @if(!empty($query))
    <ul class="list-group w-100" style="margin-top:218px;">
       {{--   <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
            <div class="list-group-item">Searching...</div>
        </div>  --}}
        <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="resetQuery"></div>

        <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
            @if(!empty($users))
            @foreach($users as $i => $user)

            <a href="{{ route('users.show', $user['id']) }}">
                <li class="list-group-item {{ $highlightIndex === $i ? 'active' : '' }}">
                    {{ $user['name'] }} </li>
            </a>

            @endforeach
            @else
            <div class="list-group-item">No results!</div>
            @endif

        </div>
    </ul>
    @endif
</div>
