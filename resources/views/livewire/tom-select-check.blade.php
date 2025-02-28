<div>
    <livewire:search.countries wire:model.change="country_id" name="country_id" label="Country" />
    <livewire:search.divisions wire:model.change="division_id" name="division_id" :$country_id label="Division" />
    <livewire:search.districts wire:model.change="district_id" name="district_id" :$division_id label="District"
        multiple="true" />
    <livewire:search.upazilas wire:model="upazila_id" name="upazila_id" :$district_id label="Upazila" />

    <p>
        Country Id : {{ $country_id }}<br />
        Division Id : {{ $division_id }}<br />
        {{-- District Id : {{ dump($district_id) }}<br /> --}}
        Upazila Id : {{ $upazila_id }}<br />
    </p>

    <button type="button" wire:click='setSelectData'>Update</button>
    <button type="button" wire:click='resetSelectData'>Reset</button>
</div>
