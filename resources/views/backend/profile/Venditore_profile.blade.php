@php
    use App\MyHelpers;use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    $data = DB::table('get_vendor_data')->where('id', Auth::id())->get()[0];
    $status = Auth::user()->status;
@endphp

@extends('backend.layouts.app')
@section('PageTitle', 'Profile')
@section('content')

    @if(!$status)
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Il tuo account non è stato ancora attivato</h6>
                    <div class="text-white">Aspetta che l'admin del sito attivi il tuo account</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <!--breadcrumb -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .floating-chat {
  cursor: pointer;
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  color: white;
  position: fixed;
  bottom: 100px;
  left: 300px;
  width: 56px;
  height: 56px;
  -webkit-transform: translateY(70px);
  transform: translateY(70px);
  -webkit-transition: all 250ms ease-out;
  transition: all 250ms ease-out;
  border-radius: 50%;
  opacity: 0;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background: #d43a3a;
  z-index: 2;
        
  &.enter {
    -webkit-transform: translateY(0);
    transform: translateY(0);
    opacity: 0.6;
    border-radius: 50%;
    box-shadow: 0 2.1px 1.3px rgba(0, 0, 0, 0.044),
      0 5.9px 4.2px rgba(0, 0, 0, 0.054), 0 12.6px 9.5px rgba(0, 0, 0, 0.061),
      0 25px 20px rgba(0, 0, 0, 0.1);
  }

  &.enter:hover {
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    opacity: 1;
  }

  &.expand {
    width: 328px;
    max-height: 434px;
    height: 434px;
    border-radius: 5px;
    cursor: auto;
    opacity: 1;
  }

  &:focus {
    outline: 0;
  }

  button {
    background: transparent;
    border: 0;
    text-transform: uppercase;
    border-radius: 3px;
    cursor: pointer;
  }

  .chat {
    display: -webkit-box;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    position: absolute;
    opacity: 0;
    width: 1px;
    height: 1px;
    border-radius: 50%;
    -webkit-transition: all 250ms ease-out;
    transition: all 250ms ease-out;
    margin: auto;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #fff;
    border-top: 1px solid #e3e6eb;
    border-right: 1px solid #e3e6eb;
    overflow-y: auto;

    &.enter {
      opacity: 1;
      border-radius: 0;
      width: auto;
      height: auto;
    }

    .header {
      flex-shrink: 0;
      display: -webkit-box;
      display: flex;
      align-items: center;
      background-color: #fff;
      border-radius: 20px 20px 0 0;
      padding: 15px;
      border-bottom: 1px solid #e3e6eb;

      i {
        font-size: 16px;
        color: #222;
      }

      button {
        flex-shrink: 0;
      }
    }

    .title {
      -webkit-box-flex: 1;
      flex-grow: 1;
      flex-shrink: 1;
      padding: 0 5px;
      color: #000;
      font-size: 12px;
    }

    .messages {
      padding: 10px;
      margin: 0;
      list-style: none;
      overflow-y: scroll;
      overflow-x: hidden;
      -webkit-box-flex: 1;
      flex-grow: 1;
      background: #f7f9fb;

      &::-webkit-scrollbar {
        width: 5px;
        color: #222;
      }

      &::-webkit-scrollbar-track {
        border-radius: 5px;
        background-color: rgba(25, 147, 147, 0.1);
      }

      &::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background-color: rgba(25, 147, 147, 0.2);
      }

      li {
        position: relative;
        clear: both;
        display: inline-block;
        padding: 14px;
        margin: 0 0 20px 0;
        border-radius: 10px;
        background-color: #e3e6eb;
        word-wrap: break-word;
        max-width: 81%;

        &:after {
          position: absolute;
          top: 10px;
          content: "";
          width: 0;
          height: 0;
          border-top: 10px solid rgb(227, 230, 235);
        }

        &.other {
          animation: show-chat-odd 0.15s 1 ease-in;
          -moz-animation: show-chat-odd 0.15s 1 ease-in;
          -webkit-animation: show-chat-odd 0.15s 1 ease-in;
          float: right;
          margin-right: 45px;
          color: #000;

          span {
            position: absolute;
            right: -45px;
            width: 25px;
            height: 25px;
            border-radius: 25px;
            background: #fff;
            text-align: center;
            line-height: 25px;
          }

          &:after {
            border-right: 10px solid transparent;
            right: -10px;
          }
        }

        &.self {
          animation: show-chat-even 0.15s 1 ease-in;
          -moz-animation: show-chat-even 0.15s 1 ease-in;
          -webkit-animation: show-chat-even 0.15s 1 ease-in;
          float: left;
          margin-left: 45px;
          color: #000;

          span {
            position: absolute;
            left: -45px;
            width: 25px;
            height: 25px;
            border-radius: 25px;
            background: #fff;
            text-align: center;
            line-height: 25px;
          }

          &:after {
            border-left: 10px solid transparent;
            left: -10px;
          }

          @keyframes show-chat-even {
            0% {
              margin-left: -480px;
            }

            100% {
              margin-left: 0;
            }
          }

          @-webkit-keyframes show-chat-even {
            0% {
              margin-left: -480px;
            }

            100% {
              margin-left: 0;
            }
          }

          @keyframes show-chat-odd {
            0% {
              margin-right: -480px;
            }

            100% {
              margin-right: 0;
            }
          }

          @-webkit-keyframes show-chat-odd {
            0% {
              margin-right: -480px;
            }

            100% {
              margin-right: 0;
            }
          }
        }
      }
    }

    .chat_list {
      flex-shrink: 0;
      display: -webkit-box;
      display: flex;
      align-items: center;
      background-color: #fff;
      border-radius: 20px 20px 0 0;
      padding: 15px;
      border-bottom: 1px solid #e3e6eb;

      .title {
        -webkit-box-flex: 1;
        flex-grow: 1;
        flex-shrink: 1;
        padding: 0 5px;
        color: #000;
        font-size: 12px;
      }
      i {
        font-size: 16px;
        color: #222;
      }

      button {
        flex-shrink: 0;
      }
    }

    .footer {
      flex-shrink: 0;
      display: -webkit-box;
      display: flex;
      padding: 10px;
      max-height: 90px;
      background: #fff;

      .text-box {
        border-radius: 3px;
        min-height: 100%;
        width: 100%;
        margin-right: 5px;
        color: #000;
        overflow-y: auto;
        padding: 2px 5px;

        &::-webkit-scrollbar {
          width: 5px;
        }

        &::-webkit-scrollbar-track {
          border-radius: 5px;
          background-color: rgba(25, 147, 147, 0.1);
        }

        &::-webkit-scrollbar-thumb {
          border-radius: 5px;
          background-color: rgba(25, 147, 147, 0.2);
        }
      }

      [contentEditable="true"]:empty:not(:focus):before {
        content: attr(data-text);
      }

      #sendMessage {
        background-color: #fff;
        margin-left: auto;
        width: 65px;
        color: #000;
        font-weight: bold;
        border-left: 2px solid #f7f9fb;
        border-radius: 0 0 20px 0;
      }
    }
  }

  .contact {
    display: flex;
    position: absolute;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    width: 1px;
    height: 1px;
    background: #fff;
    left: -45px;
    border-right: 1px solid #e3e6eb;
    overflow-y: scroll;
    overflow-x: hidden;
    opacity: 0;
    border-radius: 5px 0px 0px 5px;
    box-shadow: 0 12px 28px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.1),
      inset 1px 1px 0 rgba(255, 255, 255, 0.5);

    &.expand {
      width: 45px !important;
      height: 434px !important;
      opacity: 1 !important;
    }

    ul {
      margin: 0;
      padding: 0;
      list-style-type: none;

      li {
        color: #000;
        min-height: 37px;
        background: #f5f5f5;
        margin: 15px 3px 3px 3px;
        cursor: pointer;
        text-align: center;
        line-height: 35px;
        border-radius: 20px;
        position: relative;
      }
    }

    .unread {
      color: #d91b42;
      position: absolute;
      right: 0;
      font-size: 10px;
      top: -10px;
    }
  }
}
</style>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Utente</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Profilo</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb -->

    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <form id="profile_image" method="POST" action="{{route('Venditore-profile-image-update')
                                }}" enctype="multipart/form-data">
                                    @csrf
                                    <img id="show_image" src="{{!empty($data->photo) ?
                                          url('uploads/images/profile/' . $data->photo):
                                          url('uploads/images/user_default_image.png')}}"
                                         alt="User Image"
                                         class="rounded-circle p-1 bg-primary" width="110">
                                    <div class="mt-3">
                                        <h4>{{$data->name}}</h4>
                                        <label for="file-upload" class="btn btn-outline-primary"
                                               style="border: 1px solid #ccc;display: inline-block;padding: 6px 12px;cursor: pointer;">
                                            <i class="bx bxs-cloud-upload"></i> Aggiungi foto
                                        </label>
                                        <input name="image" id="file-upload" type="file" style="display: none"/>
                                        <input class="btn btn-primary" type="submit" value="Salva"/>
                                        <div>
                                            <small style="color: #e20000" class="error" id="image-error"></small>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="d-flex align-items-center mb-3">Info utente</h4>
                            <br>
                            <form id="info_form" action="{{route('Venditore-profile-info-update')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nome Completo</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="name" type="text" class="form-control" value="{{$data->name}}"
                                               required autofocus/>
                                        <small style="color: #e20000" class="error" id="name-error"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="email" type="email" class="form-control" value="{{$data->email}}"
                                               required/>
                                        <small style="color: #e20000" class="error" id="email-error"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Username</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="username" type="text" class="form-control"
                                               value="{{$data->username}}" required/>
                                        <small style="color: #e20000" class="error" id="username-error"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nome Shop</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="shop_name" type="text" class="form-control"
                                               value="{{$data->shop_name}}" />
                                        <small style="color: #e20000" class="error" id="shop_name-error"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Data iscrizione</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">

                                        <h6 class="mb-0">{{MyHelpers::getDiffOfDate($data->created_at)}}</h6>
                                        <br>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Descrizione Shop</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea id="mytextarea"
                                                  name="shop_description">{{$data->shop_description
                                                  }}</textarea>
                                        <small style="color: #e20000" class="error" id="username-error"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Cellulare</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="phone_number" type="text" class="form-control"
                                               value="{{$data->phone_number}}" placeholder="Cellulare"/>
                                        <small style="color: #e20000" class="error" id="phone_number-error"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Via / N. Civico</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="address" type="text"
                                               class="form-control"
                                               value="{{$data->address}}" placeholder="Via"/>
                                        <small style="color: #e20000" class="error" id="address-error"></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Salva info"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="d-flex align-items-center mb-3">Cambia Password</h4>
                                    <br>
                                    <form id="password_form" action="{{route('Venditore-profile-password-update')}}"
                                          method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Password Attuale</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="password" type="password" class="form-control" required/>
                                                <small style="color: #e20000" class="error" id="password-error"></small>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Nuova Password</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="new_password" type="password" class="form-control"
                                                       autofocus/>
                                                <small style="color: #e20000" class="error"
                                                       id="new_password-error"></small>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Conferma Password</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="confirm_password" type="password" class="form-control"
                                                       autofocus/>
                                                <small style="color: #e20000" class="error"
                                                       id="confirm_password-error"></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Salva"/>
                                            </div>
                                        </div>
                                        {{-- CHAT --}}
                                       
                                    </form>
                                    <div class="floating-chat">
                                        <i class="fa fa-comments" aria-hidden="true"></i>
                                        <div class="contact">
                                            <ul>
                                                <li>L
                                                    <span class="unread"><i class="fa fa-circle" aria-hidden="true"></i>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="chat">
                                            <div class="header">
                                                <span class="title">
                                                    Levap, bot di supporto.
                                                </span>
                                                <button>
                                                    <i class="fa fa-times" aria-hidden="true" style="font-size: 16px;"></i>
                                                </button>
                                            </div>
                                            <ul class="messages">
                                                <li class="self"><span>L</span>Ciao {{ $data->name }}, sono Levap, sono qui per aiutarti, scrivi 
                                                un messaggio qualsiasi e io risponderò !</li>
                                            </ul>
                                            <div class="footer">
                                                <div class="text-box" contenteditable="true" disabled="true" data-text="Scrivi qui..."></div>
                                                <button id="sendMessage">Invia</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('AjaxScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#info_form').on('submit', function (event) {
                event.preventDefault();
                // remove errors if the conditions are true
                $('#info_form *').filter(':input.is-invalid').each(function () {
                    this.classList.remove('is-invalid');
                });
                $('#info_form *').filter('.error').each(function () {
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('Venditore-profile-info-update')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        // remove errors if the conditions are true
                        $('#info_form *').filter(':input.is-invalid').each(function () {
                            this.classList.remove('is-invalid');
                        });
                        $('#info_form *').filter('.error').each(function () {
                            this.innerHTML = '';
                        });
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
                        var res = $.parseJSON(response.responseText);
                        $.each(res.errors, function (key, err) {
                            $('#' + key + '-error').text(err[0]);
                            $('#' + key).addClass('is-invalid');
                        });
                    }
                });
            });
        });
        $(document).ready(function () {
            $('#password_form').on('submit', function (event) {
                event.preventDefault();
                // remove errors if the conditions are true
                $('#password_form *').filter(':input.is-invalid').each(function () {
                    this.classList.remove('is-invalid');
                });
                $('#password_form *').filter('.error').each(function () {
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('Venditore-profile-password-update')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        // remove errors if the conditions are true
                        $('#password_form *').filter(':input.is-invalid').each(function () {
                            this.classList.remove('is-invalid');
                        });
                        $('#password_form *').filter('.error').each(function () {
                            this.innerHTML = '';
                        });
                        Swal.fire({
                            icon: 'success',
                            title: response.msg,
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // window.location.reload();
                        });
                    },
                    error: function (response) {
                        var res = $.parseJSON(response.responseText);
                       
                        $.each(res.errors, function (key, err) {
                            if(key == 'password'){
                                var a='Password attuale non corretta';
                                $('#' + key + '-error').text(a);
                            }
                            if(key == 'new_password'){
                                var a='La nuova password deve essere diversa dalla password attuale';
                                $('#' + key + '-error').text(a);
                            }
                            if(key == 'confirm_password'){
                                var a='Le password non corrispondono';
                                $('#' + key + '-error').text(a);
                            }
                            $('#' + key).addClass('is-invalid');
                        });
                    }
                });
            });
        });
        $(document).ready(function () {
            $('#profile_image').on('submit', function (event) {
                event.preventDefault();
                // remove errors if the conditions are true
                $('#profile_image *').filter(':input.is-invalid').each(function () {
                    this.classList.remove('is-invalid');
                });
                $('#profile_image *').filter('.error').each(function () {
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('Venditore-profile-image-update')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        // remove errors if the conditions are true
                        $('#profile_image *').filter(':input.is-invalid').each(function () {
                            this.classList.remove('is-invalid');
                        });
                        $('#profile_image *').filter('.error').each(function () {
                            this.innerHTML = '';
                        });
                        Swal.fire({
                            icon: 'success',
                            title: response.msg,
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // window.location.reload();
                        });
                    },
                    error: function (response) {
                        var res = $.parseJSON(response.responseText);
                        $.each(res.errors, function (key, err) {
                            if(key == 'image'){
                                var a='Inserisci un immagine';
                                $('#' + key + '-error').text(a);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#profile_image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
  <script src="https://cdn.tiny.cloud/1/jbd12gdswagypofmbx6u3mfs75kj63u8v5g2h34y48v40u44/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
  </script>
  <script>
       var element = $('.floating-chat');
        var myStorage = localStorage;

        if (!myStorage.getItem('chatID')) {
            myStorage.setItem('chatID', createUUID());
        }

        setTimeout(function () {
            element.addClass('enter');
        }, 1000);

        element.click(openElement);

        function openElement() {
            var messages = element.find('.messages');
            var textInput = element.find('.text-box');
            element.find('>i').hide();
            element.addClass('expand');
            element.find('.chat').addClass('enter');
            element.find('.contact').addClass('expand');
            var strLength = textInput.val().length * 2;
            textInput.keydown(onMetaAndEnter).prop("disabled", false).focus();
            element.off('click', openElement);
            element.find('.header button').click(closeElement);
            element.find('#sendMessage').click(sendNewMessage);
            messages.scrollTop(messages.prop("scrollHeight"));
        }

        function closeElement() {
            element.find('.chat').removeClass('enter').hide();
            element.find('>i').show();
            element.removeClass('expand');
            element.find('.contact').removeClass('expand');
            element.find('.header button').off('click', closeElement);
            element.find('#sendMessage').off('click', sendNewMessage);
            element.find('.text-box').off('keydown', onMetaAndEnter).prop("disabled", true).blur();
            setTimeout(function () {
                element.find('.chat').removeClass('enter').show()
                element.click(openElement);
            }, 500);
        }

        function createUUID() {
            // http://www.ietf.org/rfc/rfc4122.txt
            var s = [];
            var hexDigits = "0123456789abcdef";
            for (var i = 0; i < 36; i++) {
                s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
            }
            s[14] = "4"; // bits 12-15 of the time_hi_and_version field to 0010
            s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1); // bits 6-7 of the clock_seq_hi_and_reserved to 01
            s[8] = s[13] = s[18] = s[23] = "-";

            var uuid = s.join("");
            return uuid;
        }

        const sendNewMessage= async () => {
            var name= '{{ $data->name[0] }}';
            var userInput = $('.text-box');
            const userMessage = userInput.html().replace(/\<div\>|\<br.*?\>/ig, '\n').replace(/\<\/div\>/g, '').trim()
                .replace(/\n/g, '<br>');

            if (!userMessage) return;

            var messagesContainer = $('.messages');
            
            
            messagesContainer.append([
                '<li class="other">',
                '<span>' ,
                name,
                '</span>',
                userMessage,
                '</li>'
            ].join(''));

            // clean out old message
            userInput.html('');
            // focus on input
            userInput.focus();
            try {
                const response = await axios.post(
                    "/send-ai",
                    {
                        message: userMessage
                    }
                );
                const botResponse = response.data.botResponse;
                setTimeout(() => {
                    messagesContainer.append([
                        '<li class="self">',
                        '<span>',
                        'L',
                        '</span>',
                        botResponse,
                        '</li>'
                    ].join(''));
                    messagesContainer.finish().animate({
                        scrollTop: messagesContainer.prop("scrollHeight")
                    }, 250);
                }, 1000);
            } catch (error) {
                console.error(error);
            }
            messagesContainer.finish().animate({
                scrollTop: messagesContainer.prop("scrollHeight")
            }, 250);
        }

        function onMetaAndEnter(event) {
            if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
                sendNewMessage();
            }
        }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection
