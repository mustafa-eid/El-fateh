<!-- Edit Request Service Modal -->
<div class="modal fade" id="editRequestServiceModal{{ $requestService->id }}" tabindex="-1" aria-labelledby="editRequestServiceModalLabel{{ $requestService->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editRequestServiceModalLabel{{ $requestService->id }}">Edit Service Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('request-services.update', $requestService->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="en_name{{ $requestService->id }}" class="form-label">Name (English)</label>
            <input type="text" class="form-control" id="en_name{{ $requestService->id }}" name="en_name" value="{{ $requestService->en_name }}" required>
          </div>
          <div class="mb-3">
            <label for="ar_name{{ $requestService->id }}" class="form-label">Name (Arabic)</label>
            <input type="text" class="form-control" id="ar_name{{ $requestService->id }}" name="ar_name" value="{{ $requestService->ar_name }}" required>
          </div>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
