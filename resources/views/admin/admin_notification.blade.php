@extends('layouts.admin_layout')

@section('title', 'Notification')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/notification.css') }}">
@endsection

@section('main-id', 'dashboard-content')

@section('content') 
    <section class="title">
        <div class="title-content">
            <h3>Notification</h3>
            <div class="date-time">
                <i class="bi bi-calendar2-week-fill"></i>
                <p id="current-date-time"></p>
            </div>
        </div>
        </section>

<div id="dashboard-section">
    <div class="dashboard-container">
        @if($forwardedDocuments->isEmpty() && $sentDocuments->isEmpty())
            <p class="no-notifications">You have no notifications at this time.</p>
        @else
            <table class="email-list">
                {{-- Display Forwarded Documents --}}
                @foreach($forwardedDocuments as $forwarded)
                    <tr class="email-item">
                        <td class="checkbox"><input type="checkbox"></td>
                        <td class="star">★</td>
                        <td class="sender">{{ $forwarded->forwardedByEmployee->first_name ?? 'Unknown' }} {{ $forwarded->forwardedByEmployee->last_name ?? '' }}</td>
                        <td class="subject">
                            <span class="subject-text">{{ $forwarded->document->document_name ?? 'No Title' }}</span>
                            <span class="snippet"> - {{ $forwarded->message ?? 'No message' }}</span>
                        </td>
                        <td >Forwarded Document</td>
                        <td class="date">{{ \Carbon\Carbon::parse($forwarded->forwarded_date)->format('M d') }}</td>
                        <td class="email-actions">
                            <a href="{{ route('deleteNotifsent', ['id' => $forwarded->forwarded_document_id, 'status' => 'archive']) }}"
                                style="text-decoration: none; color:black;"><i class="bi bi-archive"></i></a>
                            <a href="{{ route('deleteNotifsent', ['id' => $forwarded->forwarded_document_id, 'status' => 'deleted']) }}"
                                style="text-decoration: none; color:black;"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach

                {{-- Display Sent Documents --}}
                @foreach($sentDocuments as $sentDocument)
                    <tr class="email-item">
                        <td class="sender">{{ $sentDocument->sender->first_name ?? 'Unknown Sender' }} {{ $sentDocument->sender->last_name ?? '' }}</td>
                        <td class="subject">
                            <span class="subject-text">{{ $sentDocument->document_subject ?? 'No Title' }}</span>
                        </td>
                        <td >Sent Document</td>
                        <td class="date">{{ \Carbon\Carbon::parse($sentDocument->issued_date)->format('M d') }}</td>
                        <td class="email-actions">
                            <a href="{{ route('deleteNotifsent', ['id' => $sentDocument->send_id, 'status' => 'archive']) }}"
                                style="text-decoration: none; color:black;"><i class="bi bi-archive"></i></a>
                            <a href="{{ route('deleteNotifsent', ['id' => $sentDocument->send_id, 'status' => 'deleted']) }}"
                                style="text-decoration: none; color:black;"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
</div>
@endsection

@section('custom-js')
    <script src="{{ asset('js/notification.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
