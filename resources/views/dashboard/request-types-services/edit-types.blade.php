<!-- Edit Request Type Modal -->
<div class="modal fade" id="editRequestTypeModal{{ $requestType->id }}" tabindex="-1" aria-labelledby="editRequestTypeModalLabel{{ $requestType->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editRequestTypeModalLabel{{ $requestType->id }}">Edit Request Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('request-types.update', $requestType->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="en_name{{ $requestType->id }}" class="form-label">Name (English)</label>
            <input type="text" class="form-control" id="en_name{{ $requestType->id }}" name="en_name" value="{{ $requestType->en_name }}" required>
          </div>
          <div class="mb-3">
            <label for="ar_name{{ $requestType->id }}" class="form-label">Name (Arabic)</label>
            <input type="text" class="form-control" id="ar_name{{ $requestType->id }}" name="ar_name" value="{{ $requestType->ar_name }}" required>
          </div>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
