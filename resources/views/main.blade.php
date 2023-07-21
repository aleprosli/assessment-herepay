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
                    <table class="table table-sm">
                        <caption>List of users</caption>
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
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
