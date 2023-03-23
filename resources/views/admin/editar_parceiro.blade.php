@extends('layouts.admin')

@section("title","Editar Parceiro")
@section("conteudo")

            @if(session('successCadastroUsuario'))
                <div class="alert alert-success">
                    {{session('successCadastroUsuario')}}
                </div>
            @endif
            @if(session('errorCadastroUsuario'))
                <div class="alert alert-danger">
                    {{session('errorCadastroUsuario')}}
                </div>
            @endif
       
        <!-- Single pro tab review Start-->
                    <div class="product-payment-inner-st">

                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Editar Parceiro</a></li>
                        </ul>

                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                    
                                                <form action={{route("updateParceiro", ['id'=>$parceiro->id]) }} method="post" class="dropzone dropzone-custom needsclick add-professors">
                                                    @csrf
                                                    @method("PUT")
                                                    
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="username">Nome:</label>
                                                                <input name="username" value="{{$parceiro->username}}" type="text" id="username" class="form-control" placeholder="Nome">
                                                                @error('username')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email:</label>
                                                                <input name="email" value="{{$parceiro->email}}" type="email" id="email" class="form-control" placeholder="Email">
                                                                @error('email')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Editar Parceiro</button>                                  
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="password">Password:</label>
                                                                <input name="password_confirmation" value={{$parceiro->senha}} @disabled(true) id="password" type="password" class="form-control" placeholder="Password">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password_confirmation">Confirmação da Password:</label>
                                                                <input name="password" value={{$parceiro->senha}} @disabled(true) type="password" id="password_confirmation" class="form-control" placeholder="Confirmação da Password">
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