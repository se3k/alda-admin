@extends('layout.master')

@section('page_title', 'Cadastrar Reuniões')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-calendar"></i>Cadastrar Reunião
    </h1>

@stop
@section('content')

    <div class="page-content container-fluid">
        @include('voyager::alerts')
    </div>

    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
              action="{{ action('ConselheiroController@storeReuniao') }}"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">
                            <div class="form-group col-md-12">
                                <label for="">Data</label>
                                <input type="text" class="form-control" name="data"
                                       id="data">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Horário de Início</label> <i class="fa fa-clock-o"></i>
                                <input type="text" class="form-control timepicker" name="hora"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Horário de Término </label> <i class="fa fa-clock-o"></i>
                                <input type="text" class="form-control timepicker" name="hora_fim"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name">Endereço</label>
                                <textarea class="form-control" name="endereco" rows="5"></textarea>
                            </div>

                            <div class="form-group  col-md-12">
                                <label for="name">Bairro</label>
                                <input type="text" class="form-control" name="bairro" placeholder="Bairro" value="">
                            </div>

                            <div class="form-group  col-md-12">
                                <label for="name">Ponto Referencia</label>
                                <textarea class="form-control" name="ponto_referencia" rows="5"
                                          placeholder="Próximo a delegacia de polícia..."></textarea>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Assuntos </label> <span style="color:red">*</span>
                                    <select class="form-control" name="assunto[0]" id="assunto0">
                                        <option selected="true" disabled="disabled">Selecione um assunto</option>
                                        @foreach($assuntos as $assunto)
                                            <option
                                                value="{{ $assunto->id }}" {{ (collect(old('assunto.0'))->contains($assunto->id)) ? 'selected':'' }}>
                                                {{ $assunto->assunto }}
                                            </option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="assunto[1]" id="assunto1">
                                        <option selected="true" disabled="disabled">Selecione um assunto</option>
                                        @foreach($assuntos as $assunto)
                                            <option
                                                value="{{ $assunto->id }}" {{ (collect(old('assunto.1'))->contains($assunto->id)) ? 'selected':'' }}>
                                                {{ $assunto->assunto }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="assunto[2]" id="assunto2">
                                        <option selected="true" disabled="disabled">Selecione um assunto</option>
                                        @foreach($assuntos as $assunto)
                                            <option
                                                value="{{ $assunto->id }}" {{ (collect(old('assunto.2'))->contains($assunto->id)) ? 'selected':'' }}>
                                                {{ $assunto->assunto }}
                                            </option>                                    @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <button class="btn btn-danger">Cancelar</button>
                                <button type="submit" class="btn btn-success"> Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('javascript')
    <script src="{{asset('admin/plugins/timepicker/bootstrap-timepicker.js')}}"></script>
    <script>
        $(function () {
            $('.timepicker').timepicker({
                showMeridian: false
            });
        });


        $( "#data" ).datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR'
        });
    </script>
@endsection
