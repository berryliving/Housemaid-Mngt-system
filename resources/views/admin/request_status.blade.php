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
                                    <h3 class="card-title col-sm-10" >Request list</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @foreach ($helpers as $item)
                                    <div class="container d-flex">
                                        <div class="col-5">
                                            <p>Name: <b>{{ $item['helper']->name }}</b></p>
                                            <p>Age: <b>{{ $item['helper']->age }}</b></p>
                                            <p>Gender: <b>{{ $item['helper']->gender }}</b></p>
                                            <p>Address: <b>{{ $item['helper']->address }}</b></p>
                                            <p>Contact: <b>{{ $item['helper']->contact }}</b></p>
                                            <p>Experience: {{ $item['helper']->experience }}</p>
                                        </div>
                                        <div>
                                            <p>Requested by:-</p>
                                            <p>Name: <b>{{ $item['user']->name }}</b></p>
                                            <p>Age: <b>{{ $item['user']->email }}</b></p>
                                            <p>Gender: <b>{{ $item['user']->address }}</b></p>
                                            <p>Requested for: <b>{{ $item['request']->duration }}</b></p>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex">
                                        <p class="col-10"></p>
                                        <a href="{{ url('admin/accept/request/'.$item['request']->id) }}"><p class="btn btn-primary">Accept</p></a>
                                        <a href="{{ url('admin/decline/request/'.$item['request']->id) }}"><p class="btn btn-danger mx-1">Decline</p></a>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @include('admin.commons.footer')
        </div>
    </body>
</html>