@extends('admin.admin')

@section('styles')
<style type="text/css">


</style>
@endsection
@section('content')


@endsection

@section('scripts')
<script type="text/javascript">
    $('#notification').addClass('current-active');
    $('#main,#profile_manage,#wallet_history,#sales_log,#upload_game,#game_report,#tag_manage,#game_manage').removeClass('current-active');
</script>
@endsection