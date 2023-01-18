<form action="{{ route('authenticate') }}" method="POST" id="loginForm">
  @csrf
    <h1 class="mb-3">Login</h1>

    <div class="form-outline mb-4">
      <input type="text" id="username" class="form-control" name="name"/>
      <label class="form-label" for="username">Username</label>
    </div>
  
    <div class="form-outline mb-4">
      <input type="password" id="passw" class="form-control" name="password"/>
      <label class="form-label" for="passw">Password</label>
    </div>
  
      <div class="col">
        <a href="#!">Forgot password?</a>
      </div>
  
    <input type="submit" class="btn btn-primary btn-block mt-3 mb-4" value="Sign in">
  
    <div class="text-center">
      <p>Not a member? <a href="/register">Register</a></p>
    </div>
</form>