@extends('layouts.dashboard.app')
@section('content') 
<div class="container">
    <h1>المشرفين</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">الاسم</th>
                <th scope="col">البريد الاكتروني</th>
                <th scope="col">التحكم</th>
                <th scope="col">الصوره</th>
                <th scope="col">العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td><img  style="width: 90px; height: 90px;" src="{{asset('images/dashboard/admins/'.$user->photo)}}"></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            @can('edit-admin')
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary box-shadow-3">Edit</a>
                            @endcan

                            @can('delete-admin')
                                <form action="{{route('users.destroy',$user->id)}}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger box-shadow-3">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    @can('add-admin')
        <div class="col-md-6" style="margin-bottom: 25px;">        
            <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافه مشرف جديد </a>
        </div>
    @endcan
</div>
@endsection
