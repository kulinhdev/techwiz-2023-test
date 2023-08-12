<x-admin-layout>
    @include('sweetalert::alert')

    <x-slot name="title">
        Profile
    </x-slot>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">

                                </div>
                                <div class="col-5 align-self-end">
                                    <img src={{ asset('assets/admin/images/profile-img.png') }} alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        @if ($user->avatar != null)
                                        <img class="img-thumbnail rounded-circle"
                                            src={{ asset("assets/admin/images/users/$user->avatar") }} alt="">
                                        @else
                                        <img class="img-thumbnail rounded-circle"
                                            src={{ asset("assets/admin/images/users/avatar-2.jpg") }} alt="">
                                        @endif
                                    </div>
                                    <h5 class="font-size-15 text-truncate">{{ $user->name }}</h5>
                                    <p class="text-muted mb-0 text-truncate">{{ $user->username }}</p>
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">

                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="font-size-15">125</h5>
                                                <p class="text-muted mb-0">Projects</p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="font-size-15">$1245</h5>
                                                <p class="text-muted mb-0">Revenue</p>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <select class="form-select" id="change-status">
                                                <option value="1" {{ $user->is_active === 1? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0" {{ $user->is_active === 0? 'selected' : '' }}>In
                                                    Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Personal Information</h4>
                            <div class="table-responsive">
                                <table class="table table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Full Name :</th>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Mobile :</th>
                                            <td>{{ $user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">E-mail :</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address :</th>
                                            <td>{{ $user->address }}</td>
                                        </tr>
                                    </tbody>
                                    <input type="hidden" id="idu" value="{{ $user->id }}">
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">Experience</h4>
                            <div class="">
                                <ul class="verti-timeline list-unstyled">
                                    <li class="event-list active">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle bx-fade-right"></i>
                                        </div>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <i class="bx bx-server h4 text-primary"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="font-size-15"><a href="javascript: void(0);"
                                                            class="text-dark">Back end Developer</a></h5>
                                                    <span class="text-primary">2016 - 19</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle"></i>
                                        </div>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <i class="bx bx-code h4 text-primary"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="font-size-15"><a href="javascript: void(0);"
                                                            class="text-dark">Front end Developer</a></h5>
                                                    <span class="text-primary">2013 - 16</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle"></i>
                                        </div>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <i class="bx bx-edit h4 text-primary"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="font-size-15"><a href="javascript: void(0);"
                                                            class="text-dark">UI /UX Designer</a></h5>
                                                    <span class="text-primary">2011 - 13</span>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <!-- end card -->
                </div>

                <div class="col-xl-8">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium mb-2">Completed Projects</p>
                                            <h4 class="mb-0">125</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-check-circle font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium mb-2">Pending Projects</p>
                                            <h4 class="mb-0">12</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-hourglass font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium mb-2">Total Revenue</p>
                                            <h4 class="mb-0">$36,524</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-package font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Revenue</h4>
                            <div id="revenue-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">My Projects</h4>
                            <div class="table-responsive">
                                <table class="table table-nowrap table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Projects</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">Deadline</th>
                                            <th scope="col">Budget</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Skote admin UI</td>
                                            <td>2 Sep, 2019</td>
                                            <td>20 Oct, 2019</td>
                                            <td>$506</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Skote admin Logo</td>
                                            <td>1 Sep, 2019</td>
                                            <td>2 Sep, 2019</td>
                                            <td>$94</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Redesign - Landing page</td>
                                            <td>21 Sep, 2019</td>
                                            <td>29 Sep, 2019</td>
                                            <td>$156</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>App Landing UI</td>
                                            <td>29 Sep, 2019</td>
                                            <td>04 Oct, 2019</td>
                                            <td>$122</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Blog Template</td>
                                            <td>05 Oct, 2019</td>
                                            <td>16 Oct, 2019</td>
                                            <td>$164</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Redesign - Multipurpose Landing</td>
                                            <td>17 Oct, 2019</td>
                                            <td>05 Nov, 2019</td>
                                            <td>$192</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Logo Branding</td>
                                            <td>04 Nov, 2019</td>
                                            <td>05 Nov, 2019</td>
                                            <td>$94</td>
                                        </tr>
                                    </tbody>
                                </table>
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

    <script src="{{ asset('assets/admin/js/jquery-3.7.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $(document).ready(function() {
        $('#change-status').change(function() {
            const isActive = $('#change-status').find(":selected").val();
            const idu = $('#idu').val();
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("admin.update-status") }}', // Named route
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            id: idu,
                            isActive: isActive
                        }, // Send data to the server
                        success: function(data) {
                            Swal.fire('Saved!', '', 'success')
                        }
                    });

                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })

        });
    });
    </script>

</x-admin-layout>