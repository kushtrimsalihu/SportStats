@extends('frontend.layouts.landing_nav')

@section('title', __('Login'))

@section('content')
<style> body {
    font-family: 'Poppins', sans-serif;
}
h4 {
    color: #a1a5b7;
}





       
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

       .col-lg-6 {
           left: 0rem;
          
       }
       .lefti{
            // padding-top: 4rem;
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
           background-color: #19B674;
           height: 80vh;        
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
         top: 60%;
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
           margin-left:1rem;
       }


       @media (max-width: 400px) {
       .green{
           height: 56vh;
       }
       a.btnForgot{
           display: flex;
        justify-content: center;
       }
       button.btn1{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
       }
    }
    a {
    color:#19B674;
    text-decoration: none;

}

a:hover {
    color: rgb(110, 221, 96);
}
       //responsive
@media (max-width: 992px) {
   
}
@media (max-width: 1199px) {

}

         </style>

    {{-- New Form Login --}}
    <x-frontend.card>
        <x-slot name="body">
            <x-forms.post :action="route('frontend.auth.login')">
                <section class="Form">
                    <div class="container">
                        <div class="row ">
                         
                            <div class="col-lg-6 col-md-6 col-sm-12 ">
                                   <div class="green">
                            <div class="titulli">
                            <p class="welcome">Welcome to</p>
                                  <p class="spt"><strong>Sportstats</strong>
                              </div>
                                <img src="{{ URL::asset('/images/foo5.png') }}" class="login_photo img-fluid" alt="Photo 1">
                            </div>
                          </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h1 class="font-weight-bold py-3"><strong>SportStats</strong></h1>
                                <h4>New here?<a href="{{ route('frontend.auth.register') }}">Create Account</a></h4>
                                <br>
                                {{-- <form> --}}


                                    <p><strong>Email</strong></p>
                                    <input type="email" name="email" id="email" class="form-control my-3 p-3"
                                        placeholder="{{ __('E-mail Adress') }}" value="{{ old('email') }}" maxlength="255"
                                        required autofocus autocomplete="email">



                                    <p> <strong>Password</strong></p>
                                    <input type="password" name="password" id="password" class="form-control my-3 p-3"
                                        placeholder="{{ __('Password') }}" maxlength="100" required
                                        autocomplete="current-password" />

                                    <button class="btn1 auth-form-btn " type="submit">@lang('Login')</button>

                                    

                                    {{--  --}}


                                    <x-utils.link :href="route('frontend.auth.password.request')" class="remove_shad btn btn-link" :text="__('Forgot Your Password?')" />
                                   
                                    </div>
                            </div>
                        </div>
                    {{-- </div> --}}
                    {{-- </div> --}}

                    {{-- </div> --}}

                </section>

            </x-forms.post>
        </x-slot>
    </x-frontend.card>


    {{-- End form of Login --}}

    <!--container-->
@endsection
