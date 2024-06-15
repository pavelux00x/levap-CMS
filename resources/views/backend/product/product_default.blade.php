@php use App\Http\Controllers\ProductController;use Illuminate\Support\Facades\Auth; $role = Auth::user()->role;@endphp

@extends('backend.layouts.app')
@section('PageTitle', 'Prodotti')
@section('content')
    <!--breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Prodotti</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route($role . '-profile')}}"><i class="bx
                    bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Elenco Prodotti</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb -->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="ms-auto" style="margin-bottom: 20px">
                    @if(Auth::user()->role == "Venditore")
                        <a href="add_product" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                            <i class="bx bxs-plus-square"></i>Aggiungi Nuovo Prodotto</a></div>
                @endif
                <table id="data_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Nome Prodotto</th>
                        <th>Codice Prodotto</th>
                        <th>Quantità Prodotto</th>
                        <th>Prezzo Prodotto</th>
                        <th>Stato Prodotto</th>
                        <th>Dettagli Prodotto</th>
                        <th>Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->product_code}}</td>
                            <td>{{$item->product_quantity}}</td>
                            <td>{{$item->product_price}}</td>
                            <td>
                                <form method="POST" action="{{route('Venditore-product-activate')}}" class="activate_form">
                                    @csrf
                                    <input name="product_id" value="{{$item->product_id}}" hidden/>
                                    <input name="current_status" value="{{$item->product_status}}" hidden/>
                                    <div class="form-check form-switch">
                                        @if($item->product_status)
                                            <input name="de_activate" class="btn btn-outline-danger" type="submit"
                                                   value="Disattiva" @if(Auth::user()->role == 'admin') disabled @endif>
                                        @else
                                            <input name="activate" class="btn btn-outline-success" type="submit"
                                                   value="Attiva" @if(Auth::user()->role == 'admin') disabled @endif>
                                        @endif

                                    </div>
                                </form>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm radius-30 px-4"
                                        data-bs-toggle="modal"
                                        data-bs-target="#exampleFullScreenModal-{{$item->product_id}}">Visualizza
                                    Dettagli
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleFullScreenModal-{{$item->product_id}}"
                                     tabindex="-1"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Dettagli Prodotto</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="card">
                                                <div class="modal-body">
                                                    <div class="row g-0">
                                                        <div class="col-md-4 border-end">
                                                            <img
                                                                src="{{url('uploads/images/product/' . $item->product_thumbnail)}}"
                                                                class="img-fluid" alt="...">
                                                            <div
                                                                class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">
                                                                @foreach(
                                                                ProductController::getProductImages($item->product_id )
                                                                 as $rowData)
                                                                    <div class="col">
                                                                        <img src="{{url('uploads/images/product/'
                                                                        .$rowData->product_image)}}" width="70"
                                                                             class="border
                                                                        rounded
                                                                         cursor-pointer" alt="">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h4 class="card-title">{{$item->product_name}}</h4>
                                                                <div class="d-flex gap-3 py-3">
                                                                    <div class="cursor-pointer">
                                                                        <i class='bx bxs-star text-warning'></i>
                                                                        <i class='bx bxs-star text-warning'></i>
                                                                        <i class='bx bxs-star text-warning'></i>
                                                                        <i class='bx bxs-star text-warning'></i>
                                                                        <i class='bx bxs-star text-secondary'></i>
                                                                    </div>
                                                                    <div>142 recensioni</div>
                                                                    <div class="text-success"><i
                                                                            class='bx bxs-cart-alt align-middle'></i>
                                                                        134 ordini
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <span class="price
                                                                    h4">${{$item->product_price}}</span>
                                                                </div>
                                                                <p class="card-text
                                                                fs-6">{!! $item->product_short_description !!}</p>
                                                                <dl class="row">
                                                                    <dt class="col-sm-3">Codice</dt>
                                                                    <dd class="col-sm-9">{{$item->product_code}}</dd>

                                                                    <dt class="col-sm-3">Colori</dt>
                                                                    <dd class="col-sm-9">
                                                                        <div
                                                                            class="color-indigators d-flex align-items-center gap-2">
                                                                            @foreach(ProductController::getProductSeparatedColors
                                                                        ($item->product_colors) as $color)
                                                                                <div class="color-indigator-item"
                                                                                     style="background-color:
                                                                             {{$color}}"></div>
                                                                            @endforeach
                                                                        </div>


                                                                    </dd>

                                                                    <dt class="col-sm-3">Quantità</dt>
                                                                    <dd class="col-sm-9">{{$item->product_quantity}}

                                                                    <dt class="col-sm-3">Tags</dt>
                                                                    <dd class="col-sm-9">
                                                                        @foreach(ProductController::getProductSeparatedTags
                                                                        ($item->product_tags) as $tag)
                                                                            <span
                                                                                class="badge bg-primary">{{$tag}}</span>
                                                                        @endforeach
                                                                    </dd>

                                                                    <dt class="col-sm-3">Stato</dt>
                                                                    <dd class="col-sm-9">
                                                                        @if($item->product_status)
                                                                            <span class="badge rounded-pill
                                                                            bg-success">Attivo</span>
                                                                        @else
                                                                            <span class="badge rounded-pill
                                                                            bg-danger">Disattivo</span>
                                                                        @endif
                                                                    </dd>
                                                                </dl>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Chiudi
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex order-actions">
                                    @if(Auth::user()->role == "Venditore")
                                        <a href="edit_product/{{$item->product_id}}"><i class='bx
                                       bxs-edit'></i>
                                        </a>
                                    @endif


                                    <a href="" class="ms-3" data-bs-toggle="modal"
                                       data-bs-target="#exampleDangerModal-{{$item->product_id}}">

                                        <i class='bx bxs-trash'></i>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleDangerModal-{{$item->product_id}}"
                                             tabindex="-1"
                                             style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content bg-danger">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-white">Sei sicuro?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Annulla
                                                        </button>
                                                        <button onclick="window.location.replace
                                                        ('remove_product/{{$item->product_id}}');"
                                                                class="btn btn-dark">Conferma
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>


                                </div>
                            </td>
                        </tr>

                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection
@section('plugins')
    <link href="{{asset('backend_assets')}}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
@endsection
@section('AjaxScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
@endsection

@section('js')
    <script src="{{asset('backend_assets')}}/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend_assets')}}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('form.activate_form').click('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: "{{route('Venditore-product-activate')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: response.msg,
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            window.location.reload();
                        });
                    },
                    error: function (response) {

                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            var table = $('#data_table').DataTable({
                lengthChange: true,
                buttons: ['excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#data_table_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script src="sweetalert2.all.min.js"></script>

    @section('js')
        <script type="text/javascript">
            $(document).ready(function () {
                $('#product_image').change(function (e) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#show_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
    @endsection
@endsection
