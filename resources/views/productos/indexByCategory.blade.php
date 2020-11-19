@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias</div>

                <div class="panel-body">      
                    <ul>
                        @forelse ($categorias as $categoria)
                            <li class="nav-link"><a href="{{ route('productos.indexClientsByCategory', $categoria->id) }}"">{{ $categoria->nombre }} </a></li>
                            <hr>
                        @empty
                            <li>No existen categorías</li>                                
                        @endforelse
                    </ul>              

                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-1">
            <div class="row">
                @foreach ($productos as $producto)
                    <div class="col-md-4">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{ asset($producto->image) }}" alt="">
                                <div class="product-label">
                                    <span class="sale">-30%</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $producto->categoria->name }}</p>
                                <h3 class="product-name"><a href="#">{{ $producto->nombre }}</a></h3>
                                <h4 class="product-price">$ {{ $producto->precio}} 
                                    {{-- <del class="product-old-price">$990.00</del> --}}
                                </h4>
                                <div class="product-rating">
                                </div>
                                <div class="product-btns"> 
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar a carrito</button>
                            </div>
                        </div>
                    </div>

                @endforeach
                <div >
                    &nbsp;
                    &nbsp;
                    <hr>
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
