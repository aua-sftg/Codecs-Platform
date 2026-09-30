<section class="space-y-6">
    <header>
        <h2 class="text-lg fw-medium mb-0">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" onclick="$('#user-delete-modal').modal('show')" data-toggle="modal" data-target="#exampleModal">
        Delete account
    </button>

    <!-- Modal -->
    <div class="modal fade" id="user-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-l" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                        @csrf
                        @method('DELETE')

                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Are you sure you want to delete your account?') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="javascript:hideModal()" class="btn">{{__('Cancel')}}</a>
                            <button type="submit" class="btn btn-danger">
                                {{ __('Delete Account') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function hideModal() {
            $('#user-delete-modal').modal('hide');
        }
    </script>
</section>
