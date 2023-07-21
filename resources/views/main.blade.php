@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('student.upload') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            @if( session()->has('alert'))
                                <div class="alert {{ session()->get('alert-type') }}">
                                    {{ session()->get('alert') }}
                                </div>
                            @endif
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="formFile" class="form-label">Upload From File</label>
                                <a href="{{ route('student.template') }}">Download Excel Template</a>
                            </div>
                            <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" id="formFile">
                            @error('file')
                                <div class="mt-1 alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Upload</button>
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-2">
                <form action="" method="">
                    <div class="input-group mt-2 p-2">
                        <input type="text" class="form-control" name="search" value="{{ request()->get('search') }}" placeholder="Search student by anything">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                        </input>
                    </div>
                </form>
                <div class="card-body">
                    @if(empty($students->first()))
                        <p>No student found.</p>
                    @else
                        <table class="table table-sm">
                            <caption>List of {{ $students->total() }} students</caption>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Parent Contact</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $key => $student)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->level }}</td>
                                        <td>{{ $student->class }}</td>
                                        <td>{{ $student->parent_contact }}</td>
                                        <td>
                                            <a onclick="return confirm('Are you sure to remove this student?')" href="{{ route('student.destroy', $student) }}" class="btn btn-danger">Remove</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $students->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
