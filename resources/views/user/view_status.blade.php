<html>
    @include('commons.header')
    <body>
        <div class="wrapper">
            @include('commons.top_bar')
            @include('commons.side_bar')
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">{{ $page }}</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">{{ $page }}</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <h3 class="card-title col-sm-10" >Helper list Table</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Experience</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($helpers as $user)
                                    <tr>
                                        <td>{{ $user['request']->id }}</td>
                                        <td style="width: 10%"> {{ $user['helper']->name }}</td>
                                        <td class="col-1", style="width: 50%">{{ $user['helper']->age }}</td>
                                        <td class="col-2", style="width: 60%">{{ $user['helper']->gender }}</td>
                                        <td class="col-2", style="width: 60%">{{ $user['helper']->address }}</td>
                                        <td class="col-2", style="width: 60%">{{ $user['helper']->contact }}</td>
                                        <td class="col-3", style="width: 60%">{{ $user['helper']->experience }}</td>
                                        {{-- <td class="col-4", style="width: 60%">{{ $user->created_at }}</td> --}}
                                        <td class="justify-content-center align-items-center col-2">
                                          @if ($user['request']->status == 0)
                                             <p class="bg-warning">Pending</p> 
                                          @elseif ($user['request']->status == 1)
                                            <p class="bg-success">Accepted</p> 
                                          @else
                                            <p class="bg-danger">Delcine</p> 
                                          @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Experience</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                            </div>
                    </div>
                </section>
            </div>
            @include('commons.footer')
        </div>
    </body>
</html>