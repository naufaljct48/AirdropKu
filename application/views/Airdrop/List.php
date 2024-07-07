<div class="main-wrapper">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Airdrop List</h5>
                <table id="airdropTable" class="display table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Date Added</th>
                            <th>Account Count</th>
                            <th>Airdrop Description</th>
                            <th>Project Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editAirdropModal" tabindex="-1" aria-labelledby="editAirdropModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAirdropModalLabel">Edit Airdrop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editAirdropForm">
                    <input type="hidden" id="editAirdropId" name="id">
                    <div class="mb-3">
                        <label for="editProjectName" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="editProjectName" name="projectName">
                    </div>
                    <div class="mb-3">
                        <label for="editAccountCount" class="form-label">Account Count</label>
                        <input type="number" class="form-control" id="editAccountCount" name="accountCount">
                    </div>
                    <div class="mb-3">
                        <label for="editAirdropDescription" class="form-label">Airdrop Description</label>
                        <textarea class="form-control" id="editAirdropDescription" name="airdropDescription"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editProjectLink" class="form-label">Project Link</label>
                        <input type="url" class="form-control" id="editProjectLink" name="projectLink">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveEditAirdrop">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const notyf = new Notyf();
        var table = $('#airdropTable').DataTable({
            "processing": true,
            "serverSide": true,
            "language": {
                "infoFiltered": ""
            },
            "ajax": {
                "url": "<?php echo site_url('airdrop/getAirdropData'); ?>",
                "type": "POST",
                "dataSrc": function(json) {
                    console.log(json); // Debugging output JSON response
                    return json.data;
                }
            },
            "columns": [{
                    "data": "number"
                }, // Penomoran
                {
                    "data": "projectName"
                },
                {
                    "data": "date_added"
                },
                {
                    "data": "accountCount"
                },
                {
                    "data": "airdropDescription"
                },
                {
                    "data": "projectLink",
                    "render": function(data, type, row) {
                        return '<a href="' + data + '" target="_blank">' + data + '</a>';
                    }
                },
                {
                    "data": "status",
                    "render": function(data, type, row) {
                        var badgeClass = '';
                        switch (data) {
                            case 'Claimed':
                                badgeClass = 'badge bg-success';
                                break;
                            case 'Ongoing':
                                badgeClass = 'badge bg-info';
                                break;
                            case 'Cancelled':
                                badgeClass = 'badge bg-danger';
                                break;
                            default:
                                badgeClass = 'badge bg-secondary';
                                break;
                        }
                        return '<span class="' + badgeClass + '">' + data + '</span>';
                    }
                },
                {
                    "data": "id",
                    "render": function(data, type, row) {
                        if (row.status === 'Claimed') {
                            return '';
                        }
                        return `
                        <div class="btn-group" role="group">
                            <button class="btn btn-primary btn-sm editBtn me-2" data-id="${data}">Edit</button>
                            <div class="dropdown">
                                <button class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Edit Status
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item statusBtn" href="#" data-id="${data}" data-status="Claimed">Claimed</a>
                                    <a class="dropdown-item statusBtn" href="#" data-id="${data}" data-status="Ongoing">Ongoing</a>
                                    <a class="dropdown-item statusBtn" href="#" data-id="${data}" data-status="Cancelled">Cancelled</a>
                                </div>
                            </div>
                        </div>
                    `;
                    },
                    "orderable": false
                }
            ],
            "order": [
                [0, 'asc']
            ],
            "searching": true
        });

        $('#airdropTable tbody').on('click', '.editBtn', function() {
            var id = $(this).data('id');
            $.ajax({
                url: "<?php echo site_url('airdrop/getAirdropById'); ?>",
                type: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $('#editAirdropId').val(data.id);
                    $('#editProjectName').val(data.projectName);
                    $('#editAccountCount').val(data.accountCount);
                    $('#editAirdropDescription').val(data.airdropDescription);
                    $('#editProjectLink').val(data.projectLink);
                    var modal = new bootstrap.Modal(document.getElementById('editAirdropModal'));
                    modal.show();
                }
            });
        });

        $('#saveEditAirdrop').on('click', function() {
            $.ajax({
                url: "<?php echo site_url('airdrop/editAirdrop'); ?>",
                type: "POST",
                data: $('#editAirdropForm').serialize(),
                success: function(data) {
                    if (data.success) {
                        notyf.success({
                            message: 'Edited Successfully!',
                            duration: 3000
                        });
                        var modal = bootstrap.Modal.getInstance(document.getElementById('editAirdropModal'));
                        modal.hide();
                        table.ajax.reload();
                    }
                }
            });
        });

        $('#airdropTable tbody').on('click', '.statusBtn', function() {
            var id = $(this).data('id');
            var status = $(this).data('status');
            $.ajax({
                url: "<?php echo site_url('airdrop/updateStatus'); ?>",
                type: "POST",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    if (data.success) {
                        notyf.success({
                            message: 'Update Success!',
                            duration: 3000
                        });
                        table.ajax.reload();
                    }
                }
            });
        });
    });
</script>