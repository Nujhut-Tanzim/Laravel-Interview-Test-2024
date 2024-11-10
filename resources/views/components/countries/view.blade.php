<!-- Modal Structure -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Country Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="viewForm">
                    <div class="mb-3">
                        <label for="country_name" class="form-label">Country Name</label>
                        <input type="text" class="form-control" id="country_name" name="country_name" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Country Code</label>
                        <input type="text" class="form-control" id="code" name="code" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="form-label">Created At</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="form-label">Updated At</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Flag Image</label>
                        <br>
                        <img id="flagImagePreview" src="" alt="Flag" style="max-width: 100%; display: none;height:100px;width:200px;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
