@extends('frontend.layouts.app')

@section('content')
    <div class="row tm-mb-50">
        <div class="col-lg-4 col-12 mb-5">
            <h2 class="tm-text-primary mb-5">Contact Page</h2>
            <form id="contact-form" action="{{ route('query') }}" method="POST" class="tm-contact-form mx-auto">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control rounded-0" placeholder="Name" required />
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control rounded-0" placeholder="Email" required />
                </div>
                <div class="form-group">
                    <input type="email" name="subject" class="form-control rounded-0" placeholder="Email" required />

                </div>
                <div class="form-group">
                    <textarea rows="8" name="message" class="form-control rounded-0" placeholder="Message"
                        required></textarea>
                </div>

                <div class="form-group">
                    <p class="text-info">{{ session('message') }}</p>
                </div>

                <div class="form-group tm-text-right">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-12 mb-5">
            <div class="tm-address-col">
                <h2 class="tm-text-primary mb-5">Our Address</h2>
                <p class="tm-mb-50">Quisque eleifend mi et nisi eleifend pretium. Duis porttitor accumsan arcu id rhoncus.
                    Praesent fermentum venenatis ipsum, eget vestibulum purus. </p>
                <p class="tm-mb-50">Nulla ut scelerisque elit, in fermentum ante. Aliquam congue mattis erat, eget iaculis
                    enim posuere nec. Quisque risus turpis, tempus in iaculis.</p>
                <address class="tm-text-gray tm-mb-50">
                    120-240 Fusce eleifend varius tempus<br>
                    Duis consectetur at ligula 10660
                </address>
                <ul class="tm-contacts">
                    <li>
                        <a href="#" class="tm-text-gray">
                            <i class="fas fa-envelope"></i>
                            Email: info@company.com
                        </a>
                    </li>
                    <li>
                        <a href="tel://{{ config('custom.tel') }}" class="tm-text-gray">
                            <i class="fas fa-phone"></i>
                            Tel: {{ config('custom.tel') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" class="tm-text-gray">
                            <i class="fas fa-globe"></i>
                            URL: www.company.com
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <h2 class="tm-text-primary mb-5">Our Location</h2>
            <!-- Map -->
            <div class="mapouter mb-4">
                <div class="gmap-canvas">
                    <iframe width="100%" height="520" id="gmap-canvas"
                        src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
        </div>
    </div>

@endsection
