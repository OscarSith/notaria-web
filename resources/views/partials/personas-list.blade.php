<tr>
	<td>{{ $persona->per_tipo }}</td>
	@if ($persona->per_tipo == '0001')
		<td>{{ $persona->full_name }}</td>
	@else
		<td>{{ $persona->per_razon_social }}</td>
	@endif
	@if ($persona->per_tipo == '0001')
		<td>{{ $persona->full_lastname }}</td>
	@else
		<td>{{ $persona->per_ruc }}</td>
	@endif
	<td>{{ $persona->per_nacion }}</td>
	<td>{{ $persona->per_dcmto_tipo }}</td>
	<td>{{ $persona->per_dcmto_numero }}</td>
	<td>
		<a href="{{ route('edit-persona', $persona->id) }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Editar</a>
	</td>
</tr>