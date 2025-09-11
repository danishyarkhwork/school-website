<section>
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-primary">
            <i class="fas fa-lock mr-2"></i>
            Update Password
        </h2>
        <p class="mt-2 text-gray-600">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
            <div>
                <label for="update_password_current_password" class="block text-sm font-medium text-gray-700 mb-2">
                    Current Password *
                </label>
                <input id="update_password_current_password" 
                       name="current_password" 
                       type="password" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary @error('current_password', 'updatePassword') border-red-500 @enderror" 
                       autocomplete="current-password" 
                       required />
                @error('current_password', 'updatePassword')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="update_password_password" class="block text-sm font-medium text-gray-700 mb-2">
                    New Password *
                </label>
                <input id="update_password_password" 
                       name="password" 
                       type="password" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary @error('password', 'updatePassword') border-red-500 @enderror" 
                       autocomplete="new-password" 
                       required />
                @error('password', 'updatePassword')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                    Confirm New Password *
                </label>
                <input id="update_password_password_confirmation" 
                       name="password_confirmation" 
                       type="password" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary @error('password_confirmation', 'updatePassword') border-red-500 @enderror" 
                       autocomplete="new-password" 
                       required />
                @error('password_confirmation', 'updatePassword')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" 
                    class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary/90 shadow-glow transition duration-200">
                <i class="fas fa-save mr-2"></i>
                Update Password
            </button>

            @if (session('status') === 'password-updated')
                <div class="flex items-center text-green-600">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span class="text-sm font-medium">Password updated successfully!</span>
                </div>
            @endif
        </div>
    </form>
</section>
