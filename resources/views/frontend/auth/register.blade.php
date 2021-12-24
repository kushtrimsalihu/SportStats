@extends('frontend.layouts.landing_nav')

@section('title', __('Register'))

@section('content')
<style>
      .btn1 {
    font-family: 'Poppins', sans-serif;
    border: none;
    outline: none;
    height: 50px;
    width: 40%;
    background-color: #19B674;
    color: white;
    border-radius: 4px;
    font-weight: bold;

}

.btn1:hover {
    background: rgb(110, 221, 96);
    border: 2px solid;
    color: white;
}

h1 {
    font-family: 'Poppins', sans-serif;
}

h4 {
    color: #a1a5b7;
}


//responsive

@media (max-width: 1199px) {
.card-body{
    height: 99.5vh;
}
.login_photo{
    height: 10%;
    margin-top: 2rem;
}
}
@media (min-width: 1199px) {
.card-body{
    height: 104vh;
}
}
@media (max-width: 992px) {
    .card-body {
    height: 109vh;
    }
    .green{
        height:103vh !important
    }
}

@media(max-width: 330px){
    .lefti{
        left:0 !important;
    }
    .green{
        height: 62vh !important;
    }
    .card-body {
    height: 186vh;
}
}
  
.col-lg-6 {
    left: 0rem;
    /* padding-top: 2rem; */
}
.lefti{
    /* padding-top: 4rem; */
    left: 22px;
}
.links{
    color:white;
    text-decoration:none;
}
.links:hover{
    color: white;
    text-decoration:none;
}
.green{
    background-color:#19B674;
    height:76vh;
    
 
}
a {
    color:#19B674;
    text-decoration: none;

}

a:hover {
    color: rgb(110, 221, 96);
}
 h3 {
    font-size: 34px;

    margin-left: 10rem;

pading:2rem;
    margin-top: 3rem;
    color: white;
}
.sport{
    color: black;
    font-size: 60px;
    margin-left: 7rem;
}
.img-fluid {
    /* postion:absolute;
    margin-top: 17rem;
    margin-left: 6rem;
 
    max-width: 67%;
    height: 53%;
    left : 45% */
    position: absolute;
    max-width: 67%;
    height: 53%;
  top: 56%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.butoni{
    margin-left: 7px;
}

.form-check-input{
    margin-left: 15.4rem;
    letter-spacin: 1rem;
}
.titulli{
   
    position: absolute;
   top: 20%; 
  left: 50%;
  transform: translate(-50%, -50%);
}
.spt{
    
    postion: absolute;
    color: black;
    font-size: 36px;
    pading: 2px;
    
}
.welcome{
    color: white;
    font-size: 25px;
    margin-left: 1rem;
}
  </style>
    {{-- New Form Register --}}
    <x-frontend.card>
        <x-slot name="body">
            <x-forms.post :action="route('frontend.auth.register')">
                <section class="Form">
                    <div class="container">
                        <div class="row ">
                            
                             <div class="col-lg-6 col-md-6 col-sm-12">
                             <div class="green"> 
                              <div class="titulli">
                              <p class="welcome">Welcome to</p>
                                  <p class="spt"><strong>Sportstats</strong>
                                  
                              </div>
                                
                                <img src="{{ URL::asset('/images/foo5.png') }}" class="login_photo img-fluid" alt="Photo 1">
</div>
                            </div> 
                            <div class="col-lg-6 col-md-6 col-sm-12 lefti">
                                <h1 class="font-weight-bold py-3"><strong>SportStats</strong></h1>
                                <h4>Enter your details to create your account</h4>
                                
                                <form>
                                <p><strong>Name</strong></p>
                                <input type="text" name="name" id="name" class="form-control my-3 p-3"
                                placeholder="{{__('Name') }}"
                                maxlength="255" required autocomplete="name"/>
                                <p><strong>Surname</strong></p>
                                <input type="text" name="surname" id="surname" class="form-control my-3 p-3"
                                placeholder="{{__('Surname') }}"
                                maxlength="255" required autocomplete="name"/>

                                    <p><strong>Email</strong></p>
                                    <input type="email" name="email" id="email" class="form-control my-3 p-3"
                                        placeholder="{{ __('E-mail Adress') }}" value="{{ old('email') }}" maxlength="255"
                                        required autofocus autocomplete="email">



                                    <p> <strong>Password</strong></p>
                                    <input type="password" name="password" id="password" class="form-control my-3 p-3"
                                        placeholder="{{ __('Password') }}" maxlength="100" required
                                        autocomplete="current-password" />
                                        <p> <strong>Confirm Password</strong></p>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control my-3 p-3"
                                placeholder="{{__('Password Confirmation') }}" maxlength="100" required
                                autocomplete="new-password"/>


                              
                                <input type="checkbox" name="terms" value="1" id="terms"
                                                    class="form-check-input" required>
                                                    
                                             @lang('I agree to the') <a class="term" href="{{ route('frontend.pages.terms') }}"
                                                    target="_blank">@lang('Terms & Conditions')</a>
                               

                                    @if (config('boilerplate.access.captcha.registration'))
                                            <div class="row">
                                                <div class="col">
                                                    @captcha
                                                    <input type="hidden" name="captcha_status" value="true" />
                                                </div>
                                                <!--col-->
                                            </div>
                                            <!--row-->
                                        @endif
                        <div class="form-row">
                            <div class="col-lg-7">
                               
                            <button class="btn1 mt-0 mb-4 auth-form-btn " type="submit">@lang('Register')</button>
                            <a class="links"  <button class="btn1 mt-0 mb-4 butoni" type="button"> <a class="links" href="{{ route('frontend.auth.login') }}">@lang('Cancel')</a></button>
                            </div>
                        </div>
                                 
                                    </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    </div>

                </section>

            </x-forms.post>
        </x-slot>
    </x-frontend.card>
    {{-- End of Form Register --}}

    <!--container-->
@endsection
