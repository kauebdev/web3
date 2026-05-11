@extends('layouts.app')
@section('title', 'Categorias')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Categorias</h2>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">Nova Categoria</a>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Ativa</th>
                        <th>Atualizado em</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->nome }}</td>
                            <td>
                                @if ($categoria->ativa)
                                    <span class="badge text-bg-success">Sim</span>

                                @else
                                    <span class="badge text-bg-secondary">Não</span>
                                @endif
                            </td>

                            <td>{{ $categoria->updated_at->format('d/m/YH:i') }}</td>
                            <td class="text-end">
                                <a href="{{ route('categorias.edit', $categoria->id) }}"
                                    class="btn btn-sm btn-outline-primary">Editar</a>
                                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-4 text-muted">Nenhuma categoria cadastrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection