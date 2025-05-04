<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-6">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Create Account</h1>
            </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" class="bg-white p-8 rounded-lg shadow-md">
                @csrf

                <div class="space-y-6">
                    <!-- Name Section -->
                    <div class="space-y-4">
                        <h2 class="text-lg font-semibold text-gray-700">Name</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <x-input id="firstname" class="w-full" type="text" name="firstname" 
                                    placeholder="First Name" :value="old('firstname')" required autofocus />
                            </div>
                            <div>
                                <x-input id="middlename" class="w-full" type="text" name="middlename" 
                                    placeholder="Middle Name" :value="old('middlename')" />
                            </div>
                            <div>
                                <x-input id="lastname" class="w-full" type="text" name="lastname" 
                                    placeholder="Last Name" :value="old('lastname')" required />
                            </div>
                        </div>
                    </div>

                    <!-- Account Details Section -->
                    <div class="space-y-4">
                        <h2 class="text-lg font-semibold text-gray-700">Account Details</h2>
                        <div class="space-y-4">
                            <x-input id="email" class="w-full" type="email" name="email" 
                                placeholder="Email Address" :value="old('email')" required />
                            
                            <x-input id="password" class="w-full" type="password" 
                                name="password" placeholder="Password" required />
                            
                            <x-input id="password_confirmation" class="w-full" type="password" 
                                name="password_confirmation" placeholder="Confirm Password" required />
                        </div>
                    </div>

                    <!-- Terms and Actions -->
                    <div class="space-y-4">
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <label for="terms" class="ml-2 text-sm text-gray-600">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-blue-600 hover:text-blue-500">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-blue-600 hover:text-blue-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </label>
                        </div>
                        @endif

                        <div class="flex items-center justify-between">
                            <a class="text-sm text-blue-600 hover:text-blue-500" href="{{ route('login') }}">
                                Already registered? Login here
                            </a>
                            <x-button class="bg-blue-600 hover:bg-blue-700 px-6 py-2">
                                CREATE ACCOUNT
                            </x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>