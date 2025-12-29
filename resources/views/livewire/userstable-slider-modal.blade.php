<x-bt-slider wire:model="openSlider" max-width="max-w-xl">
    <x-slot:title>Modify User</x-slot:title>

    <div class="flex flex-col space-y-3">
        <x-bt-input wire:model="sliderName" label="Name" placeholder="John Doe" required />
        <x-bt-input wire:model="sliderEmail" type="email" label="Email Address" placeholder="john@example.com" required />
    </div>

    <x-slot:footer>
        {{-- Close via a method on the server (Server -> Client) --}}
        <x-bt-button x-on:click="$wire.openSlider = false" label="Cancel" ghost />
        <x-bt-button wire:click="modifyUser" label="Save changes" />
    </x-slot:footer>
</x-bt-slider>

<x-bt-modal wire:model="modalCreate" styled>
    <x-slot:title>Create new user</x-slot:title>
    <div class="space-y-4">
        <x-bt-input wire:model="modalName" label="Name" placeholder="John Doe" required />
        <x-bt-input wire:model="modalEmail" type="email" label="Email Address" placeholder="john@example.com"
            required />
        <x-bt-input wire:model="modalPassword" type="password" label="Password" hint="Must be at least 8 characters"
            required />
    </div>
    <x-slot:footer>
        <div class="flex gap-2 justify-end">
            <x-bt-button x-on:click="close()" label="Cancel" ghost />
            <x-bt-button wire:click="createUser" label="Save changes" />
        </div>
    </x-slot:footer>
</x-bt-modal>

<x-bt-modal wire:model="modalChangePassword" styled>
    <x-slot:title>Change password</x-slot:title>
    <div class="space-y-4">
        <x-bt-input wire:model="modalPassword" type="password" label="Password" hint="Must be at least 8 characters"
            required />
        <x-bt-input wire:model="modalPasswordConfirmation" type="password" label="Confirm Password"
            hint="Must be at least 8 characters" required />
    </div>
    <x-slot:footer>
        <div class="flex gap-2 justify-end">
            <x-bt-button x-on:click="close()" label="Cancel" ghost />
            <x-bt-button wire:click="changePassword" label="Save changes" />
        </div>
    </x-slot:footer>
</x-bt-modal>
