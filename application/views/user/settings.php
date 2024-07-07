<div class="main-wrapper">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Settings</h5>
                <form id="formSettings" action="<?php echo base_url('User/update_settings'); ?>" method="post">
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $this->session->userdata('email'); ?>" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="currentPassword" class="col-sm-2 col-form-label">Current Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="newPassword" class="col-sm-2 col-form-label">New Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="newPassword" name="newPassword">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Update Settings</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const notyf = new Notyf();

        $('#formSettings').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        notyf.success({
                            message: 'Settings updated successfully!',
                            duration: 2000
                        });
                    } else {
                        notyf.error({
                            message: response.message,
                            duration: 2000
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    notyf.error({
                        message: 'An error occurred while processing your request.',
                        duration: 2000
                    });
                }
            });
        });
    });
</script>