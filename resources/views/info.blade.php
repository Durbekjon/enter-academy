@extends('layouts.admin') @section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
            <h5>Information Page</h5>

            @if (Auth::user()->admin == '1')
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Info
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-secondary">
                            <div class="modal-body">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    Add Info
                                </h1>
                                <form action="/infoSave" method="post">
                                    @csrf
                                    <input type="text" name="location" placeholder="location"
                                        class="form-control" /><br />
                                    <input type="email" name="email" placeholder="email" class="form-control" /><br />
                                    <input type="number" name="number" placeholder="number" class="form-control" /><br />
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        Save changes
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    {{-- Jizzax viloyati Jizzax shahar "Turon" bank ro'parasi --}}
                    <th>location</th>
                    {{-- info@example.com --}}
                    <th>email</th>
                    {{-- +998915669999 --}}
                    <th>number</th>
                    @if (Auth::user()->admin == '1')
                        <th>number</th>
                    @endif
                </tr>
                @foreach ($info as $i)
                    <tbody>
                        <tr>
                            <td>{{ $i->id }}</td>
                            <td>{{ $i->location }}</td>
                            <td>{{ $i->email }}</td>
                            <td>{{ $i->number }}</td>
                            @if (Auth::user()->admin == '1')
                                <th>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $i->id }}">
                                        <i class="fa fa-pen"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $i->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-secondary">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        Modal title
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/infoEdit/{{ $i->id }}" method="post">
                                                        @csrf
                                                        <input type="text" name="location" value="{{ $i->location }}"
                                                            class="form-control" /><br />
                                                        <input type="email" name="email" value="{{ $i->email }}"
                                                            class="form-control" /><br />
                                                        <input type="number" name="number" value="{{ $i->number }}"
                                                            class="form-control" /><br />
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            Save changes
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            @endif
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
