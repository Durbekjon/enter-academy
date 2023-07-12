@extends('layouts.admin')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
            <h5>News</h5>
            @if (Auth::user()->admin == 1)
                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add new
                </button>

                <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-secondary">
                            <div class="modal-body">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add news</h1>
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
                            <th scope="row">{{ $new->id }}</th>
                            <td>{{ $new->name }}</td>
                            <td>{{ $new->about }}</td>
                            @if (Auth::user()->admin == 1)
                                <td>


                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteSubscriber{{ $new->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteSubscriber{{ $new->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body bg-secondary">
                                                    Xaqiqatdan ham <span class="text-primary">{{ $new->name }}</span>
                                                    ni o'chirmoqchimisiz??
                                                </div>
                                                <div class="modal-footer bg-secondary">
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="/deleteNews/{{ $new->id }}"
                                                        class="btn btn-sm btn-danger">Ha</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $new->id }}">
                                        <i class="fa fa-pen"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $new->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-secondary">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/newsEdit/{{ $new->id }}" method="post">
                                                        @csrf
                                                        <input type="text" name="name" value="{{ $new->name }}"
                                                            class="form-control"><br>
                                                        <input type="text" name="about" value="{{ $new->about }}"
                                                            class="form-control"><br>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
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
