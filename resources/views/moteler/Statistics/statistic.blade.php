@extends('moteler.layout.index')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Thống Kê</div>
    <div class="card-body">

        <div class="card-body">
            @if(session('mess'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('mess') }}
                </div>
            @endif
            <div class="table-responsive">
            </div>
        </div>

    </div>
</div>
<script>

</script>
<style>

</style>
@endsection
