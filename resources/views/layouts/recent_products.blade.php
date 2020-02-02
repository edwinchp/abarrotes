<div class="row">
    <div class="col-10 offset-1">
        <table class="table table-hover">

            <thead>
                <tr align="center">
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Contenido</th>
                    <th>Disponibles</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr align="center">
                    <td><a href="product/{{$product->id}}">{{$product->name}}</a></td>
                    <td>
                        <?php
                $price = $product->price;
                if($price == null){
                    echo "<i class='fas fa-exclamation-triangle' data-toggle='tooltip' data-placement='left' title='Precio no asignado'></i>";
                }else{
                    echo "$".$price;
                }
                ?>
                    </td>
                    <td>
                        @php
                        $content = $product->content;
                        $measure = $product->measure;

                        if($content ==null){
                        echo "<i class='fas fa-exclamation-triangle' data-toggle='tooltip' data-placement='right'
                            title='Contenido no asignado'></i>";
                        }else{
                        echo $content;
                        }

                        echo " ";

                        if($measure == null){
                        echo "<i class='fas fa-exclamation-triangle' data-toggle='tooltip' data-placement='right'
                            title='Unidad de medida no asignada'></i>";

                        }else{
                        echo $measure;
                        }

                        @endphp
                    </td>
                    <td>
                        @php
                        $available = rand(0, 15);
                        if($available <= 4){ echo $available." <i class='fas fa-exclamation-triangle'
                            data-toggle='tooltip' data-placement='right' title='Pocas unidades disponibles'></i>";
                            }else{
                            echo $available;
                            }
                            @endphp
                    </td>
                    <td><a href="product/{{$product->id}}" class="btn btn-primary">
                            Vender <i class="fas fa-cash-register"></i></a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-4 offset-1">
        {{$products->links()}}
    </div>
</div>
@include('layouts.success_alert')
