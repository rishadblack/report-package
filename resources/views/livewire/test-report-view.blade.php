<div>
    {{-- <livewire:reports.test-report /> --}}
    {{-- <livewire:reports.salma.test /> --}}
    {{-- <h3>Name : {{ $received_name }}</h3> --}}
    {{-- <h3>Message : {{ $received_message }}</h3> --}}
    {{-- <input type="text" wire:model="message" /> --}}
    {{-- <button type="button" wire:click="sendMessage">Send</button> --}}
    {{-- <livewire:test-table /> --}}
    <livewire:search.test-search wire:model.change="search" name="search_user" />
    {{ $search }}
</div>
@script
    <script>
        console.log('check');
    </script>
@endscript
