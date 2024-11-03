@extends('layouts.admin_layout')

@section('title', 'Archived Documents')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/archived.css') }}">
@endsection

@section('main-id', 'dashboard-content')

@section('content')
    <section class="title">
        <div class="title-content">
            <h3>Archives</h3>
            <div class="date-time">
                <i class="bi bi-calendar2-week-fill"></i>
                <p id="current-date-time"></p>
            </div>
        </div>
    </section>

    <div id="dashboard-section">
        <div class="dashboard-container">

            <div class="documents">
                @foreach ($forward as $r)
                    <div class="document">
                        <div class="file-container">
                            <div class="document-card">

                                <iframe src="{{ route('document.serve', basename($r->file_path)) }}#toolbar=0" width="100%" height="200px"></iframe>
                            </div>
                        </div>
                        <div class="document-description">
                            <div class="row">
                                <div class="column-left">
                                    <h3>
                                        {{ $r->document_name }}
                                    </h3>
                                </div>
                                <div class="column-right">
                                    <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical"></i></a>
                                    <div class="dropdown-more">
                                        <a href="{{route('restoreDocs',$r->document_id)}}" class="view-btn">Restore</a>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="other-details">
                                <p>Archived Date: {{ \Carbon\Carbon::parse($r->updated_at)->format('F d, Y') }}

                                </p>
                                <p>{{ $r->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        @endsection


        @section('custom-js')
            <script src="js/archived.js"></script>
        @endsection