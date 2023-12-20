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
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times</button>
                                    {{session('success')}}
                                </div>
                            @elseif (session('failed'))
                                <div class="alert alert-warning" role="alert">
                                   <button type="button" class="close" data-dismiss="alert">&times</button>
                                    {{session('failed')}}
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                            <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Fill the form to add helper</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method="POST" action="{{ url('user/add/helper') }}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="">Full Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter First name" value="{{ $helper->name }}" readonly required>
                                                <input type="text" class="form-control" name="helper_id" placeholder="Enter First name" value="{{ $helper->id }}" hidden required>
                                                @if ($errors->has('name'))
                                                    <span class="error">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Duration</label>
                                                <input type="text" class="form-control" name="duration" placeholder="Enter Duration" value="{{ old('duration') }}">
                                                @if ($errors->has('duration'))
                                                    <span class="error">{{ $errors->first('duration') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @include('commons.footer')
        </div>
    </body>
</html>