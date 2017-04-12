@extends('layouts.app')

@section('content')
    <div class="b_inb">
        @component('parts.breadcrumbs', [
            'elements' => [
                'Партнёры'
            ]
        ])
        @endcomponent
        <div class="c_box">
            <h1>Партнеры</h1>
            <div class="c_txt">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="c_partners-list">
                <div class="c_partners-item">
                    <div class="c_partners-title">Партнер1</div>
                    <div class="c_partners-thumb"><img src="/images/partners.png" alt="partners"></div>
                </div>
                <div class="c_partners-item">
                    <div class="c_partners-title">Партнер1</div>
                    <div class="c_partners-thumb"><img src="/images/partners.png" alt="partners"></div>
                </div>
                <div class="c_partners-item">
                    <div class="c_partners-title">Партнер1</div>
                    <div class="c_partners-thumb"><img src="/images/partners.png" alt="partners"></div>
                </div>
                <div class="c_partners-item">
                    <div class="c_partners-title">Партнер1</div>
                    <div class="c_partners-thumb"><img src="/images/partners.png" alt="partners"></div>
                </div>
                <div class="c_partners-item">
                    <div class="c_partners-title">Партнер1</div>
                    <div class="c_partners-thumb"><img src="/images/partners.png" alt="partners"></div>
                </div>
                <div class="c_partners-item">
                    <div class="c_partners-title">Партнер1</div>
                    <div class="c_partners-thumb"><img src="/images/partners.png" alt="partners"></div>
                </div>
                <div class="c_partners-item">
                    <div class="c_partners-title">Партнер1</div>
                    <div class="c_partners-thumb"><img src="/images/partners.png" alt="partners"></div>
                </div>
                <div class="c_partners-item">
                    <div class="c_partners-title">Партнер1</div>
                    <div class="c_partners-thumb"><img src="/images/partners.png" alt="partners"></div>
                </div>
            </div>
        </div>
    </div>
@endsection