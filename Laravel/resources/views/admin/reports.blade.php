@extends('admin.admin')

@section('styles')
<style type="text/css">
td, th {
    border: 1px solid #dddddd;
    padding: 5px;
    text-align: center
}

tr:nth-child(even) {
    background-color: #dddddd;
}

</style>
@endsection

@section('content')
<table class = 'table'>
<thead>
    <tr>
        <th scope='col'>ID</th>
        <th scope='col'>Reporter Name</th>
        <th scope='col'>Reporter Email</th>
        <th scope='col'>Fraud</th>
        <th scope='col'>Impropriate</th>
        <th scope='col'>Plagarism</th>
        <th scope='col'>Other Reasons</th>
    </tr>
</thead>
<tbody>
    
    @foreach($reports as $reports)
        <tr>
            <td>{{$reports->id}}</td>
            <td>{{$reports->name}}</td>
            <td><a href="/profile/{{$reports->upload_by}}">{{$reports->email}}</a></td>
            <td>{{$reports->Fraud}}</td>
            <td>{{$reports->Impropriate}}</td>
            <td>{{$reports->Plagarism}}</td>
            <td>{{$reports->text}}</td>
        </tr>
    @endforeach
</tbody>

</table>
@endsection