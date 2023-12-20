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
                                    <h3 class="card-title col-sm-10" >Helper list Table</h3>
                                    <a href="{{ url('admin/add/helper') }}"> 
                                        <button class="btn btn-primary row-sm-2">Add Helper</button>
                                    </a>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($helper as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td style="width: 10%"> {{ $user->name }}</td>
                                        <td class="col-1", style="width: 50%">{{ $user->age }}</td>
                                        <td class="col-2", style="width: 60%">{{ $user->gender }}</td>
                                        <td class="col-2", style="width: 60%">{{ $user->address }}</td>
                                        <td class="col-2", style="width: 60%">{{ $user->contact }}</td>
                                        <td class="col-3", style="width: 60%">{{ $user->experience }}</td>
                                        {{-- <td class="col-4", style="width: 60%">{{ $user->created_at }}</td> --}}
                                        <td class="justify-content-center align-items-center col-2">
                                          <a href="{{ url('admin/delete/helper/'.$user->id) }}"><button class="btn btn-danger">Delete</button></a>
                                          <a href="{{ url('admin/edit/helper/'.$user->id) }}"> <button class="btn btn-success">Edit</button></a>
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
                                        <th>Action</th>
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