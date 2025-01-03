@extends('layouts.base')

@section('title', 'Sign Up')

@section('content')
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form method="POST" action="{{ route('accounts.store') }}" class="register-form" id="register-form">
                    @csrf
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="nama" id="name" placeholder="Your Name" required/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email" required/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="pass" placeholder="Password (min. 6)" required/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{ asset('img/register/signup-image.jpg') }}" alt="sign up image"></figure>
                <a href="{{ route('signin') }}" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('register-form').addEventListener('submit', function(event) {
    event.preventDefault(); // prevent default

    const agreeTerm = document.getElementById('agree-term');

    if (!agreeTerm.checked) {
        alert('You must agree to the terms of service before signing up.');
        return false;
    }

    // If checkbox is checked, submit the form
    this.submit();
});
</script>
@endsection
