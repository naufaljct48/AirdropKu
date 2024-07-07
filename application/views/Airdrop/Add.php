<div class="main-wrapper">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Airdrop</h5>
                <form id="formAddAirdrop" action="<?php echo base_url('Airdrop/save'); ?>" method="post">
                    <div class="mb-3 row">
                        <label for="projectName" class="col-sm-2 col-form-label">Project Name/Airdrop Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="projectName" name="projectName" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="accountCount" class="col-sm-2 col-form-label">How Much Account?:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="accountCount" name="accountCount" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="airdropDescription" class="col-sm-2 col-form-label">Airdrop Description:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="airdropDescription" name="airdropDescription" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="projectLink" class="col-sm-2 col-form-label">Project Link:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="projectLink" name="projectLink">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Add</button>
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

        $('#formAddAirdrop').submit(function(e) {
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
                            message: 'Airdrop added successfully!',
                            duration: 2000
                        });

                        setTimeout(function() {
                            window.location.href = '<?php echo base_url("Airdrop/List"); ?>';
                        }, 2000);
                    } else {
                        notyf.error({
                            message: 'Failed to add this Airdrop!',
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