@foreach ($member->getRoleNames() as $role)
@if ($role == 'super_administrator')
<span class="badge badge-light-primary">Super Administrator</span>
@elseif ($role == 'administrator')
<span class="badge badge-light-success">Administrator</span>
@elseif ($role == 'member')
<span class="badge badge-light-warning">Anggota</span>
@endif
@endforeach