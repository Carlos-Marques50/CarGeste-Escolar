@extends('layouts.admin')

@section("title","Cadastrar Parceiro")

@section("conteudo")

            @if(session('successCadastroParceiro'))
                <div class="alert alert-success">
                    {{session('successCadastroParceiro')}}
                </div>
            @endif
            @if(session('errorCadastroParceiro'))
                <div class="alert alert-danger">
                    {{session('errorCadastroParceiro')}}
                </div>
            @endif
       
        <!-- Single pro tab review Start-->
                    <div class="product-payment-inner-st">

                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Cadastrar Parceiro</a></li>
                        </ul>

                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                    
                                                <form action={{route("storeParceiro")}} method="post" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                    @csrf
                                                    <div class="row">

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <input name="username" value="{{old("username")}}" autofocus type="text" class="form-control" placeholder="Nome do Usuario">
                                                                @error('username')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="email" value="{{old("email")}}" type="email" class="form-control" placeholder="Email">
                                                                @error('email')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Cadastrar Parceiro</button>                                  
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <input name="password" value="{{old("password")}}" type="password" class="form-control" placeholder="Password">
                                                                @error('password')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="password_confirmation" value="{{old("password_confirmation")}}" type="password" class="form-control" placeholder="Confirmação da Password">
                                                                @error('password_confirmation')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


   
@endsection