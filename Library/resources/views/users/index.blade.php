@extends('layouts.app')
@section('content')
<div class="container">
<h1>Lista de Usuários</h1>
<a href="{{ route('users.create') }}" class="btn btn-primary
mb-3">Adicionar Novo Usuário</a>
<table class="table table-bordered">
<thead>
<tr>
<th>Nome</th>
<th>Email</th>
<th>Role</th>
<th>Ações</th>
</tr>
</thead>
<tbody>
@foreach ($users as $user)
<tr>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
@if ($user->role == 1)
<td>Admin</td>
@elseif ($user->role == 2)
<td>Bibliotecário(a)</td>
@elseif ($user->role == 3)
<td>Cliente</td>
@endif
<td>
<a href="{{ route('users.show',
$user->id) }}" class="btn btn-info">Ver</a>
@can('isAdmin', Auth::user())
<a href="{{ route('users.edit',
$user->id) }}" class="btn btn-warning">Editar</a>
<form action="{{
route('users.destroy', $user->id) }}" method="POST"
style="display:inline-block;">
@csrf
@method('DELETE')
<button type="submit" class="btn
btn-danger" onclick="return confirm('Tem certeza que deseja excluir
este usuário?')">Excluir</button>
</form>
@endcan
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection
