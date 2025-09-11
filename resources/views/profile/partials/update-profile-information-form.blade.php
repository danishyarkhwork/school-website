<section>
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-primary">
            <i class="fas fa-user mr-2"></i>
            Profile Information
        </h2>
        <p class="mt-2 text-gray-600">
            Update your account's profile information and email address.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Full Name *
                </label>
                <input id="name" 
                       name="name" 
                       type="text" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary @error('name') border-red-500 @enderror" 
                       value="{{ old('name', $user->name) }}" 
                       required 
                       autofocus 
                       autocomplete="name" />
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email Address
                </label>
                <input id="email" 
                       type="email" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 text-gray-500 cursor-not-allowed" 
                       value="{{ $user->email }}" 
                       readonly 
                       disabled />
                <p class="mt-2 text-sm text-gray-500">
                    <i class="fas fa-info-circle mr-1"></i>
                    Email address cannot be changed for security reasons.
                </p>

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-3 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <p class="text-sm text-yellow-800">
                            <i class="fas fa-exclamation-triangle mr-1"></i>
                            Your email address is unverified.
                            <button form="send-verification" class="underline text-primary hover:text-primary/80 ml-1">
                                Click here to re-send the verification email.
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-sm text-green-600">
                                <i class="fas fa-check-circle mr-1"></i>
                                A new verification link has been sent to your email address.
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" 
                    class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary/90 shadow-glow transition duration-200">
                <i class="fas fa-save mr-2"></i>
                Save Changes
            </button>

            @if (session('status') === 'profile-updated')
                <div class="flex items-center text-green-600">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span class="text-sm font-medium">Profile updated successfully!</span>
                </div>
            @endif
        </div>
    </form>
</section>
