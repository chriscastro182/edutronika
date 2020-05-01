<div class="header-search">
    <form method="POST">
        <div class="row">
            <div class="">
                <select class="input-select col-md-5">	
                    <option value="" selected>Selecciona categoria</option>	
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" >{{ $categoria->nombre }}</option>                        
                    @endforeach
                </select>
            </div>
            <div class="col-md-7">
                <input class="input" placeholder="Producto que buscas ">
                <button class="search-btn">Buscar</button>
            </div>
        </div>								
    </form>
</div>