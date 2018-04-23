@extends('admin.admin')

@section('content')
<table class = 'table'>
<thead>
    <tr>
        <th scope='col'>ID</th>
        <th scope='col'>Reporter</th>
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
            <td>{{$reports->upload_by}}</td>
            <td>{{$reports->Fraud}}</td>
            <td>{{$reports->Impropriate}}</td>
            <td>{{$reports->Plagarism}}</td>
            <td>{{$reports->text}}</td>
        </tr>
    @endforeach
</tbody>
</table>
@endsection