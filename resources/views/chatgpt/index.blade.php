@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Almeida - ChatGPT</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('chatgpt.ask') }}">
                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control text-center" name="prompt" placeholder="Pergunte qualquer coisa!">
                            </div>

                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
