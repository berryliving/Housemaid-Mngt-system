<!DOCTYPE html>
<html lang="en">
    
@include('commons.header')

<body>
    <div class="m-5"></div>
    <div class=" align-content-center align-items-center container col-5">
        <div class="card p-5 mt-5 container">
            <div class="col-12">
                <form action="{{ url('loginUser') }}" method="post">
                    @csrf
                    <div class="card-hearder text-center">
                        <h1>House Helpers Service Search and Management System</h1>
                        @if(session('success'))
                            <div class="success">{{ session('success') }} </div>
                        @elseif(session('failed'))
                            <div class="danger">{{ session('failed') }} </div>
                        @endif
                    </div>
                    <div class="card-body mt-5">
                        <input type="email" class="mt-3 form-control" name="email" required placeholder="email" autocomplete="on">
                        <input type="password" class="mb-5 mt-2 form-control" name="password" placeholder="password" required>
                        <button id="admin" type="submit" class="col-12 btn btn-success">Login</button>
                    </div>
                </form>
            </div>
            <div class="d-flex mt-4 ">
                <p class="text-sm text-center">Don't have an account? </p>
                <a href="{{ url('register') }}" class="primary text-lg text-center mx-2">Register here</a>
            </div>
        </div>
    </div>


</body>

</html>