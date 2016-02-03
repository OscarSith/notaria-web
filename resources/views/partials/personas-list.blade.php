<tr>
	<td>{{ $persona->full_name }}</td>
	<td>{{ $persona->full_lastname }}</td>
	<td>{{ $persona->per_dcmto_numero }}</td>
	<td>
		<a href="#persona/edit/{{ $persona->id }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Editar</a>
	</td>
</tr>