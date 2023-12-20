<html>
    @include('admin.commons.header')
    <body>
        <div class="wrapper">
            @include('admin.commons.top_bar')
            @include('admin.commons.side_bar')
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
                                    <h3 class="card-title col-sm-10" >User list Table</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td style="width: 30%"> {{ $user->name }}</td>
                                        <td class="col-2", style="width: 50%">{{ $user->email }}</td>
                                        <td class="col-2", style="width: 50%">
                                            @if ($user->role == 1)
                                                Admin
                                            @else
                                                Client
                                            @endif
                                        </td>
                                        <td class="col-2", style="width: 50%">{{ $user->address }}</td>
                                        <td class="col-2", style="width: 50%">{{ $user->contact }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                    </tr>
                                </tfoot>
                            </table>
                            </div>
                    </div>
                </section>
            </div>
            @include('admin.commons.footer')
        </div>
    </body>
</html>