@extends('layouts.app')
@section('title', 'Sobre')
@section('content')
    <div class="p-5 mb-4 bg-white rounded-3 shadow-sm">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">{{ $titulo }}</h1>
            <h3 class="col-md-8 fs-5">
                Entre em Contato conosco para saber mais sobre nossos produtos, fazer um pedido ou esclarecer dúvidas. 
                Estamos aqui para ajudar e garantir que sua experiência na Lanchonete seja a melhor possível. 
                Seja para sugestões, feedback ou qualquer outra questão, não hesite em nos contatar. 
                Agradecemos seu interesse e esperamos ouvir de você em breve!
            </h3>
            <form action="{{ route('contato') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="mensagem" class="form-label">Mensagem</label>
                    <textarea class="form-control" id="mensagem" name="mensagem" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
@endsection