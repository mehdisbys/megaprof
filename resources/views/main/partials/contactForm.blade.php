<div class="container">
    <div class="row">
        <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span>
                            @lang('main/partials/contactForm.haveAQuestion')</h4>
                    </div>
                    <form action="/contact" method="post" accept-charset="utf-8">
                        {{csrf_field()}}
                        <div class="modal-body" style="padding: 5px;">
                            <div class="row topmargin-sm">
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="firstname" placeholder="@lang('main/partials/contactForm.lastNameFirstname')" type="text"
                                           required autofocus
                                           value="{{\Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->firstname:null}}"/>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="email" placeholder="email"
                                           type="text" required
                                           value="{{\Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->email:null}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                    <input class="form-control" name="subject" placeholder="Objet" type="text"
                                           required value=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea style="resize:vertical;" class="form-control" placeholder="@lang('main/partials/contactForm.message')"
                                              rows="6" name="message" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <div class="g-recaptcha topmargin-sm"
                                 data-sitekey="6LfJ2xsUAAAAACPgk0dN3HNLY1p_3vS0_s1964mU"></div>
                        </div>
                        <div class="panel-footer" style="margin-bottom:-14px;">
                            <button type="button" class="btn btn-default btn-close"
                                    data-dismiss="modal">@lang("main/partials/contactForm.cancel")
                            </button>

                            <input style="float: right;" type="submit" class="btn btn-success" value="@lang("main/partials/contactForm.submit")"/>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>