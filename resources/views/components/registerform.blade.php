<form action="{{ route('store') }}" method="POST" id="RegisterForm">
    @csrf
    <h1 class="mb-3">Register</h1>
    
    <div class="form-outline mb-4">
      <input type="email" id="email" class="form-control" name="email"/>
      <label class="form-label" for="email">Email address</label>
    </div>

    <div class="form-outline mb-4">
        <input type="text" id="usern" class="form-control" name="name" />
        <label class="form-label" for="usern">Username</label>
    </div>
  
    <div class="form-outline mb-4">
      <input type="password" id="passw" class="form-control" name="password" />
      <label class="form-label" for="passw">Password</label>
    </div>
  
    <input type="submit" class="btn btn-primary btn-block mt-3 mb-4" value="Sign in">
  
    <div class="text-center">
      <p>Already a member? <a href="/login">Login</a></p>
    </div>
</form>