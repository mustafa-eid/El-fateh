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
          <li class="breadcrumb-item active" aria-current="page">All Previous Works</li>
        </ol>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col">
        <a href="{{ route('previousWorks.create') }}" class="btn btn-success">Add New Previous Work</a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Previous Works List
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Engineer Name') }}</th>
                    <th scope="col">{{ __('Title') }}</th>
                    <th scope="col">{{ __('Location') }}</th>
                    <th scope="col">{{ __('Category') }}</th>
                    <th scope="col">{{ __('PDF') }}</th>
                    <th scope="col">{{ __('Images') }}</th> <!-- New Column for Image -->
                    <th scope="col">{{ __('Actions') }}</th>

                  </tr>
                </thead>
                <tbody>
                  @forelse($previousWorks as $previousWork)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $previousWork->en_engineer_name }}</td>
                    <td>{!! Str::limit($previousWork->en_title, 255, '...') !!}</td>
                    <td>{{ $previousWork->en_location }}</td>
                    <td>{!! Str::limit($previousWork->category->en_name, 255, '...') !!}</td>
                    <td>
                      @if($previousWork->pdf)
                      <a href="{{ asset("storage/$previousWork->pdf") }}" target="_blank" class="btn btn-info">Preview</a>
                      {{-- <a href="{{ asset("storage/$previousWork->pdf") }}" download class="btn btn-secondary">Download</a> --}}
                      @else
                      <span class="text-center">No PDF</span>
                      @endif
                  </td>

                    <td>
                      @if (isset($previousWork->images))
                      @php
                          $images=json_decode($previousWork->images);
                      @endphp
                      @foreach ( $images as $item)
                      <img src="{{ asset("storage/$item") }}"
                      alt="Article Sliders" style="width: 20px; height: 20px;">
                      @endforeach
                      @endif                    
                    </td> 
                    <td>
                      <a href="{{ route('previousWorks.edit', $previousWork->id) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                      <form action="{{ route('previousWorks.destroy', $previousWork->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                      </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="7" class="text-center">There is no data available.</td> <!-- Colspan should match the number of columns -->
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
</div>
@endsection
