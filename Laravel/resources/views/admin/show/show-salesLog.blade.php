@extends('admin.admin')

@section('styles')
@endsection

@section('content')
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#sales_log').addClass('current-active');
        $('#main,#profile_manage,#upload_game,#game_report,#tag_manage,#wallet_history').removeClass('current-active');
    </script>
@endsection