@extends('layouts.admin_layout')

@section('title', 'Deleted Documents')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/trash.css') }}">
@endsection

@section('main-id', 'dashboard-content')

@section('content')
    <section class="title">
        <div class="title-content">
            <h3>Trash</h3>
            <div class="date-time">
                <i class="bi bi-calendar2-week-fill"></i>
                <p id="current-date-time"></p>
            </div>
        </div>
    </section>

    <div id="dashboard-section">
        <div class="dashboard-container">
            @if ($forward->isEmpty() && $forward->isEmpty())
            <p class="no-notifications">You have no Trash at this time.</p>
        @endif
            <table class="email-list">
                @if ($forward)
                    @foreach ($forward as $r)
                        <tr class="email-item">
                            <td class="checkbox"><input type="checkbox"></td>
                            <td class="sender">{{ $r->forwardedBy->first_name . ' ' . $r->forwardedBy->last_name }}</td>
                            <td class="subject">

                                <span class="snippet">Employee -
                                    {{ $r->forwardedTo->first_name . ' ' . $r->forwardedTo->last_name }} forwarded a document
                                    regarding the {{ $r->documents->category_name }}
                                    - {{ $r->documents->description }}</span>
                            </td>
                            <td class="date">{{ \Carbon\Carbon::parse($r->documents->upload_date)->format('F j, Y') }}
                            </td>
                            <td class="email-actions">
                                <a href="{{ route('deleteNotif', ['id' => $r->forwarded_document_id, 'status' => 'delivered']) }}"
                                    style="text-decoration: none; color:black;">
                                    <i class="bi bi-arrow-counterclockwise" title="Restore"></i>
                                </a>
                                <a href="{{ route('deleteNotifForever', ['id' => $r->forwarded_document_id]) }}"
                                    style="text-decoration: none; color:black;">

                                    <i class="bi bi-trash3-fill" title="Delete Forever"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection


@section('custom-js')
    <script src="js/trash.js"></script>
@endsection
