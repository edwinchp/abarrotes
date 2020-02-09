@extends('layouts.app')
@section('product')
<div class="container pt-3">
    <div class="row product-card">
        <div class="col-10 offset-1">
            <h1>{{$product->name}}</h1>

        </div>
        <div class="col-5 offset-1">
            <form method="POST" action="{{route('product.store')}}">
                @csrf
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="">Contenido</label>
                            <input type="text" class="form-control" value="{{$product->content}}" name="content"
                                disabled>
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="form-group">
                            <label for="">Unidad de medida</label>
                            <input type="text" class="form-control" value="{{$product->measure}}" disabled>
                        </div>
                    </div>
                </div>


                <h5>Precios</h5>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="">Público</label>
                            <input type="text" class="form-control" name="price" value="${{$product->price}}" disabled>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="">Oferta</label>
                            <input type="text" class="form-control" disabled="">
                        </div>
                    </div>
                </div>
                <!--END PRECIOS-->


                <div class="form-group">
                    <label for="">Descripción</label>
                    <textarea id="" rows="5" class="form-control" name="description" disabled>{{$product->description}}</textarea>
                </div>

                <div class="row">
                    <div class="col-12 pt-3">
                        <h5>Categorías</h5>
                    </div>
                    <div class="col-12">
                        <span class="badge badge-primary">Abarrotes</span>
                        <span class="badge badge-primary">Bebidas</span>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-12">
                    </div>
                </div>
        </div>



        <div class="col-5 product-right">
            <div class="product-image">
                <img src="{{URL::asset('pictures/product/default.png')}}" alt="">
            </div>

            <div class="product-barcode">
                <div class="d-flex justify-content-center">
                @php
            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            $barcode = $product->barcode;
            if($barcode != null){
                echo $generator->getBarcode($barcode, $generator::TYPE_CODE_128);
            }else{
                echo 'Sin código de barras';
            }
            @endphp

            </div>
        </div>
        <div style="text-align: center;">
            <p>{{$product->barcode}}</p>
        </div>
        </div>


        <div class="col-1">
            <div class="dropdown">
                <a href="" class="btn btn-secondary dropdown-toggle" role="button" data-toggle="dropdown">
                        <i class="fas fa-cog"></i>
                </a>

                <div class="dropdown-menu">
                    <a href="{{route('product.edit', $product->id)}}" class="dropdown-item">Editar</a>
                    <a href="" class="dropdown-item" type="button" data-toggle="modal" data-target="#delete-modal">Eliminar</a>
                    <a href="" class="dropdown-item disabled">Copiar</a>
                </div>

            </div>
        </div>

        </form>


    </div>
    <!--------------------------END PRODUCT FORM------------------------>



    <div class="row pt-5">
        <div class="col-10 offset-1">
            <div class="row pb-3">
                <div class="col-10">
                    <h3>Productos ({{count($details)}})</h3>
                </div>
                <div class="col-2" align="right">
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#add-modal">Añadir
                        nuevos</button>
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr align="center">
                        <th align="left">Precio de adquisición</th>
                        <th>Fecha</th>
                        <th>Creado por</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($details as $detail)

                    <tr align="center">
                        <td>${{$detail->cost_price}}</td>
                        <td>{{$detail->created_at}}</td>
                        <td>{{$detail->created_by}}</td>
                        <td>{{$detail->status}}</td>
                        <td><button class="btn btn-primary">Editar</button>
                            <button class="btn btn-danger">Borrar</button></td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>

<!--MODAL-->
<div class="modal fade" id="add-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Añadir más productos</h5>
                <button class="close" type="button" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <div class="form-group">
                                <label for="">Precio de adquisición</label>
                                <input focus type="text" class="form-control" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="">Cantidad</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Estado</label>
                                <select class="form-control">
                                    <option value="0">(Seleccionar)</option>
                                    <option value="1">Disponible</option>
                                    <option value="2">Vendido</option>
                                    <option value="3">Defectuoso</option>
                                    <option value="4">Caducado</option>
                                    <option value="4">Perdido</option>
                                    <option value="4">Otro</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-success">Añadir</button>
            </div>
        </div>
    </div>

</div>



<div class="modal fade" id="delete-modal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title">Eliminar: {{$product->name}}</h5>
              <button class="close" type="button" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form action="">
                  <span>¿Estás seguro? Esta acción no podrá deshacerse.</span>
              </form>
            </div>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <form action="{{route('product.destroy', $product->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>

          </form>
            </div>
          </div>
        </div>
      </div>







@include('layouts.success_alert')

@endsection
