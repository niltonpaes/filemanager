@extends('layouts.app')

@section('content')
<div class="container">

    <div class='mb-2'>
        <a href='/folders/create' class='btn btn-primary'><span class="fas fa-folder-plus mr-2 lead"></span>Create Folder</a>
    </div>

    <table class='table table-hover'>
        <thead class="thead-light">
            <tr>
                <th style="width:38%">Folder Name</th>
                <th style="width:16%">Created at</th>
                <th style="width:16%">Updated at</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($folders as $folder)
            <tr>
                <td class="align-middle">{{$folder->foldername}}</td>
                <td class="align-middle">{{$folder->created_at}}</td>
                <td class="align-middle">{{$folder->updated_at}}</td>
                <td class="align-middle">
                    <form method="POST" action="/folders/{{ $folder->id }}">
                        @method('DELETE')
                        @csrf
                        <a href='/folders/{{$folder->id}}/edit' class='btn btn-primary btn-sm mb-1'><i class="far fa-edit mr-1"></i>Edit</a>
                        <a href='/folders/{{$folder->id}}' class='btn btn-primary btn-sm mb-1'><i class="fas fa-list-ul mr-1"></i>Files</a>
                        <a href='/folders/{{$folder->id}}/download' class='btn btn-primary btn-sm mb-1'><i class="fas fa-file-download mr-1"></i>Download</a>
                        <button type="submit" class="btn btn-danger btn-sm mb-1"><i class="fas fa-folder-minus mr-1"></i>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection