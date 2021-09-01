@extends('admin.newlayout.layout')
@section('title','Meeting List')
@section('page')
    <div class="card">
        <div class="card-header">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>
            <h2 class="panel-title">Meeting List</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-none m-b-0" id="datatable-details">
                    <thead>
                    <tr>
                        <th class="text-center">{{ trans('admin.title') }}</th>
                        <th class="text-center">{{ trans('admin.contents') }}</th>
                        <th class="text-center">{{ trans('admin.duration') }}</th>
                        <th class="text-center">{{ trans('admin.start_date') }}</th>
                        <th class="text-center">{{ trans('admin.start_time') }}</th>
                        <th class="text-center">{{ trans('admin.join_url') }}</th>
                        <th class="text-center">{{ trans('admin.type') }}</th>
                        <th class="text-center">{{ trans('admin.th_controls') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $item)
                            <tr>
                                <td class="text-center">{!! $item->title ?? '' !!}</td>
                                <td class="text-center"><a target="_blank" href="/product/{!! $item->content->id ?? ''  !!}">{!! $item->content->title ?? '' !!}</a></td>
                                <td class="text-center">{!! $item->duration ?? '' !!}</td>
                                <td class="text-center">{!! $item->date ?? '-' !!}</td>
                                <td class="text-center">{!! date('H:i',$item->time_start) ?? '-' !!}</td>
                                <td class="text-center">{!! $item->join_url ?? '' !!}</td>
                                <td class="text-center">{!! $item->type ?? '' !!}</td>
                                <td class="text-center">
                                    <a href="/admin/live/details/{{ $item->id }}" title="Edit"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                    <a href="#" data-href="/admin/live/delete/{{ $item->id }}" title="Delete" data-toggle="modal" data-target="#confirm-delete" class="c-r"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="card-footer">
            {!! $list->appends($_GET)->links('pagination.default') !!}
        </div>
    </div>
@stop
