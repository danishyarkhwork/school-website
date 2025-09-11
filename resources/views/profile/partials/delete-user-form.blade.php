<section class="space-y-6">
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-red-600">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            Delete Account
        </h2>
        <p class="mt-2 text-gray-600">
            Once your account is deleted, all of its resources and data will be permanently deleted. 
            Before deleting your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <div class="bg-red-50 border border-red-200 rounded-lg p-6">
        <div class="flex items-center mb-4">
            <i class="fas fa-warning text-red-500 text-xl mr-3"></i>
            <h3 class="text-lg font-semibold text-red-800">Danger Zone</h3>
        </div>
        
        <p class="text-red-700 mb-4">
            This action cannot be undone. This will permanently delete your account and remove all data from our servers.
        </p>

        <button type="button"
                onclick="openDeleteModal()"
                class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200">
            <i class="fas fa-trash mr-2"></i>
            Delete Account
        </button>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                </div>
                
                <h3 class="text-lg font-medium text-gray-900 text-center mb-2">
                    Delete Account
                </h3>
                
                <p class="text-sm text-gray-600 text-center mb-6">
                    Are you sure you want to delete your account? This action cannot be undone.
                </p>

                <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                    @csrf
                    @method('delete')

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Enter your password to confirm
                        </label>
                        <input id="password"
                               name="password"
                               type="password"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:border-red-500 @error('password', 'userDeletion') border-red-500 @enderror"
                               placeholder="Your password"
                               required />
                        @error('password', 'userDeletion')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button"
                                onclick="closeDeleteModal()"
                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200">
                            Cancel
                        </button>
                        <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200">
                            <i class="fas fa-trash mr-1"></i>
                            Delete Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
function openDeleteModal() {
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});
</script>
