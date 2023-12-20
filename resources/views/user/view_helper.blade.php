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
                                @foreach ($helper as $item)
                                    <div class="container d-flex">
                                        <div class="col-5">
                                            <p>Name: <b>{{ $item->name }}</b></p>
                                            <p>Age: <b>{{ $item->age }}</b></p>
                                            <p>Gender: <b>{{ $item->gender }}</b></p>
                                            <p>Address: <b>{{ $item->address }}</b></p>
                                            <p>Contact: <b>{{ $item->contact }}</b></p>
                                        </div>
                                        <div>
                                            <p>Experience:-</p>
                                            <p>{{ $item->experience }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex">
                                        <p class="col-10"></p>
                                        <a href="{{ url('user/request/helper/'.$item->id) }}"><p class="btn btn-primary">Request</p></a>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @include('commons.footer')
        </div>
    </body>
</html>