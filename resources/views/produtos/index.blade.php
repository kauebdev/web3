@extends('layouts.app')
@section('title', 'Produtos')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Produtos</h2>


        <form method="GET" action="{{ route('produtos.index') }}" class="d-flex gap-2">
            <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Buscar por nome...">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            <a class="btn btn-outline-secondary" href="{{ route('produtos.index') }}">Limpar</a>
        </form>

        <a href="{{ route('produtos.create') }}" class="btn btn-primary">Novo Produto</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Ativo</th>
                        <th>Atualizado em</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produtos as $produto)
                        <tr>
                            <td>
                                @if($produto->imagem)
                                    <img src="{{ Storage::url($produto->imagem) }}" alt="{{ $produto->nome }}"
                                        style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                @else
                                    <span class="text-muted">Sem foto</span>
                                @endif
                            </td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->categoria->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                            <td>
                                @if ($produto->ativo)
                                    <span class="badge text-bg-success">Sim</span>

                                @else
                                    <span class="badge text-bg-secondary">Não</span>
                                @endif
                            </td>

                            <td>{{ $produto->updated_at->format('d/m/Y H:i') }}</td>
                            <td class="text-end">
                                <a href="{{ route('produtos.edit', $produto->id) }}"
                                    class="btn btn-sm btn-outline-primary">Editar</a>
                                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-4 text-muted">Nenhum produto cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $produtos->links() }}
        </div>
    </div>
@endsection