@extends('layouts.frontend')

@section('title')

@endsection

@section('content')
<section class="page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <form id="contactForm" action="{{ route('frontend.contact.process') }}" method="post">
                    @csrf
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="form-floating mb-3">
                        <input class="form-control @error('name') is-invalid @enderror " name="name" type="text" placeholder="Enter your name..."/>
                        <label for="name">Full name</label>
                        @error('name')
                            <div class="text-danger small" >{!! $message !!}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="name@example.com"/>
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="text-danger small" >{!! $message !!}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control @error('phone') is-invalid @enderror" name="phone" type="tel" placeholder="(123) 456-7890"/>
                        <label for="phone">Phone number</label>
                        @error('phone')
                            <div class="text-danger small" >{!! $message !!}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem"></textarea>
                        <label for="message">Message</label>
                        @error('message')
                            <div class="text-danger small" >{!! $message !!}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
    <style>
        .page-section {
            padding: 13rem 0 6rem 0 !important
        }
    </style>
@endsection
