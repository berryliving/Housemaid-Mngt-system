<!DOCTYPE html>
<html lang="en">
    
@include('commons.header')

<body>
    <div class="m-5"></div>
    <div class=" align-content-center align-items-center container col-5">
        <div class="card p-3 mt-5 container">
            <div class="col-12">
                <form action="{{ url('registerUser') }}" method="post">
                    @csrf
                    
                    <div class="card-hearder text-center">
                        <h1>Register new Account</h1>
                        @if(session('success'))
                            <div class="success">{{ session('success') }} </div>
                        @elseif(session('failed'))
                            <div class="danger">{{ session('failed') }} </div>
                        @endif
                    </div>
                    <div class="card-body mt-5">
                        <input type="text" class="mt-3 form-control" name="name" required placeholder="Enter Full name" autocomplete="off">
                        <input type="email" class="mt-3 form-control" name="email" required placeholder="Enter Email" autocomplete="off">
                        <input type="text" class="mt-3 form-control" name="address" required placeholder="Enter Address" autocomplete="off">
                        <input type="text" class="mt-3 form-control" name="contact" required placeholder="Enter contact" autocomplete="off">
                        <input type="password" class="mt-3 form-control" name="password" placeholder="Create Password" autocomplete="new-password" required>
                        <input type="password" class="mb-5 mt-3 form-control" name="cpassword" placeholder="Confirm Password" autocomplete="new-password" required>
                        <button id="admin" type="submit" class="col-12 btn btn-success">Register</button>
                    </div>
                </form>
            </div>
            <div class="d-flex mt-4 ">
                <p class="text-center">Have an account! </p>
                <p> <a href="{{ url('login') }}" class="primary text-lg text-center mx-2">Login here</a></p>
            </div>
        </div>
    </div>


</body>

</html>