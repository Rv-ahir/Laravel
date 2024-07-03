<!-- Update Button -->


<!-- Modal -->

<div class="modal fade " id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Update Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" id="updateform">
                    <!-- Text Input -->
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="up_name" placeholder="Enter your name"
                            value="{{ $use->name }}">
                    </div>

                    @error('up_name')
                        <div class="alert alert-danger up" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="up_email" placeholder="Enter your email">
                    </div>

                    @error('up_email')
                        <div class="alert alert-danger up" role="alert">
                            {{ $message }}
                        </div>
                    @enderror



                    <!-- Date Input -->
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="up_dob">
                    </div>

                    @error('up_dob')
                        <div class="alert alert-danger up" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Select Dropdown -->
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="up_gender">
                            <option selected disabled>Choose...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    @error('up_gender')
                        <div class="alert alert-danger up" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Radio Buttons -->
                    <div class="mb-3">
                        <label class="form-label">Subscription</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="up_subscription" value="basic">
                            <label class="form-check-label" for="basic">Basic</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="up_subscription" value="premium">
                            <label class="form-check-label" for="premium">Premium</label>
                        </div>
                    </div>

                    @error('up_subscription')
                        <div class="alert alert-danger up" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Checkboxes -->
                    <div class="mb-3">
                        <label class="form-label">Preferences</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="up_preferences[]" value="news">
                            <label class="form-check-label" for="news">News</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="up_preferences[]" value="updates">
                            <label class="form-check-label" for="updates">Updates</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="up_preferences[]" value="offers">
                            <label class="form-check-label" for="offers">Special Offers</label>
                        </div>
                    </div>

                    @error('up_preferences')
                        <div class="alert alert-danger up" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Textarea -->
                    <div class="mb-3">
                        <label for="comments" class="form-label">Comments</label>
                        <textarea class="form-control" name="up_comments" rows="3" placeholder="Enter your comments"></textarea>
                    </div>

                    @error('up_comments')
                        <div class="alert alert-danger up" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- File Input -->
                    <div class="mb-3">
                        <label for="photo" class="form-label">Upload Image</label>
                        <input class="form-control" type="file" name="up_photo" accept="image/*">
                    </div>

                    @error('up_photo')
                        <div class="alert alert-danger up" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('.update-button').on('click', function(event) {
            var id = $(this).data('id');

            var formAction = '{{ route('user.update', ':id') }}'.replace(':id', id);
            $('#updateform').attr('action', formAction);

            $.ajax({
                url: '{{ route('user.edit', ':id') }}'.replace(':id', id),
                type: 'GET',
                success: function(response) {
                    $('#updateform input[name="up_name"]').val(response.name);
                    $('#updateform input[name="up_email"]').val(response.email);
                    $('#updateform input[name="up_dob"]').val(response.DOB);
                    $('#updateform select[name="up_gender"]').val(response.gender);
                    $('input[name="up_subscription"][value="' + response.subscription +
                        '"]').prop('checked', true);
                    $('#updateform textarea[name="up_comments"]').val(response.comments);
                    $('#updateform input[name="up_preferences"]').prop('checked', false);



                    if (response.preferences) {
                        var preferencesArray = response.preferences.split(',').map(function(
                            item) {
                            return item.trim();
                        });

                        // Uncheck all checkboxes initially to ensure only correct ones are checked
                        $('#updateform input[name="up_preferences[]"]').prop('checked',
                            false);

                        preferencesArray.forEach(function(preference) {
                            var checkboxSelector =
                                '#updateform input[name="up_preferences[]"][value="' +
                                preference + '"]';
                            var checkbox = $(checkboxSelector);

                            if (checkbox.length > 0) {
                                checkbox.prop('checked', true);
                            } else {
                                console.warn("Preference checkbox not found:",
                                    preference);
                            }
                        });
                    } else {
                        console.warn("No preferences found in the response.");
                    }

                },
                error: function(xhr, status, error) {
                    console.error('Error fetching user data:', error);
                }
            });
        });
    });
</script>
