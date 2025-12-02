@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="confirm__content">
    <!-- タイトル -->
    <div class="confirm__heading">
        <h2>confirm</h2>
    </div>
    <!-- 全体 -->
    <form class="form" action="/contacts" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <!-- 名前確認 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        {{ $contact['last_name'] }}
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
                    </td>
                    <td class="confirm-table__text">
                        {{ $contact['first_name'] }}
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
                    </td>
                </tr>
                <!-- 性別確認 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <div>@isset($contact['gender'])
                            {{ $contact['gender'] }}
                            @else
                            未選択
                            @endisset
                        </div>
                        <input type="hidden" name="gender" value="{{ $contact['gender'] ?? '' }}" />
                    </td>
                </tr>
                <!-- メールアドレス確認 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        {{ $contact['email'] }}
                        <input type="hidden" name="email" value="{{ $contact['email'] }}" />
                    </td>
                </tr>
                <!-- 電話番号確認 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <div>
                            {{ $contact['tel_1'] ?? '' }} - {{ $contact['tel_2'] ?? '' }} - {{ $contact['tel_3'] ?? '' }}
                        </div>
                        <input type="hidden" name="tel_1" value="{{ $contact['tel_1'] ?? '' }}" />
                        <input type="hidden" name="tel_2" value="{{ $contact['tel_2'] ?? '' }}" />
                        <input type="hidden" name="tel_3" value="{{ $contact['tel_3'] ?? '' }}" />
                    </td>
                </tr>
                <!-- 住所確認 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所
                    </th>
                    <td class="confirm-table__text">
                        {{ $contact['address'] }}
                        <input type="hidden" name="address" value="{{ $contact['address'] }}" />
                    </td>
                </tr>
                <!-- 建物名確認 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名
                    </th>
                    <td class="confirm-table__text">
                        {{ $contact['building'] }}
                        <input type="hidden" name="building" value="{{ $contact['building'] }}" />
                    </td>
                </tr>
                <!-- お問い合わせ種類確認 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <div>{{ $contact['category_name'] ?? '不明' }}</div>

                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] ?? '' }}" />
                    </td>
                </tr>
                <!-- お問い合わせ内容確認 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        {{ $contact['detail'] }}
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}" />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">情報をどこで知ったか</th>
                    <td class="confirm-table__text">
                    @foreach($channels as $channel)
                        <input type="text" name="channel_contents[]" value="{{ $channel->content }}" readonly>
                        <input type="hidden" name="channel_ids[]" value="{{ $channel->id }}">
                    @endforeach
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
            <button class="form__button-submit" type="submit" name="action" value="back">修正</button>
        </div>
    </form>
</div>
@endsection