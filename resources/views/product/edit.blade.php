@extends('layouts.app')
@section('product')
<div class="container pt-3">
  <div class="row product-card">
    <div class="col-10 offset-1">
      <h1>Editar producto</h1>
    </div>
    <div class="col-5 offset-1">
        <form method="post" action="{{route('product.update', $product->id)}}">
          @csrf
          @method('PATCH')
        <div class="form-group">
          <label for="">Nombre</label>
        <input type="text" class="form-control" value= "{{$product->name}}" name="name">
        </div>

              <div class="row">
                <div class="col-5">
                  <div class="form-group">
                        <label for="">Contenido</label>
                        <input type="text" class="form-control" value="{{$product->content}}" name="content">
                      </div>
                </div>

                 <div class="col-5">
                      <div class="form-group">
                        <label for="">Unidad de medida</label>
                        <select name="measure" id="" class="form-control">
                          <option value="{{$product->measure}}" selected>{{$product->measure}}</option>
                          <option value="G">G</option>
                          <option value="KG">KG</option>
                          <option value="LT">LT</option>
                          <option value="ML">ML</option>
                          <option value="PZ">PZ</option>
                          <option value="GB">GB</option>
                        </select>
                      </div>
                </div>
              </div>


<h5>Precios</h5>
        <div class="row">
          <div class="col-5">
            <div class="form-group">
              <label for="">Público</label>
              <input type="text" class="form-control" name="price" value="{{$product->price}}">
            </div>
          </div>
          <div class="col-5">
            <div class="form-group">
              <label for="">Oferta</label>
              <input type="text" class="form-control" disabled="">
            </div>
          </div>
          <div class="col-1 pt-4">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="customSwitch1">
              <label for="customSwitch1" class="custom-control-label"></label>
            </div>
          </div>
        </div> <!--END PRECIOS-->

<div class="form-group">
          <label for="">Descripción</label>
          <textarea id="" rows="5" class="form-control" name="description">{{$product->description}}</textarea>
        </div>

         <div class="row">
        <div class="col-12">
          <h5>Categorías</h5>
        </div>
        <div class="col-12">
          <span class="badge badge-primary">Abarrotes</span>
          <span class="badge badge-primary">Bebidas</span>
        </div>
      </div>
          <div class="row pt-3">
              <div class="col-12">
                    <button class="btn btn-primary" type="submit">Guardar</button>
              <a class="btn btn-secondary" href="{{route('product.show', $product->id)}}">Cancelar</a>
              </div>
          </div>
      </div>



      <div class="col-5 product-right">
        <div class="product-image">
            <label for="">Agregar imagen</label>
            <input type="file" class="form-control-file">
        </div>

        <div class="justify-content-left pt-5">
            <div class="form-group">
                <label for="">Código de barras</label>
            <input type="text" class="form-control" name="barcode" value="{{$product->barcode}}">
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
              <h3>Productos (3)</h3>
            </div>
            <div class="col-2" align="right">
              <button class="btn btn-success" type="button" data-toggle="modal" data-target="#add-modal">Añadir nuevos</button>
            </div>
          </div>

          <table class="table table-hover">
            <thead>
              <tr align="center">
                <th align="left">Precio de adquisición</th>
                <th>Fecha</th>
                <th>Actualizado por</th>
                <th>Estado</th>
                <th >Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr align="center">
                <td >$23</td>
                <td>05/Oct/2019 12:23pm</td>
                <td>Celia Pineiro</td>
                <td>Disponible</td>
                <td><button class="btn btn-primary">Editar</button>
                <button class="btn btn-danger">Borrar</button></td>
              </tr>

              <tr align="center">
                <td>$23</td>
                <td>05/Oct/2019 12:23pm</td>
                <td>Celia Pineiro</td>
                <td>Defectuoso</td>
                <td><button class="btn btn-primary" disabled>Editar</button>
                <button class="btn btn-danger" disabled>Borrar</button></td>
              </tr>

              <tr align="center">
                <td>$23</td>
                <td>05/Oct/2019 12:23pm</td>
                <td>Juan Chi</td>
                <td>Vendido</td>
                <td><button class="btn btn-primary">Editar</button>
                <button class="btn btn-danger">Borrar</button></td>
              </tr>
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
        <button class="btn btn-success" >Añadir</button>
      </div>
    </div>
  </div>
</div>

@endsection
