@extends('layouts.app')

@section('title','Bienvenido a' . config('app.name'))
@section('body-class','landing-page')

@section('styles')
    <style>
        .team .row .col-md-4{
            margin-bottom: 3em;
        }
        .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
        }
        .row > [class*="col-*"] {
            display: flex;
            flex-direction: column;
        }

        .tt-query {
          -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
             -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
          color: #999
        }

        .tt-menu {    /* used to be tt-dropdown-menu in older versions */
          width: 222px;
          margin-top: 4px;
          padding: 4px 0;
          background-color: #fff;
          border: 1px solid #ccc;
          border: 1px solid rgba(0, 0, 0, 0.2);
          -webkit-border-radius: 4px;
             -moz-border-radius: 4px;
                  border-radius: 4px;
          -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
             -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                  box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        .tt-suggestion {
          padding: 3px 20px;
          line-height: 24px;
        }

        .tt-suggestion.tt-cursor,.tt-suggestion:hover {
          color: #fff;
          background-color: #0097cf;

        }

        .tt-suggestion p {
          margin: 0;
        }
    </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
<div class="container">
<div class="row">
    <div class="col-md-6">
        <h1 class="title">Bienvenido a {{config('app.name')}}</h1>
        <h4>Realiza pedidos en línea y te contactaremos para coordinar la entrega.</h4>
        <br>
        <a href="#" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> ¿Cómo funciona?
        </a>
    </div>
</div>
</div>
</div>

<div class="main main-raised">
<div class="container">
<div class="section text-center section-landing">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="title">¿Por qué ChocoMercado?</h2>
            <h5 class="description">Puedes revisar nuestra relación completa de productos, comprar precios y realizar tus pedidos cuando estes seguro.</h5>
        </div>
    </div>

    <div class="features">
        <div class="row">
            <div class="col-md-4">
                <div class="info">
                    <div class="icon icon-primary">
                        <i class="material-icons">chat</i>
                    </div>
                    <h4 class="info-title">Atendemos tus dudas</h4>
                    <p>Atendemos rápidamente cualquier consulta que tengas via chat. No estás solo sino que siempre estamos atento a tus inquietudes.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info">
                    <div class="icon icon-success">
                        <i class="material-icons">verified_user</i>
                    </div>
                    <h4 class="info-title">Pago seguro</h4>
                    <p>Todo pedido que realices sera confirmado a travez de una llamda. Si no confias en los pagos en linea puedes pagar contra entrega el valor acordado.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info">
                    <div class="icon icon-danger">
                        <i class="material-icons">fingerprint</i>
                    </div>
                    <h4 class="info-title">Información privada</h4>
                    <p>Los pedidos que realices sólo los conoceras tú a travéz de de usurario, naie mas tiene acceso a esta información.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section text-center">
    <h2 class="title">Viaitas nuestas categorías</h2>
        <form action="{{route('products.search')}}" method="get" class="form-inline">
            <input type="text" placeholder="¿Que producto buscas?" class="form-control" name="query" id="search">
            <button class="btn btn-primary btn-just-icon" type="submit">
                <i class="material-icons">search</i>
            </button>
        </form>
    <div class="team">
        <div class="row">
        @foreach($categories as $category)
            <div class="col-md-4">
                <div class="team-player">
                    <img src="{{ $category->featured_image_url}}" alt="Thumbnail Image" class="img-raised img-circle">
                    <h4 class="title">
                        <a href="{{route('category.show',['id' => $category->id])}}">{{$category->name}} </a>
                        <br />
                        <small class="text-muted">{{$category->category_name}}</small>
                    </h4>
                    <p class="description">{{ $category->description}}<a href="#">links</a> for people to be able to follow them outside the site.</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>

</div>


<div class="section landing-section">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center title">¡Aún no te has registrado</h2>
            <h4 class="text-center description">Registrate ingresando tus datos b'asicos y podrás realizar tus pedidos a travéz de nuesto carrito de compras. Si aun no tedecides, de todas formas, con tu cuenta de usuraio podras hacer todas tus consultas sin compromio.</h4>
            <form class="contact-form" method="get" action="{{ url('/register') }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Correo electronico</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4 col-md-offset-4 text-center">
                        <button class="btn btn-primary btn-raised">
                            INICIAR REGISTRO
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>

</div>

@include('includes.footer')
@endsection

@section('scripts')
    <script src="{{asset('/js/typeahead.bundle.min.js')}}"></script>
    <script>
        // constructs the suggestion engine
        var products = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.whitespace,
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          // `states` is an array of state names defined in "The Basics"
          prefetch: '{{route("products.json")}}'
        });

        $(function(){
            $('#search').typeahead({
                hint:true,
                highlight:true,
                minLength:1
            },{
                name:'products',
                source: products
            })
        });
    </script>
@endsection