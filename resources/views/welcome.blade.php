@extends('layouts.app')

@section('title','Bienvenido a ChocoMercado')
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
    </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
<div class="container">
<div class="row">
    <div class="col-md-6">
        <h1 class="title">Bienvenido a ChocoMercado</h1>
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
            <form class="contact-form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre</label>
                            <input type="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Correo electronico</label>
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group label-floating">
                    <label class="control-label">Tu mensaje</label>
                    <textarea class="form-control" rows="4"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-4 col-md-offset-4 text-center">
                        <button class="btn btn-primary btn-raised">
                            ENVIAR CONSULTA
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
