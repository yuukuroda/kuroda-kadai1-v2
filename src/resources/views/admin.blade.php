@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('link')
<form action="/logout" method="post">
    @csrf
    <input class="header__link" type="submit" value="logout">
</form>
@endsection

@section('content')
<div class="admin__content">
    <!-- タイトル -->
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>
    <!-- 検索ツール -->
    <form class="search-form" action="/admin" method="get">
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword', request('keyword')) }}">


            <select class="search-form__item-select" name="gender">
                <option value="">性別</option>
                <option value="1" @if(request('gender')=='1' ) selected @endif>男性</option>
                <option value="2" @if(request('gender')=='2' ) selected @endif>女性</option>
                <option value="3" @if(request('gender')=='3' ) selected @endif>その他</option>
            </select>

            <select class="search-form__item-select" name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if(request('category_id')==$category->id) selected @endif>
                    {{ $category->content }}
                </option>
                @endforeach
            </select>

            <input class="search-form__item-input" type="date" name="date" value="{{ old('date', request('date')) }}">
        </div>

        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
        </div>



        <div class="search-form__button reset-button-container">
            <input class="search-form__reset-btn btn" type="submit" value="リセット" name="reset">
        </div>
    </form>

    <!-- エクスポート、ページ -->
    <div class="export">
        <button class="export__item">エクスポート</button>
    </div>

    <!-- ページネーション -->
    <div class="admin__util">
        @if (isset($contacts) && $contacts instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $contacts->links() }}
        @endif
    </div>

    <!-- テーブル -->
    <div class="contact-table">
        <table class="contact-table__inner">
            <thead>
                <tr class="contact-table__row">
                    <th class="contact-table__header">お名前</th>
                    <th class="contact-table__header">性別</th>
                    <th class="contact-table__header">メールアドレス</th>
                    <th class="contact-table__header">お問い合わせの種類</th>
                    <th class="contact-table__header">どこで知りましたか</th>
                    <th class="contact-table__header">詳細</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr class="contact-table__row">
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td>
                        @if ($contact->gender === 1) 男性
                        @elseif ($contact->gender === 2) 女性
                        @else その他
                        @endif
                    </td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->content }}</td>
                    <td>@foreach($contact->channels as $channel)
                        {{ $channel->content }}
                        @endforeach
                    </td>
                    <td>
                        <button class="detail__button">詳細</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection