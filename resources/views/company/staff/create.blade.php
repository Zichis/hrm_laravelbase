<x-dashboard-layout :company=$company>
    <div class="py-6">
        <div class="w-full sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-2xl p-6">New staff</h1>
                <hr>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('staff.store', auth()->user()->company->identifier) }}">
                        @csrf
                        <fieldset class="my-5">
                            <legend>Personal details</legend>
                            <div class="md:flex">
                                <!-- First Name -->
                                <div class="mt-4 md:flex-1 md:pr-5">
                                    <x-label for="first_name" :value="__('First Name')" />

                                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required />
                                </div>

                                <!-- Last Name -->
                                <div class="mt-4 md:flex-1 md:pl-5">
                                    <x-label for="last_name" :value="__('Last Name')" />

                                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
                                </div>
                            </div>
                        </fieldset>
                        <hr>

                        <fieldset class="my-5">
                            <legend>Login details</legend>
                            <!-- Email Address -->
                            <div class="mt-4 md:w-1/2 md:pr-5">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            </div>

                            <div class="md:flex">
                                <!-- Password -->
                                <div class="mt-4 md:flex-1 md:pr-5">
                                    <x-label for="password" :value="__('Password')" />

                                    <x-input id="password" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="new-password" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4 md:flex-1 md:pl-5">
                                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password_confirmation" required />
                                </div>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Add') }}
                                </x-button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
