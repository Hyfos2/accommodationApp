<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Laravel</title>

   <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
    <style>
        .col-sm-4{
            margin-bottom:20px;
        }
        .btn-primary {
            color: #007bff;
            background-color: #fff;
            border-color: #007bff;

        }
        body{
            background-color: #f5f8fa;
        }
        .btn:not(:disabled):not(.disabled) {
             cursor: pointer;
            border-color: #007bff;
        }
        .card
        {
            width:100%;
        }
        .card-img-top{

            width:100% ;
        }
        .form-control
        {
            margin-bottom: -15px;
        }

        @media(max-width:576px){
            .container{
                margin-top:500px;
            }
            #formId{
                 position: fixed; z-index:1030;
                 right:0;
                 left:0;
                 margin-top: -45px;

            }
            .form-control{
                margin-bottom: -33px;
            }
            #searchBtn{
                margin-top:-9px;
            }
            .row{
                margin-top:180px;
            }
            #main{
                            height:50px;
            }

        }



    </style>


</head>
<body>
<nav class="navbar navbar-light" style="background-color: #7FF9BA; top: 0;" id="main">
    @guest
        <ul class="navbar-nav">
                <a class="btn btn-bd-download d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="{{ route('login') }}">Sign in</a>
                <a class="btn btn-bd-download d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="{{ route('register') }}">Sign up</a>
        </ul>
    @endguest
    <a class="btn btn-bd-download d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="">About Us</a>
</nav>

{{--<div class="secondHeader">--}}


    {{--<div  id="formId">--}}

        {{--<div  class="col-md-12" style="height: 70px; margin-top: 70px;">--}}

            {{--<form>--}}
                {{--<div class="form-row" >--}}
                    {{--<div class="form-group col-md-6">--}}
                        {{--<label></label>--}}
                        {{--<input type="text" class="form-control form-control-sm" id="inputEmail4" placeholder="What are you searching for?">--}}
                    {{--</div>--}}
                    {{--<div class="form-group col-md-4">--}}
                        {{--<label ></label>--}}
                        {{--<input type="text" class="form-control form-control-sm" id="inputPassword4" placeholder="Location">--}}
                    {{--</div>--}}
                    {{--<div class="form-group col-md-2" id="searchBtn">--}}
                        {{--<label ></label>--}}
                        {{--<button type="submit" class="form-control form-control-sm btn btn-primary" style=" font-size: 0.7rem;">Search</button>--}}
                        {{--<hr>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</form>--}}

        {{--</div>--}}

    {{--</div>--}}
{{--</div>--}}


<div class="container" style="margin-top:150px;">

    
    <div class="col-md-12" style="margin-top:10px;">


        <div class="row">

            <div class="col-sm-4">
                <div class="card">
                    {{--<img class="profile-pic animated"src="{{asset('images/wedding.webp')}}" alt="HowMine">--}}
                    <img class="card-img-top" src="{{asset('images/wedding.webp')}}" alt="Card image cap">
                    <div class="card-body">


                        <div class="card-block">
                            <h6 class="card-title">$70 per room per head</h6>
                            <a href="#" class="card-link">more info</a>

                        </div>
                    </div>


                </div>

            </div>

            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('images/image.webp')}}" alt="Card image cap">
                    <div class="card-body">


                        <div class="card-block">
                            <h6 class="card-title">$65 per room per head</h6>
                            <a href="#" class="card-link">more info</a>
                        </div>
                    </div>


                </div>

            </div>

            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('images/image.webp')}}" alt="Card image cap">
                    <div class="card-body">

                        <div class="card-block">
                            <h6 class="card-title">$50 per room per head</h6>
                            <a href="#" class="card-link">more info</a>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('images/image.webp')}}" alt="Card image cap">
                    <div class="card-body">


                        <div class="card-block">
                            <h3 class="card-title">Special title treatment</h3>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>


                </div>

            </div>

            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('images/image.webp')}}" alt="Card image cap">
                    <div class="card-body">


                        <div class="card-block">
                            <h3 class="card-title">Special title treatment</h3>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>


                </div>

            </div>
            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('images/image.webp')}}" alt="Card image cap">
                    <div class="card-body">

                        <div class="card-block">
                            <h3 class="card-title">Special title treatment</h3>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('images/image.webp')}}" alt="Card image cap">
                    <div class="card-body">


                        <div class="card-block">
                            <h3 class="card-title">Special title treatment</h3>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>


                </div>

            </div>
            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('images/image.webp')}}" alt="Card image cap">
                    <div class="card-body">


                        <div class="card-block">
                            <h3 class="card-title">Special title treatment</h3>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>


                </div>

            </div>
            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('images/image.webp')}}" alt="Card image cap">
                    <div class="card-body">

                        <div class="card-block">
                            <h3 class="card-title">Special title treatment</h3>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>



 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>