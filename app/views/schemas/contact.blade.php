@extends('layouts.app')

@section('content')
	
        <!-- content begin -->
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <h4>Formulaire</h4>

                        <div class="contact_form_holder">
                            <form id="contact" class="row" name="form1" method="post" action="#">

                                <div class="span4">
                                    <label>Nom</label>
                                    <input type="text" class="full" name="name" id="name" />
                                </div>

                                <div class="span4">
                                    <label>Email <span class="req">*</span></label>
                                    <input type="text" class="full" name="email" id="email" />
                                    <div id="error_email" class="error">Please check your email</div>
                                </div>

                                <div class="span8">
                                    <label>Message <span class="req">*</span></label>
                                    <textarea cols="10" rows="10" name="message" id="message" class="full"></textarea>
                                    <div id="error_message" class="error">Please check your message</div>
                                    <div id="mail_success" class="success">Thank you. Your message has been sent.</div>
                                    <div id="mail_failed" class="error">Error, email not sent</div>
									<br/>
                                    <p id="btnsubmit">
                                        <input type="submit" id="send" value="Envoyer" class="btn btn-primary" />
                                     </p>
                                </div>

                            </form>
                        </div>

                    </div>

                    <div id="sidebar" class="span3">

                        <div class="widget widget-text">
                            <h4>Notre Adresse</h4>
                            <address>
                                Avenue du 1er-Mars 26 <br/> 2000 Neuchâtel 
                                <span><strong>Téléphone:</strong>+41 32 / 718 12 22</span>
                                <span><strong>Email:</strong><a href="mailto:info@droitenschema.ch">info@droitenschema.ch</a></span>
                            </address>
                        </div>

                    </div>
                </div>

                <div class="map">
                </div>

            </div>
        </div>
    </div>
    <!-- content close -->
	
@stop