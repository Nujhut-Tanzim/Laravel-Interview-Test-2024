<!-- Modal Structure -->
<div class="modal fade" id="viewStateModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View State Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="viewForm">
                    <div class="mb-3">
                        <label for="state_name" class="form-label">State Name</label>
                        <input type="text" class="form-control" id="state_name" name="state_name" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="area" class="form-label">State Area(Km square)</label>
                        <input type="text" class="form-control" id="area" name="area" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="form-label">Created At</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="form-label">Updated At</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" readonly>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>