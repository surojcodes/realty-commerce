<tr>
<td class="header">
<a href="http://localhost:8000" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('/images/logo.png')}}" class="logo" alt="Hamro Realty">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
