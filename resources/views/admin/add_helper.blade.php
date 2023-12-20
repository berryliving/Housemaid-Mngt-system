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
                                    <form method="POST" action="{{ url('admin/create/helper') }}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="">Full Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter First name" value="{{ old('name') }}" required>
                                                @if ($errors->has('name'))
                                                    <span class="error">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="">Gender</label>
                                                <select name="gender" class="form-control" required>
                                                    <option value="">--select gender --</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                @if ($errors->has('phone'))
                                                    <span class="error">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Age</label>
                                                <input type="number" class="form-control" name="age" placeholder="Enter age" value="{{ old('age') }}">
                                                @if ($errors->has('age'))
                                                    <span class="error">{{ $errors->first('age') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Home Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{ old('address') }}">
                                                @if ($errors->has('address'))
                                                    <span class="error">{{ $errors->first('address') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Contact</label>
                                                <input type="text" class="form-control" name="contact" placeholder="Enter Contact" value="{{ old('address') }}">
                                                @if ($errors->has('contact'))
                                                    <span class="error">{{ $errors->first('contact') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Experience</label>
                                                <textarea name="experience" class="form-control" cols="30" rows="5"></textarea>
                                                @if ($errors->has('address'))
                                                    <span class="error">{{ $errors->first('address') }}</span>
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
            @include('admin.commons.footer')
        </div>
    </body>
</html>