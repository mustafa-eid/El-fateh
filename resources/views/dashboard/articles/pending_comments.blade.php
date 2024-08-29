@extends('layouts.admin.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
  <div class="container-fluid">
    <div class="row g-3 mb-3 align-items-center">
      <div class="col">
        <ol class="breadcrumb bg-transparent mb-0">
          <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">All comments</li>
        </ol>
      </div>
    </div>

    <!-- Table to display comments -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Comments List
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
              <thead>
                  <tr>
                      <th>Content</th>
                      <th>User name</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse($comments as $comment)
                  <tr class="align-middle">
                      <td>{{ $comment->content }}</td>
                      <td>{{$comment->user_name }}</td>
                      <td>
                          @if($comment->status == 'approved')
                              <span class="badge bg-success">Approved</span>
                          @elseif($comment->status == 'pending')
                              <span class="badge bg-warning text-dark">Pending</span>
                          @else
                              <span class="badge bg-danger">Not Approved</span>
                          @endif
                      </td>
                      <td>
                        <form action="{{ route('comment_controll', $comment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="approve_radio_{{ $comment->id }}" value="approved">
                                <label class="form-check-label text-success" for="approve_radio_{{ $comment->id }}">Approve</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="disapprove_radio_{{ $comment->id }}" value="notApproved">
                                <label class="form-check-label text-danger" for="disapprove_radio_{{ $comment->id }}">Disapprove</label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </td>
                    
                  </tr>
                  @empty
                  <tr>
                      <td colspan="4" class="text-center">There is no data available.</td>
                  </tr>
                  @endforelse
              </tbody>
          </table>
                  </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
