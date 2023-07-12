@extends('layouts.admin') @section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Users</p>
                        <h6 class="mb-0">{{ $userCount ?? '' }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Subscribers</p>
                        <h6 class="mb-0">{{ $subCount ?? '' }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Teachers</p>
                        <h6 class="mb-0">{{ $teacherCount ?? '' }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">News</p>
                        <h6 class="mb-0">{{ $newsCount ?? '' }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
            @if ($nameCount == 0)
                <form action="/siteName" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="your site name" name="name" class="form-control" />
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            @endif

            @if ($nameCount > 0)
                <table class="table table-hover">
                    <tr>
                        <th>name</th>
                        <th>Time</th>
                        @if (Auth::user()->admin == '1')
                            <th scope="col">content</th>
                        @endif
                    </tr>
                    @foreach ($name as $n)
                        <tbody>
                            <tr>
                                <td>{{ $n->name }}</td>
                                <td>{{ $n->created_at }}</td>
                                <td>
                                    @if (Auth::user()->admin == '1')
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editSiteNamemodal{{ $n->id }}">
                                            <i class="fa fa-pen"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editSiteNamemodal{{ $n->id }}" tabindex="-1"
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
                                                        <form action="/siteNameEdit/{{ $n->id }}" method="post">
                                                            @csrf
                                                            <input type="text" name="name" value="{{ $n->name }}"
                                                                class="form-control" /><br />
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-success">
                                                                Save changes
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            @endif
        </div>
    </div>

    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
            <h5>About</h5>
            @if (Auth::user()->admin == '1')
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add About
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-secondary">
                            <div class="modal-body">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    Add About
                                </h1>
                                <form action="/aboutSave" method="post">
                                    @csrf
                                    <input type="text" name="icon" placeholder="icon" class="form-control" /><br />
                                    <input type="text" name="name" placeholder="name" class="form-control" /><br />
                                    <input type="text" name="about" placeholder="about"
                                        class="form-control" /><br />
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
                <thead>
                    <tr>
                        <th>#</th>
                        <th>icon</th>
                        <th>name</th>
                        <th>about</th>
                        @if (Auth::user()->admin == '1')
                            <th scope="col">content</th>
                        @endif
                    </tr>
                </thead>
                @foreach ($about as $a)
                    <tbody>
                        <tr>
                            <td>{{ $a->id }}</td>
                            <td>{{ $a->icon }}</td>
                            <td>{{ $a->name }}</td>
                            <td>{{ $a->about }}</td>
                            @if (Auth::user()->admin == '1')
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $a->id }}">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <div class="modal fade" id="exampleModal{{ $a->id }}" tabindex="-1"
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
                                                    <form action="/aboutEdit/{{ $a->id }}" method="post">
                                                        @csrf
                                                        <input type="text" name="icon" value="{{ $a->icon }}"
                                                            class="form-control" /><br />
                                                        <input type="text" name="name" value="{{ $a->name }}"
                                                            class="form-control" /><br />
                                                        <input type="text" name="about" value="{{ $a->about }}"
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
                                </td>
                            @endif
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>

    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
            <h5>Subscribers</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>email</th>
                        @if (Auth::user()->admin == '1')
                            <th scope="col">content</th>
                        @endif
                    </tr>
                </thead>
                @foreach ($sub as $s)
                    <tbody>
                        <tr>
                            <td>{{ $s->id }}</td>
                            <td>{{ $s->email }}</td>
                            @if (Auth::user()->admin == '1')
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#deleteSubscriber{{ $s->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteSubscriber{{ $s->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body bg-secondary">
                                                    Xaqiqatdan ham <span class="text-primary">{{ $s->email }}</span>
                                                    ni o'chirmoqchimisiz??
                                                </div>
                                                <div class="modal-footer bg-secondary">
                                                    <button type="button" class="btn btn-success"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="/deleteSubscriber/{{ $s->id }}"
                                                        class="btn btn-sm btn-danger">Ha</a>
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
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
            <h6>Social Media accounts</h6>
            @if (Auth::user()->admin == '1')
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addSocialModal">
                    Add Social Media Account
                </button>

                <div class="modal fade" id="addSocialModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-secondary">
                            <div class="modal-body">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    Add Account
                                </h1>
                                <form action="/socialSave" method="post">
                                    @csrf
                                    <input type="text" name="name" placeholder="name"
                                        class="form-control" /><br />
                                    <input type="url" name="link" placeholder="link"
                                        class="form-control" /><br />
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
                <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>link</th>
                        @if (Auth::user()->admin == '1')
                            <th scope="col">content</th>
                        @endif
                    </tr>
                </thead>
                @foreach ($social as $soc)
                    <tr>
                        <td>{{ $soc->id }}</td>
                        <td>{{ $soc->name }}</td>
                        <td>{{ $soc->link }}</td>
                        <td>
                            @if (Auth::user()->admin == '1')
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteSocialAccount{{ $soc->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <div class="modal fade" id="deleteSocialAccount{{ $soc->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-secondary">
                                            <div class="modal-body">
                                                {{ $soc->name }}ni haqiqatdan ham
                                                o'chirmoqchimisiz???<br /><br />
                                                <a href="/deleteSocial/{{ $soc->id }}"
                                                    class="btn btn-danger">Delete</a>
                                                <button type="button" class="btn btn-secondary">
                                                    close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editSocialMediaAccountModal{{ $soc->id }}">
                                    <i class="fa fa-pen"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="editSocialMediaAccountModal{{ $soc->id }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <form action="/socialEdit/{{ $soc->id }}" method="post">
                                                    @csrf
                                                    <input type="text" name="name" value="{{ $soc->name }}"
                                                        class="form-control" /><br />
                                                    <input type="url" name="link" value="{{ $soc->link }}"
                                                        class="form-control" /><br />
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-succes">
                                                        Save changes
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
