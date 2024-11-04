@extends('layout.main')


<div class="row justify-content-center">
  <div class="col-lg-6">

    @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
      </div>
    @endif  

    <img src="/img/logosmk.png " alt="logo" style="display: block; margin: auto; height:110px;">
  <div class="first">
    <h1 class="text-center" style="margin-top:1px;"> e-counseling</h1>
  </div>
    
    <main class="form-signin w-100 m-auto">
      <form action="/login" method="post">
        @csrf
        <div class="form-floating mb-2">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}" >
            <label for="email">email</label>
            @error('email')
              <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="password">password</label>

        </div>
        <button class="button">login</button>
      </form>                     
    </main>
  </div>
</div>

