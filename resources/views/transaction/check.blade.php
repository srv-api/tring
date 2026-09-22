@extends('layouts.app')

@section('title', 'Cek Transaksi - Tring.id')

@section('content')

<style>
    /* =========================
       PAGE
    ========================= */

    .transaction-page {
        min-height: calc(100vh - 72px);
        padding: 55px 24px 70px;
        background:
            radial-gradient(
                circle at 50% 0%,
                rgba(127, 0, 121, .07),
                transparent 40%
            ),
            var(--background);
    }

    .transaction-container {
        width: 100%;
        max-width: 820px;
        margin: 0 auto;
    }


    /* =========================
       HEADER
    ========================= */

    .transaction-heading {
        text-align: center;
        margin-bottom: 32px;
    }

    .transaction-heading h1 {
        font-size: 32px;
        line-height: 1.2;
        letter-spacing: -.8px;
        font-weight: 800;
        color: var(--black);
        margin-bottom: 10px;
    }

    .transaction-heading p {
        max-width: 540px;
        margin: 0 auto;
        color: var(--gray-2);
        font-size: 13px;
        line-height: 1.7;
    }


    /* =========================
       SEARCH CARD
    ========================= */

    .transaction-search-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 18px;
        padding: 24px;
        box-shadow:
            0 12px 35px rgba(0, 0, 0, .05);
        margin-bottom: 20px;
    }

    .transaction-label {
        display: block;
        color: var(--black);
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 9px;
    }

    .transaction-input-wrapper {
        position: relative;
    }

    .transaction-input-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-3);
        font-size: 17px;
        pointer-events: none;
    }

    .transaction-input {
        width: 100%;
        height: 50px;
        border: 1px solid var(--border);
        border-radius: 11px;
        padding: 0 15px 0 44px;
        outline: none;
        color: var(--black);
        background: var(--white);
        font-size: 13px;
        transition:
            border-color .2s ease,
            box-shadow .2s ease;
    }

    .transaction-input::placeholder {
        color: var(--gray-3);
    }

    .transaction-input:focus {
        border-color: var(--primary);
        box-shadow:
            0 0 0 3px rgba(127, 0, 121, .08);
    }

    .transaction-button {
        width: 100%;
        height: 50px;
        margin-top: 12px;
        border: 0;
        border-radius: 11px;
        background: var(--primary);
        color: var(--white);
        font-size: 12px;
        font-weight: 700;
        transition:
            background .2s ease,
            transform .2s ease,
            box-shadow .2s ease;
    }

    .transaction-button:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow:
            0 8px 20px rgba(127, 0, 121, .18);
    }

    .transaction-help {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-top: 11px;
        color: var(--gray-3);
        font-size: 10px;
    }

    .transaction-help i {
        font-size: 12px;
    }


    /* =========================
       ERROR
    ========================= */

    .transaction-alert {
        display: flex;
        align-items: flex-start;
        gap: 11px;
        padding: 14px 16px;
        margin-bottom: 20px;
        border-radius: 13px;
        background: #FEF2F2;
        border: 1px solid #FECACA;
        color: #991B1B;
        font-size: 12px;
        line-height: 1.5;
    }

    .transaction-alert i {
        font-size: 16px;
        margin-top: 1px;
    }


    /* =========================
       RESULT
    ========================= */

    .transaction-result {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 18px;
        overflow: hidden;
        box-shadow:
            0 12px 35px rgba(0, 0, 0, .05);
    }

    .transaction-result-header {
        padding: 22px 24px;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .result-title {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .result-icon {
        width: 40px;
        height: 40px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--primary-light);
        color: var(--primary);
        font-size: 18px;
    }

    .result-title-text {
        display: flex;
        flex-direction: column;
        gap: 3px;
    }

    .result-title-text strong {
        font-size: 13px;
        font-weight: 800;
        color: var(--black);
    }

    .result-title-text span {
        font-size: 10px;
        color: var(--gray-3);
    }


    /* =========================
       STATUS
    ========================= */

    .transaction-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 10px;
        border-radius: 999px;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    .transaction-status i {
        font-size: 10px;
    }

    .status-success {
        color: #166534;
        background: #DCFCE7;
    }

    .status-processing {
        color: #92400E;
        background: #FEF3C7;
    }

    .status-failed {
        color: #991B1B;
        background: #FEE2E2;
    }

    .status-waiting {
        color: #6B21A8;
        background: #F3E8FF;
    }

    .status-default {
        color: var(--gray-1);
        background: #F5F5F5;
    }


    /* =========================
       DETAIL
    ========================= */

    .transaction-details {
        padding: 8px 24px 22px;
    }

    .transaction-row {
        min-height: 48px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        border-bottom: 1px solid #F0F0F0;
    }

    .transaction-row:last-child {
        border-bottom: 0;
    }

    .transaction-row-label {
        color: var(--gray-2);
        font-size: 11px;
    }

    .transaction-row-value {
        color: var(--black);
        font-size: 11px;
        font-weight: 700;
        text-align: right;
        word-break: break-word;
    }

    .transaction-order-id {
        color: var(--primary);
    }

    .transaction-price {
        font-size: 14px;
        color: var(--primary);
    }


    /* =========================
       ACTION
    ========================= */

    .transaction-actions {
        padding: 20px 24px;
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: center;
    }

    .transaction-home-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 42px;
        padding: 0 18px;
        border-radius: 10px;
        background: var(--primary-light);
        color: var(--primary);
        font-size: 11px;
        font-weight: 700;
        transition:
            background .2s ease,
            transform .2s ease;
    }

    .transaction-home-button:hover {
        background: #F1DDF0;
        transform: translateY(-1px);
    }


    /* =========================
       EMPTY / INFO
    ========================= */

    .transaction-info {
        margin-top: 20px;
        padding: 18px 20px;
        border-radius: 15px;
        background: var(--primary-light);
        border: 1px solid #EDD6EB;
    }

    .transaction-info-title {
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--primary);
        font-size: 11px;
        font-weight: 800;
        margin-bottom: 7px;
    }

    .transaction-info-text {
        color: #6B5369;
        font-size: 10px;
        line-height: 1.7;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 600px) {

        .transaction-page {
            min-height: calc(100vh - 65px);
            padding: 35px 16px 50px;
        }

        .transaction-heading {
            margin-bottom: 25px;
        }

        .transaction-heading h1 {
            font-size: 25px;
        }

        .transaction-heading p {
            font-size: 12px;
        }

        .transaction-search-card {
            padding: 18px;
            border-radius: 15px;
        }

        .transaction-result {
            border-radius: 15px;
        }

        .transaction-result-header {
            padding: 18px;
            align-items: flex-start;
        }

        .transaction-details {
            padding: 7px 18px 18px;
        }

        .transaction-actions {
            padding: 18px;
        }

        .transaction-row {
            min-height: 50px;
        }

        .transaction-row-label,
        .transaction-row-value {
            font-size: 10px;
        }

        .transaction-status {
            font-size: 9px;
            padding: 6px 8px;
        }

        .result-icon {
            width: 36px;
            height: 36px;
            font-size: 16px;
        }

        .result-title-text strong {
            font-size: 12px;
        }
    }
</style>

<main class="transaction-page">


<div class="transaction-container">

    {{-- =========================
         HEADING
    ========================= --}}

    <div class="transaction-heading">

        <h1>Cek Transaksi</h1>

        <p>
            Masukkan ID transaksi untuk melihat status
            dan detail pesanan top up kamu.
        </p>

    </div>


    {{-- =========================
         ERROR
    ========================= --}}

    @if(session('error'))

        <div class="transaction-alert">

            <i class="bi bi-exclamation-circle"></i>

            <div>
                {{ session('error') }}
            </div>

        </div>

    @endif


    {{-- =========================
         VALIDATION ERROR
    ========================= --}}

    @if($errors->any())

        <div class="transaction-alert">

            <i class="bi bi-exclamation-circle"></i>

            <div>

                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

            </div>

        </div>

    @endif


    {{-- =========================
         SEARCH
    ========================= --}}

    <div class="transaction-search-card">

        <form
            action="{{ route('transaction.check.submit') }}"
            method="POST"
        >

            @csrf

            <label
                for="order_id"
                class="transaction-label"
            >
                ID Transaksi
            </label>

            <div class="transaction-input-wrapper">

                <i class="bi bi-receipt transaction-input-icon"></i>

                <input
                    type="text"
                    id="order_id"
                    name="order_id"
                    class="transaction-input"
                    value="{{ old('order_id', $transaction->order_id ?? '') }}"
                    placeholder="Contoh: TRX-20260922-XXXX"
                    autocomplete="off"
                    required
                >

            </div>

            <button
                type="submit"
                class="transaction-button"
            >
                <i class="bi bi-search"></i>
                &nbsp; Cek Transaksi
            </button>

            <div class="transaction-help">

                <i class="bi bi-info-circle"></i>

                <span>
                    ID transaksi dapat ditemukan pada halaman pembayaran
                    atau bukti transaksi kamu.
                </span>

            </div>

        </form>

    </div>


    {{-- =========================
         RESULT
    ========================= --}}

    @isset($transaction)

        @php

            $status = strtolower(
                trim($transaction->status ?? '')
            );

            $paymentStatus = strtolower(
                trim($transaction->payment_status ?? '')
            );

            /*
             * Tentukan tampilan status utama.
             */

            if (
                in_array($status, [
                    'success',
                    'successful',
                    'completed',
                    'complete',
                    'sukses',
                    'berhasil',
                ])
            ) {

                $statusClass = 'status-success';
                $statusIcon = 'bi-check-circle-fill';
                $statusText = 'Berhasil';

            } elseif (
                in_array($status, [
                    'failed',
                    'failure',
                    'gagal',
                    'cancelled',
                    'canceled',
                    'error',
                ])
            ) {

                $statusClass = 'status-failed';
                $statusIcon = 'bi-x-circle-fill';
                $statusText = 'Gagal';

            } elseif (
                in_array($status, [
                    'processing',
                    'process',
                    'processed',
                    'pending',
                    'diproses',
                ])
            ) {

                $statusClass = 'status-processing';
                $statusIcon = 'bi-arrow-repeat';
                $statusText = 'Diproses';

            } elseif (
                in_array($paymentStatus, [
                    'pending',
                    'unpaid',
                    'waiting',
                    'waiting_payment',
                    'menunggu',
                ])
            ) {

                $statusClass = 'status-waiting';
                $statusIcon = 'bi-clock-fill';
                $statusText = 'Menunggu Pembayaran';

            } else {

                $statusClass = 'status-default';
                $statusIcon = 'bi-info-circle-fill';
                $statusText = ucfirst(
                    str_replace('_', ' ', $status ?: 'Tidak diketahui')
                );

            }

        @endphp


        <div class="transaction-result">

            {{-- RESULT HEADER --}}

            <div class="transaction-result-header">

                <div class="result-title">

                    <div class="result-icon">

                        @if($statusClass === 'status-success')
                            <i class="bi bi-check-lg"></i>
                        @elseif($statusClass === 'status-failed')
                            <i class="bi bi-x-lg"></i>
                        @else
                            <i class="bi bi-receipt"></i>
                        @endif

                    </div>

                    <div class="result-title-text">

                        <strong>
                            Detail Transaksi
                        </strong>

                        <span>
                            {{ $transaction->order_id }}
                        </span>

                    </div>

                </div>


                <div class="transaction-status {{ $statusClass }}">

                    <i class="bi {{ $statusIcon }}"></i>

                    {{ $statusText }}

                </div>

            </div>


            {{-- DETAIL --}}

            <div class="transaction-details">

                {{-- ORDER ID --}}

                <div class="transaction-row">

                    <span class="transaction-row-label">
                        ID Transaksi
                    </span>

                    <span class="transaction-row-value transaction-order-id">
                        {{ $transaction->order_id }}
                    </span>

                </div>


                {{-- GAME --}}

                <div class="transaction-row">

                    <span class="transaction-row-label">
                        Game
                    </span>

                    <span class="transaction-row-value">
                        {{ $transaction->game ?? '-' }}
                    </span>

                </div>


                {{-- PRODUCT --}}

                <div class="transaction-row">

                    <span class="transaction-row-label">
                        Produk
                    </span>

                    <span class="transaction-row-value">
                        {{ $transaction->product_name ?? $transaction->sku ?? '-' }}
                    </span>

                </div>


                {{-- USER ID --}}

                <div class="transaction-row">

                    <span class="transaction-row-label">
                        User ID
                    </span>

                    <span class="transaction-row-value">
                        {{ $transaction->user_id ?? '-' }}
                    </span>

                </div>


                {{-- SERVER ID --}}

                @if(!empty($transaction->server_id))

                    <div class="transaction-row">

                        <span class="transaction-row-label">
                            Server ID
                        </span>

                        <span class="transaction-row-value">
                            {{ $transaction->server_id }}
                        </span>

                    </div>

                @endif


                {{-- PAYMENT METHOD --}}

                <div class="transaction-row">

                    <span class="transaction-row-label">
                        Metode Pembayaran
                    </span>

                    <span class="transaction-row-value">
                        {{ $transaction->payment_method ?? '-' }}
                    </span>

                </div>


                {{-- PAYMENT STATUS --}}

                <div class="transaction-row">

                    <span class="transaction-row-label">
                        Status Pembayaran
                    </span>

                    <span class="transaction-row-value">

                        @php
                            $paymentText = match ($paymentStatus) {
                                'paid',
                                'settlement',
                                'success',
                                'successful' => 'Sudah Dibayar',

                                'pending',
                                'unpaid',
                                'waiting',
                                'waiting_payment' => 'Belum Dibayar',

                                'failed',
                                'failure',
                                'deny',
                                'denied',
                                'expire',
                                'expired',
                                'cancel',
                                'cancelled',
                                'canceled' => 'Gagal',

                                default => ucfirst(
                                    str_replace('_', ' ', $paymentStatus ?: '-')
                                ),
                            };
                        @endphp

                        {{ $paymentText }}

                    </span>

                </div>


                {{-- PRICE --}}

                <div class="transaction-row">

                    <span class="transaction-row-label">
                        Total
                    </span>

                    <span class="transaction-row-value transaction-price">

                        Rp
                        {{ number_format(
                            (float) $transaction->price,
                            0,
                            ',',
                            '.'
                        ) }}

                    </span>

                </div>


                {{-- CREATED --}}

                <div class="transaction-row">

                    <span class="transaction-row-label">
                        Dibuat
                    </span>

                    <span class="transaction-row-value">

                        {{ optional($transaction->created_at)
                            ->timezone(config('app.timezone', 'Asia/Jakarta'))
                            ->format('d M Y, H:i') }}

                    </span>

                </div>


                {{-- PAID AT --}}

                @if($transaction->paid_at)

                    <div class="transaction-row">

                        <span class="transaction-row-label">
                            Dibayar
                        </span>

                        <span class="transaction-row-value">

                            {{ optional($transaction->paid_at)
                                ->timezone(config('app.timezone', 'Asia/Jakarta'))
                                ->format('d M Y, H:i') }}

                        </span>

                    </div>

                @endif


                {{-- COMPLETED AT --}}

                @if($transaction->completed_at)

                    <div class="transaction-row">

                        <span class="transaction-row-label">
                            Selesai
                        </span>

                        <span class="transaction-row-value">

                            {{ optional($transaction->completed_at)
                                ->timezone(config('app.timezone', 'Asia/Jakarta'))
                                ->format('d M Y, H:i') }}

                        </span>

                    </div>

                @endif

            </div>


            {{-- ACTION --}}

            <div class="transaction-actions">

                <a
                    href="{{ url('/') }}"
                    class="transaction-home-button"
                >
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Beranda
                </a>

            </div>

        </div>

    @endisset


    {{-- =========================
         INFORMATION
    ========================= --}}

    <div class="transaction-info">

        <div class="transaction-info-title">

            <i class="bi bi-shield-check"></i>

            Informasi Transaksi

        </div>

        <div class="transaction-info-text">

            Pastikan ID transaksi yang kamu masukkan sudah benar.
            Jangan membagikan informasi pembayaran atau kode OTP
            kepada siapa pun.

        </div>

    </div>

</div>


</main>

@endsection
