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
          <li class="breadcrumb-item active" aria-current="page">All Engineering libraries Categories</li>
        </ol>
      </div>
    </div>
    <!-- Add New Category Button -->
    <div class="row mb-3">
      <div class="col">
        <a href="{{ route('article-categories.create') }}" class="btn btn-success">Add New Category</a>
      </div>
    </div>
    <!-- Table to display categories -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Categories List
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Name (Arabic)</th>
                        <th>Name (English)</th>
                        <th>Content (Arabic)</th>
                        <th>Content (English)</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articleCategories as $category)
                    <tr class="align-middle">
                        <td>{!! Str::limit($category->ar_name, 255, '...') !!}</td>
                        <td>{!! Str::limit($category->en_name, 255, '...') !!}</td>
                        <td>{!! Str::limit($category->ar_content, 255, '...') !!}</td>
                        <td>{!! Str::limit($category->en_content, 255, '...') !!}</td>
                        <td><img src="{{ asset("storage/$category->photo") }}" alt="Category Photo" style="max-width: 100px;"></td>
                        <td>
                            <a href="{{ route('article-categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('article-categories.destroy',$category->id) }}" method="POST" style="display: inline-block; margin-top: 10px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">There is no data available.</td>
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
