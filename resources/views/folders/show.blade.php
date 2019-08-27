@extends('layouts.app')

@section('content')
<div class="container">

    <div class='mb-2'>
        <a href='/folders' class='btn btn-primary'><i class="fas fa-backward mr-2"></i>Back</a>
    </div>

    <h3>{{$folder->foldername}} - Files</h3>

    <table class='table table-hover mb-0'>
        <thead class="thead-light">
            <tr>
                <th style="width:30%">Description</th>
                <th style="width:20%">Type</th>
                <th style="width:16%">Created at</th>
                <th style="width:16%">Updated at</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($folder->files as $file)
            <tr>
                <td class="align-middle">{{$file->description}}</td>
                <td class="align-middle">{{$file->compactMime()}}</td>
                <td class="align-middle">{{$file->created_at}}</td>
                <td class="align-middle">{{$file->updated_at}}</td>
                <td class="align-middle">
                    <form method="POST" action="/files/{{ $file->id }}">
                        @method('DELETE')
                        @csrf
                        <a href='/files/{{ $file->id }}' class='btn btn-primary btn-sm mb-1'><i class="fas fa-file-download mr-1"></i>Download</a>
                        <button type="submit" class="btn btn-danger btn-sm mb-1"><i class="fas fa-folder-minus mr-1"></i>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <div class="shadow-sm p-4 bg-white">
        <form method="POST" action="/files/{{ $folder->id }}" enctype='multipart/form-data'>
            <!-- <form method="POST" action="/files/{{ $folder->id }}"> -->

            @csrf
            <div class="form-group row mb-1">
                <label for="description" class="col-3 col-form-label text-md-right">Description</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <label for="data" class="col-3 col-form-label text-md-right">Media</label>

                <div class="col-md-6">
                    <input id="data" type="file" class="form-control-file border @error('data') is-invalid @enderror" name="data">

                    @error('data')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <!-- <div class="form-group row mb-0"> -->
            <div class="col-6 text-md-right pl-0">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-2 lead"></i>Save
                </button>
            </div>
            <!-- </div> -->
        </form>
    </div>

</div>
@endsection