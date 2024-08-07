<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>REGISTER PAGE</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <h1>Marketplace & Cathering</h1>
                <p>REGISTER PAGE</p>
                @if (session('message'))
                <p>{{ session('message') }}</p>
                @endif
                <p class="text-center">Silahkan Register</p>
                <form id="registerForm" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                        <label for="Username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-4">
                        <label for="Role" class="form-label">Register Sebagai</label>
                        <select class="form-select" aria-label="Default select example" id="role_id" name="role_id">
                          <option selected disabled>Open this select menu</option>
                          @foreach ($role as $r)
                          <option value="{{ $r->id }}">{{ $r->role_name }}</option>
                      @endforeach
                        </select>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                    <div class="d-flex align-items-center justify-content-center">
                        <a class="text-primary fw-bold ms-2" href="/register">Create an account</a>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#registerForm').on('submit', function(event) {
        event.preventDefault();

        const name = $('#name').val();
        const email = $('#email').val();
        const password = $('#password').val();
        const role_id = $('#role_id').val();

        $.ajax({
            url: 'http://localhost:8000/api/register',
            method: 'POST',
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify({
                name: name,
                email: email,
                password: password,
                role_id: role_id
            }),
            success: function(response) {
                if (response.success) {
                    // Store the JWT token in local storage or cookie
                    localStorage.setItem('jwtToken', response.success);

                    // Redirect to the /register page
                    window.location.href = '/';
                } else {
                    alert('Register failed. Please check your credentials.');
                }
            },
            error: function(response) {
                // Optional: Display the error messages returned by the server
                if (response.status === 422) {
                    const errors = response.responseJSON;
                    let errorMessages = '';
                    for (let field in errors) {
                        errorMessages += errors[field].join('<br>') + '<br>';
                    }
                    alert(errorMessages);
                } else {
                    alert('An error occurred. Please try again.');
                }
            }
        });
    });
});

  </script>
  
</body>

</html>