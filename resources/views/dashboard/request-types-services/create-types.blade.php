<!-- Add Request Type Modal -->
<div class="modal fade" id="addRequestTypeModal" tabindex="-1" aria-labelledby="addRequestTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addRequestTypeModalLabel">Add New Request Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('request-types.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="en_name" class="form-label">Name (English)</label>
            <input type="text" class="form-control" id="en_name" name="en_name" required>
          </div>
          <div class="mb-3">
            <label for="ar_name" class="form-label">Name (Arabic)</label>
            <input type="text" class="form-control" id="ar_name" name="ar_name" required>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
