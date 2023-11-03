<tr>
<td class="header">
<a href="{{route('home')}}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<h1 class="titulo"><img src="{{asset('img/logo.png')}}" class="logo" alt="Laravel Logo" style="vertical-align: middle;"> App Dinero Inmediato</h1>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
