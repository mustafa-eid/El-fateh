@extends('layouts.admin.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Media Files</li>
                    </ol>
                </div>
            </div>
            <!-- Add New Media File Button -->
            @if (!isset($mediaFile))
            <div class="row mb-3">
                <div class="col">
                    <a href="{{ route('media-files.create') }}" class="btn btn-success">Add New Media File</a>
                </div>
            </div>
            @endif
  
            <!-- Table to display media files -->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Media Files List
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Home Video</th>
                                        <th>About Video</th>
                                        <th>Article Sliders</th>
                                        <th>QR Photo</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($mediaFile))
                                        <tr class="align-middle">
                                            <td>
                                                @if ($mediaFile->home_video)
                                                    <video width="200" height="200" controls>
                                                        <source src="{{ asset("storage/$mediaFile->home_video") }}"
                                                            type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($mediaFile->about_video)
                                                    <video width="200" height="200" controls>
                                                        <source src="{{ asset("storage/$mediaFile->about_video") }}"
                                                            type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @endif
                                            </td>
                                            <td>
                                                @if (isset($mediaFile->article_sliders))
                                                @foreach ($article_sliders as $item)
                                                <img src="{{ asset("storage/$item") }}"
                                                alt="Article Sliders" style="width: 30px; height: 30px;">
                                                @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if ($mediaFile->qr_photo)
                                                    <img src="{{ asset("storage/$mediaFile->qr_photo") }}"
                                                        alt="QR Photo" style="max-width: 75px; max-height: 100px;">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('media-files.edit', $mediaFile->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form action="{{ route('media-files.destroy', $mediaFile->id) }}"
                                                    method="POST" style="display: inline-block; margin-top: 10px;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">There are no media files available.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
