@extends('admin.admin')

@section('styles')
@endsection

@section('content')
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#wallet_history').addClass('current-active');
        $('#main,#profile_manage,#upload_game,#game_report,#tag_manage,#sales_log').removeClass('current-active');
    </script>
@endsection

