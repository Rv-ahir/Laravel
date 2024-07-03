<!-- Update Button -->
<button type="button" class="btn btn-primary update-button btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal"
    data-id="{{ $use->id }}">
    Update
</button>

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
                        <input type="text" class="form-control" name="name" placeholder="Enter your name">
                    </div>

                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your email">
                    </div>

                    @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror



                    <!-- Date Input -->
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="dob">
                    </div>

                    @error('dob')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Select Dropdown -->
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender">
                            <option selected disabled>Choose...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    @error('gender')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Radio Buttons -->
                    <div class="mb-3">
                        <label class="form-label">Subscription</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subscription" value="basic">
                            <label class="form-check-label" for="basic">Basic</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subscription" value="premium">
                            <label class="form-check-label" for="premium">Premium</label>
                        </div>
                    </div>

                    @error('subscription')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Checkboxes -->
                    <div class="mb-3">
                        <label class="form-label">Preferences</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="preferences[]" value="news">
                            <label class="form-check-label" for="news">News</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="preferences[]" value="updates">
                            <label class="form-check-label" for="updates">Updates</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="preferences[]" value="offers">
                            <label class="form-check-label" for="offers">Special Offers</label>
                        </div>
                    </div>

                    @error('preferences')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Textarea -->
                    <div class="mb-3">
                        <label for="comments" class="form-label">Comments</label>
                        <textarea class="form-control" name="comments" rows="3" placeholder="Enter your comments"></textarea>
                    </div>

                    @error('comments')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- File Input -->
                    <div class="mb-3">
                        <label for="photo" class="form-label">Upload Image</label>
                        <input class="form-control" type="file" name="photo" accept="image/*">
                    </div>

                    @error('photo')
                        <div class="alert alert-danger" role="alert">
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
                    $('#updateform input[name="name"]').val(response.name);
                    $('#updateform input[name="email"]').val(response.email);
                    $('#updateform input[name="dob"]').val(response.DOB);
                    $('#updateform select[name="gender"]').val(response.gender);
                    $('input[name="subscription"][value="' + response.subscription + '"]').prop('checked', true);
                    $('#updateform textarea[name="comments"]').val(response.comments);

                    // Clear all checkboxes
                    $('#updateform input[name="preferences"]').prop('checked', false);

                    // Debugging: Check the exact value of response.preferences
                    // console.log("Preferences received from server:", response.preferences);

                    if (response.preferences) {
                        // Split the string into an array
                        var preferencesArray = response.preferences.split(',').map(function(item) {
                            return item.trim();
                        });

                        // Debugging: Check the array
                        // console.log("Preferences array:", preferencesArray);

                        preferencesArray.forEach(function(preference) {
                            var checkboxSelector = '#updateform input[name="preferences[]"][value="' + preference + '"]';
                            var checkbox = $(checkboxSelector);

                            // Debugging: Log each checkbox
                            // console.log("Checkbox selector:", checkboxSelector);
                            // console.log("Checkbox element:", checkbox);

                            // Check if the checkbox exists and set it to checked
                            if (checkbox.length > 0) {
                                checkbox.prop('checked', true);
                            } else {
                                console.warn("Preference checkbox not found:",);
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


