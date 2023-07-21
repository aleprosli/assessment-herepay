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

                            <label for="formFile" class="form-label">Upload From File</label>
                            <input class="form-control" type="file" name="file" id="formFile">

                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Upload</button>
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
                    @if(empty($students->first()))
                        <p>No Student, please add atleast one.</p>
                    @else
                        <table class="table table-sm">
                            <caption>List of {{ $students->total() }} users</caption>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Parent Contact</th>
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
