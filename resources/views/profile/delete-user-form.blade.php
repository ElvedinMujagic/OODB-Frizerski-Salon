<x-action-section>
    <x-slot name="title">
        {{ __('Obriši profil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Trajno obriši svoj profil.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Kada se tvoj profil obriše, svi njegovi resursi i podaci će biti trajno obrisani. Prije brisanja profila, molimo Vas da preuzmete sve podatke ili informacije koje želite da zadržite.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Obriši profil') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Obriši profil') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Da li si siguran da želiš da obrišeš svoj profil? Kada se profil obriše, svi njegovi resursi i podaci će biti trajno obrisani. Molimo te da uneseš svoju lozinku kako bi potvrdio/la brisanje profila.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                                autocomplete="current-password"
                                placeholder="{{ __('Password') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Otkaži') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Obriši profil') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
