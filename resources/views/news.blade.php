@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <h5>News</h5>
        @if (Auth::user()->admin == 1)
            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add new
            </button>
            
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-secondary">
                        <div class="modal-body"> <h1 class="modal-title fs-5" id="exampleModalLabel">Add news</h1>
                            <form action="/newsSave" method="post">
                                @csrf
                                <input type="text" name="name" placeholder="name" class="form-control"><br>
                                <input type="text" name="about" placeholder="about" class="form-control"><br>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
        <table class="table table-hover table-stripped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">about</th>
                @if (Auth::user()->admin == 1)
                    <th scope="col">content</th>
                @endif
              </tr>
            </thead>
            @foreach ($news as $new)
                <tbody>
                    <tr>
                        <th scope="row">{{ $new -> id }}</th>
                        <td>{{ $new -> name }}</td>
                        <td>{{ $new -> about }}</td>
                        @if (Auth::user()->admin == 1)
                            <td>

                                <a href="/deleteNews/{{ $new -> id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $new -> id}}">
                                    <i class="fa fa-pen"></i>
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $new -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content bg-secondary">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/newsEdit/{{ $new -> id}}" method="post">
                                                @csrf
                                                <input type="text" name="name" value="{{ $new -> name }}" class="form-control"><br>
                                                <input type="text" name="about" value="{{ $new -> about }}" class="form-control"><br>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>

                            </td>
                        @endif
                    </tr>
                </tbody>
            @endforeach
          </table>
    </div>
</div>
@endsection