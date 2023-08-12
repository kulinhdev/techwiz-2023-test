<x-admin-layout>
    <x-slot name="title">
        User manage
    </x-slot>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">User list</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.search-user')}}" method="get">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="formrow-email-input"
                                                placeholder="Enter name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" class="form-control"
                                                placeholder="Enter email">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address"
                                                placeholder="Enter address">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone"
                                                placeholder="Enter phone">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-select" id="change-status" name="status">
                                                <option value="">All
                                                </option>
                                                <option value="1">Active
                                                </option>
                                                <option value="0">In
                                                    Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                </div>

                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 70px;"></th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Status</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="avatar-xs">
                                                    @if ($user->avatar != null)
                                                    <img class="rounded-circle avatar-xs"
                                                        src={{ asset("assets/admin/images/users/$user->avatar") }}
                                                        alt="">
                                                    @else
                                                    <span class="avatar-title rounded-circle">
                                                        {{ $user->name[0] }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-0">{{ $user->name }}</p>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                {{ $user->phone }}
                                            </td>
                                            <td>
                                                {{ $user->address }}
                                            </td>
                                            <td>
                                                @if ($user->is_active == 1)
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">In Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-inline font-size-20 contact-links mb-0">
                                                    <li class="list-inline-item px-2">
                                                        <a href={{ route('admin.user-profile', $user->id) }}
                                                            title="Profile"><i class="bx bx-user-circle"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="pagination pagination-rounded justify-content-center mt-4">
                                        <li class="page-item {{ $users->currentPage() == 1 ? 'd-none' : ''}}">
                                            <a href="{{ $users->previousPageUrl() }}" class="page-link"><i
                                                    class="mdi mdi-chevron-left"></i></a>
                                        </li>
                                        @for ($i = 1; $i <= $users->lastPage(); $i++)
                                            <li class="page-item {{ $users->currentPage() == $i ? 'active' : ''}}">
                                                <a href="{{ $users->url($i) }}" class="page-link"> {{ $i }}</a>
                                            </li>
                                            @endfor


                                            <li
                                                class="page-item {{ $users->currentPage() == $users->lastPage() ? 'd-none' : ''}}">
                                                <a href="{{ $users->nextPageUrl() }}" class="page-link"><i
                                                        class="mdi mdi-chevron-right"></i></a>
                                            </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
    </div>

</x-admin-layout>