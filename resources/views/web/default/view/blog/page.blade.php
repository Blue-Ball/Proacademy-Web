@extends(getTemplate().'.view.layout.layout')
@section('title')
    {{ !empty($setting['site']['site_title']) ? $setting['site']['site_title'] : '' }}
@endsection
@section('meta_description',get_option('site_meta_description'))
@section('meta_keyword',get_option('site_meta_keyword'))
@section('page')
    <div class="container-fluid">
        <div class="h-20"></div>
        <div class="container">
            <div class="col-xs-12">
                {!! $content !!}
            </div>
        </div>
        <div class="h-20"></div>
    </div>
@endsection
