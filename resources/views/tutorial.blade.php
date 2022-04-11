@extends('layouts.master')
@section('content')


<div class="container">
    <div class="row mt-5 text-center">
        <div class="col-md-6">
            <h3> Promo Video </h3>
            <div class="mt-3 mb-3 embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
                    allowfullscreen></iframe>
            </div>
        </div>

        <div class="col-md-6">
            <h3> Change Netflix Account Language </h3>
            <div class="mt-3 embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
                    allowfullscreen></iframe>
            </div>

        </div>
    </div>

    <div class="row mt-4">

        <div class="col-md-12  ">
            <h3 class="text-center mb-4"> Frequently Asked Questions </h3>

            <div class="panel-group text-left" id="accordion" role="tablist">

                <div class="panel panel-primary ">
                    <div class="panel-heading" role="tab">
                        <h6 class="panel-title "><a class="faq-panel-a" href="#collapseOne" data-toggle="collapse" data-parent="#accordion"
                                aria-expanded="false" class="collapsed">How do I purchase accounts from the shop?</a>
                        </h6>
                    </div>
                    <div class="collapse" id="collapseOne" role="tabpanel" aria-expanded="false">
                        
                
                        <div class="panel-body">  <span class="fa fa-arrow-right" aria-hidden="true"></span> Head over to the 'Products' page, select your product and subscription
                            and you'll be redirected to the purchase gateway. When your payment is completed.</div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab">
                        <h6 class="panel-title"><a class="faq-panel-a" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion"
                                aria-expanded="false" class="collapsed">Is the payment instant?</a></h6>
                    </div>
                    <div class="collapse" id="collapseTwo" role="tabpanel" aria-expanded="false">
                        <div class="panel-body"><span class="fa fa-arrow-right" aria-hidden="true"></span> Yes, all purchases are instant. Transactions via cryptocurrency will be
                            confirmed as soon as the confirmations on the transaction are received.</div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab">
                        <h6 class="panel-title"><a class="faq-panel-a" href="#collapseThree" data-toggle="collapse" data-parent="#accordion"
                                aria-expanded="false" class="collapsed">I paid and haven't received my subscription.
                                What should I do?</a></h6>
                    </div>
                    <div class="collapse" id="collapseThree" role="tabpanel" aria-expanded="false">
                        <div class="panel-body"><span class="fa fa-arrow-right" aria-hidden="true"></span> If your payment is already confirmed, you should have the subscription.
                            If not, contact support immediately with your purchase information.</div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab">
                        <h6 class="panel-title"><a class="faq-panel-a" href="#collapseFour" data-toggle="collapse" data-parent="#accordion"
                                aria-expanded="false" class="collapsed">My account does not work anymore. What do I
                                do?</a></h6>
                    </div>
                    <div class="collapse" id="collapseFour" role="tabpanel" aria-expanded="false">
                        <div class="panel-body"><span class="fa fa-arrow-right" aria-hidden="true"></span> Just click the "Replace" button on your subscription page to generate a
                            replacement account instantly.</div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab">
                        <h6 class="panel-title"><a class="faq-panel-a" href="#collapseFive" data-toggle="collapse" data-parent="#accordion"
                                aria-expanded="false" class="collapsed">How can I make these accounts last longer?</a>
                        </h6>
                    </div>
                    <div class="collapse" id="collapseFive" role="tabpanel" aria-expanded="false">
                        <div class="panel-body"><span class="fa fa-arrow-right" aria-hidden="true"></span> Avoid logging in from too many devices, or changing any credentials
                            (profiles, passwords, settings, billing info. etc). The more you are cautious with the
                            account, the longer it lasts</div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab">
                        <h6 class="panel-title"><a class="faq-panel-a" href="#collapseSix" data-toggle="collapse" data-parent="#accordion"
                                aria-expanded="false" class="collapsed">How many replacements can I generate?</a></h6>
                    </div>
                    <div class="collapse" id="collapseSix" role="tabpanel" aria-expanded="false">
                        <div class="panel-body"><span class="fa fa-arrow-right" aria-hidden="true"></span> Our accounts are high quality and last for quite a while. A moderate
                            amount of replacements per account per day is allowed to prevent abuse. </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab">
                        <h6 class="panel-title"><a class="faq-panel-a" href="#collapseSeven" data-toggle="collapse" data-parent="#accordion"
                                aria-expanded="false" class="collapsed">Am I allowed to resell these accounts?</a></h6>
                    </div>
                    <div class="collapse" id="collapseSeven" role="tabpanel" aria-expanded="false">
                        <div class="panel-body"><span class="fa fa-arrow-right" aria-hidden="true"></span> Yes.</div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab">
                        <h6 class="panel-title"><a class="faq-panel-a" href="#collapseEight" data-toggle="collapse" data-parent="#accordion"
                                aria-expanded="false" class="collapsed">Am I allowed to share these accounts?</a></h6>
                    </div>
                    <div class="collapse" id="collapseEight" role="tabpanel" aria-expanded="false">
                        <div class="panel-body"><span class="fa fa-arrow-right" aria-hidden="true"></span> Yes.</div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab">
                        <h6 class="panel-title"><a class="faq-panel-a" href="#collapseNine" data-toggle="collapse" data-parent="#accordion"
                                aria-expanded="false" class="collapsed">Am I allowed to share access to my account on
                                AccountShop?</a></h6>
                    </div>
                    <div class="collapse" id="collapseNine" role="tabpanel" aria-expanded="false">
                        <div class="panel-body"><span class="fa fa-arrow-right" aria-hidden="true"></span> No, unfortunately this is something we cannot allow. Kindly do not share
                            your personal account credentials with anyone.</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
