@extends('layouts.app')
@section('content')
    <!-- Contact Us Page -->
    <section id="contact-us" class="py-5 bg-light">
        <div class="container">
            <h1 class="text-center text-primary fw-bold mb-4">CONTACT US</h1>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body p-5">
                            <h2 class="text-primary fw-bold mb-4">Get in Touch</h2>
                            <div class="row">
                                <!-- Left Column: Contact Information -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <p class="text-muted mb-4">We'd love to hear from you! Feel free to reach out using the following contact details or visit us at our location.</p>
                                        <h5><i class="fas fa-phone-alt text-primary me-3"></i>Phone</h5>
                                        <p class="text-muted mb-0">+880 1332 548074</p>
                                        <p class="text-muted mb-0"> +880 1969 669908</p>
                                    </div>
                                    <div class="mb-4">
                                        <h5><i class="fas fa-envelope text-primary me-3"></i>Email</h5>
                                        <p class="text-muted mb-0">bopinstitute.info@gmail.com</p>
                                    </div>
                                    <div>
                                        <h5><i class="fas fa-map-marker-alt text-primary me-3"></i>Location</h5>
                                        <p class="text-muted mb-0">Shantidhara, Rd: 01, Signboard, Fatullah, Narayanganj</p>
                                    </div>
                                </div>
                                <!-- Right Column: Google Map -->
                                <div class="col-md-6">
                                    <div class="ratio ratio-4x3">
                                        <!-- Google Map Embed -->
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14604.302239398163!2d90.479863!3d23.691992!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDQxJzMzLjIiTiA5MMKwMjgnNDcuNiJF!5e0!3m2!1sen!2sbd!4v1616582063536!5m2!1sen!2sbd"
                                            width="100%"
                                            height="100%"
                                            style="border:0;"
                                            allowfullscreen=""
                                            loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade">
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
