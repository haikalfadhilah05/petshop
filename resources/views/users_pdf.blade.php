<h1>Users List</h1>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
<tr>
    <th>Name</th>
    <th>Username</th>
    <th>Role</th>
</tr>
@foreach ($usersM as $users)
<tr>
    <td>{{ $users->name }}</td>
    <td>{{ $users->username }}</td>
    <td>{{ $users->role }}</td>
</tr>
@endforeach
</table>