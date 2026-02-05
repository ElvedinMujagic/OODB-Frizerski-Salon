<x-action-section>
    <x-slot name="title">
        {{ __('Dvostruka autentifikacija') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Dodaj dodatnu sigurnost Vašem profilu koristeći dvostruku autentifikaciju.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    {{ __('Završi omogućavanje dvostruke autentifikacije.') }}
                @else
                    {{ __('Omogućili ste dvostruku autentifikaciju.') }}
                @endif
            @else
                {{ __('Niste omogućili dvostruku autentifikaciju.') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>
                {{ __('Kada je omogućena dvofaktorska autentifikacija, tokom autentifikacije će vam biti zatražen siguran, nasumični token. Ovaj token možete preuzeti iz aplikacije Google Authenticator na vašem telefonu.') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            {{ __('Da biste završili omogućavanje dvofaktorske autentifikacije, skenirajte sljedeći QR kod pomoću aplikacije za autentifikaciju na telefonu ili unesite ključ za postavljanje i navedite generirani OTP kod.') }}
                        @else
                            {{ __('Dvofaktorska autentifikacija je sada omogućena. Skenirajte sljedeći QR kod pomoću aplikacije za autentifikaciju na telefonu ili unesite ključ za podešavanje.') }}
                        @endif
                    </p>
                </div>

                <div class="mt-4 p-2 inline-block bg-white">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Setup Key') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-label for="code" value="{{ __('Code') }}" />

                        <x-input id="code" type="text" name="code" class="block mt-1 w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code"
                            wire:model="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />

                        <x-input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Spremite ove kodove za oporavak u sigurnom passord manager-u. Mogu se koristiti za oporavak pristupa vašem računu ako izgubite uređaj za dvofaktorsku autentifikaciju.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-button type="button" wire:loading.attr="disabled">
                        {{ __('Uključi dvofaktorsku autentifikaciju') }}
                    </x-button>
                </x-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-secondary-button class="me-3">
                            {{ __('Regeneriš kodove za oporavak') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @elseif ($showingConfirmation)
                    <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                        <x-button type="button" class="me-3" wire:loading.attr="disabled">
                            {{ __('Potvrdi') }}
                        </x-button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="showRecoveryCodes">
                        <x-secondary-button class="me-3">
                            {{ __('Prikaži kodove za oporavak') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-secondary-button wire:loading.attr="disabled">
                            {{ __('Otkaži') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-danger-button wire:loading.attr="disabled">
                            {{ __('Isključi dvofaktorsku autentifikaciju') }}
                        </x-danger-button>
                    </x-confirms-password>
                @endif

            @endif
        </div>
    </x-slot>
</x-action-section>
