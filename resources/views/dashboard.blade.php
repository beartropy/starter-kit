<x-layouts.app>
    <div class="space-y-8">
        {{-- Welcome Section --}}
        <section class="text-center space-y-4 mt-8">
            <h1 class="text-4xl font-bold text-slate-900 dark:text-white">
                Welcome to <span class="text-rose-500 dark:text-rose-400">Starter Kit</span>
            </h1>
            <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                Your starting point for building amazing applications with Laravel and <span
                    class="font-semibold text-slate-800 dark:text-slate-200">Beartropy UI</span>.
                Below is a showcase of some available components to get you started.
            </p>
        </section>

        {{-- Components Showcase --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Buttons --}}
            <x-bt-card title="Buttons">
                <div class="flex flex-wrap gap-2">
                    <x-bt-button>Primary</x-bt-button>
                    <x-bt-button soft>Soft</x-bt-button>
                    <x-bt-button outline>Outline</x-bt-button>
                    <x-bt-button ghost>Ghost</x-bt-button>
                    <x-bt-button tint>Tint</x-bt-button>
                    <x-bt-button gradient>Gradient</x-bt-button>

                    <x-bt-button red>Primary</x-bt-button>
                    <x-bt-button red soft>Soft</x-bt-button>
                    <x-bt-button red outline>Outline</x-bt-button>
                    <x-bt-button red ghost>Ghost</x-bt-button>
                    <x-bt-button red tint>Tint</x-bt-button>
                    <x-bt-button red gradient>Gradient</x-bt-button>

                    <x-bt-button green>Primary</x-bt-button>
                    <x-bt-button green soft>Soft</x-bt-button>
                    <x-bt-button green outline>Outline</x-bt-button>
                    <x-bt-button green ghost>Ghost</x-bt-button>
                    <x-bt-button green tint>Tint</x-bt-button>
                    <x-bt-button green gradient>Gradient</x-bt-button>

                    <x-bt-button blue>Primary</x-bt-button>
                    <x-bt-button blue soft>Soft</x-bt-button>
                    <x-bt-button blue outline>Outline</x-bt-button>
                    <x-bt-button blue ghost>Ghost</x-bt-button>
                    <x-bt-button blue tint>Tint</x-bt-button>
                    <x-bt-button blue gradient>Gradient</x-bt-button>
                </div>
            </x-bt-card>

            {{-- Badges --}}
            <x-bt-card title="Badges">
                <div class="flex flex-wrap gap-2">
                    <x-bt-badge>Default</x-bt-badge>
                    <x-bt-badge soft>Soft</x-bt-badge>
                    <x-bt-badge outline>Outline</x-bt-badge>
                    <x-bt-badge ghost>Ghost</x-bt-badge>
                    <x-bt-badge tint>Tint</x-bt-badge>

                    <x-bt-badge red>Primary</x-bt-badge>
                    <x-bt-badge red soft>Soft</x-bt-badge>
                    <x-bt-badge red outline>Outline</x-bt-badge>
                    <x-bt-badge red ghost>Ghost</x-bt-badge>
                    <x-bt-badge red tint>Tint</x-bt-badge>

                    <x-bt-badge green>Primary</x-bt-badge>
                    <x-bt-badge green soft>Soft</x-bt-badge>
                    <x-bt-badge green outline>Outline</x-bt-badge>
                    <x-bt-badge green ghost>Ghost</x-bt-badge>
                    <x-bt-badge green tint>Tint</x-bt-badge>

                    <x-bt-badge blue>Primary</x-bt-badge>
                    <x-bt-badge blue soft>Soft</x-bt-badge>
                    <x-bt-badge blue outline>Outline</x-bt-badge>
                    <x-bt-badge blue ghost>Ghost</x-bt-badge>
                    <x-bt-badge blue tint>Tint</x-bt-badge>

                    <x-bt-badge rose>Primary</x-bt-badge>
                    <x-bt-badge rose soft>Soft</x-bt-badge>
                    <x-bt-badge rose outline>Outline</x-bt-badge>
                    <x-bt-badge rose ghost>Ghost</x-bt-badge>
                    <x-bt-badge rose tint>Tint</x-bt-badge>

                    <x-bt-badge orange>Primary</x-bt-badge>
                    <x-bt-badge orange soft>Soft</x-bt-badge>
                    <x-bt-badge orange outline>Outline</x-bt-badge>
                    <x-bt-badge orange ghost>Ghost</x-bt-badge>
                    <x-bt-badge orange tint>Tint</x-bt-badge>

                    <x-bt-badge yellow>Primary</x-bt-badge>
                    <x-bt-badge yellow soft>Soft</x-bt-badge>
                    <x-bt-badge yellow outline>Outline</x-bt-badge>
                    <x-bt-badge yellow ghost>Ghost</x-bt-badge>
                    <x-bt-badge yellow tint>Tint</x-bt-badge>

                </div>
            </x-bt-card>

            {{-- Alerts --}}
            <x-bt-card title="Alerts" class="md:col-span-2 lg:col-span-1">
                <div class="space-y-3">
                    <x-bt-alert title="Info">
                        This is an info alert to notify the user.
                    </x-bt-alert>
                    <x-bt-alert title="Success" success>
                        Operation completed successfully!
                    </x-bt-alert>
                </div>
            </x-bt-card>

            {{-- Inputs --}}
            <x-bt-card title="Inputs">
                <div class="space-y-4">
                    <x-bt-input label="Username" placeholder="e.g. Beartropy" />
                    <x-bt-input label="Password" type="password" hint="At least 8 characters" />
                </div>
            </x-bt-card>

            {{-- Form Controls --}}
            <x-bt-card title="Form Controls">
                <div class="flex flex-col space-y-8 p-7.5">
                    <div class="flex items-center justify-between">
                        <x-bt-checkbox label="Remember me" class="w-full" />
                        <x-bt-toggle label="Notifications" class="w-full" />
                    </div>
                    <div class="flex items-center justify-center">
                        <x-bt-radio-group name="Plan" :options="[
                            ['value' => 'forever', 'label' => 'Lifetime'],
                            ['value' => 'enough', 'label' => '10 awesome years'],
                            ['value' => 'formaybe', 'label' => 'Ill see how it goes'],
                        ]" color="orange"
                            class="flex flex-col sm:flex-row items-start md:items-center gap-4" inline />
                    </div>
                </div>
            </x-bt-card>

            <div class="flex flex-col space-y-4">
                <x-bt-card title="Avatars">
                    <div class="flex items-center space-x-4">
                        <x-bt-avatar src="https://ui-avatars.com/api/?name=John+Doe&background=random" alt="John Doe" />
                        <x-bt-avatar fallback="BT" />
                        <div class="flex -space-x-2 overflow-hidden pl-2">
                            <x-bt-avatar class="inline-block ring-2 ring-white dark:ring-slate-800"
                                src="https://ui-avatars.com/api/?name=Alice&background=random" />
                            <x-bt-avatar class="inline-block ring-2 ring-white dark:ring-slate-800"
                                src="https://ui-avatars.com/api/?name=Bob&background=random" />
                            <x-bt-avatar class="inline-block ring-2 ring-white dark:ring-slate-800"
                                src="https://ui-avatars.com/api/?name=Charlie&background=random" />
                        </div>
                    </div>
                </x-bt-card>
                <x-bt-card title="Avatars">
                    <div class="flex items-center justify-around">
                        <x-bt-button green tint
                            @click="$beartropy.dialog.success('Success','Settings saved successfully.')">
                            Dialogs
                        </x-bt-button>
                        <x-bt-button orange tint
                            @click="$beartropy.toast.success('Success','Settings saved successfully.')">
                            Toasts
                        </x-bt-button>
                        <x-bt-button blue tint x-data
                            @click="$beartropy.dialog.confirm({
                            title: 'Activate user',
                            description: 'Do you want to activate this user?',
                            componentId: 'dialog-example-confirm',
                            accept: {
                                label: 'Yes, activate',
                                method: 'activateUser',
                                params: [{{ $userId ?? 1 }}],
                            },
                            reject: {
                                label: 'Cancel',
                            },
                            size: 'sm',
                        })">
                            Confirm
                        </x-bt-button>
                        <div x-data="{ open: false }">
                            <x-bt-button x-on:click="open = true">Slider</x-bt-button>

                            <x-bt-slider x-model="open" max-width="max-w-2xl">
                                <x-slot:title>Basic Slider</x-slot:title>
                                <div class="space-y-4">
                                    <p>This is the content of the slider.</p>
                                    <p>You can put anything here.</p>
                                </div>

                                <x-slot:footer>
                                    <x-bt-button secondary x-on:click="open = false">Cancel</x-bt-button>
                                    <x-bt-button x-on:click="open = false">Save</x-bt-button>
                                </x-slot:footer>
                            </x-bt-slider>
                        </div>
                    </div>
                </x-bt-card>
            </div>
        </div>
    </div>
</x-layouts.app>
